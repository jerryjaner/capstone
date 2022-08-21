<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class FacebookLoginController extends Controller
{
    public function redirect()
    {
    	return Socialite::driver('facebook')->redirect();
    }
    public function callback()
    {
    	try {

    		$facebook_user = Socialite::driver('facebook')->user();
    		$user = User::where('facebook_id',$facebook_user->getId())->first();

    		if(!$user){

    			$new_user = User::create([

    				'name' => $facebook_user->getName(),
    				'email' => $facebook_user -> getEmail(),
    				'facebook_id' => $facebook_user ->getId()

    			]);

    			Auth::login($new_user);
    			return redirect()->intended('/home');
    		}
    		else{
    			Auth::login($user);
    			return redirect()->intended('/home');
    		}
    		
    	} catch (\Throwable $th) {
    	//	dd('something went wrong '. $th->getMessage());
            return redirect('login') -> with('sms', 'Something went Wrong. Please Try Again Later');
    	}
    }
}
