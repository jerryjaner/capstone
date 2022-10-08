@extends('Admin.master')
@section('title')

	Filtered Orders

@endsection
@section('content')



<style>
  div.dataTables_wrapper div.dataTables_length select {
  width: 60px;
 
}


#filter{
  font-family: poppins;
}
</style>

      <div class="card my-2">
          <div class="card-header">
            <h3 class="card-title" id ="filter"><b>Filtered Orders </b></h3>

             <a href="{{route('filtered')}}" class="btn btn-info btn-sm"  style="float: right; margin-left: 10px;">
             	<i class="fas fa-print"></i> Print</a>

            
             

             <a href="{{route('month')}}" class="btn btn-danger btn-sm" style="float: right;">Back</a>
            
          </div>   
          <div class="card-body">
            <table id="example3" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th style="font-family: poppins">#</th>
                <th style="font-family: poppins">Full Name</th>
                <th style="font-family: poppins">Order Price Total</th>
                <th style="font-family: poppins">Order Date</th>
              </tr>
              </thead>
                <tbody>

              @php($i = 1)
            	@foreach($orders as $order)
		            <tr>
		               <td style="font-family: poppins">{{$i++}}</td>
		               <td style="font-family: poppins">{{$order -> name}} {{$order -> middlename}} {{$order -> lastname}}</td>
		               <td style="font-family: poppins">{{ $order -> order_total}} Pesos</td>
		               <td style="font-family: poppins">{{\Carbon\Carbon::parse($order->created_at)->Format('m-d-Y')}}</td>
		            </tr>
          		@endforeach
                </tbody>
            </table>
          </div>
      </div>
            

@endsection
