@extends('Admin.master')
@section('title')

	 Message Customer

@endsection
@section('content')

<style>
  div.dataTables_wrapper div.dataTables_length select {
  width: 60px;
 
}

</style>



      <!-- for display mesage -->

            @if(Session::get('added_msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong> {{session::get('added_msg')}}</strong>
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

            @elseif(Session::get('update_msg'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong> {{session::get('update_msg')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hiddden="true">&times;</span>
                  </button>
                </div>

            @elseif(Session::get('status_msg'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong> {{session::get('status_msg')}}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hiddden="true">&times;</span>
                  </button>
                </div>

            @endif  

            <div class="card my-2">
              <div class="card-header">

                <h3 class="card-title" id="messagefont"><b>Message Customer</b></h3>
                <button type="button" class="btn btn-info btn-sm" style="float: right;" data-bs-toggle="modal" data-bs-target="#add" data-bs-whatever="@fat" id="messagefont"> Send Message</button>

              </div>
          
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <!-- add categories modal -->
                   <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="add" style="margin-left:150px; font-family: poppins;">Send Message</h5>
                           <!--  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                          </div>
                          <div class="modal-body">
                          <form action="{{route('send_smg')}}" method="post">
                             @csrf
                          <div class="form-group">
                              <label id="messagefont">Sender:</label>
                              <input type="text" name="sender" placeholder="Sender" style="border-right: none; border-left: none; border-top:none; margin-left: 25px; width: 350px; outline: none;" value="ADMIN" id="messagefont">
                            </div>

                           <div class="form-group">
                              <label id="messagefont">To:</label>
                              <input type="text" name="user_id" placeholder="To" style="border-right: none; border-left: none; border-top:none; margin-left: 57px; width: 350px; outline: none;" id="messagefont">
                            </div>

                            <div class="form-group">
                              <label id="messagefont">Message:</label>
                              <input type="text" name="message" placeholder="Message" style="border-right: none; border-left: none; border-top:none;margin-left: 10px; width: 350px; outline: none;">
                            </div>
                            


                            <div class="modal-footer">
                              <button id="orderfont" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> 
                              <button id="orderfont" type="submit" name="btn" class="btn btn-primary">Send</button>
                            </div>

                          </form>
                       </div>
                     </div>
                   </div>
                 </div>
                 
                  <!-- end of caategories modal -->
                  <thead>
                    <tr>
                      <th>From:</th>
                      <th>To:</th>
                      <th>Message</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>  
                  </tbody>
                </table>
              </div>
            </div>



                               
@endsection
