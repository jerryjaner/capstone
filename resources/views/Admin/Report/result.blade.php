@extends('Admin.master')
@section('title')

	Manage User

@endsection
@section('content')


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<style>
  div.dataTables_wrapper div.dataTables_length select {
  width: 60px;
 
}

#filter{
  font-family: poppins;
}
</style>

      <div class="card my-5">
          <div class="card-header">
            <h3 class="card-title" id ="filter"><b>Filtered Orders </b></h3>
               
          </div>   
        
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">

      
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
		               <td style="font-family: poppins">
		               		{{\Carbon\Carbon::parse($order->created_at)->Format('m-d-Y')}}
		               		<!-- {{$order -> created_at}} -->
		               	</td>
		            </tr>
          		@endforeach
                </tbody>
            </table>
          </div>
      </div>
            

@endsection
