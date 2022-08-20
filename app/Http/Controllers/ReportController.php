<?php

namespace App\Http\Controllers;
use App\Models\User;
use PDF;
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
}
