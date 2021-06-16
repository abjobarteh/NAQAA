@extends('layouts.admin')
@section('page-title','Edit Certificate Endorsement details')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Certificate Endorsements</h1>
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
                                    <h3 class="card-title text-primary"><i class="fas fa-edit text-danger"></i> Edit Certificate Endorsement</h3>
                                </div>
                                <div class="col-md-6 d-flex flex-direction-row justify-content-end">
                                    <a href="{{route('assessment-certification.certificate-endorsements.index')}}" class="btn btn-success mr-1 btn-flat"><i class="fas fa-list"></i> Endorsed Certificates</a>
                                    <a href="{{route('assessment-certification.certificate-endorsements.create')}}" class="btn btn-success btn-flat"><i class="fas fa-plus"></i> New Certificate Endorsement</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('assessment-certification.certificate-endorsements.update',$endorsement->id)}}" method="post" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Institution:</label>
                                            <select name="training_provider_id" id="training_provider_id" class="form-control select2" required>
                                                <option value="">---select institution---</option>
                                                @foreach ($institutions as $id => $institution)
                                                    <option value="{{$id}}" {{ $endorsement->training_provider_id === $id ? 'selected' : ''}}>{{$institution}}</option>
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
                                            <label>Programme: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="programme" value="{{ $endorsement->programme }}" required autofocus>
                                            @error('programme')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>level: <sup class="text-danger">*</sup></label>
                                            <select name="level" id="level" class="form-control select2" required>
                                                <option value="">---select programme level---</option>
                                                @foreach ($levels as $id => $level)
                                                    <option value="{{$level}}" {{ $endorsement->level === $level ? 'selected' : ''}}>{{$level}}</option>
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
                                            <label>Programme Start Date: <sup class="text-danger">*</sup></label>
                                            <div class="input-group date" id="programme_start_date" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" name="programme_start_date" value="{{ $endorsement->programme_start_date }}" data-target="#programme_start_date" required/>
                                                <div class="input-group-append" data-target="#programme_start_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @error('programme_start_date')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Programme End Date: <sup class="text-danger">*</sup></label>
                                            <div class="input-group date" id="programme_end_date" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" name="programme_end_date" value="{{ $endorsement->programme_end_date }}" data-target="#programme_end_date" required/>
                                                <div class="input-group-append" data-target="#programme_end_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @error('programme_end_date')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Total certificates received: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="total_certificates_received" value="{{ $endorsement->total_certificates_received }}" min="0" step="1" required>
                                            @error('total_certificates_received')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Total males:</label>
                                            <input type="number" class="form-control" name="total_males" value="{{ $endorsement->total_males }}" min="0" step="1" required>
                                            @error('total_males')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Total females: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="total_females" value="{{ $endorsement->total_females }}" min="0" step="1" required>
                                            @error('total_females')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Total Endorsed certificates: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="endorsed_certificates" value="{{ $endorsement->endorsed_certificates }}" min="0" step="1" required>
                                            @error('endorsed_certificates')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Total Non-Endorsed certificates: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="non_endorsed_certificates" value="{{ $endorsement->non_endorsed_certificates }}" min="0" step="1" required>
                                            @error('non_endorsed_certificates')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header bg-secondary">
                                                <h3 class="card-title">Trainers</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <table class="table" id="trainers_table">
                                                            <thead>
                                                                <tr>
                                                                    <th>First name</th>
                                                                    <th>Midldle name</th>
                                                                    <th>Last name</th>
                                                                    <th>License No</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($endorsement->trainer_details as $trainer)
                                                                    <tr id="trainer{{$loop->index}}">
                                                                        <td>
                                                                            <input type="text" name="firstnames[]" class="form-control" value="{{$trainer->firstname}}" placeholder="Enter trainer firstname" />
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="middlenames[]" class="form-control" value="{{$trainer->middlename}}" placeholder="Enter trainer middlename" />
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="lastnames[]" class="form-control" value="{{$trainer->lastname}}" placeholder="Enter trainer lastname" />
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" name="license_nos[]" class="form-control" value="{{$trainer->license_no}}" placeholder="Enter trainer license no" />
                                                                        </td>  
                                                                    </tr>
                                                                @endforeach
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
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary float-right mr-1">Save details</button>
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
            $('#programme_start_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $('#programme_end_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            $("#add_row").click(function(e){
            e.preventDefault();
            let rowCount = $("#trainers_table tbody tr").length;
            
            row = `<tr id="trainer${rowCount+1}" class="empty-row">`+
                    '<td>'+
                        '<input type="text" name="firstnames[]" class="form-control" placeholder="Enter trainer firstname" />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" name="middlenames[]" class="form-control" placeholder="Enter trainer middlename" />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" name="lastnames[]" class="form-control" placeholder="Enter trainer lastname" />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" name="license_nos[]" class="form-control" placeholder="Enter trainer license no" />'+
                    '</td>'+  
                '</tr>';

            $('#trainers_table tbody').append(row);

            });

            $("#delete_row").click(function(e){
            e.preventDefault();
            let rowCount = $("#trainers_table tbody tr").length;
            let emptyrows = $("#trainers_table tbody .empty-row").length;

            if(emptyrows > 0){
                $("#trainer" + rowCount).remove();
            }
            });
        })
    </script>
@endsection