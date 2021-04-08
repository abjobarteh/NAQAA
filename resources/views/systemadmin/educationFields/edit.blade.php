@extends('layouts.admin')
@section('page-title')
    Edit Field of Education
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6 col-sm-12 text-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.configurations')}}">Configurations</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.education-fields.index')}}">Fields of Education</a></li>
                    <li class="breadcrumb-item active">Create Field of Education</li>
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
                        <h3 class="card-title">Add Field of Education</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.education-fields.update', $field[0]->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-form-label col-md-4">Name: <span class="text-danger"><sup>*</sup></span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" placeholder="Enter field of education name" value="{{$field[0]->name}}" required autofocus>
                                </div>
                                <div class="col-md-12 mt-1">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                 </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-form-label col-md-4">Description:</label>
                                <div class="col-md-8">
                                    <textarea name="description" id="description" value="{{$field[0]->name}}" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                <div class="col-md-12 mt-1">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-md-4">
                                    <button class="btn btn-primary pr-2">Save</button>
                                    <a href="{{route('admin.education-fields.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"></i> Back</a>
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