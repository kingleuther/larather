<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{
    public function submit(Request $req){
        $this->validate($req, [
            'name' => 'required',
            'email' => 'required'
        ]);
        // return $req->input('messages');

        //-------------------------
        // STANDARD
        // return $req->messages;//
        //-------------------------

        //create a new message
        $message = new Message;
        $message->name = $req->name;
        $message->email = $req->email;
        $message->message = $req->input('message');
        //save message
        $message->save();
        logger('submit');
        //redirect
        // return redirect('/')->with('success', 'Message Sent');
        return response()->json(true);
    }

    public function getMessages(){
        $messages = Message::all();
        // return view('messages',array('messages' => $messages));
        return view('messages')->with('messages', $messages);
    } 
}
