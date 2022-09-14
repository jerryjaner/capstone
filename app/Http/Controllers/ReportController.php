<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\order;
use App\Models\OrderDetail;
use App\Models\Dish;
use App\Models\Payment;
use App\Models\Shipping;
use DB;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function client_report()
    {
        $users = user::all();
        return view('Admin.Report.ClientReport', data: compact(var_name:'users'));   
       
    }

    public function download_client()
    {
    	$users = user::all();
    	$pdf = PDF::loadView('Admin.Report.DownloadClientReport',compact('users'));
        return $pdf->stream('DownloadClientReport.pdf');
    }

    public function sales_report()
    {
         $orders = DB::table('orders')
         ->join('users','orders.user_id','=', 'users.id')
       //  ->join('payments','orders.id','=', 'payments.order_id')

         // ->select('orders.*', 'users.name','users.middlename','users.lastname' ,'payments.payment_type','payments.payment_status')

         ->select('orders.*', 'users.name','users.middlename','users.lastname')
         ->get();
          return view('Admin.Report.SalesReport',data: compact('orders'));



        
        // $months = Order::select(
        // DB::raw("(COUNT(*)) as count"),
        // DB::raw("MONTHNAME(created_at) as monthname"))
        // ->whereYear('created_at', date('F') )
        // ->groupBy('monthname')
        // ->get();

         //  dd($months);

       
       
        // $month=Order::whereMonth('created_at', date('m'))
        // ->whereYear('created_at', date('Y'))
        // ->get(['user_id','created_at']);

        // dd($month);

    } 

    public function filter(Request $request){

       $fromdate = $request->input('fromdate');
        $todate = $request->input('todate');
    

        $orders = DB::table('orders')
        ->join('users','orders.user_id','=', 'users.id')
        ->select('orders.*','orders.created_at','users.name','users.middlename','users.lastname')
        ->whereDate('orders.created_at', '>=', $fromdate)
        ->whereDate('orders.created_at', '<=', $todate)
        
        //->whereBetween('orders.created_at', [$request->fromdate, $request -> todate])
        ->get();

      //  dd($orders);

        return view('Admin.Report.result',data: compact('orders'));
            //['orders' => $orders]);


    }

    public function monthly_report()
    {


        $current_month = Order::whereYear('created_at',Carbon::now()->year)
            ->whereMonth('created_at',Carbon::now()->month)->count(); 

        $one_month = Order::whereYear('created_at',Carbon::now()->year)
            ->whereMonth('created_at',Carbon::now()->submonth(1))->count();

        $two_month = Order::whereYear('created_at',Carbon::now()->year)
            ->whereMonth('created_at',Carbon::now()->submonth(2))->count(); 

        $three_month = Order::whereYear('created_at',Carbon::now()->year)
             ->whereMonth('created_at',Carbon::now()->submonth(3))->count(); 

        $four_month = Order::whereYear('created_at',Carbon::now()->year)
             ->whereMonth('created_at',Carbon::now()->submonth(4))->count(); 

        $five_month = Order::whereYear('created_at',Carbon::now()->year)
             ->whereMonth('created_at',Carbon::now()->submonth(5))->count(); 

        $six_month = Order::whereYear('created_at',Carbon::now()->year)
             ->whereMonth('created_at',Carbon::now()->submonth(6))->count(); 

        $seven_month = Order::whereYear('created_at',Carbon::now()->year)
             ->whereMonth('created_at',Carbon::now()->submonth(7))->count();

        $eight_months = Order::whereYear('created_at',Carbon::now()->year)
             ->whereMonth('created_at',Carbon::now()->submonth(8))->count(); 

         $month_count = array($current_month, $one_month, $two_month, $three_month, $four_month, $five_month, $six_month, $seven_month, $eight_months);

      //  dd($month_count);
   
        return view('Admin.Report.Monthly',compact('month_count'));
            
       
        
    }


}
