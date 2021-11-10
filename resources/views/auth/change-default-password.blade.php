@extends('layouts.auth')

@section('content')
<div class="login_form_wrapper">
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <!-- login_wrapper -->
              <div class="login_wrapper">
                  <div class="row">
                      <div class="col-lg-12 col-md-6 col-xs-12 col-sm-6 mb-2">
                          <b class="text-primary">For Security reasons you have to change your password</b>
                      </div>
                  </div>
                  <form action="/update-default-password" method="post">
                      @csrf
                      @method('PUT')
                      <div class="formsix-pos">
                          <div class="form-group i-email">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter New Password" required> 
                          </div>
                          @error('password')
                            <div class="invalid-feedback m-1">
                              <span class="text-danger">{{ $message }}</span>
                            </div>
                          @enderror
                      </div>
                      <div class="formsix-e">
                          <div class="form-group i-password">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required> 
                          </div>
                      </div>

                      <div class="login_btn_wrapper"> 
                        <button type="submit" class="btn btn-primary btn-block login_btn"> Confirm </button>
                      </div>
                  </form>
              </div> <!-- /.login_wrapper-->
          </div>
      </div>
  </div>
</div>
@endsection

@section('styles')
  <link rel="stylesheet" href="/css/auth.css">
@endsection

