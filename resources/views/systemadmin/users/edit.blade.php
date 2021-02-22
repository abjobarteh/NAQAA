@extends('layouts.systemadmin')

@section('content')
       <!-- Content Header (Page header) -->
       <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Edit {{$user->first_name.' '.$user->middle_name.' '.$user->last_name}} Details</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('systemadmin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('systemadmin.users.index')}}">Users</a></li>
                <li class="breadcrumb-item active">Edit User</li>
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
                            <h3 class="card-title">Edit User</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('systemadmin.users.update',$user->id) }}" method="POST">
                              @csrf
                              @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" placeholder="Enter Username" name="username" value="{{$user->username}}" required autofocus>
                                          </div>
                                          <div class="mt-1">
                                            @if($errors->has('username'))
                                            <span class="text-danger">{{ $errors->first('username') }}</span>
                                          @endif
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" placeholder="Enter Email" name="email" value="{{$user->email}}" required>
                                          </div>
                                          <div class="mt-1">
                                            @if($errors->has('email'))
                                              <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" placeholder="Password" name="password">
                                          </div>
                                          <div class="mt-1">
                                            @if($errors->has('password'))
                                              <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                                          </div>
                                    </div>
                                </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{$user->first_name}}" required>
                                          </div>
                                          <div class="mt-1">
                                            @if($errors->has('first_name'))
                                              <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                            @endif
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="middle_name">Middle Name</label>
                                            <input type="text" class="form-control" placeholder="Middle Name" name="middle_name" value="{{$user->middle_name}}">
                                          </div>
                                          <div class="mt-1">
                                            @if($errors->has('middle_name'))
                                              <span class="text-danger">{{ $errors->first('middle_name') }}</span>
                                            @endif
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{$user->last_name}}" required>
                                          </div>
                                          <div class="mt-1">
                                            @if($errors->has('last_name'))
                                              <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                            @endif
                                        </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text" class="form-control" placeholder="Phone Number" name="phone_number" value="{{$user->phone_number}}" required>
                                          </div>
                                          <div class="mt-1">
                                            @if($errors->has('phone_number'))
                                              <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                            @endif
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" placeholder="Address" name="address" value="{{$user->address}}" required>
                                          </div>
                                          <div class="mt-1">
                                            @if($errors->has('address'))
                                              <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Directorate</label>
                                            <select class="form-control custom-select" style="width: 100%;" name="directorate">
                                              <option value="" selected>Select directorate</option>
                                              @forelse ($directorates as $dt)  
                                              <option value="{{$dt->id}}">{{$dt->directorate_name}}</option>
                                            @empty
                                              <option>No Directorates registered in the system</option>
                                            @endforelse
                                            </select>
                                          </div>
                                          <div class="mt-1">
                                            @if($errors->has('directorate'))
                                              <span class="text-danger">{{ $errors->first('directorate') }}</span>
                                            @endif
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Unit</label>
                                            <select class="form-control custom-select" style="width: 100%;" name="unit">
                                              <option value="" selected>Select Unit</option>
                                              @forelse ($units as $un)  
                                              <option value="{{$un->id}}">{{$un->name}}</option>
                                            @empty
                                              <option>No Units</option>
                                            @endforelse
                                            </select>
                                          </div>
                                          <div class="mt-1">
                                            @if($errors->has('unit'))
                                              <span class="text-danger">{{ $errors->first('unit') }}</span>
                                            @endif
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                       <div class="form-group">
                                           <label>Designation</label>
                                           <select class="form-control custom-select" style="width: 100%;" name="designation">
                                             <option value="" selected>Select designation</option>
                                             @forelse ($designations as $desig)  
                                             <option value="{{$desig->id}}">{{$desig->designation_name}}</option>
                                           @empty
                                             <option>No Designations registered in the system</option>
                                           @endforelse
                                           </select>
                                         </div>
                                         <div class="mt-1">
                                          @if($errors->has('designation'))
                                          <span class="text-danger">{{ $errors->first('designation') }}</span>
                                      @endif
                                       </div>
                                     </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group">
                                        <label>Roles</label>
                                        <select name="roles[]" id="roles" class="select2" multiple="multiple" data-placeholder="Select Roles" style="width: 100%;">
                                            @foreach($roles as $id => $roles)
                                                <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    <div class="mt-1">
                                        @if($errors->has('roles'))
                                            <span class="text-danger">{{ $errors->first('roles') }}</span>
                                        @endif
                                    </div>
                                </div>
                                  <div class="col-12">
                                    <div class="form-group">
                                        <label>Permissions</label>
                                        <select name="permissions[]" id="permissions" class="select2" multiple="multiple" data-placeholder="Select Permissions" style="width: 100%;">
                                            @foreach($permissions as $id => $permissions)
                                                <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($user) && $user->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    <div class="mt-1">
                                        @if($errors->has('permissions'))
                                            <span class="text-danger">{{ $errors->first('permissions') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                  <div class="form-group">
                                      <button type="submit" class="btn btn-success btn-lg">Update <i class="fas fa-arrow-right"></i></button>
                                      <a href="{{route('systemadmin.users.index')}}" class="btn btn-warning btn-lg"><i class="fas fa-ban"></i> Cancel</a>
                                  </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection