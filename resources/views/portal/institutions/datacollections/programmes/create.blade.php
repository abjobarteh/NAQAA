@extends('layouts.portal')
@section('title','Programmes offered Datacollection')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Programmes Datacollection details</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('portal.institution.datacollection.programmes.store')}}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Program Name: <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" name="program_name" value="{{ old('program_name') }}" required autofocus>
                                    @error('program_name')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Duration: <sup class="text-danger">*</sup></label>
                                    <input type="number" class="form-control" name="duration" value="{{ old('duration') }}" min="0" step="1" required>
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
                                    <input type="number" class="form-control" name="tuition_fee_per_year" value="{{ old('tuition_fee_per_year') }}" min="0" step="1" required>
                                    @error('tuition_fee_per_year')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Entry requirements: <sup class="text-danger">*</sup></label>
                                    <select name="entry_requirements[]" id="entry_requirements" class="form-control select2" multiple="multiple" required>
                                        <option>Select entry requirements</option>
                                        @foreach ($levels as $level)
                                            <option value="{{$level}}">{{$level}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('entry_requirements'))
                                        <span class="text-danger mt-1">{{ $errors->first('entry_requirements') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Field of Education: <sup class="text-danger">*</sup></label>
                                    <select name="field_of_education" id="field_of_education" class="form-control select2" required>
                                        <option>Select field of education</option>
                                        @foreach ($educationfields as $id => $field)
                                            <option value="{{$id}}">{{$field}}</option>
                                        @endforeach
                                    </select>
                                    @error('field_of_education')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Awarding body:</label>
                                    <select name="awarding_body" id="awarding_body" class="form-control select2" required>
                                        <option>Select awarding body</option>
                                        @foreach ($awardbodies as $id => $body)
                                            <option value="{{$body}}">{{$body}}</option>
                                        @endforeach
                                    </select>
                                    @error('awarding_body')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 d-flex justify-content-end">
                                <div class="form-group">
                                    <button class="btn btn-success btn-square mr-1">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection