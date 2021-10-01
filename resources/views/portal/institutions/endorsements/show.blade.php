@extends('layouts.portal')
@section('title','View Certificate Endorsement Request')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">Certificate Endorsement Request</h4>
                        </div>
                        <div class="col-md-6 d-flex flex-direction-row justify-content-end">
                            <a href="{{route('portal.institution.certificate-endorsements.index')}}" class="btn btn-success btn-square mr-1"><i class="fas fa-list"></i> Endorsed Certificates</a>
                            <a href="{{route('portal.institution.certificate-endorsements.create')}}" class="btn btn-success btn-square mr-1"><i class="fas fa-plus"></i> New Endorsement Request </a>
                            <a href="{{route('portal.institution.certificate-endorsements.edit',$endorsement->id)}}" class="btn btn-danger btn-square"><i class="fas fa-edit"></i> Edit </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Programme: <sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control" name="programme" value="{{ $endorsement->programme }}">
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
                                <input class="form-control" id="programme_start_date" type="date" name="programme_start_date" value="{{$endorsement->programme_start_date->toDateString()}}"><span class="help-block">Please enter a valid date</span>
                                @error('programme_start_date')
                                    <span class="text-danger mt-1">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Programme End Date: <sup class="text-danger">*</sup></label>
                                <input class="form-control" id="programme_end_date" type="date" name="programme_end_date" value="{{$endorsement->programme_end_date->toDateString()}}"><span class="help-block">Please enter a valid date</span>
                                @error('programme_end_date')
                                    <span class="text-danger mt-1">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Total certificates: <sup class="text-danger">*</sup></label>
                                <input type="number" class="form-control" name="total_certificates" value="{{ $endorsement->total_certificates }}" min="0" step="1" required>
                                @error('total_certificates')
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
                                                    <tr id="trainer1"></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
