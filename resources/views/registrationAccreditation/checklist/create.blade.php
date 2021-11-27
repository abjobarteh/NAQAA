@extends('layouts.admin')

@section('page-title')
Add Checklist
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6 col-sm-12 text-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('registration-accreditation.checklists.index')}}">Thematic areas</a></li>
                    <li class="breadcrumb-item active">Add Checklist</li>
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
                        <h3 class="card-title">Add Checklist</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('registration-accreditation.checklists.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">Name: <span class="text-danger"><sup>*</sup></span></label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter checklist name" required autofocus>
                                        @error('name')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="slug" class="col-form-label">Slug: <span class="text-danger"><sup>*</sup></span></label>
                                        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" placeholder="Enter slug" required>
                                        @error('slug')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="checklist_type" class="col-form-label">Checklist Type: <span class="text-danger"><sup>*</sup></span></label>
                                        <select name="checklist_type" id="checklist_type" class="form-control custom-select">
                                            <option>--- select checklist type ---</option>
                                            <option value="institution">Institution</option>
                                            <option value="trainer">Trainer</option>
                                        </select>
                                        @error('checklist_type')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="thematic_area_id" class="col-form-label">Checklist Thematic area: <span class="text-danger"><sup>*</sup></span></label>
                                        <select name="thematic_area_id" id="thematic_area_id" class="form-control custom-select">
                                            <option>--- select checklist thematic area ---</option>
                                            @foreach ($thematicareas as $id => $area)
                                                <option value="{{$id}}">{{$area}}</option>
                                            @endforeach
                                        </select>
                                        @error('thematic_area_id')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="is_required" class="col-form-label">Required: <span class="text-danger"><sup>*</sup></span></label>
                                        <select name="is_required" id="is_required" class="form-control custom-select">
                                            <option>--- select if checklist evidence is required ---</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                        @error('is_required')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="is_renewal_required" class="col-form-label">Renewal Required: <span class="text-danger"><sup>*</sup></span></label>
                                        <select name="is_renewal_required" id="is_renewal_required" class="form-control custom-select">
                                            <option>--- select if checklist evidence is required ---</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                        @error('is_renewal_required')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">Description:</label>
                                        <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary pr-2">Save</button>
                                <a href="{{route('registration-accreditation.checklists.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"></i> Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>
        $('#name').on('keyup',function(e){
            let checklist = $('#name').val();
            $('#slug').val(checklist.trim().replaceAll(' ','_').toLowerCase());
            $('#slug').innerHTML() = checklist.trim().replaceAll(' ','-').toLowerCase();
        })
    </script>
@endsection