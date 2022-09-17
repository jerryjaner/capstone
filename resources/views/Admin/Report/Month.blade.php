@extends('Admin.master')
@section('title')

	Monthly Report

@endsection
@section('content')
<style>
   div.dataTables_wrapper div.dataTables_length select
   {
  		width: 60px;
   }
   .btn{
   	margin-bottom: 10px;
   	text-align: center;

   }
</style>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<div class="card my-5">
	<div class="card-header">
	   <h3 class="card-title" ><b> Monthly Report</b></h3>

	    <button type="button" class="btn btn-secondary btn-sm" style="float: right;" data-bs-toggle="modal" data-bs-target="#modalfilter" data-bs-whatever="@fat" id="userfont"><i class="fas fa-filter"></i> Filter Orders Report</button>

	    <a href="{{route('month')}}" class="btn btn-success btn-sm " style="float: right; margin-right: 5px;" ><i class="fas fa-sync"></i> Refresh</a>

	    <!-- <a href="" class="btn btn-default" style="float: right;"><i class="fas fa-print"></i> Print</a> -->
	 </div>
	 <div class="card-body">
	 	<!-- <form action="{{route('filter')}}" method="POST">
	 		@csrf
		 	<div class="container">
		 		<div class="row">
		 			<div class="container-fluid">
		 				<div class="form-group row">

		 					
			 					
			 					    <label for="date">Date From:</label>
			 				 		<input type="date" name="fromdate" style="outline: none;" required>

			 				 		<label for="date">Date To:</label>
			 				 		<input type="date" name="todate" style="outline: none;" required>

			 				 		<button type="submit" name="btn" class="btn btn-primary btn-sm mt-1">Apply Filter</button>
			 				 	



			 				 	
			 					
			 					
		 				 	
		 				</div>
		 				 

		 			</div>
		 		</div>
		 	</div>
	 	</form> -->


	    <table id="example3" class="table table-bordered table-striped">   
	     <!-- Modal start here -->
        <div class="modal fade" id="modalfilter" tabindex="-1" aria-labelledby="modalfilter" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"  id="modalfilter" style="font-family: poppins;">Filter Order Report</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
              </div>
              <div class="modal-body">
                <form action="{{route('filter')}}" method="post">
                     @csrf

                      <div class="form-group">

                      	<label for="date">Date From:</label>
			 			<input type="date" name="fromdate" style="outline: none;" required>
                        
                      </div>

                      <div class="form-group">

                       	<label for="date">Date To:</label>
			 			<input type="date" name="todate" style="outline: none;" required>

                      </div>
                     
                      <div class="modal-footer">
                        <button id="userfont" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
                        <button id="userfont"  type="submit" name="btn" class="btn btn-primary">Apply Filter</button>
                      </div>
                </form>
              </div>
            </div>
          </div>
        </div>    
       <!-- End of Modal -->     
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
	
            @foreach($orders  as $ReportOrder)
            
	      	<tr>

	      		<td style="text-align: center;">{{$i++}}</td>
	      		<td style="text-align: center;">{{$ReportOrder -> name}} {{$ReportOrder -> middlename}} {{$ReportOrder -> lastname}}</td>
	      		<td style="text-align: center;">{{ $ReportOrder -> order_total}} Pesos</td>
	      		<td style="text-align: center;">
	      			{{\Carbon\Carbon::parse($ReportOrder->created_at)->Format('m-d-Y')}}

	      		
	      		</td>
	      		 
	      	</tr>
	     
	      	@endforeach  
	      </tbody>
	  </table>
		
	</div>
</div>



@endsection