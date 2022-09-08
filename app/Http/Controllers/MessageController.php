<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function message_customer(){

    	return view('Admin.Message.Messages');
    }
}
