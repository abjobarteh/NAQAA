@extends('layouts.auth')
@section('page-title','Login')

@section('content')
  <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row"> <img src="/img/logo.jpg" class="logo"> </div>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="/img/login-landing.png" class="image"> </div>
                </div>
            </div>
            <div class="col-lg-6">
              <form action="/login" method="post">
                @csrf
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row px-3"> <label class="mb-1">
                        <h6 class="mb-0 text-sm">Username</h6>
                        </label> <input class="mb-4" type="text" name="username" value="{{old('username')}}" placeholder="Enter your username" required autofocus>
                        <div>
                          @error('username')  
                              <span class="text-danger m-1">{{$message}}</span>
                          @enderror
                      </div> 
                    </div>
                    <div class="row px-3"> <label class="mb-1">
                          <h6 class="mb-0 text-sm">Password</h6>
                        </label> <input type="password" name="password" placeholder="Enter password" required  autocomplete="current-password> 
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="custom-control custom-checkbox custom-control-inline"> 
                          <input id="remember" type="checkbox" name="remember" class="custom-control-input"> 
                          <label for="remember" class="custom-control-label text-sm">Remember me</label> 
                        </div> 
                    </div>
                    <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Login</button> </div>
                </div>
              </form>
            </div>
        </div>
        <div class="bg-blue py-4">
            <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; {{date("Y")}}. All rights reserved.</small>
                <div class="social-contact ml-4 ml-sm-auto"> <span class="fas fa-facebook mr-4 text-sm"></span> <span class="fas fa-google-plus mr-4 text-sm"></span> <span class="fas fa-linkedin mr-4 text-sm"></span> <span class="fas fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('styles')
  <link rel="stylesheet" href="/css/auth.css">
@endsection

