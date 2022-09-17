<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
    #example1{
      font-family: arial ,helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;

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
      background-color: green;
      color:white;
    }
  </style>
</head>
<body>
    <div class="card my-5">
        <div class="card-body">
          <center>
            <h1 style="margin:50px;">Filtered Report</h1>
            <hr>
          <table id="example1">
            <thead>
              <tr>
                <th style="font-family: poppins">#</th>
                <th style="font-family: poppins">FullName</th>
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
</body>
</html>
