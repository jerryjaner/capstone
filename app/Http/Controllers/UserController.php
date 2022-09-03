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
        return view('User.CheckOut.Shipping',data: compact('customer'));
      }
      else{

        return back();
      }
     
   }
     // for shipping information
    public function shipping_save(Request $request)
    {
      if(Auth::check())
      {
        $shipping = new Shipping();
        $shipping->name = $request -> name;
        $shipping->email = $request -> email;
        $shipping->phone_no = $request -> phone_no;
        $shipping->address = $request -> address;
        $shipping -> save();

        Session::put('shipping_id', $shipping -> id);
        return redirect() -> route('Checkout_payment');
      }
      else{

        return back();
      }
   
    }

    public function customerOrder()
    {
      $orders = DB::table('orders')
        ->join('users','orders.user_id','=', 'users.id')
        ->join('payments','orders.id','=', 'payments.order_id')
        ->select('orders.*', 'users.name','users.middlename','users.lastname' ,'payments.payment_type','payments.payment_status')
        ->get();

        
      return view('User.Order.ViewOrder',data: compact('orders'));
    }
      
    public function ViewOrder($id)
    {
      
        $order = Order::find($id);
        $user_id = Auth::user()->id;
        $customer = User::find($order -> user_id);
        $OrderD = OrderDetail::where('order_id', $order-> id)->get();

        // pag ang user pumunta sa order details tapos hindi nya order id yung pinuntahan nya automatic
        // mag rereturn back sya

          if($customer -> id == $user_id &&  $order -> order_status != 'Cancelled'){
          
             return view('User.Order.OrderDetails',data: compact('order','customer','OrderD'));
          }
          else
          {
             return back();
          }
        
    }
  
    public function cancel_order(Request $request)
    {
        $order= Order::find( $request -> id);
        $order -> order_status = 'Cancelled'; 
        $order->save();

        return back();
    }

      
    

  




}
