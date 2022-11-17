<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Messages;
use App\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //


    public function startChat(Request $request)
    {
        
        $user_id = auth()->user()->id;

        $receiver = User::where("id","!=",$user_id)->where("id","!=",1)->first();

        if(!isset($receiver->id)){

            return redirect()->back()->with(['type' => 'danger', 'msg' => 'Currently there is no user to start chat. please register atleast one user to start chat']);
        }

        $chat = Chat::create([
            'user1_id' => $user_id,
            'user2_id' => $receiver->id,
        ]);

        Messages::create([
            'text' => "Hello $receiver->first_name",
            'chat_id' => $chat->id,
            'sender_id' => auth()->user()->id,
            'receiver_id' => $receiver->id,
        ]);

        return redirect()->back()->with(['type' => 'success', 'msg' => "Your chat is start with $receiver->first_name"]);
    }

    public function chat($id = null)
    {
        $user_id = auth()->user()->id;

        //dd($user_id);

        // $chat = Chat::create([
        //     'user1_id' => $user_id,
        //     'user2_id' => 2,
        // ]);

        // Messages::create([
        //     'text' => 'Request',
        //     'chat_id' => $chat->id,
        //     'sender_id' => auth()->user()->id,
        //     'receiver_id' => 2,
        // ]);

        // dd("done");
        
        $chats = Chat::with(['user1', 'user2'])
            // ->where('user1_id', '<>', 1)
            // ->where('user2_id', '<>', 1)
            ->where(function($query) use($user_id) {
                $query->where('user1_id', $user_id)
                    ->orWhere('user2_id', $user_id);
            })
            ->get();
        
        Messages::where('receiver_id', $user_id)
            ->update(['read' => 1]);
        
        if ($id) {
            $chat_id = $id;
        } elseif ($chats->count()) {
            $chat_id = $chats->first()->id;
        } else {
            $chat_id = null;
        }
        
        $messages = $chat_id ? Messages::where('chat_id', $chat_id)->get() : [];
        $chat_open = Chat::find($chat_id);
        $role = auth()->user()->hasRole('Admin') ? 'admin' : 'user';

        return view($role.'.chat', compact('chats', 'messages', 'chat_open'));
    }


    public function refreshMsgs($chat_id)
    {
        $messages = Messages::where('chat_id', $chat_id)->get();
        $response = view('messages', compact('messages'))->render();
        
        return $response;
    }


    public function sendMsg(Request $request)
    {
        $chat = Chat::findOrFail($request->chat_id);
        $receiver_id = $chat->user1_id == auth()->user()->id ? $chat->user2_id : $chat->user1_id;
        
        Messages::create([
            'text' => $request->msg,
            'chat_id' => $chat->id,
            'sender_id' => auth()->user()->id,
            'receiver_id' => $receiver_id
        ]);
        
        $receiver = User::find($receiver_id);
        $sender = auth()->user();
        $details = [
            'id' => $chat->id,
            'receiver_name' => $receiver->first_name . ' ' . $receiver->last_name,
            'sender_name' => $sender->first_name . ' ' . $sender->last_name
        ];
        
        //Mail::to($receiver->email)->send(new NewMessage($details));
    }

}
