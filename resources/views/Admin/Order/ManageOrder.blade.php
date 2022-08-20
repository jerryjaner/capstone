@extends('Admin.master')
@section('title')

   Manage Orders

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
                <h3 class="card-title">Manage Orders</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">        
                  <thead>
                    <tr>
                     <th>SL</th>
                      <th>Customer Name</th>
                      <th>Order Price Total</th>
                      <th>Order Status</th>
                      <th>Order Date</th>
                      <th>Payment Type</th>
                      <th>Payment Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

             
                   @php($i = 1)
                   @foreach($orders  as $order)
                    
              
                  <tr>

                    <td>{{$i++}}</td>
                    <td>{{$order->name}} {{$order->middlename}} {{$order -> lastname}}</td>
                    <td>{{$order->order_total}}</td>
                    <td> {{$order->order_status}} 

                      <!-- 
                       <button type="button" class="btn btn-outline-dark mt-1" data-bs-toggle="modal" data-bs-target="#orderstatus{{$order->id}}" data-bs-whatever="@fat">
                            <i class="fas fa-edit"  title="click to Change it">  </i>
                       </button> -->

                       

                      <div class="modal fade" id="orderstatus{{$order->id}}" tabindex="-1" aria-labelledby="orderstatus{{$order->id}}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="orderstatus{{$order->id}}">Update Order Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('update_order_status')}}" method="post" >
                            
                                 @csrf

                           

                              <div class="form-group">
                                  <input type="hidden" class="form-control"  name="id" value="{{$order->id}}">
                               <label> Select Order Status  </label>
                                <select name="order_status" class="form-select"  required>
      
                                    <option>On Process</option>
                                    <option>Out of Delivery</option>
                                    <option>Delivered</option>
                                    <option>Cancelled</option>

                                </select>                        
                              </div>

                               
                                 <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                          </div>


                    </td>
                    <td>{{\Carbon\Carbon::parse($order->created_at)->toFormattedDateString() }}</td>
                   

                    <td>

                         @if($order -> payment_type == 'Cash_on_Delivery') 

                              Cash on Delivery (COD)

                         @elseif($order -> payment_type == 'Cash_on_Pickup') 

                              Cash on Pickup (COP)

                        @endif



                    </td>
                    <td>{{$order->payment_status}}</td>

                    <td>
                        
                       
                      <!--

                      <button type="button" class="btn btn-outline-success mt-1" data-bs-toggle="modal" data-bs-target="#orderstatus{{$order->id}}" data-bs-whatever="@fat">
                            <i class="fas fa-edit"  title="Edit Order Status">  </i>
                       </button>

                        <a class="btn btn-outline-info mt-1" href="{{route('view_invoice',['id'=>$order->id])}}">
                           <i class="fas fa-search-plus"  title="View Invoice"></i>
                        </a>

                       <a class="btn btn-outline-danger mt-1"  href="{{route('delete_order',['id'=>$order->id])}}">
                            <i class="fas fa-trash"  title="click to destroy"></i>
                        </a> 

                        <button type="button" class="btn btn-outline-dark mt-1" data-bs-toggle="modal" data-bs-target="#edit{{$order->id}}" data-bs-whatever="@fat">
                            <i class="fas fa-edit"  title="Edit Payment Status">  </i>
                       </button>

                     -->

                      <!--  action -->

                       <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                          More
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{route('view_invoice',['id'=>$order->id])}}"><i class="fas fa-search-plus"  title="View Invoice"> </i> View Invoice</a></li>
                          <li><a class="dropdown-item" href="#" type="button" data-bs-toggle ="modal" data-bs-target="#orderstatus{{$order->id}}" data-bs-whatever="@fat"> <i class="fas fa-edit"  title="Edit Order Status">  </i> Edit Order Status</a></li>      
                          <li><a class="dropdown-item" href="#" type="button" data-bs-toggle ="modal" data-bs-target="#edit{{$order->id}}" data-bs-whatever="@fat"> <i class="fas fa-edit"  title="Edit Payment Status">  </i> Edit Payment Status</a></li>
                          <li><a class="dropdown-item" href="{{route('delete_order',['id'=>$order->id])}}"> <i class="fas fa-trash"  title="click to delete"> </i> Delete Order</a></li>
                        </ul>
                      </div>

                    </td>
                   </tr>


                    <div class="modal fade" id="edit{{$order->id}}" tabindex="-1" aria-labelledby="edit{{$order->id}}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="edit{{$order->id}}">Update Payment Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('order_update')}}" method="post" >
                            
                                 @csrf
       
                                <div class="form-group">
                                    <input type="hidden" class="form-control"  name="id" value="{{$order->id}}">                    
                                 </div>

                               <label> Select Payment Status  </label>
                                <select name="payment_status" class="form-select" required >
                                   
                                    <option>Pending</option>
                                    <option>Paid</option>
                                    <option>Cancelled</option>


                                </select>                       
                
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>


                    

                    @endforeach

                 

                 
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->



            </div>
            



                               
@endsection
