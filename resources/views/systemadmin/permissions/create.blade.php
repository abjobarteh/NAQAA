@extends('layouts.admin')

@section('content')
   <section class="content">
       <div class="container-fluid">
           <div class="card mt-2">
               <div class="card-header">
                   <h3 class="card-title">Add Permission</h3>
               </div>

               <div class="card-body">
                   <form action="{{ route('admin.permissions.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Permission Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Permission Name ex: Edit User" id="permission_name" name="name"  required autofocus>
                                    <div class="mt-1">
                                        @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" placeholder="Pemrission slug ex: edit-user" id="permission_slug" name="slug"  required>
                                    <div class="mt-1">
                                        @error('slug')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="slug">Permission Type</label>
                                    <select name="permission_type" id="permission_type" class="form-control custom-select">
                                        <option>Select Permission type</option>
                                        @foreach ($roles as $role)
                                            <option value="{{$role}}">{{$role}}</option>
                                        @endforeach
                                    </select>
                                    <div class="mt-1">
                                        @error('permission_type')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-info">Save</button>
                                <a href="{{ route('admin.permissions.index')}}" class="btn btn-warning text-white">back <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </form>
               </div>
           </div>
       </div>
   </section>

   @section('scripts')
       <script>
           $('#permission_name').on('keyup',function(e){
               let permission = $('#permission_name').val();
               $('#permission_slug').val(permission.trim().replaceAll(' ','_').toLowerCase());
               $('#permission_slug').innerHTML() = permission.trim().replaceAll(' ','-').toLowerCase();
           })
       </script>
   @endsection
@endsection