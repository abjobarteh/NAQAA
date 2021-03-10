@extends('layouts.app')

@section('content')
         <!-- Content Header (Page header) -->
         <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0"> Profile Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('systemadmin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Account Settings</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Profile Settings</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('settings.profileupdate') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" placeholder="Enter Username" name="username" value="{{ auth()->user()->username }}" required>
                                              </div>
                                              <div class="mt-1">
                                                  @error('username')
                                                      <span class="text-danger">{{$message}}</span>
                                                  @enderror
                                              </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" placeholder="Enter Email" name="email" value="{{ auth()->user()->email }}" required>
                                              </div>
                                              <div class="mt-1">
                                                @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                      <div class="row">
                                          <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="first_name">First Name</label>
                                                <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ auth()->user()->first_name }}" required>
                                              </div>
                                              <div class="mt-1">
                                                @error('first_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                          </div>
                                          <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="middle_name">Middle Name</label>
                                                <input type="text" class="form-control" placeholder="Middle Name" name="middle_name" value="{{ auth()->user()->middle_name }}">
                                              </div>
                                              <div class="mt-1">
                                                @error('midle_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                          </div>
                                          <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ auth()->user()->last_name }}" required>
                                              </div>
                                              <div class="mt-1">
                                                @error('last_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone_number">Phone Number</label>
                                                <input type="text" class="form-control" placeholder="Phone Number" name="phone_number" value="{{ auth()->user()->phone_number }}" required>
                                              </div>
                                              <div class="mt-1">
                                                @error('phone_number')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" placeholder="Address" name="address" value="{{ auth()->user()->address }}" required>
                                              </div>
                                              <div class="mt-1">
                                                @error('address')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <button type="submit" class="btn btn-success btn-lg">Update <i class="fas fa-arrow-right"></i></button>
                                      </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Change Password</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('settings.passwordchange') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" placeholder="Password" name="password">
                                              </div>
                                              <div class="mt-1">
                                                @error('password')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirm Password</label>
                                                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                                              </div>
                                        </div>
                                    </div>
                                      <div class="form-group">
                                          <button type="submit" class="btn btn-success btn-lg">Change Password <i class="fas fa-arrow-right"></i></button>
                                      </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection