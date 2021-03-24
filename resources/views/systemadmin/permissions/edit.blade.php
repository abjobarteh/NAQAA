@extends('layouts.admin')

@section('content')
   <section class="content">
       <div class="container-fluid">
           <div class="card mt-2">
               <div class="card-header">
                   <h3 class="card-title">Edit Permission</h3>
               </div>

               <div class="card-body">
                   <form action="{{ route('admin.permissions.update',[$permission->id]) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Permission Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Permission Name ex: Edit User" id="name" name="permission_name" value="{{ $permission->name }}"  required autofocus>
                                </div>
                                <div class="mt-1">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" placeholder="Permission slug ex: edit-user" id="slug" name="permission_slug" value="{{ $permission->slug }}"  required>
                                </div>
                                <div class="mt-1">
                                    @error('slug')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-info">Update</button>
                                <a href="{{ route('admin.permissions.index')}}" class="btn btn-warning text-white">back <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </form>
               </div>
           </div>
       </div>
   </section>

   @section('page-level-footer-files')
       <script>
           $('#permission_name').on('keyup',function(e){
               let permission = $('#permission_name').val();
               $('#permission_slug').val(permission.trim().replaceAll(' ','_').toLowerCase());
               $('#permission_slug').innerHTML() = permission.trim().replaceAll(' ','-').toLowerCase();
           })
       </script>
   @endsection
@endsection