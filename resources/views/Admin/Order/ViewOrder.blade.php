@extends('Admin.master')
@section('title')

   Order Details

@endsection
@section('content')



<style>
  div.dataTables_wrapper div.dataTables_length select {
  width: 60px;
 
}
</style>

<!-- for display mesage -->

            @if(Session::get('sms'))

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong> {{session::get('sms')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hiddden="true">&times;</span>
                  </button>
                </div>

                <!-- End of Message -->

            @endif

       <!-- <div class="offset-2 col-md-8">
          <div class="card my-5">
              <div class="card-header">
                 <h2 class="text-center text-muted">Customer Info For This Order</h2>
              </div>
               
              <table id="example1" class="table table-bordered table-striped">
                <tr>
                  <th>Name</th>
                  <td>lol</td>
                </tr>

                 <tr>
                  <th>Email</th>
                  <td>lol</td>
                </tr>

                 <tr>
                  <th>Phone Number</th>
                  <td>lol</td>
                </tr>

              </table>
            </div>
         </div>
        </div> 
       <div class="offset-2 col-md-8">
          <div class="card my-5">
              <div class="card-header">
                 <h2 class="text-center text-muted">Customer Info For This Order</h2>
              </div>
               
              <table id="example1" class="table table-bordered table-striped">
                <tr>
                  <th>Name</th>
                  <td>{{$customer -> name}}</td>
                </tr>

                 <tr>
                  <th>Email</th>
                  <td>{{$customer -> email}}</td>
                </tr>

                 <tr>
                  <th>Phone Number</th>
                  <td>12345678901</td>
                </tr>

              </table>
            </div>
         </div>
      </div> -->


       <div class="offset-2 col-md-8">
          <div class="card my-5">
              <div class="card-header">
                 <h2 class="text-center text-muted">Shipping and Payment Information</h2>
              </div>
               
              <table id="example1" class="table table-bordered table-striped">
                <tr>
                  <th>Name</th>
                  <td>{{$shipping -> name}}</td>

                </tr>

                 <tr>
                  <th>Address</th>
                  <td>{{$shipping -> address}}</td>
                </tr>

                 <tr>
                  <th>Phone Number</th>
                  <td>{{$shipping -> phone_no}}</td>
                </tr>

                <tr>
                  <th>Payment Type</th>
                  <td>{{$payment -> payment_type}}</td>
                </tr>

                 <tr>
                  <th>Payment Status</th>
                  <td>{{$payment -> payment_status}}</td>
                </tr>

                 <tr>
                  <th>Order Total</th>
                  <td>{{$order -> order_total}}</td>
                </tr>

                 <tr>
                  <th>Order Status</th>
                  <td>{{$order -> order_status}}</td>
                </tr>

              </table>
            </div>
         </div>
      </div>


        
      
       <div class="offset-2 col-md-8">
          <div class="card my-5">
              <div class="card-header">
                 <h2 class="text-center text-muted">Customer Order</h2>
              </div>
               
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Order Id</th>
                      <th>Order Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                        @php($i = 1)
                       @foreach($OrderD  as $Order)
                      
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$Order -> order_id}} </td>
                        <td>{{$Order -> dish_name}}</td> 
                        <td>{{$Order -> dish_price}}</td> 
                        <td>{{$Order -> dish_qty}}</td> 
                        <td>{{$Order-> dish_price * $Order -> dish_qty}}</td> 
                    </tr>
                    @endforeach
                 </tbody>
               </table>
            </div>
         </div>
      </div>

@endsection
