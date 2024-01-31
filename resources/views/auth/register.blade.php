<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
      @if(session('success'))
      <div class="alert alert-success alert-block" role="alert">
         {{ session('success') }}
      </div>
      @endif
      
      <form action="{{route('register')}}" method="POST">
        @csrf 
        <div class="input-group mb-3">
          <input type="text" name="first_name" class="form-control @error('first_name')is-invalid @enderror" placeholder="First name">
            @error('first_name')
              <span class="invalid-feedback">{{$message}}</span> 
            @enderror
        </div>
        <div class="input-group mb-3">
          <input type="text" name="last_name" class="form-control @error('last_name')is-invalid @enderror" placeholder="Last name">
            @error('last_name')
              <span class="invalid-feedback">{{$message}}</span> 
            @enderror
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" placeholder="Email">
            @error('email')
              <span class="invalid-feedback">{{$message}}</span> 
            @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" placeholder="Password">
          @error('password')
              <span class="invalid-feedback ">{{$message}}</span> 
            @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
        </div>
      </form>
      

      

      <a href="{{route('login')}}" class="text-center">I already have a membership? Login!</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>


