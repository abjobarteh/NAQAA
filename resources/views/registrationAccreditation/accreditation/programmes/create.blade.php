@extends('layouts.admin')
@section('page-title')
    New Programme Accreditation
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
                                Programmes
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
                                    <h3 class="card-title">Programme Accreditation</h3>
                                </div>
                                <div class="col-md-6 d-flex flex-direction-row justify-content-end">
                                    <a href="{{route('registration-accreditation.accreditation.programmes.index')}}" class="btn btn-primary btn-flat"><i class="fas fa-reply"></i> Cancel</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('registration-accreditation.accreditation.programmes.store')}}" method="post" autocomplete="off">
                                @csrf
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
                                                       <option value="{{$id}}" {{old('trainingprovider_id') === $id ? 'selected' : ''}}>{{$trainingprovider}}</option>
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
                                                    <input type="text" class="form-control" name="programme_title" value="{{ old('programme_title') }}" required>
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
                                                            <option value="{{$level}}">{{$level}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('level')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Duration of Studentship: <sup class="text-danger">*</sup></label>
                                                    <input type="number" class="form-control" name="studentship_duration" value="{{ old('studentship_duration') }}" min="0" step="1" required>
                                                    @error('studentship_duration')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Total Qualification Time (Months): <sup class="text-danger">*</sup></label>
                                                    <input type="number" class="form-control" name="total_qualification_time_months" value="{{ old('total_qualification_time_months') }}" min="0" step="1" required>
                                                    @error('total_qualification_time_months')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Total Qualification Time (Hours): <sup class="text-danger">*</sup></label>
                                                    <input type="number" class="form-control" name="total_qualification_time_hours" value="{{ old('total_qualification_time_hours') }}" min="0" step="1" required>
                                                    @error('total_qualificattotal_qualification_time_hoursion_time')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Level of Fees: <sup class="text-danger">*</sup></label>
                                                    <input type="number" class="form-control" name="level_of_fees" value="{{ old('level_of_fees') }}" min="0" step="1" required>
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
                                                            <option value="{{$level}}">{{$level}}</option>
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
                                                    <input type="text" class="form-control" name="application_no" value="@error('application_no'){{ old('application_no') }}@enderror {{$application_no}}" required readonly>
                                                    @error('application_no')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Application Date: <sup class="text-danger">*</sup></label>
                                                    <div class="input-group date" id="application_date" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" name="application_date" value="{{ old('application_date') }}" data-target="#application_date"/>
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
                                                        @foreach ($application_statuses as $status)
                                                            <option value="{{$status}}" {{old('status') === $status ? 'selected' : ''}}>{{$status}}</option>
                                                        @endforeach
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
                                                        <input type="text" class="form-control datetimepicker-input license-registration" name="accreditation_start_date" value="{{ old('accreditation_start_date') }}" data-target="#accreditation_start_date"/>
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
                                                        <input type="text" class="form-control datetimepicker-input license-registration" name="accreditation_end_date" value="{{ old('accreditation_end_date') }}" data-target="#accreditation_end_date"/>
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
                                            <button class="btn btn-success mr-1 btn-flat">Submit Application</button>
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

            if($('#application_status').val() == 'Approved'){
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
                if ($(this).val() == "Approved") {
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