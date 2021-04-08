@extends('layouts.admin')
@section('page-title')
    Edit Designation
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.designations.index')}}">Designations</a></li>
                        <li class="breadcrumb-item active">Edit designation</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
   <section class="content">
       <div class="container-fluid">
           <div class="card mt-2">
               <div class="card-header">
                   <h3 class="card-title">Edit Designation</h3>
               </div>

               <div class="card-body">
                   <form action="{{ route('admin.designations.update', $designation->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter designation name" value="{{ $designation->name }}" name="name"  required autofocus>
                                </div>
                                <div class="mt-1">
                                    @if($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-info btn-block">Save</button>
                            </div>
                        </div>
                    </form>
               </div>
           </div>
       </div>
   </section>

@endsection