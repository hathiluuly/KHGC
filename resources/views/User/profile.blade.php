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
    <a href="../../index2.html"><b>Your Profile</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      @if(session('success'))
      <div class="alert alert-success alert-block" role="alert">
         {{ session('success') }}
      </div>
      @endif
      
      <form action="{{route('update-profile')}}" method="POST">
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
          <input type="text" name="address" class="form-control @error('address')is-invalid @enderror" placeholder="Address">
            @error('address')
              <span class="invalid-feedback">{{$message}}</span> 
            @enderror
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
          </div>
        </div>
      </form>
      

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


