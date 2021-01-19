@extends('layouts.auth')

@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="/"><b>NAQAA</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Create Account</p>
  
        <form action="{{ route('register') }}" method="POST">
            @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username" value="{{old('username')}}" required autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            <div>
                @error('username')  
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <div>
                @error('email')  
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required autocomplete="new-password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{old('first_name')}}" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-circle"></span>
              </div>
            </div>
            <div>
                @error('first_name')  
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Middle Name" name="middle_name" value="{{old('middle_name')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-circle"></span>
              </div>
            </div>
            <div>
                @error('middle_name')  
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{old('last_name')}}" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-circle"></span>
              </div>
            </div>
            <div>
                @error('last_name')  
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Phone Number" name="phone_number" value="{{old('phone_number')}}" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
            <div>
                @error('phone_number')  
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Address" name="address" value="{{old('address')}}" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-map-marker-alt"></span>
              </div>
            </div>
            <div>
                @error('address')  
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
@endsection

