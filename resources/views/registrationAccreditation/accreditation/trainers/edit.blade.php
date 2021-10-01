@extends('layouts.admin')
@section('page-title')
    Edit Trainer Accreditation
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
                            <h3 class="card-title">Edit Trainer Accreditation</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('registration-accreditation.accreditation.trainers.update',$accreditation->id)}}" method="post" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-12"><h4 class="text-primary"><b>Trainer Accreditation Application Details</b></h4></div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Name: <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control" value="{{ $accreditation->trainer->firstname }} {{ $accreditation->trainer->middlename }} {{ $accreditation->trainer->lastname }}" required readonly />
                                                @error('trainer_id')
                                                    <span class="text-danger mt-1">{{$message}}</span>
                                                @enderror
                                            </div>
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
                                                        <option>-- select application status --</option>
                                                        @foreach ($application_statuses as $status)
                                                            <option value="{{$status}}" {{ ($accreditation->status ?? '') == $status ? 'selected' : '' }}>{{$status}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('status')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header bg-secondary">
                                                    <h3 class="card-title">Applied Accreditation Programmes</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <table class="table" id="accreditation_areas_table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Area</th>
                                                                        <th>Level</th>
                                                                        <th class="license-registration">Accreditation status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($accreditation->trainerAccreditations as $programme)
                                                                    <tr id="area{{$loop->index}}">
                                                                        <td>
                                                                            <input type="text" name="areas[]" class="form-control" value="{{$programme->area}}" placeholder="Enter accreditation area" />
                                                                        </td>
                                                                        <td>
                                                                            <select name="levels[]" class="form-control custom-select">
                                                                                    <option value="">-- select level --</option>
                                                                                    @foreach ($levels as $id => $level)
                                                                                    <option value="{{$level}}" {{$programme->level === $level ? 'selected' : ''}}>{{$level}}</option>
                                                                                @endforeach
                                                                                @error('levels')
                                                                                    <span class="text-danger mt-1">{{$message}}</span>
                                                                                @enderror
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <select name="statuses[]" class="form-control custom-select license-registration">
                                                                                    <option value="">-- select status --</option>
                                                                                    @foreach ($application_statuses as $status)
                                                                                        <option value="{{$status}}" {{ ($accreditation->status ?? '') == $status ? 'selected' : '' }}>{{$status}}</option>
                                                                                    @endforeach
                                                                                @error('statuses')
                                                                                    <span class="text-danger mt-1">{{$message}}</span>
                                                                                @enderror
                                                                            </select>
                                                                        </td>
                                                                        <td><input type="hidden" name="accreditation_ids[]" value="{{$programme->id}}"/></td>
                                                                    </tr> 
                                                                    @endforeach
                                                                    <div class="empty-fields">

                                                                    </div>
                                                                    {{-- <tr id="area1"></tr> --}}
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
            let rowCount = $("#accreditation_areas_table tbody tr").length;
            
            row = `<tr id="area${rowCount+1}" class="empty-row">`+
                '<td>'+
                    '<input type="text" name="areas[]" class="form-control new-row" placeholder="Enter accreditation area" />'+
                '</td>'+
                '<td>'+
                    '<select name="levels[]" class="form-control custom-select">'+
                            '<option value="">-- select level --</option>'+
                            '@foreach ($levels as $id => $level)'+
                            '<option value="{{$level}}">{{$level}}</option>'+
                        '@endforeach'+
                        '@error("levels")'+
                            '<span class="text-danger mt-1">{{$message}}</span>'+
                        '@enderror'+
                    '</select>'+
                '</td>'+
                '<td>'+
                    '<select name="statuses[]" class="form-control custom-select license-registration">'+
                            '<option value="">-- select status --</option>'+
                            '@foreach ($application_statuses as $status)'+
                                '<option value="{{$status}}" {{ ($accreditation->status ?? '') == $status ? 'selected' : '' }}>{{$status}}</option>'+
                            '@endforeach'+
                        '@error("statuses")'+
                            '<span class="text-danger mt-1">{{$message}}</span>'+
                        '@enderror'+
                    '</select>'+
                '</td>'+
                '<td><input type="hidden" name="accreditation_ids[]" value=""/></td>'+
            '</tr>';

            $('#accreditation_areas_table tbody').append(row);

            });

            $("#delete_row").click(function(e){
            e.preventDefault();
            let rowCount = $("#accreditation_areas_table tbody tr").length;
            let emptyrows = $("#accreditation_areas_table tbody .empty-row").length;

            if(emptyrows > 0){
                $("#area" + rowCount).remove();
            }
            });

        })
    </script>
@endsection