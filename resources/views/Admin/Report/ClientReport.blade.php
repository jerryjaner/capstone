@extends('Admin.master')
@section('title')

Report of Customer
@endsection
@section('content')


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<style>
  div.dataTables_wrapper div.dataTables_length select {
  width: 60px;
 
}
</style>

    <div class="card my-5">
      <div class="card-header">
        <h3 class="card-title">Report of Customer</h3>
            <a href="{{route('download_client')}}"  class="btn btn-info btn-sm" style="float: right;">Print Report</a>
      </div>        
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">              
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Full Name</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Logged in Using</th>
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
                      <td>
                        @if($user->address == null)

                            N/A

                        @else
                          {{$user->name}}

                        @endif
                      </td>
                      <td>{{$user -> email}}</td>
                      <td>
                        @if($user -> google_id)
                           Google Account
                        @else
                           Nick's Resto Bar System 
                        @endif
                      </td>
                      <td> Customer </td>
                   </tr>
                  @endif
                @endforeach
    
                </tbody>   
            </table>
          </div>  
    </div>
            

@endsection
