@extends('layouts.admin')
@section('page-title')
    Edit Program Details Data collection
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Edit Program Details Data Collection</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.datacollection.program-details.index')}}">
                                Program details data collection
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Edit program details collection</li>
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
                            <h3 class="card-title">Edit {{$programdetail[0]->program_name}} Details Collection</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('researchdevelopment.datacollection.program-details.update',$programdetail[0]->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Learning center:</label>
                                            <select name="institution_detail_id" id="institution_detail_id" class="form-control select2" required>
                                                <option>Select learning center</option>
                                                @foreach ($learningcenters as $id => $center)
                                                    <option value="{{$id}}" {{$id == $programdetail[0]->institution_detail_id ? 'selected' : ''}}>{{$center}}</option>
                                                @endforeach
                                            </select>
                                            @error('institution_detail_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Program Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="program_name" value="{{$programdetail[0]->program_name}}" required autofocus>
                                            @error('program_name')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Duration (in Months): <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="duration" value="{{$programdetail[0]->duration}}" required>
                                            @error('duration')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tuition Fee per year: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="tuition_fee_per_year" value="{{$programdetail[0]->tuition_fee_per_year}}" required>
                                            @error('tuition_fee_per_year')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Entry requirements: <sup class="text-danger">*</sup></label>
                                            <select name="entry_requirements[]" id="entry_requirements" class="form-control select2" multiple="multiple" required>
                                                @foreach ($qualifications as $qualification)
                                                    <option value="{{$qualification}}" {{ (in_array($qualification, old('entry_requirements', [])) || isset($programdetail) && in_array($qualification, $programdetail[0]->entry_requirements)) ? 'selected' : '' }}>{{$qualification}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('entry_requirements'))
                                                <span class="text-danger mt-1">{{ $errors->first('entry_requirements') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Awarding body:</label>
                                            <select name="awarding_body_id" id="awarding_body_id" class="form-control select2" required>
                                                <option>Select awarding body</option>
                                                @foreach ($awardbodies as $id => $body)
                                                    <option value="{{$id}}" {{$id == $programdetail[0]->awarding_body_id ? 'selected' : '' }}>{{$body}}</option>
                                                @endforeach
                                            </select>
                                            @error('awarding_body_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Field of Education: <sup class="text-danger">*</sup></label>
                                            <select name="education_field_id" id="education_field_id" class="form-control select2" required>
                                                <option>Select field of education</option>
                                                @foreach ($educationfields as $id => $field)
                                                    <option value="{{$id}}" {{$id == $programdetail[0]->education_field_id ? 'selected' : ''}}>{{$field}}</option>
                                                @endforeach
                                            </select>
                                            @error('education_field_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary mr-1">Submit</button>
                                            <a href="{{route('researchdevelopment.datacollection.program-details.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
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