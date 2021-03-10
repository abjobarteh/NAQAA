@extends('layouts.auth')

@section('content')
<div class="login-box">
    <div class="card card-outline card-info">
        <div class="card-header text-center">
            <h1>NAQAA</h1>
        </div>
      <div class="card-body">
        <p class="login-box-msg">{{ ucfirst(auth()->user()->first_name).' '.ucfirst(auth()->user()->last_name)  }}
             for security reasons Please change your default sysadmin Password.
        </p>
  
        <form action="/update-default-password" method="POST">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
            <div class="row">
                <div class="col-12">
                <button type="submit" class="btn btn-info btn-block">Change Password</button>
                </div>
                <!-- /.col -->
             </div>
        </form>
        <p class="mt-3 mb-1">
            <a href="{{ route('skip-default-password') }}" onclick="event.preventDefault(); document.getElementById('skipDefaultpassworUpdate-form').submit();">Skip</a>
            <form id="skipDefaultpassworUpdate-form" action="{{ route('skip-default-password') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
@endsection

