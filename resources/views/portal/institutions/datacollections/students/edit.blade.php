@extends('layouts.portal')
@section('title','Edit Student details Datacollection')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Student Datacollection details</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('portal.institution.datacollection.students.update', $student->id)}}" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Learning Center: <sup class="text-danger">*</sup></label>
                                    <select name="training_provider_id" id="training_provider_id" class="form-control select2" required>
                                        <option>Select learning center</option>
                                        @foreach ($learningcenters as $id => $center)
                                            <option value="{{$id}}" {{$student->training_provider_id == $id ? 'selected ' : ''}}>{{$center}}</option>
                                        @endforeach
                                    </select>
                                    @error('training_provider_id')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Student ID: <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" name="student_id" value="{{$student->student_id}}" required autofocus>
                                    @error('student_id')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>First Name: <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" name="firstname" value="{{$student->firstname}}" required autofocus>
                                    @error('firstname')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Middle Name:</label>
                                    <input type="text" class="form-control" name="middlename" value="{{$student->middlename}}">
                                    @error('middlename')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Last Name: <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" name="lastname" value="{{$student->lastname}}" required>
                                    @error('lastname')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Gender: <sup class="text-danger">*</sup></label>
                                    <select name="gender" id="gender" class="form-control select2" required>
                                        <option>Select Gender</option>
                                        <option value="male" {{$student->gender == 'male' ? 'selected ' : ''}}>Male</option>
                                        <option value="female" {{$student->gender == 'female' ? 'selected ' : ''}}>Female</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Phone: <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" name="phone" value="{{$student->phone}}" required>
                                    @error('phone')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4 show-admission">
                                <div class="form-group">
                                    <label>Date of birth:</label>
                                    <input type="date" class="form-control datetimepicker-input admission" name="date_of_birth" value="{{$student->date_of_birth}}" data-target="#date_of_birth"/>
                                    @error('date_of_birth')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 show-admission">
                                <div class="form-group">
                                    <label>Nationality: <sup class="text-danger">*</sup></label>
                                    <select name="nationality" id="nationality" class="form-control select2 admission" required>
                                        <option>Select nationality</option>
                                        @foreach ($countries as $country)
                                            <option value="{{$country->name}}" {{$student->nationality == $country->name ? 'selected' : ''}}>
                                                {{$country->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('nationality')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Programme: <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" name="programme_name" value="{{$student->programme_name}}" required>
                                    @error('programme_name')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Field of Education: <sup class="text-danger">*</sup></label>
                                    <select name="field_of_education" id="field_of_education" class="form-control select2">
                                        <option>Select Field of Education</option>
                                        @foreach ($fields as $id => $field)
                                            <option value="{{$field}}" {{$student->field_of_education == $field ? 'selected ' : ''}}>{{$field}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('field_of_education'))
                                        <span class="text-danger mt-1">{{ $errors->first('field_of_education') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4 show-admission">
                                <div class="form-group">
                                    <label>Attendance Status: <sup class="text-danger">*</sup></label>
                                    <select name="attendance_status" id="attendance_status" class="form-control select2 admission">
                                        <option>Select attendance status</option>
                                        <option value="full_time" {{$student->attendance_status == 'full_time' ? 'selected ' : ''}}>Full Time</option>
                                        <option value="part_time" {{$student->attendance_status == 'part_time' ? 'selected ' : ''}}>Part Time</option>
                                    </select>
                                    @error('attendance_status')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Admission Date: <sup class="text-danger">*</sup></label>
                                    <input type="date" class="form-control datetimepicker-input" name="admission_date" value="{{$student->admission_date}}" data-target="#admission_date" required/>
                                    @error('admission_date')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group show-graduate">
                                    <label>Completion Date: <sup class="text-danger">*</sup></label>
                                    <input type="date" class="form-control datetimepicker-input" name="completion_date" value="{{$student->completion_date}}" data-target="#completion_date"/>
                                    @error('completion_date')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 show-admission">
                                <div class="form-group">
                                    <label>Qualification at Entry: <sup class="text-danger">*</sup></label>
                                    <select name="qualification_at_entry" id="qualification_at_entry" class="form-control select2 admission">
                                        <option>Select Qualification at entry</option>
                                        @foreach ($qualifications as $id => $qualification)
                                            <option value="{{$id}}" {{$student->qualification_at_entry == $id ? 'selected ' : ''}}>{{$qualification}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('qualification_at_entry'))
                                        <span class="text-danger mt-1">{{ $errors->first('qualification_at_entry') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Award: <sup class="text-danger">*</sup></label>
                                    <select name="award" id="award" class="form-control select2" >
                                        <option>Select Award</option>
                                        @foreach ($qualifications as $id => $qualification)
                                            <option value="{{$id}}" {{$student->award == $id ? 'selected ' : ''}}>{{$qualification}}</option>
                                        @endforeach
                                    </select>
                                    @error('award')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-primary mr-1">Submit</button>
                                    <a href="{{route('portal.institution.datacollection.students.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection