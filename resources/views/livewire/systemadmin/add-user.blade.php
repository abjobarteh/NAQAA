<div>
     <!-- Content Header (Page header) -->
     <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Add User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('systemadmin.index')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('systemadmin.users')}}">Users</a></li>
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
                            <form wire:submit.prevent="createUser">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" placeholder="Enter Username" wire:model="username">
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
                                            <input type="email" class="form-control" placeholder="Enter Email" wire:model="email">
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
                                            <input type="password" class="form-control" placeholder="Password" wire:model="password">
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
                                            <input type="password" class="form-control" placeholder="Confirm Password" wire:model="password_confirmation">
                                          </div>
                                    </div>
                                </div>
                                  <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control" placeholder="First Name" wire:model="first_name">
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
                                            <input type="text" class="form-control" placeholder="Middle Name" wire:model="middle_name">
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
                                            <input type="text" class="form-control" placeholder="Last Name" wire:model="last_name">
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
                                            <input type="text" class="form-control" placeholder="Phone Number" wire:model="phone_number">
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
                                            <input type="text" class="form-control" placeholder="Address" wire:model="address">
                                          </div>
                                          <div class="mt-1">
                                            @error('address')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department</label>
                                            <select class="form-control select2bs4" style="width: 100%;" wire:model="department">
                                              <option selected="selected">Select department</option>
                                              <option>Alaska</option>
                                              <option>California</option>
                                              <option>Delaware</option>
                                              <option>Tennessee</option>
                                              <option>Texas</option>
                                              <option>Washington</option>
                                            </select>
                                          </div>
                                          <div class="mt-1">
                                            @error('department')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select class="form-control select2bs4" style="width: 100%;" wire:model="role">
                                              <option selected="selected">Select Role</option>
                                              <option>Alaska</option>
                                              <option>California</option>
                                              <option>Delaware</option>
                                              <option>Tennessee</option>
                                              <option>Texas</option>
                                              <option>Washington</option>
                                            </select>
                                          </div>
                                          <div class="mt-1">
                                            @error('role')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <button type="submit" class="btn btn-success btn-lg">Create User</button>
                                  </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('page-level-header-files')
         <!-- Select2 -->
        <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> 
    @endsection
    @section('page-level-footer-files')
        <!-- Select2 -->
        <script src="/plugins/select2/js/select2.full.min.js"></script>
        <script>
            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })
        </script> 
    @endsection

</div>
