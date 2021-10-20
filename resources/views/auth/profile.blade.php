@extends('layouts.admin')
@section('page-title')
    Profile Settings
@endsection
@section('content')
         <!-- Content Header (Page header) -->
         <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0"> Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Account Settings</li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{$user[0]->avatar ?? '/img/avatar.png'}}"
                                        alt="User profile picture">
                                </div>
                                <div class="mt-1">
                                    <h3 class="profile-username text-center">{{ $user[0]->username }}</h3>
                                    <p class="text-muted text-center">{{ $user[0]->roles[0]->name }}</p>
                                </div>
                                <div class="mt-2">
                                    <strong><i class="fas fa-user mr-1"></i> Full Name: </strong>{{ $user[0]->firstname.' '.$user[0]->middlename ?? ''.''.$user[0]->lastname }}
                                </div>
                                <div class="mt-2">
                                    <strong><i class="fas fa-address-card mr-1"></i> Address: </strong>{{ $user[0]->address }}
                                </div>
                                <div class="mt-2">
                                    <strong><i class="fas fa-phone-alt mr-1"></i> Phone Number: </strong>{{ $user[0]->phonenumber }}
                                </div>
                                <div class="mt-2">
                                    <strong><i class="fas fa-user-friends mr-1"></i> Gender: </strong>{{ $user[0]->gender ?? 'N/A' }}
                                </div>
                                <div class="mt-2">
                                    <strong><i class="fas fa-tags mr-1"></i> Designation: </strong>{{ $user[0]->designation[0]->name ?? 'N/A' }}
                                </div>
                                <div class="mt-2">
                                    <strong><i class="fas fa-building mr-1"></i> Directorate: </strong>{{ $user[0]->directorate[0]->name ?? 'N/A' }}
                                </div>
                                <div class="mt-2">
                                    <strong><i class="fas fa-building mr-1"></i> Unit: </strong>{{ $user[0]->unit[0]->name ?? 'N/A' }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                              <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab"><i class="fas fa-user"></i> Account</a></li>
                                <li class="nav-item"><a class="nav-link" href="#change-password" data-toggle="tab"><i class="fas fa-lock"></i> Password</a></li>
                              </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                              <div class="tab-content">
              
                                <div class="tab-pane active" id="settings">
                                  <form class="form-horizontal" action="{{ route('settings.updateprofile') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                            <div class="form-group row">
                                                <label for="email" class="col-form-label col-sm-2">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" placeholder="Enter Email" name="email" value="{{ auth()->user()->email }}" required>
                                                </div>
                                                <div class="mt-1 offset-sm-2 col-sm-10">
                                                    @error('email')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="firstname" class="col-form-label col-sm-2">First Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="First Name" name="firstname" value="{{ auth()->user()->firstname }}" required>
                                                </div>
                                                <div class="mt-1 offset-sm-2 col-sm-10">
                                                    @error('firstname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                              </div>
                                            <div class="form-group row">
                                                <label for="middlename" class="col-form-label col-sm-2">Middle Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Middle Name" name="middlename" value="{{ auth()->user()->middlename }}">
                                                </div>
                                                <div class="mt-1 offset-sm-2 col-sm-10">
                                                    @error('middlename')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lastname" class="col-form-label col-sm-2">Last Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="{{ auth()->user()->lastname }}" required>
                                                </div>
                                                <div class="mt-1 offset-sm-2 col-sm-10">
                                                    @error('lastname')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phonenumber" class="col-form-label col-sm-2">Phone Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Phone Number" name="phonenumber" value="{{ auth()->user()->phonenumber }}" required>
                                                </div>
                                                <div class="mt-1 offset-sm-2 col-sm-10">
                                                    @error('phonenumber')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address" class="col-form-label col-sm-2">Address</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="Address" name="address" value="{{ auth()->user()->address }}" required>
                                                </div>
                                                <div class="mt-1 offset-sm-2 col-sm-10">
                                                    @error('address')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-warning">Update Profile</button>
                                                </div>
                                            </div>
                                  </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="change-password">
                                    <form action="{{ route('settings.changepassword') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-2 col-form-label">Current Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" placeholder="Password" name="current_password">
                                            </div>
                                            <div class="mt-1">
                                                @error('current_password')
                                                    <span class="offset-sm-2 col-sm-10 text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" placeholder="Password" name="password">
                                            </div>
                                            <div class="mt-1">
                                                @error('password')
                                                    <span class="offset-sm-2 col-sm-10 text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-success btn-lg">Change Password <i class="fas fa-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </form>
                              </div>
                              <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
@endsection
