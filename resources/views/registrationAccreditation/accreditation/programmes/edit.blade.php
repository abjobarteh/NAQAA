@extends('layouts.admin')
@section('page-title')
    Edit Programme Accreditation
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Programme Accreditation</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('registration-accreditation.accreditation.programmes.index')}}">
                                Training Provider Accreditation Programmes
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Programme Accreditation</li>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title"><i class="fas fa-edit"></i> Programme Accreditation</h3>
                                </div>
                                <div class="col-md-6 d-flex flex-direction-row justify-content-end">
                                    <a href="{{route('registration-accreditation.accreditation.programmes.index')}}" class="btn btn-success mr-1 btn-flat"><i class="fas fa-list"></i> Programmes</a>
                                    <a href="{{route('registration-accreditation.accreditation.programmes.create')}}" class="btn btn-primary btn-flat"><i class="fas fa-plus"></i> New Programme Accreditation</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('registration-accreditation.accreditation.programmes.update',$accreditation->id)}}" method="post" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-12"><h4 class="text-primary"><b>Programme Accreditation Application Details</b></h4></div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Registered Training Providers: <sup class="text-danger">*</sup></label>
                                                <select name="trainingprovider_id" id="trainingprovider_id" class="form-control select2">
                                                    <option value="">-- select training provider --</option>
                                                   @foreach ($trainingproviders as $id => $trainingprovider)
                                                       <option value="{{$id}}" {{$accreditation->training_provider_id === $id ? 'selected' : ''}}>{{$trainingprovider}}</option>
                                                   @endforeach
                                                </select>
                                                @error('trainingprovider_id')
                                                    <span class="text-danger mt-1">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Programme Title: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="programme_title" value="{{ $accreditation->programmeDetail->programme_title ?? '' }}" required>
                                                    @error('programme_title')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Level: <sup class="text-danger">*</sup></label>
                                                    <select name="level" id="level" class="form-control select2" required>
                                                        <option value="">Select level</option>
                                                        @foreach ($levels as $id => $level)
                                                            <option value="{{$level}}" {{$accreditation->programmeDetail->level ?? '' === $level ? 'selected' : ''}}>{{$level}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('level')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Duration of Studentship: <sup class="text-danger">*</sup></label>
                                                    <input type="number" class="form-control" name="studentship_duration" value="{{ $accreditation->programmeDetail->studentship_duration ?? '' }}" min="0" step="1" required>
                                                    @error('studentship_duration')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Total Qualification Time (Hours): <sup class="text-danger">*</sup></label>
                                                    <input type="number" class="form-control" name="total_qualification_time" value="{{ $accreditation->programmeDetail->total_qualification_time ?? '' }}" min="0" step="1" required>
                                                    @error('total_qualification_time')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Level of Fees: <sup class="text-danger">*</sup></label>
                                                    <input type="number" class="form-control" name="level_of_fees" value="{{ $accreditation->programmeDetail->level_of_fees ?? '' }}" min="0" step="1" required>
                                                    @error('level_of_fees')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Admission requirements: <sup class="text-danger">*</sup></label>
                                                    <select name="admission_requirements[]" id="admission_requirements" class="form-control select2" multiple="multiple" required>
                                                        <option>Select admission requirements</option>
                                                        @foreach ($levels as $id => $level)
                                                            <option value="{{$level}}" {{in_array($level, $accreditation->programmeDetail->admission_requirements ?? []) ? 'selected' : ''}}>{{$level}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if($errors->has('admission_requirements'))
                                                        <span class="text-danger mt-1">{{ $errors->first('admission_requirements') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-12"><h4 class="text-primary"><b>Application Details</b></h4></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Application No: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="application_no" value="{{ $accreditation->application_no }}" required readonly>
                                                    @error('application_no')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Application Date: <sup class="text-danger">*</sup></label>
                                                    <div class="input-group date" id="application_date" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" name="application_date" value="{{ $accreditation->application_date }}" data-target="#application_date"/>
                                                        <div class="input-group-append" data-target="#application_date" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                    @error('application_date')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Application status: <sup class="text-danger">*</sup></label>
                                                    <select name="status" id="application_status" class="form-control select2">
                                                        <option>Select application status</option>
                                                        <option value="accepted" {{$accreditation->status == 'accepted' ? 'selected' : ''}}>Accepted</option>
                                                        <option value="rejected" {{$accreditation->status == 'rejected' ? 'selected' : ''}}>Rejected</option>
                                                        <option value="pending" {{$accreditation->status == 'pending' ? 'selected' : ''}}>Pending</option>
                                                    </select>
                                                    @error('status')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row license-registration-details">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Accreditation Start Date: <sup class="text-danger">*</sup></label>
                                                    <div class="input-group date" id="accreditation_start_date" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input license-registration" name="accreditation_start_date" value="{{ $accreditation->programmeAccreditations->accreditation_start_date ?? '' }}" data-target="#accreditation_start_date"/>
                                                        <div class="input-group-append" data-target="#accreditation_start_date" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                    @error('accreditation_start_date')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Accreditation End Date: <sup class="text-danger">*</sup></label>
                                                    <div class="input-group date" id="accreditation_end_date" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input license-registration" name="accreditation_end_date" value="{{ $accreditation->programmeAccreditations->accreditation_end_date ?? '' }}" data-target="#accreditation_end_date"/>
                                                        <div class="input-group-append" data-target="#accreditation_end_date" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                    @error('accreditation_end_date')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-success btn-flat mr-1">Submit Application</button>
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
            $('.license-registration-details').hide();

            if($('#application_status').val() == 'accepted'){
                    $('.license-registration-details').show();
                    $('.license-registration').prop('hidden', false);
                    $('.license-registration').prop('disabled', false);
            }
            else{
                    $('.license-registration-details').hide();
                    $('.license-registration').prop('hidden', true);
                    $('.license-registration').prop('disabled', true); 
            }

            $('#application_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $('#accreditation_start_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $('#accreditation_end_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            $("#application_status").change(function() {
                if ($(this).val() == "accepted") {
                    $('.license-registration-details').show();
                    $('.license-registration').prop('hidden', false);
                    $('.license-registration').prop('disabled', false);
                }
                else{
                    $('.license-registration-details').hide();
                    $('.license-registration').prop('hidden', true);
                    $('.license-registration').prop('disabled', true);
                }
            });

            let row_number = 1;
            $("#add_row").click(function(e){
            e.preventDefault();
            let new_row_number = row_number - 1;
            $('#area' + row_number).html($('#area' + new_row_number).html()).find('td:first-child');
            $('#accreditation_areas_table').append('<tr id="area' + (row_number + 1) + '"></tr>');
            row_number++;
            });

            $("#delete_row").click(function(e){
            e.preventDefault();
            if(row_number > 1){
                $("#area" + (row_number - 1)).html('');
                row_number--;
            }
            });

        })
    </script>
@endsection