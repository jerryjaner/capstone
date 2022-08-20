<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Dish;
use App\Models\Payment;
use App\Models\Shipping;
use DB;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    
    public function Manage_Order()
    {
    	$orders = DB::table('orders')
    		->join('users','orders.user_id','=', 'users.id')
    		->join('payments','orders.id','=', 'payments.order_id')
    		->select('orders.*', 'users.name','users.middlename','users.lastname' ,'payments.payment_type','payments.payment_status')
    		->get();

    	return view('Admin.Order.ManageOrder',data: compact('orders'));
    }

    public function View_Order($id) 
    {
        $order = Order::find($id);
        $user_id = Auth::user()->id;
        $customer = User::find($order -> user_id);
        $shipping = Shipping::find($order -> shipping_id);
        $payment = payment::where('id',$order-> id)->first();
        $OrderD = OrderDetail::where('order_id', $order-> id)->get();

        return view('Admin.Order.ViewOrder',data: compact('order','customer','shipping','payment','OrderD'));
    } 

    public function view_invoice($id)
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
            ->select('orders.*', 'users.name','users.middlename','users.lastname','payments.payment_type','payments.payment_status')
            ->get();

        return view('Admin.Order.OrderInvoice',data: compact('order','customer','shipping','payment','OrderD','orders'));
    }

    public function delete_order($id)
    {
        $order = order::find($id);
        $order -> delete();

       // dd($order);

        return back()->with('sms', 'Deleted Successfully');

    }
    public function download_invoice($id)
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
            ->select('orders.*', 'users.name','payments.payment_type','payments.payment_status')
            ->get();

        $pdf = PDF::loadView('Admin.Order.DownloadInvoice',compact('order','customer','shipping','payment','OrderD','orders'));
        return $pdf->stream('OrderInvoice.pdf');
     
    }

    //for the update status of payment

      public function update(Request $request)
     {

        $order = Payment::find( $request -> id);
        $order -> payment_status = $request -> payment_status;
        $order->save();
        return redirect(to:'/admin/orderManage')->with('sms','Payment Status Updated Successfully');
 
    }

    //for the update status of Order

     public function order_status(Request $request)
     {
        $order= Order::find( $request -> id);
        $order -> order_status = $request -> order_status; 
        $order->save();
        return redirect(to:'/admin/orderManage')->with('sms','Order Status Updated Successfully');
 
    }


}
