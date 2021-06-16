@extends('layouts.portal')
@section('title','Edit Programme Accreditation')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">Edit Trainer Accreditation Application</h4>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                            <a href="{{route('portal.trainer.accreditations.index')}}" class="btn btn-success btn-square mr-1"><i class="fas fa-list"></i> Accreditation Applications</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('portal.trainer.accreditations.update',$accreditation->id)}}" method="post" autocomplete="off">
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
                                        <input type="text" class="form-control" value="{{ $accreditation->trainer->firstname }} .{{ $accreditation->trainer->middlename }}. {{ $accreditation->trainer->lastname }}" required readonly />
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
                                            <input type="date" class="form-control datetimepicker-input" name="application_date" value="{{ $accreditation->application_date }}" data-target="#application_date"/>
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
                                            <input type="date" class="form-control datetimepicker-input license-registration" name="accreditation_start_date" value="{{ $accreditation->trainerAccreditations[0]->accreditation_start_date ?? '' }}" data-target="#accreditation_start_date"/>
                                            @error('accreditation_start_date')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Accreditation End Date: <sup class="text-danger">*</sup></label>
                                            <input type="date" class="form-control datetimepicker-input license-registration" name="accreditation_end_date" value="{{ $accreditation->trainerAccreditations[0]->accreditation_end_date }} ?? ''" data-target="#accreditation_end_date"/>
                                            @error('accreditation_end_date')
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
                                                                <th>Programme</th>
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
                                                                            <option value="accepted" {{$programme->status === 'accepted' ? 'selected' : ''}}>Accepted</option>
                                                                            <option value="rejected" {{$programme->status === 'rejected' ? 'selected' : ''}}>Rejected</option>
                                                                            <option value="pending" {{$programme->status === 'pending' ? 'selected' : ''}}>Pending</option>
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
                                    <a href="{{route('portal.trainer.accreditations.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
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
                            '<option value="accepted">Accepted</option>'+
                            '<option value="rejected">Rejected</option>'+
                            '<option value="pending">Pending</option>'+
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