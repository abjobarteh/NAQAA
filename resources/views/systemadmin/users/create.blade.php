@extends('layouts.admin')

@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Add User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Users</a></li>
            <li class="breadcrumb-item active">Add User</li>
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
                        <h3 class="card-title">Create User</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.store') }}" method="POST">
                          @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" placeholder="Enter Username" name="username" value="{{ old('username') }}" required>
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
                                        <input type="email" class="form-control" placeholder="Enter Email" name="email" value="{{ old('email') }}" required>
                                      </div>
                                      <div class="mt-1">
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                                      </div>
                                      <div class="mt-1">
                                        @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                                      </div>
                                </div>
                            </div>
                              <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" placeholder="First Name" name="firstname" value="{{ old('firstname') }}"  required>
                                      </div>
                                      <div class="mt-1">
                                        @error('firstname')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="middle_name">Middle Name</label>
                                        <input type="text" class="form-control" placeholder="Middle Name" name="middlename" value="{{ old('middlename') }}">
                                      </div>
                                      <div class="mt-1">
                                        @error('middlename')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="{{ old('lastname') }}" required>
                                      </div>
                                      <div class="mt-1">
                                        @error('lastname')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" class="form-control" placeholder="Phone Number" name="phonenumber" value="{{ old('phonenumber') }}" required>
                                      </div>
                                      <div class="mt-1">
                                        @error('phonenumber')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" placeholder="Address" name="address" value="{{ old('address') }}" required>
                                      </div>
                                      <div class="mt-1">
                                        @error('address')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Directorate</label>
                                      <select class="form-control select2" style="width: 100%;" id="directorate" name="directorate" required>
                                        <option>Select directorate</option>
                                        @forelse ($directorates as $id => $directorate)  
                                        <option value="{{$id}}">{{$directorate}}</option>
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
                                      <select class="form-control select2" id="unit" style="width: 100%;" name="unit">
                                        <option>Select Unit</option>
                                        @forelse ($units as $id => $unit)  
                                          <option value="{{$id}}">{{$unit}}</option>
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
                                     <select class="form-control select2" style="width: 100%;" name="designation" required>
                                       <option>Select designation</option>
                                       @forelse ($designations as $id => $designation)  
                                       <option value="{{$id}}">{{$designation}}</option>
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
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                  <input type="checkbox" class="custom-control-input" id="enable" name="user_status">
                                  <label class="custom-control-label" for="enable">Enable</label>
                                </div>
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
                              <div class="form-group">
                                  <button type="submit" class="btn btn-info btn-lg">Save</button>
                                  <a href="{{ route('admin.users.index') }}" class="btn btn-danger btn-lg"><i class="fas fa-arrow-left"></i> Back</a>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    $(document).ready(function(){
        $('#directorate').change(function(e){
          var directorateID = $(this).val();
          if(directorateID){
              $.ajax({
                method: "GET",
                url: "/admin/users/getunitsbydirectorate/"+directorateID,
                dataType: "json",
                success: function(response)
                {

                  $('select[name="unit"]').empty();
                  $.each(response.data, function(key, value) {
                              $('select[name="unit"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
              })
          }
        })
    })
</script>
    
@endsection