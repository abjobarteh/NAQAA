@extends('layouts.portal')
@section('title','Request Certificate Endorsements')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">New Certificate Endorsement Request</h4>
                        </div>
                        <div class="col-md-6 d-flex flex-direction-row justify-content-end">
                            <a href="{{route('portal.institution.certificate-endorsements.index')}}" class="btn btn-success btn-square"><i class="fas fa-list"></i> Endorsed Certificates</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('portal.institution.certificate-endorsements.store')}}" method="post" autocomplete="off">
                        @csrf
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
                                    <select name="level" id="level" class="form-control custom-select" required>
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
                                    <input class="form-control" id="date-input" type="date" name="programme_start_date" value="{{old('programme_start_date')}}"><span class="help-block">Please enter a valid date</span>
                                    @error('programme_start_date')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Programme End Date: <sup class="text-danger">*</sup></label>
                                    <input class="form-control" id="date-input" type="date" name="programme_end_date" value="{{old('programme_end_date')}}"><span class="help-block">Please enter a valid date</span>
                                    @error('programme_end_date')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Total certificates declared: <sup class="text-danger">*</sup></label>
                                    <input type="number" class="form-control" name="total_certificates_declared" value="{{ old('total_certificates_declared') }}" min="0" step="1" required>
                                    @error('total_certificates_declared')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Total males:</label>
                                    <input type="number" class="form-control" name="total_males" value="{{ old('total_males') }}" min="0" step="1" required>
                                    @error('total_males')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
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
                                                        </tr>
                                                        <tr id="trainer1"></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-12">
                                                <button id="add_row" class="btn btn-primary pull-left">+ Add Row</button>
                                                <button id='delete_row' class="float-right btn btn-danger">- Delete Row</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 d-flex justify-content-center">
                                <button type="submit" id="submit" class="btn btn-success btn-square btn-lg">Submit Request</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
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