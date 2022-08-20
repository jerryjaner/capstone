<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\User;
use App\Models\Dish;
use App\Models\order;

class HomeController extends Controller
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
    public function index()
    {

        if(Auth()->user()-> role == 1)
        {

             //   return route('admin_dashboard');
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
        elseif(Auth()->user()-> role == 0)
        {
                
            $dishes = Dish::where('dish_status', 1) -> get();
                

                //return view('User.include.Home',data: compact('dishes') );

               //  return route('user_dashboard');
                 return view('User.include.Home',data: compact('dishes'));
                 
        }

        elseif(Auth()->user()-> role == 2)
        {
                
              return view('Staff.Home.index');

        }
       
    }
}
