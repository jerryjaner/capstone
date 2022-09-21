<!-- @extends('layouts.app') -->

@section('content')


<!-- <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nicks Resto| Log in</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="{{asset('/BackEndSourceFile')}}//plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 
  <link rel="stylesheet" href="{{asset('/BackEndSourceFile')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  
  <link rel="stylesheet" href="{{asset('/BackEndSourceFile')}}/dist/css/adminlte.min.css">
  
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  

</head>
<body class="hold-transition login-page">  

  <div class="card">
    <div class="card-body login-card-body">
     <center>
        <img src="{{asset('/BackEndSourceFile')}}/Nicks_logo/nickslogo.jpg"  style="width: 100px; border-radius: 50%; margin-bottom: 20px;" alt="User Image"> 
     </center>
     
      <p class="login-box-msg">Sign in to start your session</p>

    @if(Session('sms'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>{{ Session('sms')}}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     
      </button>
    </div>
    @endif

      <form method="POST" action="{{ route('login') }}">
         @csrf
        <div class="input-group mb-3">

           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your Email Address">
      
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your Password">
            
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
             @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="row">
          
          <div class="mb-3 ">

            <button type="submit" class="btn btn-primary btn-block " style="margin-top: 2px;">Login</button>

            <a href="{{ route('register') }}" type="button"  class="btn btn-success btn-block" style=" margin-bottom: 8px; text-decoration: none;">Register</a>

             <p style="text-align: center;"> OR </p>

          
            <a href="{{route('google_login')}}" class="btn btn-block btn-danger">
              <i class="fab fa-google mr-2"></i> Sign in using Google
            </a>

          </div>
     
        </div>
      </form>

    </div>
   
  </div>
</div>


<script src="{{asset('/BackEndSourceFile')}}/../../plugins/jquery/jquery.min.js"></script>

<script src="{{asset('/BackEndSourceFile')}}/../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="{{asset('/BackEndSourceFile')}}/../../dist/js/adminlte.min.js"></script>

</body>
</html> -->


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nick's Resto| Login Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/BackEndSourceFile')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('/BackEndSourceFile')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/BackEndSourceFile')}}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">

    <a href="#"><b>Nick's </b>Resto Bar</a>
  {{--   <img src="{{asset('/BackEndSourceFile')}}/Nicks_logo/nickslogo.jpg" class="img-circle elevation-2" style="width: 250px; border-radius: 50%;" alt="Nicks Logo"> --}} 
  </div>

  <div class="card">
    <div class="card-body register-card-body">
       <p class="login-box-msg"></p> 

    @if(Session('sms'))
       <!--  <div class="alert alert-default alert-dismissible fade show" role="alert"> -->
        <ul>
          <li style="color: red;">{{ Session('sms')}}</li>
        </ul>
          <p></p>
       <!--  </div> -->
    @endif

      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your Email Address">
      
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
       
        </div>

        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your Password">
            
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
             @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="md-3">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p> OR </p>
        <a href="{{route('google_login')}}" class="btn btn-block btn-danger">
          <i class="fab fa-google mr-2"></i>
          Sign up using Google
        </a>
      </div>

      <a href="{{route('register')}}" class="text-center" style="float: right;">Create Account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('/BackEndSourceFile')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/BackEndSourceFile')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/BackEndSourceFile')}}/dist/js/adminlte.min.js"></script>
</body>
</html>



@endsection
