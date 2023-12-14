<?php

namespace App\Http\Controllers;

use App\Jobs\BackupRunJob;
use App\Models\CampaignNew;
use App\Models\CampaignNewQuestion;
use App\Models\CampaignSubIdeaDetails;
use App\Models\Question;
use App\Models\User;
use App\Models\UserChat;
use App\Rule\CurrentPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PHPMailer\PHPMailer\PHPMailer;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('id', '!=', Auth::id())->orderBy('id', 'DESC')->get();
        $roles = Role::all();
        return view('users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['status'] = 'active';
        $input['user_status'] = 'offline';

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
//        $roles = Role::pluck('name', 'name')->all();
        $roles = Role::distinct()->get();
        $userRole = $user->roles->all();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('info', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = preg_replace('/[^0-9]/', '', $id);
        $user = User::where('id', $id)->first();
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }

    public function userStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json('true');
    }


//    Backup Download

    public function backup_run()
    {
        // Dispatch the job to run the backup command asynchronously
        BackupRunJob::dispatch();

        // You can return a response or redirect as needed
        return response()->json('true');
       // return redirect()->back()->with('success', 'Backup process has been started.');
    }

    public function backup_download()
    {
        // Run the backup command
        Artisan::call('backup:run');

        // Get the output of the command
        $output = Artisan::output();

        // Split the output into lines
        $output = explode("\n", $output);

        return view('Admin.backup_run', [
            'output' => $output,
        ]);
    }

    public function profile()
    {

        return view('auth.profile');
    }

    public function profile_update(Request $request)
    {

        $rules = User::$rules;
        $rules['profile_pic'] = 'nullable';
        $rules['password'] = 'nullable';
        $request->validate($rules);
        $user = Auth::user();
        $validatedData = $request->validate([
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email,' . $user->id,
        ]);
        $input = $request->all();
        if ($request->hasFile("profile_pic")) {
            $img = $request->file("profile_pic");
            if (Storage::exists('public/images' . $user->profile_pic)) {
                Storage::delete('public/images' . $user->profile_pic);
            }
            $img->store('public/images');
            $input['profile_pic'] = $img->hashName();
            $user->update($input);

        }

        $user->update($input);

        return redirect()->back()->with('info', "Profile Updated SuccessFully");
    }

    public function change_password(Request $request)
    {
        $input = $request->all();
        $user = User::whereId(Auth::id())->first();
        $request->validate([
            'current_password' => [new CurrentPassword($user->password)],

            'new_password' => 'required|min:4',
            'conform_password' => 'required|same:new_password'
        ]);

        $new_pass['password'] = Hash::make($request->input('new_password'));
        $user->update($new_pass);
        $user->update($input);
        return redirect()->back()->with('info', "Password Updated SuccessFully");
    }

    public function register_page()
    {
        return view('register_page');
    }

    public function index_page()
    {
        return view('index');
    }

    public function test_register_page()
    {
        return view('test_register_page');
    }

    public function answer_register_page()
    {
        return view('answer_register_page');
    }

    public function table_index()
    {
        return view('table_index');
    }

    public function campaign_tab()
    {
        $campaign_idea_questions = Question::where('type', 'idea_details')->get();
        $evaluation_criterias = Question::where('type', 'evaluation_criteria')->get();
        $additional_criterias = Question::where('type', 'criteria_description')->get();
        return view('tab', compact('campaign_idea_questions', 'evaluation_criterias', 'additional_criterias'));
    }

//Campaign Idea Start
    public function campaign_index()
    {
        $campaign_news = CampaignNew::all();
        return view('campaign_new.index', compact('campaign_news'));
    }

    public function add_campaign_ideas(Request $request)
    {
        $request->validate(CampaignNew::$rules);
        $input = $request->all();
        if ($request->hasFile("campaign_banner")) {
            $img = $request->file("campaign_banner");
            $img->store('public/images');
            $input['campaign_banner'] = $img->hashName();
        }
        CampaignNew::create($input);
        return redirect()->route('campaign-tab', ['tab' => 'active'])->with('success', 'Campaign Add SuccessFully!...');
    }

    public function campaign_idea_edit($id)
    {
        $campaign_news = CampaignNew::find($id);
        return view('campaign_new.edit', compact('campaign_news'));
    }

    public function campaign_idea_update(Request $request, $id)
    {
        $rules = CampaignNew::$rules;
        $rules['campaign_banner'] = 'nullable';
        $request->validate($rules);
        $campaign_questions = CampaignNew::find($id);
        $input = $request->all();
        if ($request->hasFile("campaign_banner")) {
            $img = $request->file("campaign_banner");
            if (Storage::exists('public/images' . $campaign_questions->campaign_banner)) {
                Storage::delete('public/images' . $campaign_questions->campaign_banner);
            }
            $img->store('public/images');
            $input['campaign_banner'] = $img->hashName();
            $campaign_questions->update($input);

        }
        $campaign_questions->update($input);
        return redirect()->route('campaign-index')->with('info', 'Campaign New  updated SuccessFully!...');
    }

    public function campaign_idea_delete($id)
    {
        $campaign_ideas = CampaignNew::find($id);
        $campaign_ideas->delete();
        return back()->with('danger', 'Campaign New Delete SuccessFully!...');
    }

    //Campaign Idea End

    //Campaign Question Start
    public function campaign_question_table()
    {
        $campaign_questions = CampaignNewQuestion::all();
        return view('campaign_question.campaign_question_table', compact('campaign_questions'));
    }

    public function question_form()
    {
        $campaign_news = CampaignNew::latest()->first();
        return view('campaign_question.question_form', compact('campaign_news'));
    }

    public function add_question_form(Request $request)
    {


        $input = $request->all();
        $input['status'] = 1;
        CampaignNewQuestion::create($input);
        return redirect()->route('campaign-question-table')->with('success', 'Campaign New Question Add SuccessFully!...');
    }

    public function campaign_question_edit($id)
    {
        $campaign_questions = CampaignNewQuestion::find($id);
        $campaign_news = CampaignNew::latest()->first();
        return view('campaign_question.campaign_question_edit', compact('campaign_questions', 'campaign_news'));
    }

    public function campaign_question_update(Request $request, $id)
    {

        $campaign_questions = CampaignNewQuestion::find($id);
        $input = $request->all();
        if ($request->input_type == 'radio' || $request->input_type == 'checkbox') {
            $campaign_questions->update($input);
        } else {
            $input['label_name'] = [null];
            $input['input_value'] = [null];
            $campaign_questions->update($input);
        }

        return redirect()->route('campaign-question-table')->with('info', 'Campaign New Question updated SuccessFully!...');
    }

    public function campaign_question_delete($id)
    {
        $campaign_questions = CampaignNewQuestion::find($id);
        $campaign_questions->delete();
        return back()->with('danger', 'Campaign New Question Delete SuccessFully!...');
    }

//Campaign Question End

    public function question_table()
    {
        $campaign_news = CampaignNew::all();
        return view('question.question_table', compact('campaign_news'));
    }

    public function question_create()
    {
        return view('question.question_create');
    }

    public function test_question_create()
    {
        return view('test_question_create');
    }

    public function evaluation_criteria()
    {
        return view('evaluation_criteria.index');
    }

    public function evaluation_criteria_create()
    {
        return view('evaluation_criteria.create');
    }

    public function additional_evaluation_criteria()
    {
        return view('additional_evaluation.index');
    }

    public function additional_evaluation_criteria_create()
    {
        return view('additional_evaluation.create');
    }

    public function campaign_ideas_index()
    {
        $campaign_ideas_indexs = CampaignNew::all();
        return view('campaign.index', compact('campaign_ideas_indexs'));
    }

    public function sub_campaign_ideas_index()
    {
        $campaign_sub_ideas_indexs = CampaignSubIdeaDetails::all();
        return view('campaign.sub_campaign', compact('campaign_sub_ideas_indexs'));
    }

    public function updateProfilePicture(Request $request)
    {
        if ($request->hasFile('profile_pic')) {
            $photo = $request->file('profile_pic');
            $photo->store('public/images/');
            Auth::user()->update(['profile_pic' => $photo->hashName()]);
        }

        return response()->json(['message' => 'Profile picture updated successfully']);
    }


    public function send_mail()
    {
        $mail = new PHPMailer();
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.mailgun.org';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'hello@mail.mycloudparticles.in';                     // SMTP username
        $mail->Password = 'secret';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable encryption, only 'tls' is accepted
        $mail->From = 'amit@mail.mycloudparticles.in';
        $mail->FromName = 'Cloudparticles';
        $mail->addAddress('kamal.verma@nativebyte.in');                 // Add a recipient
        $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
        $mail->Subject = 'Hello';
        $mail->Body = 'Testing some Mailgun awesomness';
        //dd($mail->send());
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }

    }


    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }


    public function user_chat(Request $request)
    {
        $userId = $request->id;
        $receiver_record = User::find($userId);
        if (isset($receiver_record)) {
            $user_chats = UserChat::where(function ($query) use ($userId) {
                $query->where('sender_id', Auth::id())->where('receiver_id', $userId)
                    ->orWhere('sender_id', $userId)->where('receiver_id', Auth::id());
            })->orderBy('created_at')->get();
            $all_users = User::where('id', '!=', Auth::id())->orderBy('user_status', 'desc')->get();
            return view('Admin.chat.user_chat', compact('all_users', 'receiver_record', 'user_chats'));
        } else {
            return back();
        }
    }

    public function user_chat_send(Request $request)
    {

        $input = $request->all();
        $input['sender_id'] = Auth::user()->id;
        $input['date'] = date('Y-m-d');
        $input['time'] = date('h:i A');
        if ($request->hasFile("document")) {
            foreach ($request->file('document') as $image) {
                if ($image->isValid()) {
                    $image->store('public/admin/document');
                    $images[] = $image->hashName();
                }
                $input['document'] = $images;
            }
        }
        UserChat::create($input);
        return back();
    }
}

