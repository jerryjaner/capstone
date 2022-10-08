<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\order;
use App\Models\OrderDetail;
use App\Models\category;
use App\Models\Dish;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    function index()
    {
      $categories = Category::count();
      $dishes = Dish::count();
      $orders = Order::count();
      $pending_orders = Order::where('order_status','pending')->count();
      $cancelled_orders = Order::where('order_status','Cancelled')->count();
      $OnProcess_orders = Order::where('order_status','On Process')->count();
      $delivered_orders = Order::where('order_status','Delivered')->count();
      $out_orders = Order::where('order_status','Out of Delivery')->count();
      $admin = User::where('role','1')->count();
      $staff = User::where('role','2')->count();
      $customers = User::where('role','0')->count();
      $newuser = User::where('created_at', '>', today())->count();
      return view('Admin.Home.index', compact('categories','dishes','admin','staff','customers','orders','newuser','pending_orders','cancelled_orders','OnProcess_orders','delivered_orders','out_orders'));  
    }
  

    public function manage()
    {
        $users = user::all();
        return view('Admin.Users.ManageUsers', compact('users'));   
    }

    public function create (Request $request)
    {

      $validated = $request->validate([
        'email' => 'required|email|string|unique:users|max:255',
      ]);

        $user = new User();

        $user -> name = $request-> name;
        $user -> middlename = $request-> middlename;
        $user -> lastname = $request-> lastname;
        $user -> address = $request-> address;
        $user -> email = $request-> email;
        $user -> password = bcrypt($request-> password);
        $user -> role = 2;
        $user -> save();

        $notification = array (

            'message' => 'New User Added Sucessfully',
            'alert-type' =>'success'
        );

        return redirect()-> back()->with($notification);


        // return back()->with('added_msg','New User Added Sucessfully');
      
    }

    public function profile(){
    
         $admin = User::find(Auth::id());
        return view('Admin.Users.UserProfile', data: compact(var_name:'admin')); 
    }

    public function profile_update(Request $request){

       $validated = $request->validate([
        'email' => 'required|email|string|unique:users|max:255',

      ]);


    	$profile = User::find($request->id);
    	$profile->name = $request->name;
    	$profile->middlename = $request->middlename;
    	$profile->lastname = $request->lastname;
    	$profile -> address = $request -> address;
      $profile -> email = $request -> email;
    	$profile->save();

        $notification = array (

            'message' => 'Profile Updated Successfully',
            'alert-type' =>'info'
        );

        return back()->with($notification);
    }  

    public function change_pass(){

        return view('Admin.Users.UserPass');
    }
    
    public function update_pass(Request $request){

      $validated = $request->validate([
       
        'oldpassword' => 'required|password',
        'password' => 'required|confirmed|min:8|max:255',
        'password_confirmation' => 'required',


      ]);

      $hashedPassword = Auth::user()->password;

      if(Hash::check($request -> oldpassword,$hashedPassword)){

          $user = User::find(Auth::id());
          $user -> password = Hash::make($request-> password);
          $user->save();
          Auth::logout();
         
          return redirect()->route('login')->with('sms','Password Successfully Change. You need to login with new password');
      }
      else{      

          return redirect()->back();

      }

    }


    

}
