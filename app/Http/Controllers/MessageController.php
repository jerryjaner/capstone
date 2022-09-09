<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message_customer(){

    	return view('Admin.Message.Messages');
    }

    public function new_message(Request $request){

    	$user = Auth::user();
    	$msg = new Message();

    	$msg -> sender = $request -> sender;
    	$msg -> user_id = $request -> user_id;
    	$msg -> message = $request -> message;

    	$msg -> save();
    	return back()->with('added_msg','Message Sent!');
    }


}
