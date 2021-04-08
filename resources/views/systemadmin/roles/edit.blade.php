@extends('layouts.admin')

@section('content')
   <section class="content">
       <div class="container-fluid">
           <div class="card mt-2">
               <div class="card-header">
                   <h3 class="card-title">Edit Role</h3>
               </div>

               <div class="card-body">
                   <form action="{{ route('admin.roles.update',[$role->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Role Name ex: User" id="name" name="name" value="{{ $role->name }}"  required autofocus>
                                </div>
                                <div class="mt-1">
                                    @if($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" placeholder="Enter Role Name ex: User" id="slug" name="slug" value="{{ $role->slug }}"  required autofocus>
                                </div>
                                <div class="mt-1">
                                    @if($errors->has('slug'))
                                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                                     @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Permissions</label>
                                    <select name="permissions[]" id="permissions" class="select2" multiple="multiple" data-placeholder="Select Permissions" style="width: 100%;">
                                        @foreach($permissions as $id => $permissions)
                                            <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                <div class="mt-1">
                                    @if($errors->has('permissions'))
                                        <span class="text-danger">{{ $errors->first('permissions') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-info">Update</button>
                                <a href="{{ route('admin.roles.index')}}" class="btn btn-warning text-white">back <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </form>
               </div>
           </div>
       </div>
   </section>

   @section('page-level-footer-files')
       <script>
        $('#name').on('keyup',function(e){
               let permission = $('#name').val();
               $('#slug').val(permission.trim().replaceAll(' ','_').toLowerCase());
               $('#slug').innerHTML() = permission.trim().replaceAll(' ','-').toLowerCase();
           })
       </script>
   @endsection
@endsection