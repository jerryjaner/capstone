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
#report{
  font-family: poppins;
}
</style>

    <div class="card my-5">
      <div class="card-header">
        <h3 class="card-title" id="report"><b>Report of Customer</b></h3>
            <a href="{{route('download_client')}}"  class="btn btn-info btn-sm" style="float: right;" id="report">
              <b>Print Report</b>
            </a>
      </div>        
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">              
                  <thead>
                    <tr>
                      <th id="report">#</th>
                      <th id="report">Full Name</th>
                      <th id="report">Address</th>
                      <th id="report">Email</th>
                      <th id="report">Date</th>
                      <th id="report">Logged in Using</th>
                      <th id="report">Role</th>
                     </tr>
                  </thead>
                <tbody>
                   
                  @php($i = 1)
                  @foreach($users  as $user)

                    @if($user -> role == 0)
                    <tr>
                      <td id="report">{{$i++}}</td>
                      <td id="report">{{$user->name}} {{$user->middlename}} {{$user->lastname}}</td>
                      <td id="report">
                        @if($user->address == null)

                            N/A

                        @else
                          {{$user->name}}

                        @endif
                      </td>
                      <td id="report">{{$user -> email}}</td>
                      <td id="report">{{\Carbon\Carbon::parse($user->created_at)->toFormattedDateString() }}</td>
                      <td id="report">
                        @if($user -> google_id)
                           Google Account
                        @else
                           Nick's Resto Bar System 
                        @endif
                      </td>
                      <td id="report"> Customer </td>
                   </tr>
                  @endif
                @endforeach
    
                </tbody>   
            </table>
          </div>  
    </div>
            

@endsection
