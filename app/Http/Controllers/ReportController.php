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
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function client_report()
    {
        $users = user::all();
        return view(view:'Admin.Report.ClientReport', data: compact(var_name:'users'));   
       
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
            

        return view('Admin.Report.SalesReport',data: compact('orders'));

    } 


}
