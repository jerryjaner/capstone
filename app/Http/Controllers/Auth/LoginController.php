<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
Use Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

        protected function redirectTo(){

            if(Auth()->user()-> role == 1){

                return route('admin_dashboard');
            }

            elseif(Auth()->user()-> role == 0){

                 return route('user_dashboard');
            }

            elseif(Auth()->user()-> role == 2){

                 return route('staff_dashboard');
            }
        }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

        $input = $request -> all();
        $this -> validate($request,[

            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt(array('email'=> $input ['email'],'password' => $input ['password'])) ){
          
            
            if(Auth() -> user() -> role == 1){

                return redirect()-> route('admin_dashboard');
            }

            elseif(Auth() -> user() -> role == 0){

                return redirect()-> route('user_dashboard');
            }

            elseif(Auth()->user()-> role == 2){
            
                 return redirect()->route('staff_dashboard');
            }

        }
        else
        {
            return redirect()->route('login')->with('sms','Invalid Email or Password');
        }
    }
}
