@extends('layouts.admin')

@section('page-title')
Edit Checklist Thematic Area
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6 col-sm-12 text-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('registration-accreditation.checklist-thematic-area.index')}}">Thematic areas</a></li>
                    <li class="breadcrumb-item active">edit thematic area</li>
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
                        <h3 class="card-title">edit Thematic area</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('registration-accreditation.checklist-thematic-area.update',$thematicarea->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">Name: <span class="text-danger"><sup>*</sup></span></label>
                                        <input type="text" class="form-control" name="name" value="{{ $thematicarea->name }}" required autofocus>
                                        @error('name')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">Description:</label>
                                        <textarea class="form-control" name="description">{{ $thematicarea->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary pr-2">Save</button>
                                <a href="{{route('registration-accreditation.checklist-thematic-area.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"></i> Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection