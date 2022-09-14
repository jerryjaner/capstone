@extends('Staff.master')
@section('title')

   Manage Order

@endsection
@section('content')
	

<style>
  div.dataTables_wrapper div.dataTables_length select {
  width: 60px;
 
}
</style>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- for display mesage -->

  @if(Session::get('sms'))

      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong> {{session::get('sms')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hiddden="true">&times;</span>
        </button>
      </div>
  @endif

        <div class="card my-5">
              <div class="card-header">
                <h3 class="card-title"><b> Manage Order </b></h3>
              </div>
            
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="text-align: center;">SL</th>
                      <th style="text-align: center;">Customer Name</th>
                      <th style="text-align: center;">Order Price Total</th>
                      <th style="text-align: center;">Order Status</th>
                      <th style="text-align: center;">Order Date</th>
                      <th style="text-align: center;">Payment Type</th>
                      <th style="text-align: center;">Payment Status</th>
                      <th style="text-align: center;">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  @php($i = 1)
                  @foreach($orders  as $order)

                  <div class="modal fade" id="orderstatus{{$order->id}}" tabindex="-1" aria-labelledby="orderstatus{{$order->id}}" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="orderstatus{{$order->id}}">Update Order Status</h5>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('update_order')}}" method="post" >
                            @csrf
                            
                            <div class="form-group">
                             <input type="hidden" class="form-control"  name="id" value="{{$order->id}}">
                             <label> Select Order Status  </label>
                              <select name="order_status" class="form-select"  required>
    
                                  <option value="" hidden> ---Select Order Status---</option>
                                  <option>On Process</option>
                                  <option>Out of Delivery</option>
                                  <option>Delivered</option>
                                  <option>Cancelled</option>

                              </select>                        
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> 
                              <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$order->name}} {{$order->middlename}} {{$order -> lastname}}</td>
                    <td>{{$order->order_total}}</td>
                    <td>
                      @if($order->order_status =='pending')

                        <p id="orderfont" style="text-align: center; color: black; background-color: yellow;">
                          <strong>Pending</strong>
                        </p>

                      @elseif($order->order_status =="On Delivery")

                        <p id="orderfont" style="text-align: center; color: white; background-color: blue;">
                          <strong>On Delivery</strong>
                        </p>

                      @elseif($order->order_status =='Delivered')

                        <p id="orderfont" style="text-align: center; color: white; background-color: green; ">
                          <strong>Delivered</strong>
                        </p>

                      @elseif($order->order_status =='Cancelled')

                        <p id="orderfont" style="text-align: center; color: white; background-color: red; ">
                          <strong> Cancelled </strong>
                        </p>

                       @elseif($order->order_status == "On Process")

                      <p id="orderfont" style="text-align: center; color: white; background-color: orange; ">
                          <strong> On Process </strong>
                        </p>

                      @endif
                    </td>
                    <td>{{\Carbon\Carbon::parse($order->created_at)->toFormattedDateString() }}</td>

                    <td>
                       @if($order -> payment_type == 'Cash_on_Delivery') 

                                Cash on Delivery (COD)

                       @elseif($order -> payment_type == 'Cash_on_Pickup') 

                            Cash on Pickup (COP)

                      @endif
                    </td> 

                    <td>
                      @if($order -> payment_status == 'pending')

                        <p id="orderfont" style="text-align: center; color: black; background-color: yellow;">
                          <strong> Pending </strong>
                        </p>

                      @elseif($order -> payment_status == 'Paid')

                        <p id="orderfont" style="text-align: center; color: white; background-color: green;">
                          <strong> Paid </strong>
                        </p>

                      @elseif($order -> payment_status == 'Cancelled')

                        <p id="orderfont" style="text-align: center; color: white; background-color: red;">
                          <strong> Cancelled </strong>
                        </p>

                      @endif
                    </td>
                    <td>  
                       
                                
                       <!-- <button type="button" class="btn btn-outline-success mt-1" data-bs-toggle="modal" data-bs-target="#orderstatus{{$order->id}}" data-bs-whatever="@fat">
                            <i class="fas fa-edit"  title="Edit Order Status">  </i>
                       </button>


                       <a class="btn btn-outline-info mt-1" href="{{route('customer_invoice',['id'=>$order->id])}}">
                           <i class="fas fa-search-plus"  title="View Invoice"></i>
                        </a>
                     

                        <button type="button" class="btn btn-outline-dark mt-1" data-bs-toggle="modal" data-bs-target="#edit{{$order->id}}" data-bs-whatever="@fat">
                            <i class="fas fa-edit"  title="Edit Payment Status">  </i>
                       </button> -->


                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                          </button>
                          <ul class="dropdown-menu">

                            <li><a class="dropdown-item" href="{{route('customer_invoice',['id'=>$order->id])}}" id="orderfont"><i class="fas fa-search-plus"  title="View Invoice"> </i> View Invoice</a></li>

                      
                            <li><a class="dropdown-item" href="#" type="button" data-bs-toggle ="modal" data-bs-target="#orderstatus{{$order->id}}" data-bs-whatever="@fat" id="orderfont"> <i class="fas fa-edit"  title="Edit Order Status">  </i> Edit Order Status</a></li> 

                            <li><a class="dropdown-item" href="#" type="button" data-bs-toggle ="modal" data-bs-target="#edit{{$order->id}}" data-bs-whatever="@fat" id="orderfont"> <i class="fas fa-edit"  title="Edit Payment Status">  </i> Edit Payment Status</a></li>

                          
                          </ul>
                        </div>

                      </td>
                   </tr>

                  <div class="modal fade" id="edit{{$order->id}}" tabindex="-1" aria-labelledby="edit{{$order->id}}" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="edit{{$order->id}}">Update Payment Status</h5>
                              <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                            </div>
                            <div class="modal-body">
                              <form action="{{route('update_payment')}}" method="post" >
                              
                                @csrf
         
                                  <div class="form-group">
                                    <input type="hidden" class="form-control"  name="id" value="{{$order->id}}">
                                  </div>

                                  <label> Select Payment Status  </label>
                                  <select name="payment_status" class="form-control" required>
                                
                                      <option>Pending</option>
                                      <option>Paid</option>
                                      <option>Cancelled</option>
                                  </select>                       
                  
                                  <div class="modal-footer">
                                     <button id="orderfont" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> 
                                    <button type="submit" class="btn btn-primary">Update</button>
                                  </div>
                              </form>
                             </div>
                           </div>
                         </div>
                       </div>

 
                  @endforeach
                
                  
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
        </div>
            

@endsection
