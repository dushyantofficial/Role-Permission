<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Campaign_Ideas;
use App\Models\CampaignAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Campaign_IdeasController extends Controller
{
    public function register_page(Request $request)
    {
        $response = Http::get('https://api.ipify.org?format=json');
        if (isset($request)) {
            if ($response->successful()) {
                $responseData = $response->json();
                $publicIpAddress = $responseData['ip'];
                $input = $request->all();
                $input['user_ip'] = $publicIpAddress;

                $uploadedImages = [];

                if ($request->hasFile('attachment')) {
                    foreach ($request->file('attachment') as $image) {
                        $filename = time() . '_' . $image->getClientOriginalName();
                        $image->move(public_path('uploads'), $filename);
                        $uploadedImages[] = $filename;
                    }
                }

                Campaign_Ideas::create($input);
                return response(['success' => true]);
            } else {
                return 'Unable to retrieve public IP address';
            }
        } else {
            return response(['error' => 'all field required']);
        }
    }

    public function test_add_register_page(Request $request)
    {
//           dd($request->hasFile('attachment'));
        $response = Http::get('https://api.ipify.org?format=json');
        if (isset($request)) {
            if ($response->successful()) {
                $responseData = $response->json();
                $publicIpAddress = $responseData['ip'];
                $input = $request->all();
                $input['user_ip'] = $publicIpAddress;

                $images = array();

                if ($request->hasFile('attachment')) {
                    foreach ($request->file('attachment') as $file) {
                        $name = $file->getClientOriginalName();
                        $file_name = rand(10000, 99999) . $name;
                        $file->move('uploads', $file_name);
                        $images[] = $file_name;
                        $input['attachment'] = json_encode($images);
                    }
                }
                Campaign_Ideas::create($input);
                return response(['success' => true]);
            } else {
                return 'Unable to retrieve public IP address';
            }
        } else {
            return response(['error' => 'all field required']);
        }

    }


    public function answer_get()
    {
        $answer_gets = DB::table('questions')->where('status', '=', 1)->get();
        return response()->json($answer_gets);
    }

    public function answer_add_register_page(Request $request)
    {
//        dd($request);

//        dd($request);
        $response = Http::get('https://api.ipify.org?format=json');
        if (isset($request)) {
            if ($response->successful()) {
                $responseData = $response->json();
                $publicIpAddress = $responseData['ip'];
                $input = $request->all();
                $input['user_ip'] = $publicIpAddress;

                $images = array();

                if ($request->hasFile('attachment')) {
                    foreach ($request->file('attachment') as $file) {
                        $name = $file->getClientOriginalName();
                        $file_name = rand(10000, 99999) . $name;
                        $file->move('uploads', $file_name);
                        $images[] = $file_name;
                        $input['attachment'] = json_encode($images);
                    }
                }

                $campaign_ideas = Campaign_Ideas::create($input);
                foreach ($request->questionId as $key => $questionIds) {
                    if (isset($request->textareaValue[$key])) {
                        $answers_create['user_id'] = $campaign_ideas->id;
                        $answers_create['question_id'] = $questionIds;
                        $answers_create['answer'] = $request->textareaValue[$key];
                        CampaignAnswer::create($answers_create);
                    }
                }

                return response(['success' => true]);
            } else {
                return 'Unable to retrieve public IP address';
            }
        } else {
            return response(['error' => 'all field required']);
        }

    }

    public function answer_add_question(Request $request)
    {
//        dd($request->all());
        $input = $request->all();
        $input['user_id'] = 1;
        CampaignAnswer::create($input);
        return response(['success' => true]);
    }

    public function campaign_idea_details(){
        $campaign_details = DB::table('campaign_new_question')
            ->where('campaign_new_id', \request('id'))
//            ->where('type','=','idea_details')
            ->get();
        return response()->json($campaign_details);
    }
}
