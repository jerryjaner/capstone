@extends('Admin.master')
@section('title')

	  Change Password

@endsection
@section('content')

 <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-8">
	            <!-- About Me Box -->
	            <div class="card card-primary">
	              <div class="card-body box-profile">
	              	<div class="mb-5">
	                  <h4>Change Password</h4>
	                </div>
	                <form class="row g-3">
					  <div class="col-md-12">
					    <label for="" class="form-label">Old Password</label>
					    <input type="password" name="oldpassword" class="form-control">
					  </div>
					  <div class="col-md-12">
					    <label for="" class="form-label">Password</label>
					    <input type="password" name="password" class="form-control" required>
					  </div>
					  <div class="col-md-12">
					    <label for="" class="form-label">Confirm Password</label>
					    <input type="password" name="cpassword" class="form-control" required>
					  </div>
					  <div class="col-12">
					    <button type="submit" class="btn btn-primary">Save</button>
					  </div>
					</form>  
	              <!-- /.card-body -->
	            </div>
	            <!-- /.card -->
	          </div>
	          <!-- /.col -->
          </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
 </section>

 <script type="text/javascript">
 	
 // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
 </script>
@endsection	