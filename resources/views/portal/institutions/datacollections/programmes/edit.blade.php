@extends('layouts.portal')
@section('title','Edit Programmes offered Datacollection')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Programmes Offered Datacollection details</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('portal.institution.datacollection.programmes.update',$programdetail->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Learning center:</label>
                                    <select name="training_provider_id" id="training_provider_id" class="form-control select2" required>
                                        <option>Select learning center</option>
                                        @foreach ($learningcenters as $id => $center)
                                            <option value="{{$id}}" {{$id == $programdetail->programme->training_provider_id ? 'selected' : ''}}>{{$center}}</option>
                                        @endforeach
                                    </select>
                                    @error('training_provider_id')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Program Name: <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" name="program_name" value="{{$programdetail->programme->programme_title}}" required autofocus>
                                    @error('program_name')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Duration (in Months): <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" name="duration" value="{{$programdetail->duration}}" required>
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
                                    <input type="text" class="form-control" name="tuition_fee_per_year" value="{{$programdetail->tuition_fee_per_year}}" required>
                                    @error('tuition_fee_per_year')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Entry requirements: <sup class="text-danger">*</sup></label>
                                    <select name="entry_requirements[]" id="entry_requirements" class="form-control select2" multiple="multiple" required>
                                        @foreach ($levels as $level)
                                            <option value="{{$level}}" {{ (in_array($levels, old('entry_requirements', [])) || isset($programdetail) && in_array($level, $programdetail->entry_requirements)) ? 'selected' : '' }}>{{$level}}</option>
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
                                    <select name="awarding_body" id="awarding_body" class="form-control select2" required>
                                        <option>Select awarding body</option>
                                        @foreach ($awardbodies as $id => $body)
                                            <option value="{{$body}}" {{$body == $programdetail->awarding_body ? 'selected' : '' }}>{{$body}}</option>
                                        @endforeach
                                    </select>
                                    @error('awarding_body')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Field of Education: <sup class="text-danger">*</sup></label>
                                    <select name="field_of_education" id="field_of_education" class="form-control select2" required>
                                        <option>Select field of education</option>
                                        @foreach ($educationfields as $id => $field)
                                            <option value="{{$id}}" {{$id == $programdetail->programme->field_of_education ? 'selected' : ''}}>{{$field}}</option>
                                        @endforeach
                                    </select>
                                    @error('field_of_education')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-primary mr-1">Submit</button>
                                    <a href="{{route('portal.institution.datacollection.programmes.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection