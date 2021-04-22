@extends('layouts.admin')
@section('page-title')
    New Job Vacancy Details
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Record New Job Vacancy Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.job-vacancies.index')}}">
                                Job vacancy details
                            </a>
                        </li>
                        <li class="breadcrumb-item active">New Job Vacancy</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">New Job Vacancy Details</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('researchdevelopment.job-vacancies.store')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Position Advertised:</label>
                                            <input type="text" class="form-control" name="position_advertised" value="{{ old('position_advertised') }}">
                                            @error('position_advertised')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Minimum Required Relevant Job Experience (Years):</label>
                                            <input type="text" class="form-control" name="minimum_required_job_experience" value="{{ old('minimum_required_job_experience') }}">
                                            @error('minimum_required_job_experience')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Minimum Required Level of Qualification:</label>
                                            <select name="minimum_required_qualification" id="minimum_required_qualification" class="form-control select2" required>
                                                <option>Select qualification</option>
                                                @foreach ($qualifications as $id => $qualification)
                                                    <option value="{{$qualification}}">{{$qualification}}</option>
                                                @endforeach
                                            </select>
                                            @error('minimum_required_qualification')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Field(s) of Study:</label>
                                            <select name="fields_of_study[]" id="fields_of_study" class="form-control select2" multiple="multiple" required>
                                                <option>Select field of study</option>
                                                @foreach ($fields as $id => $field)
                                                    <option value="{{$field}}">{{$field}}</option>
                                                @endforeach
                                            </select>
                                            @error('fields_of_study')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Job Status: <sup class="text-danger">*</sup></label>
                                            <select name="job_status" id="job_status" class="form-control select2" required>
                                                <option>Select job status</option>
                                                <option value="full_time">Full Time</option>
                                                <option value="part_time">Part Time</option>
                                            </select>
                                            @error('job_status')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Institution: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="institution" value="{{ old('institution') }}">
                                            @error('institution')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Region: <sup class="text-danger">*</sup></label>
                                            <select name="region_id" id="region_id" class="form-control select2" required>
                                                <option>Select regions</option>
                                                @foreach ($regions as $id => $region)
                                                    <option value="{{$id}}">{{$region}}</option>
                                                @endforeach
                                            </select>
                                            @error('region_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary mr-1">Submit</button>
                                            <a href="{{route('researchdevelopment.job-vacancies.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
                                        </div>
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