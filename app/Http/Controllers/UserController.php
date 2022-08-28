<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\Dish;
use App\Models\User;
use App\Models\Shipping;
use App\Models\order;
use App\Models\OrderDetail;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{

   public function index()
   {
   	 //	$categories = Category::where('category_status', 1) -> get();
    
   		$dishes = Dish::where('dish_status', 1) -> get();
   		return view('User.include.Home',data: compact('dishes') );
   }

   public function dish_show($id)
   {
   // $categories = Category::where('category_status', 1) -> get();
      $categoryDish = Dish::where('category_id', $id)
                    ->where('dish_status', 1) 
                    ->get();

        return view('User.include.Dish',data: compact('categoryDish') );
   }

   // For the Shipping //
   public function shipping()
   {
      if(Auth::check())
      {
        
        $user_id = Auth::user()->id;
        $customer = User::find($user_id);
        return view(view:'User.CheckOut.Shipping',data: compact('customer'));
      }
      else{

        return back();
      }
     
   }
     // for shipping information
    public function shipping_save(Request $request)
    {

      $shipping = new Shipping();
      $shipping->name = $request -> name;
      $shipping->email = $request -> email;
      $shipping->phone_no = $request -> phone_no;
      $shipping->address = $request -> address;
      $shipping -> save();

      Session::put('shipping_id', $shipping -> id);
      return redirect() -> route(route:'Checkout_payment'); 
   
    }
    
     
    public function user_order()
    {
      // $orders = DB::table('orders')
      //             ->join('users','orders.user_id','=', 'users.id')
      //             ->join('order_details','orders.id','=','order_details.id')
      //             ->select('orders.*', 'users.name','users.middlename','users.lastname','order_details.dish_name','order_details.dish_qty','order_details.dish_price')
      //             ->get();


     //$orders = order::with('OrderDetail', 'User')->get();

      // foreach ($orders as $order) {

      //   return $order->dish_name;
      //   # code...
      // }
      //           // return $orders;



        //return view('User.Order.CustomerOrder',data: compact('orders'));
        

       // return($orders);
      // return view('User.Order.ViewOrder',data: compact('orders')); 

       

   
    }     


   /*
    public function user_order()
    {
     
       $customer_order = DB::table('orders')
            ->join('users','orders.user_id','=', 'users.id')
            ->join('order_details','orders.id','=','order_details.order_id')
            ->select('orders.*', 'users.name','users.middlename','users.lastname','order_details.dish_name','order_details.dish_qty','order_details.dish_price')
            ->get();

      $orders = DB::table ('orders')
       ->join('users','orders.user_id','=', 'users.id')
            ->join('order_details','orders.id','=','order_details.id')
            ->select('orders.*', 'users.name','users.middlename','users.lastname','order_details.dish_name','order_details.dish_qty','order_details.dish_price')
            ->get();
      


            return view('User.Order.CustomerOrder',data: compact('customer_order','orders'));
     
    }
     */
  
    public function cancel_order(Request $request)
    {
        $order= Order::find( $request -> id);
        $order -> order_status = 'Cancelled'; 
        $order->save();

        return back();
    }

      
    

  




}
