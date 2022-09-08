@extends('User.master')
@section('title')

   View Order

@endsection
@section('content')
<style>
    #example1{
      font-family: arial ,helvetica, sans-serif;
      border-collapse: collapse;
      width: 50%;


    }
    #example1 td, #example1 th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    #example1 tr:nth-child(even){
      background-color: #ddd;
    }

    #example1 th{
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #dc413a;
      color:white;
    } 
</style> 
<h3 style="text-align: center; margin-top: 30px; margin-bottom: 20px;" >View Order</h3> 

<center>
<table id="example1" class="table table-bordered table-striped">        
  <thead>
    <tr>
      <th style="text-align: center;">Cancel Order</th>
      <th style="text-align:  center;">Order Id</th>
      <th style="text-align: center;">Customer Name</th>
      <th style="text-align: center;">Order Price Total</th>
      <th style="text-align: center;">Order Status</th>
      <th style="text-align: center;">Order Date</th>
      <th style="text-align: center;">Action</th>
    </tr>
  </thead>
  <tbody>

    @php($i = 1)
    
    @foreach ($orders  as $order)
    @if(Auth::user()->id == $order -> user_id)
       
          <tr>
             @if($order -> order_status == 'Cancelled')
            
             

             @else

             
              @if($order->order_status == 'pending')
              <td style="text-align: center; color:  black;">
                 <button class="btn btn-danger btn-sm" style="outline:none;" data-toggle="modal" data-target="#CancelOrder{{$order->id}}">Cancel Order</button>

                 <!-- modal for cancellation of order -->
                  <div class="modal video-modal fade" id="CancelOrder{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="CancelOrder">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                          <!--   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> -->            
                          </div>
                          <section>
                            <div class="modal-body">
                              <form action="{{route('cancel_customer_order')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$order->id}}">

                                <h2 style="text-align: center; font-family: Arial sans-serif;  color: black; ">
                                   <b> Are you sure ?</b>
                                </h2>
                                <br>

                                <h4 style="text-align: center; font-family: Arial sans-serif; color: black;">  You want to <b> Cancel </b> your order </h4> 
                                <br>
                                <br>

                              <center>   
                                <div>
                                  <button type="button" class="btn btn-danger"  data-dismiss="modal" style="margin-right: 25px; width: 100px; outline: none;">No</button> 
                            
                                  <button type="submit" name="btn" class="btn btn-primary" style="margin-left: 25px; width: 100px; outline: none;">Yes</button>
                                </div>  
                              </center>  

                            </form>
                            </div>
                          </section>
                        </div>
                    </div>
                  </div>

              </td>
                




              @else
              <td style="text-align: center; color:  black;">
                 <button class="btn btn-success btn-sm" disabled style="outline:none;">Cancel Order</button>
              </td>


              @endif

               <td style="text-align: center; color:  black;"># {{$order -> id}}</td>
               <td style="text-align: center; color:  black;">{{$order->name}} {{$order->middlename}} {{$order -> lastname}}</td>
               <td style="text-align: center; color:  black;">{{$order->order_total}}</td>
               <td style="text-align: center; color:  black;">{{$order->order_status}} </td>
               <td style="text-align: center; color:  black;">{{\Carbon\Carbon::parse($order->created_at)->toFormattedDateString()}}</td>
              
               <td style="text-align: center;"> 
                  <a href="{{route('view_order',['id'=>$order->id])}}" style="color: black;"> 
                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> View Details
                  </a>
               </td>
              @endif
          </tr>
         

     @endif
     @endforeach
       
  </tbody>
</table>
</center>


@endsection