<div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
           <div class="container-fluid">
           <div class="row mb-2">
               <div class="col-sm-6">
               <h1 class="m-0">Edit Account Details</h1>
               </div><!-- /.col -->
               <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                   <li class="breadcrumb-item"><a href="{{route('systemadmin.index')}}">Dashboard</a></li>
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
                               <h3 class="card-title">Account Settings</h3>
                           </div>
                           <div class="card-body">
                               <form wire:submit.prevent="updateUserSettings">
                                   <div class="row">
                                       <div class="col-md-6">
                                           <div class="form-group">
                                               <label for="username">Username</label>
                                               <input type="text" class="form-control" placeholder="Enter Username" wire:model.lazy="username" required>
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
                                               <input type="email" class="form-control" placeholder="Enter Email" wire:model.lazy="email" required>
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
                                               <input type="password" class="form-control" placeholder="Password" wire:model.lazy="password">
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
                                               <input type="password" class="form-control" placeholder="Confirm Password" wire:model.lazy="password_confirmation">
                                             </div>
                                       </div>
                                   </div>
                                     <div class="row">
                                         <div class="col-md-4">
                                           <div class="form-group">
                                               <label for="first_name">First Name</label>
                                               <input type="text" class="form-control" placeholder="First Name" wire:model.lazy="first_name" required>
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
                                               <input type="text" class="form-control" placeholder="Middle Name" wire:model.lazy="middle_name">
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
                                               <input type="text" class="form-control" placeholder="Last Name" wire:model.lazy="last_name" required>
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
                                               <input type="text" class="form-control" placeholder="Phone Number" wire:model.lazy="phone_number" required>
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
                                               <input type="text" class="form-control" placeholder="Address" wire:model.lazy="address" required>
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
                                               <select class="form-control custom-select" style="width: 100%;" wire:model.lazy="department" required>
                                                 <option selected>Select department</option>
                                                 @forelse ($departments as $dept)  
                                                 <option value="{{$dept->id}}">{{$dept->department_name}}</option>
                                               @empty
                                                 <option>No Departments registered in the system</option>
                                               @endforelse
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
                                               <select class="form-control custom-select" style="width: 100%;" wire:model.lazy="role" required>
                                                 <option selected>Select Role</option>
                                                 @forelse ($roles as $r)  
                                                   <option value="{{$r->id}}">{{$r->role_name}}</option>
                                                 @empty
                                                   <option>No Roles registered in the system</option>
                                                 @endforelse
                                                 
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
                                         <button type="submit" class="btn btn-success btn-lg">Update <i class="fas fa-arrow-right"></i></button>
                                     </div>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           @section('page-level-header-files')
                <!-- SweetAlert2 -->
                <link rel="stylesheet" href="/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
          @endsection
          @section('page-level-footer-files')
                <!-- SweetAlert2 -->
                <script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
                <script src="/js/custom.js"></script>
          @endsection
       </div>
    
    </div>
    