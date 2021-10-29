@extends('layouts.admin')
@section('page-title')
    Edit Job Vacancy Details
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Edit Job Vacancy Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.job-vacancies.index')}}">
                                Job vacancy details
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Edit Job Vacancy</li>
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
                            <form action="{{route('researchdevelopment.job-vacancies.update',$jobvacancy->id)}}" method="post" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Position Advertised:</label>
                                            <input type="text" class="form-control" name="position_advertised" value="{{ $jobvacancy->position_advertised }}">
                                            @error('position_advertised')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Date Advertised : <sup class="text-danger">*</sup></label>
                                            <input type="date" class="form-control" name="date_advertised" value="{{ $jobvacancy->date_advertised }}"/>
                                            @error('date_advertised')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Minimum Required Relevant Job Experience (Years):</label>
                                            <input type="text" class="form-control" name="minimum_required_job_experience" value="{{ $jobvacancy->minimum_required_job_experience }}">
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
                                                    <option value="{{$qualification}}" {{ $jobvacancy->minimum_required_qualification == $qualification ? 'selected' : '' }}>{{$qualification}}</option>
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
                                                    <option value="{{$field}}" {{ isset($jobvacancy) && in_array($field,$jobvacancy->fields_of_study) ? 'selected' : '' }}>{{$field}}</option>
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
                                                <option value="permanent" {{ $jobvacancy->job_status == 'permanent' ? 'selected' : '' }}>Permanent</option>
                                                <option value="temporary" {{ $jobvacancy->job_status == 'temporary' ? 'selected' : '' }}>Temporary</option>
                                                <option value="contract {{ $jobvacancy->job_status == 'contract' ? 'selected' : '' }}">Contract</option>
                                            </select>
                                            @error('job_status')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Institution: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="institution" value="{{ $jobvacancy->institution }}">
                                            @error('institution')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Region: <sup class="text-danger">*</sup></label>
                                            <select name="region_id" id="region_id" class="form-control select2" required>
                                                <option>Select regions</option>
                                                @foreach ($regions as $id => $region)
                                                    <option value="{{$id}}" {{$jobvacancy->region_id == $id ? 'selected' : ''}}>{{$region}}</option>
                                                @endforeach
                                            </select>
                                            @error('region_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>District: <sup class="text-danger">*</sup></label>
                                            <select name="district_id" id="district_id" class="form-control select2" required>
                                                <option>Select district</option>
                                                @foreach ($districts as $id => $district)
                                                    <option value="{{$id}}" {{$jobvacancy->district_id == $id ? 'selected' : ''}}>{{$district}}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Local goverment area: <sup class="text-danger">*</sup></label>
                                            <select name="localgoverment_area_id" id="localgoverment_area_id" class="form-control select2" required>
                                                <option>Select local goverment area</option>
                                                @foreach ($lgas as $id => $lga)
                                                    <option value="{{$id}}" {{$jobvacancy->localgoverment_area_id == $id ? 'selected' : ''}}>{{$lga}}</option>
                                                @endforeach
                                            </select>
                                            @error('localgoverment_area_id')
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