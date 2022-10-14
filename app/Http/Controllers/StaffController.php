<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\category;
use App\Models\Dish;
use App\Models\Payment;
use App\Models\Shipping;
use App\Models\shippingfee;
use DB;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StaffController extends Controller
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

          return view('Staff.Home.index', compact('categories','dishes','admin','staff','customers','orders','newuser','pending_orders','cancelled_orders','OnProcess_orders','delivered_orders','out_orders'));  
    }

    public function CustomerOrder()
    {
    	$orders = DB::table('orders')
    		->join('users','orders.user_id','=', 'users.id')
    		->join('payments','orders.id','=', 'payments.order_id')
    		->select('orders.*', 'users.name', 'users.middlename','users.lastname','payments.payment_type','payments.payment_status')
    		->get();

    	return view('Staff.CustomerOrder.Order',data: compact('orders'));
    }
    

    public function CustomerInvoice($id)
    {

        $order = Order::find($id);
        $user_id = Auth::user()->id;
        $customer = User::find($order -> user_id);
        $shipping = Shipping::find($order -> shipping_id);
        $payment = payment::where('id',$order-> id)->first();
        $OrderD = OrderDetail::where('order_id', $order-> id)->get();

        $orders = DB::table('orders')
            ->join('users','orders.user_id','=', 'users.id')
            ->join('payments','orders.id','=', 'payments.order_id')
            ->join('shippingfees','orders.id', '=', 'shippingfees.id')
            ->select('orders.*', 'users.name','users.middlename','users.lastname','payments.payment_type','payments.payment_status','shippingfees.fee')
            ->get();

        foreach ($orders as $SF) {
          $shippingfee = $SF -> fee;
        }

        return view('Staff.CustomerOrder.CustomerInvoice',data: compact('order','customer','shipping','payment','OrderD','orders','shippingfee'));
    }

    public function DownloadCustomerInvoice($id)
    {
        $order = Order::find($id);
        $user_id = Auth::user()->id;
        $customer = User::find($order -> user_id);
        $shipping = Shipping::find($order -> shipping_id);
        $payment = payment::where('id',$order-> id)->first();
        $OrderD = OrderDetail::where('order_id', $order-> id)->get();
        $orders = DB::table('orders')
                    ->join('users','orders.user_id','=', 'users.id')
                    ->join('payments','orders.id','=', 'payments.order_id')
                    ->join('shippingfees','orders.id', '=', 'shippingfees.id')
                    ->select('orders.*', 'users.name','users.middlename','users.lastname','payments.payment_type','payments.payment_status','shippingfees.fee')
                    ->get();

        $pdf = PDF::loadView('Staff.CustomerOrder.Receipt',compact('order','customer','shipping','payment','OrderD','orders'));
        return $pdf->stream('OrderInvoice.pdf');
     
    }

    public function UpdatePayment(Request $request)
    {
        $order = Payment::find( $request -> id);
        $order -> payment_status = $request -> payment_status;
        $order->save();

        $notification = array (

            'message' => 'Payment Status Updated Successfully',
            'alert-type' =>'success'
        );

        return back()->with($notification);
        //return back()->with('sms','Payment Status Updated Successfully');
 
    }

    public function UpdateOrder(Request $request)
    {
        $order= Order::find( $request -> id);
        $order -> order_status = $request -> order_status; 
        $order->save();

        $notification = array (

            'message' => 'Order Status Updated Successfully',
            'alert-type' =>'success'
        );

        return back()->with($notification);

        // return back()->with('sms','Order Status Updated Successfully');
    }

}
