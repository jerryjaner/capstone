@extends('Admin.master')
@section('title')

   Manage Orders

@endsection
@section('content')

<style>
  div.dataTables_wrapper div.dataTables_length select {
  width: 60px;
}
#orderfont{
  font-family: poppins;
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

             @elseif(Session::get('delete_msg'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong> {{session::get('delete_msg')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hiddden="true">&times;</span>
                  </button>
                </div>

            @elseif(Session::get('order_status_msg'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong> {{session::get('order_status_msg')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hiddden="true">&times;</span>
                  </button>
                </div>

            @elseif(Session::get('payment_status_msg'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong> {{session::get('payment_status_msg')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hiddden="true">&times;</span>
                  </button>
                </div>


            @endif

          <div class="card my-5">
              <div class="card-header">
                <h3 class="card-title" id="orderfont"><b>Manage Orders</b></h3>
               <!--  
                 <button type="button" class="btn btn-info btn-sm" style="float: right;" data-bs-toggle="modal" data-bs-target="#add" data-bs-whatever="@fat" id="orderfont"> Send Message</button> -->
              </div>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">  

                   <!-- add categories modal -->
                   <!-- <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="add" style="margin-left:150px; font-family: poppins;">Send Message</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="" method="post">

                          <div class="form-group">
                              <label id="orderfont">Sender:</label>
                              <input type="text" name="" placeholder="Sender" style="border-right: none; border-left: none; border-top:none; margin-left: 25px; width: 350px; outline: none;" value="ADMIN" id="orderfont">
                            </div>

                           <div class="form-group">
                              <label id="orderfont">To:</label>
                              <input type="text" name="" placeholder="To" style="border-right: none; border-left: none; border-top:none; margin-left: 57px; width: 350px; outline: none;" id="orderfont">
                            </div>

                            <div class="form-group">
                              <label id="orderfont">Message:</label>
                              <input type="text" name="" placeholder="Message" style="border-right: none; border-left: none; border-top:none;margin-left: 10px; width: 350px; outline: none;">
                            </div>
                            


                            <div class="modal-footer">
                              <button id="orderfont" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> 
                              <button id="orderfont" type="submit" name="btn" class="btn btn-primary">Send</button>
                            </div>

                          </form>
                       </div> -->
                    <!-- end of caategories modal -->


                  <thead>
                    <tr>
                      <th id="orderfont">SL</th>
                      <th id="orderfont">Customer Name</th>
                      <th id="orderfont">Order Price Total</th>
                      <th id="orderfont">Order Status</th>
                      <th id="orderfont">Order Date</th>
                      <th id="orderfont">Payment Type</th>
                      <th id="orderfont">Payment Status</th>
                      <th id="orderfont">Action</th>
                    </tr>
                  </thead>
                  <tbody>

             
                   @php($i = 1)
                   @foreach($orders  as $order)
                    
              
                  <tr>

                    <td id="orderfont">{{$i++}}</td>
                    <td id="orderfont">{{$order->name}} {{$order->middlename}} {{$order -> lastname}}</td>
                    <td id="orderfont">{{$order->order_total}}</td>
                    <td id="orderfont"> {{$order->order_status}}

                      <!-- 
                       <button type="button" class="btn btn-outline-dark mt-1" data-bs-toggle="modal" data-bs-target="#orderstatus{{$order->id}}" data-bs-whatever="@fat">
                            <i class="fas fa-edit"  title="click to Change it">  </i>
                       </button> -->

                       

                    <div class="modal fade" id="orderstatus{{$order->id}}" tabindex="-1" aria-labelledby="orderstatus{{$order->id}}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="orderstatus{{$order->id}}" style="font-family: poppins;">Update Order Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('update_order_status')}}" method="post">
                                 @csrf
                              <div class="form-group">
                                <input type="hidden" class="form-control"  name="id" value="{{$order->id}}">
                               <label id="orderfont"> Select Order Status  </label>
                                <select name="order_status" class="form-select"  required title="">
                    
                                    <option id="orderfont">On Process</option>
                                    <option id="orderfont">On Delivery</option>
                                    <option id="orderfont">Delivered</option>
                                    <option id="orderfont">Cancelled</option>

                                </select>                        
                              </div>

                               
                                 <div class="modal-footer">
                                  <button id="orderfont" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> 
                                  <button id="orderfont" type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                          </div>


                    </td>
                    <td>{{\Carbon\Carbon::parse($order->created_at)->toFormattedDateString() }}</td>
                   

                    <td id="orderfont">

                         @if($order -> payment_type == 'Cash_on_Delivery') 

                              Cash on Delivery (COD)

                         @elseif($order -> payment_type == 'Cash_on_Pickup') 

                              Cash on Pickup (COP)

                        @endif

                    </td>
                    <td id="orderfont">{{$order->payment_status}}</td>

                    <td>
                      

                      <!--  action -->

                       <div class="btn-group">
                        <button id="orderfont" type="button" class="btn btn-default btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                          More
                        </button>
                        <ul class="dropdown-menu">

                          <li><a class="dropdown-item" href="{{route('view_invoice',['id'=>$order->id])}}" id="orderfont"><i class="fas fa-search-plus"  title="View Invoice"> </i> View Invoice</a></li>

                          <li><a class="dropdown-item" href="#" type="button" data-bs-toggle ="modal" data-bs-target="#orderstatus{{$order->id}}" data-bs-whatever="@fat" id="orderfont"> <i class="fas fa-edit"  title="Edit Order Status">  </i> Edit Order Status</a></li> 

                          <li><a class="dropdown-item" href="#" type="button" data-bs-toggle ="modal" data-bs-target="#edit{{$order->id}}" data-bs-whatever="@fat" id="orderfont"> <i class="fas fa-edit"  title="Edit Payment Status">  </i> Edit Payment Status</a></li>

                          <li><a class="dropdown-item" href="{{route('delete_order',['id'=>$order->id])}}" id="orderfont"> <i class="fas fa-trash"  title="click to delete" > </i> Delete Order</a></li>
                        </ul>
                      </div>

                    </td>
                   </tr>


                    <div class="modal fade" id="edit{{$order->id}}" tabindex="-1" aria-labelledby="edit{{$order->id}}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="edit{{$order->id}}" style="font-family: poppins;">Update Payment Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="{{route('order_update')}}" method="post" >
                            
                                 @csrf
       
                                <div class="form-group">
                                    <input type="hidden" class="form-control"  name="id" value="{{$order->id}}">                    
                                 </div>

                               <label id="orderfont"> Select Payment Status  </label>
                                <select name="payment_status" class="form-select" required >
                                   

                                    <option id="orderfont">Pending</option>
                                    <option id="orderfont">Paid</option>
                                    <option id="orderfont">Cancelled</option>


                                </select>                       
                
                                <div class="modal-footer">
                                  <button id="orderfont" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> 
                                  <button id="orderfont" type="submit" class="btn btn-primary">Update</button>
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
