<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\order;
use App\Models\OrderDetail;
use App\Models\category;
use App\Models\Dish;
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
    
        $users = user::all();
        return view('Admin.Users.UserProfile', data: compact(var_name:'users')); 
    }

    public function profile_update(Request $request){


    	$profile = User::find($request->id);
    	$profile->name = $request->name;
    	$profile->middlename = $request->middlename;
    	$profile->lastname = $request->lastname;
    	$profile -> address = $request -> address;
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
    


    

}
