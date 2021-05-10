@extends('layouts.admin')
@section('page-title')
    New Trainer Accreditation
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Trainer Accreditation</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('registration-accreditation.accreditation.trainers.index')}}">
                                Trainers
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Trainer Accreditation</li>
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
                            <h3 class="card-title">Add Trainer Accreditation</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('registration-accreditation.accreditation.trainers.store')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-12"><h4 class="text-primary"><b>Trainer Accreditation Application Details</b></h4></div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Registered Trainers: <sup class="text-danger">*</sup></label>
                                                <select name="trainer_id" id="trainer_id" class="form-control select2">
                                                    <option value="">-- select trainer --</option>
                                                   @foreach ($trainers as $trainer)
                                                       <option value="{{$trainer->id}}" {{old('trainer_id') === $trainer->id ? 'selected' : ''}}>{{$trainer->firstname}}.{{$trainer->middlename}}.{{$trainer->lastname}}</option>
                                                   @endforeach
                                                </select>
                                                @error('trainer_id')
                                                    <span class="text-danger mt-1">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Application No: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="application_no" value="@error('application_no'){{ old('application_no') }}@enderror auto generated" required readonly>
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
                                                        <option>-- select application status --</option>
                                                        <option value="accepted">Accepted</option>
                                                        <option value="rejected">Rejected</option>
                                                        <option value="pending">Pending</option>
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
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header bg-secondary">
                                                    <h3 class="card-title">Applied Trainer Accreditation Programmes</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <table class="table" id="accreditation_areas_table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Programme</th>
                                                                        <th>Level</th>
                                                                        <th class="license-registration">Accreditation status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr id="area0">
                                                                        <td>
                                                                            <input type="text" name="areas[]" class="form-control" placeholder="Enter accreditation area" />
                                                                        </td>
                                                                        <td>
                                                                            <select name="levels[]" class="form-control custom-select">
                                                                                    <option value="">-- select level --</option>
                                                                                    @foreach ($levels as $id => $level)
                                                                                    <option value="{{$level}}">{{$level}}</option>
                                                                                @endforeach
                                                                                @error('levels')
                                                                                    <span class="text-danger mt-1">{{$message}}</span>
                                                                                @enderror
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <select name="statuses[]" class="form-control custom-select license-registration" name="accreditation_status">
                                                                                    <option value="">-- select status --</option>
                                                                                    <option value="accepted">Accepted</option>
                                                                                    <option value="rejected">Rejected</option>
                                                                                    <option value="pending">Pending</option>
                                                                                @error('statuses')
                                                                                    <span class="text-danger mt-1">{{$message}}</span>
                                                                                @enderror
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr id="area1"></tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                                                            <button id='delete_row' class="float-right btn btn-danger">- Delete Row</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary mr-1">Submit Application</button>
                                            <a href="{{route('registration-accreditation.accreditation.trainers.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
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