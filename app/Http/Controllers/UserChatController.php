<?php

namespace App\Http\Controllers;

use App\Models\ImageResize;
use App\Models\User;
use App\Models\UserChat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserChatController extends Controller
{

    public function user_chat(Request $request)
    {
        $userId = $request->id;
        $receiver_record = User::find($userId);
        if (isset($receiver_record)) {
            $user_chats = UserChat::where(function ($query) use ($userId) {
                $query->where('sender_id', Auth::id())->where('receiver_id', $userId)
                    ->orWhere('sender_id', $userId)->where('receiver_id', Auth::id());
            })->orderBy('created_at')->get();

            $all_users = User::where('id', '!=', $userId)->where('id', '!=', Auth::id())->orderBy('chatting_replay', 'desc')->get();
            $currentDatetime = now();
            $user_chat_count = UserChat::where('date', '>=', now()->toDateString())
                ->where(function ($query) {
                    $query->whereTime('time', '>=', now()->toTimeString())
                        ->orWhere(function ($query) {
                            $query->whereRaw('TIME(DATE_ADD(time, INTERVAL 55 SECOND)) >= ?', [now()->toTimeString()]);
                        });
                })
                ->latest('created_at')
                ->count();
            if ($request->ajax()) {
                return response()->json(['user_chats' => $user_chats, 'all_users' => $all_users,
                    'receiver_record' => $receiver_record, 'user_chat_count' => $user_chat_count]);
            }
            return view('Admin.chat.user_chat', compact('all_users', 'receiver_record', 'user_chats', 'user_chat_count'));
        } else {
            return back();
        }
    }

    public function user_chat_send(Request $request)
    {
        $user_update = User::find($request->receiver_id);
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
        $usersupdate['chatting_replay'] = Carbon::now();
        $user_update->update($usersupdate);

        $userId = $request->receiver_id;
        $receiver_record = User::find($userId);
        $user_chats = UserChat::where(function ($query) use ($userId) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $userId)
                ->orWhere('sender_id', $userId)->where('receiver_id', Auth::id());
        })->orderBy('created_at')->get();

        $all_users = User::where('id', '!=', $userId)->where('id', '!=', Auth::id())->orderBy('chatting_replay', 'desc')->get();
        $user_chat_count = UserChat::where('date', '>=', now()->toDateString())
            ->where(function ($query) {
                $query->whereTime('time', '>=', now()->toTimeString())
                    ->orWhere(function ($query) {
                        $query->whereRaw('TIME(DATE_ADD(time, INTERVAL 10 SECOND)) >= ?', [now()->toTimeString()]);
                    });
            })
            ->latest('created_at')
            ->first();
        //  $renderedContent = view("admin.chat.user_chat_render", ['user_chats' => $user_chats, 'all_users' => $all_users, 'receiver_record' => $receiver_record])->render();

        return response('success');
    }


    public function user_chat_demo(Request $request)
    {
        $userId = $request->id;
        $receiver_record = User::find($userId);

        if (isset($receiver_record)) {
            $user_chats = UserChat::where(function ($query) use ($userId) {
                $query->where('sender_id', Auth::id())->where('receiver_id', $userId)
                    ->orWhere('sender_id', $userId)->where('receiver_id', Auth::id());
            })->orderBy('created_at')->get();

            $all_users = User::where('id', '!=', $userId)->where('id', '!=', Auth::id())->orderBy('chatting_replay', 'desc')->get();


            // Return JSON response for Ajax request
            if ($request->ajax()) {
                return response()->json(['user_chats' => $user_chats, 'all_users' => $all_users, 'receiver_record' => $receiver_record]);
            }

            return view('Admin.chat.user_chat_demo', compact('user_chats', 'receiver_record', 'all_users'));
        } else {
            if ($request->ajax()) {
                return response()->json(['error' => 'User not found.']);
            }

            return back();
        }
    }

    public function image_resize()
    {
        $images = ImageResize::orderBy('id', 'desc')->get();
        return view('image.image_resize', compact('images'));
    }

    public function image_resize_store(Request $request)
    {
        $input = $request->all();
        if ($request->image_type == 'default_image') {
            $request->validate(ImageResize::$rules);
            if ($request->hasFile("image")) {
                $img = $request->file("image");
                $img->store('public/resize_images');
                $input['image'] = $img->hashName();
            }
            ImageResize::create($input);
        } else {
            $request->validate(ImageResize::$ruless);
            if ($request->hasFile("image")) {
                $img = $request->file("image");
                $filename = $img->getClientOriginalName();
                $image_resize = Image::make($img->getRealPath());
                $image_resize->resize($request->image_width, $request->image_height);
                $image_resize->save(public_path('storage/resize_images/' . $filename));
                $input['image'] = $filename;
            }
            ImageResize::create($input);
        }
        return back();
    }

    public function image_resize_delete(Request $request, $id)
    {
        $imageResize = ImageResize::find($id);
        $imageResize->delete();
        return response()->json(['message' => 'Image deleted successfully']);
    }

}
