<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $receiver = User::find($id);
        $messages = Message::all();
        return view('chats.index')->with('receiver', $receiver)->with('messages', $messages);
    }

    public function send_chat(Request $request)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);

        $message = new Message;
        $message->sender_id = $request->input('sender_id');
        $message->receiver_id = $request->input('receiver_id');
        $message->message = $request->input('message');
        $message->save();

        return redirect('/chat/' .$message->receiver_id);
    }

}
