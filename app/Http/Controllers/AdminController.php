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
        return view(view:'Admin.Users.ManageUsers', data: compact(var_name:'users'));   
    }

     public function create (Request $Request)
     {
        $user = new User();
        $user -> name = $Request-> name;
        $user -> middlename = $Request-> middlename;
        $user -> lastname = $Request-> lastname;
        $user -> address = $Request-> address;
        $user -> email = $Request-> email;
        $user -> password = bcrypt($Request-> password);
        $user -> role = $Request-> role;
        $user -> save();

        return back()->with('added_msg','New User Added Sucessfully');

      
    }       

    public function profile()
    {
        return view(view:'Admin.Users.UserProfile');
    }

    /*
         public function order()
        {
            $orders = OrderDetail::all();

            return view(view:'Admin.Users.Order', data: compact(var_name:'orders'));   
        }

    */

}
