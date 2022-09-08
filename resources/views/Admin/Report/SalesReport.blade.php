@extends('Admin.master')
@section('title')

	Sales Report

@endsection
@section('content')
<style>
   div.dataTables_wrapper div.dataTables_length select
   {
  		width: 60px;
   }
</style>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<div class="card my-5">
	 <div class="card-body">
	    <table id="example1" class="table table-bordered table-striped">        
	      <thead>
	        <tr>
		        <th style="text-align: center;">#</th>
		        <th style="text-align: center;">Customer Name</th>
		        <th style="text-align: center;">Order Price Total</th>
		        <th style="text-align: center;">Order Date</th>
		       
		        
	        </tr>
	      </thead>
	      <tbody>
	      	@php($i = 1)
	      	@php($sum = 0)
            @foreach($orders  as $ReportOrder)
            	@if(\Carbon\Carbon::parse($ReportOrder -> created_at)->Format('F') == 'August')
	      	<tr>

	      		<td style="text-align: center;">{{$i++}}</td>
	      		<td style="text-align: center;">{{$ReportOrder -> name}} {{$ReportOrder -> middlename}} {{$ReportOrder -> lastname}}</td>
	      		<td style="text-align: center;">{{$TotalAmount =  $ReportOrder -> order_total}} Pesos</td>
	      		<td style="text-align: center;">
	      			{{\Carbon\Carbon::parse($ReportOrder->created_at)->Format('F')}}
	      		
	      		</td>
	      		
	      	</tr>
	      	@php($sum = $sum + $TotalAmount)

	      		@endif
	      	@endforeach  
	      </tbody>
	  </table>
		  <div style="margin-top: 10px;">
		  	 <p><b>Total Amount of Orders: Php {{$sum}}</b></p>
		  </div>
	</div>
</div>



@endsection