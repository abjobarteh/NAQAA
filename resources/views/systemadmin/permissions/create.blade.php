@extends('layouts.admin')

@section('content')
   <section class="content">
       <div class="container-fluid">
           <div class="card mt-2">
               <div class="card-header">
                   <h3 class="card-title">Create Permission</h3>
               </div>

               <div class="card-body">
                   <form action="{{ route('admin.permissions.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="permission_name">Permission Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Permission Name ex: Edit User" id="permission_name" name="permission_name"  required autofocus>
                                </div>
                                <div class="mt-1">
                                    @error('permission_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="permission_name">Slug</label>
                                    <input type="text" class="form-control" placeholder="Pemrission slug ex: edit-user" id="permission_slug" name="permission_slug"  required>
                                </div>
                                <div class="mt-1">
                                    @error('permission_slug')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
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