@extends('layouts.admin')
@section('page-title')
    Edit Training Provider Category
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6 col-sm-12 text-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.configurations')}}">Configurations</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.training-provider-categories.index')}}">Training provider ownerships</a></li>
                        <li class="breadcrumb-item active">Edit training provider category</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Edit Training provider category</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.training-provider-categories.update', $category->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-form-label col-md-4">Name: <span class="text-danger"><sup>*</sup></span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" value="{{$category->name}}" placeholder="Enter category name" required autofocus>
                                </div>
                                <div class="col-md-12 mt-1">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-md-4">
                                    <button class="btn btn-primary btn-flat pr-2">Save</button>
                                    <a href="{{route('admin.training-provider-categories.index')}}" class="btn btn-warning btn-flat text-white"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection