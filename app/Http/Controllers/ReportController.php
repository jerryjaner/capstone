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
        ->join('payments','orders.id','=', 'payments.order_id')
        ->select('orders.*', 'users.name','users.middlename','users.lastname' ,'payments.payment_type','payments.payment_status')
        ->get();

        // $month=Order::whereMonth('created_at', date('m'))
        // ->whereYear('created_at', date('Y'))
        // ->get(['user_id','created_at']);

        // dd($month);

        $month = Order::select(
            DB::raw("(COUNT(*)) as count"),
            DB::raw("MONTHNAME(created_at) as monthname"))
            ->whereYear('created_at', 2022 )
            ->groupBy('monthname')
            ->get();
            dd($month);


            

        return view('Admin.Report.SalesReport',data: compact('orders','month'));

    } 

    public function monthly_report()
    {
        $current_month = User::whereYear('created_at',Carbon::now()->year)
            ->whereMonth('created_at',Carbon::now()->month)->count(); 

        $before_1month = User::whereYear('created_at',Carbon::now()->year)
            ->whereMonth('created_at',Carbon::now()->submonth(1))->count(); 

        

        $monthCount = array( $current_month, $before_1month);

      

          
       return view('Admin.Report.Monthly')
        ->with(compact('monthCount'));
    }


}
