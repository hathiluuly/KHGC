@extends('trangchu')
@section('content')
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
@endsection