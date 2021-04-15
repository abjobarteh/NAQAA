@extends('layouts.admin')
@section('page-title')
    New Student Details Data collection
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Record New Student Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.datacollection.student-details.index')}}">
                                Student details data collection
                            </a>
                        </li>
                        <li class="breadcrumb-item active">New Student details collection</li>
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
                            <h3 class="card-title">New Student Details Collection</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('researchdevelopment.datacollection.student-details.store')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Student Data Collection Type: <sup class="text-danger">*</sup></label>
                                            <select name="studentdetail_type" id="studentdetail_type" class="form-control select2">
                                                <option>Select student detail type</option>
                                                <option value="graduate">Graduate</option>
                                                <option value="admission">Admission</option>
                                            </select>
                                            @if($errors->has('studentdetail_type'))
                                                <span class="text-danger mt-1">{{ $errors->first('studentdetail_type') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Student ID: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="student_id" required autofocus>
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
                                            <input type="text" class="form-control" name="firstname" required autofocus>
                                            @error('firstname')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Middle Name:</label>
                                            <input type="text" class="form-control" name="middlename">
                                            @error('middlename')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="lastname" required>
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
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Phone: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="phone" required>
                                            @error('phone')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 show-admission">
                                        <div class="form-group">
                                            <label>Date of birth: <sup class="text-danger">*</sup></label>
                                            <div class="input-group date" id="date_of_birth" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input admission" name="date_of_birth" data-target="#date_of_birth" required/>
                                                <div class="input-group-append" data-target="#date_of_birth" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @error('date_of_birth')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row show-admission">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nationality: <sup class="text-danger">*</sup></label>
                                            <select name="nationality" id="nationality" class="form-control select2 admission">
                                                <option>Select nationality</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{$country->name}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('nationality')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 show-admission">
                                        <div class="form-group">
                                            <label>Ethnicity: <sup class="text-danger">*</sup></label>
                                            <select name="ethnicity" id="ethnicity" class="form-control select2 admission">
                                                <option>Select ethnicity</option>
                                                <option value="other">Other</option>
                                            </select>
                                            @error('ethnicity')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Programme: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="programme" required>
                                            @error('programme')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Field of Education: <sup class="text-danger">*</sup></label>
                                            <select name="education_field_id" id="education_field_id" class="form-control select2">
                                                <option>Select Field of Education</option>
                                                @foreach ($fields as $id => $field)
                                                    <option value="{{$id}}">{{$field}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('education_field_id'))
                                                <span class="text-danger mt-1">{{ $errors->first('education_field_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4 show-admission">
                                        <div class="form-group">
                                            <label>Attendance Status: <sup class="text-danger">*</sup></label>
                                            <select name="attendance_status" id="attendance_status" class="form-control select2 admission">
                                                <option>Select attendance status</option>
                                                <option value="full_time">Full Time</option>
                                                <option value="part_time">Part Time</option>
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
                                            <div class="input-group date" id="admission_date" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" name="admission_date" data-target="#admission_date" required/>
                                                <div class="input-group-append" data-target="#admission_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @error('admission_date')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 show-graduate">
                                        <div class="form-group">
                                            <label>Completion Date: <sup class="text-danger">*</sup></label>
                                            <div class="input-group date" id="completion_date" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input graduate" name="completion_date" data-target="#completion_date" required/>
                                                <div class="input-group-append" data-target="#completion_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
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
                                                    <option value="{{$id}}">{{$qualification}}</option>
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
                                                    <option value="{{$id}}">{{$qualification}}</option>
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
                                            <label>Learning Center: <sup class="text-danger">*</sup></label>
                                            <select name="institution_id" id="institution_id" class="form-control select2" required>
                                                <option>Select learning center</option>
                                                @foreach ($learningcenters as $id => $center)
                                                    <option value="{{$id}}">{{$center}}</option>
                                                @endforeach
                                            </select>
                                            @error('institution_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary mr-1">Submit</button>
                                            <a href="{{route('researchdevelopment.datacollection.student-details.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
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

@section('scripts')
    <script>
        $(document).ready(function(){
             //Date range picker
            $('#admission_date').datetimepicker({
            format: 'YYYY-MM-DD'
            });
            $('#completion_date').datetimepicker({
            format: 'YYYY-MM-DD'
            });
            $('#date_of_birth').datetimepicker({
            format: 'YYYY-MM-DD'
            });

            $("#studentdetail_type").change(function() {
            if ($(this).val() == "admission") {
                $('.show-graduate').hide();
                $('.graduate').prop('disabled', true);
                $('.admission').prop('disabled', false);
                $('.show-admission').show();
            }
            if ($(this).val() == "graduate"){
                $('.show-admission').hide();
                $('.admission').prop('disabled', true);
                $('.graduate').prop('disabled', false);
                $('.show-graduate').show();
            }
            });
        })
    </script>
@endsection
