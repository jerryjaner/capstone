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

              <!-- /.card-header -->
              <div class="card-body">
                <center>
                  <h1 style="margin:50px;">Customer Report</h1>
                  <hr>
                <table id="example1">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>FullName</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Role</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                    
                  
                    @php($i = 1)
                    @foreach($users  as $user)
                    @if($user -> role == 0)

                  <tr>

                    <td>{{$i++}}</td>                
                    <td>{{$user->name}} {{$user->middlename}} {{$user->lastname}}</td>
                    <td>{{$user -> address}}</td>
                    <td>{{$user -> email}}</td>
                    <td> Customer </td>
                    
                 </tr>
            
                   @endif
                  @endforeach

                  
                  </tbody>
                 
                </table>
                
              </div>
              <!-- /.card-body -->
            </div>
            

</body>
</html>
