<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\Dish;
use App\Models\User;
use App\Models\Shipping;
use App\Models\order;
use App\Models\OrderDetail;
use Cart;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{

   public function index(){
   	 //	$categories = Category::where('category_status', 1) -> get();
    
   		$dishes = Dish::where('dish_status', 1) -> get();
   		return view('User.include.Home',data: compact('dishes') );
   }

   public function dish_show($id){
   // $categories = Category::where('category_status', 1) -> get();
      $categoryDish = Dish::where('category_id', $id)
                          ->where('dish_status', 1) 
                          ->get();

      return view('User.include.Dish',data: compact('categoryDish') );
   }

   // For the Shipping //
   public function shipping(){
      if(Auth::check())
      {
        $CartDish = Cart::content();
        $user_id = Auth::user()->id;
        $customer = User::find($user_id);

        if(count($CartDish) > 0){

          return view('User.CheckOut.Shipping',data: compact('customer'));
        }
        else{

          $notification = array (

            'message' => 'Your cart is Empty',
            'alert-type' =>'error'
        );
      
     
         return redirect()-> back()->with($notification);
        }
        
      }
      else{

        return back();
      }
     
   }
     // for shipping information
    public function shipping_save(Request $request){
      
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

    public function customerOrder(){

      if(Auth::check())
      {
        $orders = DB::table('orders')
          ->join('users','orders.user_id','=', 'users.id')
          ->join('payments','orders.id','=', 'payments.order_id')
          ->select('orders.*', 'users.name','users.middlename','users.lastname' ,'payments.payment_type','payments.payment_status')
          ->get();
  
        return view('User.Order.ViewOrder',data: compact('orders'));
      }
      else{
        
        return back();
      }
    }
      
    public function ViewOrder($id){

      if(Auth::check())
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
       else{

        
         return back();
       }
        
    }
  
    public function cancel_order(Request $request){
        $order= Order::find( $request -> id);
        $order -> order_status = 'Cancelled'; 
        $order->save();

        $notification = array (

            'message' => 'Order Cancelled ',
            'alert-type' =>'error'
        );

        return back()->with($notification);
      
    }

    public function customerprofile(){
      // $customers = User::where('role',0)
      //                  ->where('id', Auth::user()->id)
      //                  ->get();

      $CustomerProfile = User::find(Auth::id());

      if(Auth::check()){


        return view('User.CustomerProfile.Profile', compact('CustomerProfile'));

      }
      else{
        return back();
      }
      
      
    }

    public function customer_profile_update(Request $request){

      $validated = $request->validate([
        'email' => 'required|email|string|unique:users|max:255',

      ]);

      $customer_profile = User::find($request->id);
      $customer_profile->name = $request->name;
      $customer_profile->middlename = $request->middlename;
      $customer_profile->lastname = $request->lastname;
      $customer_profile -> address = $request -> address;
      $customer_profile -> email = $request -> email;
      $customer_profile->save();

        $notification = array (

            'message' => 'Your Profile Updated Successfully',
            'alert-type' =>'info'
        );

        return back()->with($notification);

    }

    public function view_of_change_pass(){


       return view('User.CustomerProfile.ChangePassword');
    }

    public function customer_update_password(Request $request){

      $validated = $request -> validate([

        'oldpassword' => 'required|password',
        'password' => 'required|min:8|max:50',
        'password_confirmation' => 'required',

      ]);

      $hashedPass = Auth::user()->password;

      if(Hash::check($request -> oldpassword, $hashedPass)){

        $customer = User::find(Auth::id());
        $customer -> password = Hash::make($request -> password);
        $customer -> save();
        Auth::logout();


        return redirect()->route('login')->with('sms','Password Successfully Change. You need to login with new password');
      }
      else{

         return redirect()->back();
      }

    }

      


}

