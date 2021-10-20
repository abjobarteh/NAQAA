@extends('layouts.admin')
@section('page-title','New Certificate Endorsements')

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
                                    <h3 class="card-title"><i class="fas fa-plus"></i> New Certificate Endorsement</h3>
                                </div>
                                <div class="col-md-6 d-flex flex-direction-row justify-content-end">
                                    <a href="{{route('assessment-certification.certificate-endorsements.index')}}" class="btn btn-success btn-flat"><i class="fas fa-list"></i> Endorsed Certificates</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('assessment-certification.certificate-endorsements.store')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Institution:</label>
                                            <select name="training_provider_id" id="training_provider_id" class="form-control select2" required>
                                                <option value="">---select institution---</option>
                                                @foreach ($institutions as $id => $institution)
                                                    <option value="{{$id}}" {{ old('training_provider_id') === $id ? 'selected' : ''}}>{{$institution}}</option>
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
                                            <input type="text" class="form-control" name="programme" value="{{ old('programme') }}" required autofocus>
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
                                                    <option value="{{$level}}" {{ old('level') === $id ? 'selected' : ''}}>{{$level}}</option>
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
                                                <input type="text" class="form-control datetimepicker-input" name="programme_start_date" value="{{ old('programme_start_date') }}" data-target="#programme_start_date" required/>
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
                                                <input type="text" class="form-control datetimepicker-input" name="programme_end_date" value="{{ old('programme_end_date') }}" data-target="#programme_end_date" required/>
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
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Total certificates declared: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="total_certificates_declared" value="{{ old('total_certificates_declared') }}" min="0" step="1" required>
                                            @error('total_certificates_declared')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Total certificates received: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="total_certificates_received" value="{{ old('total_certificates_received') }}" min="0" step="1" required>
                                            @error('total_certificates_received')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Total males:</label>
                                            <input type="number" class="form-control" name="total_males" value="{{ old('total_males') }}" min="0" step="1" required>
                                            @error('total_males')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Total females: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="total_females" value="{{ old('total_females') }}" min="0" step="1" required>
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
                                            <input type="number" class="form-control" name="endorsed_certificates" value="{{ old('endorsed_certificates') }}" min="0" step="1" required>
                                            @error('endorsed_certificates')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Total Non-Endorsed certificates: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="non_endorsed_certificates" value="{{ old('non_endorsed_certificates') }}" min="0" step="1" required>
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
                                                                    <th>Module</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr id="trainer0">
                                                                    <td>
                                                                        <input type="text" name="firstnames[]" class="form-control" placeholder="Enter trainer firstname" />
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="middlenames[]" class="form-control" placeholder="Enter trainer middlename" />
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="lastnames[]" class="form-control" placeholder="Enter trainer lastname" />
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="license_nos[]" class="form-control" placeholder="Enter trainer license no" />
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="modules[]" class="form-control" placeholder="Enter module" />
                                                                    </td>
                                                                </tr>
                                                                <tr id="trainer1"></tr>
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
                                            <button class="btn btn-primary mr-1">Save details</button>
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

            let row_number = 1;
            $("#add_row").click(function(e){
            e.preventDefault();
            let new_row_number = row_number - 1;
            $('#trainer' + row_number).html($('#trainer' + new_row_number).html()).find('td:first-child');
            $('#trainers_table').append('<tr id="trainer' + (row_number + 1) + '"></tr>');
            row_number++;
            });

            $("#delete_row").click(function(e){
            e.preventDefault();
            if(row_number > 1){
                $("#trainer" + (row_number - 1)).html('');
                row_number--;
            }
            });
        })

    </script>
@endsection