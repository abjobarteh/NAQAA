@extends('layouts.portal')
@section('title','Show Programme Accreditation')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">Programme Accreditation Application</h4>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                            <a href="{{route('portal.trainer.accreditations.index')}}" class="btn btn-success btn-square mr-1"><i class="fas fa-list"></i> Accreditation Applications</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Trainer Accreditation Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-6">
                                            <div class="form-group row">
                                                <b class="col-sm-7 text-primary">First Name: </b>
                                                <p class="col-sm-5 text-muted">{{$accreditation->trainer->firstname}}</p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-7 text-primary">Middle Name: </b>
                                                <p class="col-sm-5 text-muted">{{$accreditation->trainer->middlename}}</p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-7 text-primary">Last Name: </b>
                                                <p class="col-sm-5 text-muted">{{$accreditation->trainer->lastname}}</p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-7 text-primary">Date of Birth: </b>
                                                <p class="col-sm-5 text-muted">{{$accreditation->trainer->date_of_birth->toFormattedDateString()}}</p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-7 text-primary">Gender: </b>
                                                <p class="col-sm-5 text-muted">{{$accreditation->trainer->gender}}</p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-7 text-primary">Nationality: </b>
                                                <p class="col-sm-5 text-muted">{{$accreditation->trainer->nationality}}</p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-7 text-primary">Tax Identification Number: </b>
                                                <p class="col-sm-5 text-muted">{{$accreditation->trainer->TIN}}</p>
                                            </div>
                                            @if ($accreditation->trainer->nationality === 'Gambia')
                                            <div class="form-group row">
                                                <b class="col-sm-7 text-primary">National Identification Number: </b>
                                                <p class="col-sm-5 text-muted">{{$accreditation->trainer->NIN}}</p>
                                            </div> 
                                            @else
                                            <div class="form-group row">
                                                <b class="col-sm-7 text-primary">Alien Identification Number: </b>
                                                <p class="col-sm-5 text-muted">{{$accreditation->trainer->AIN}}</p>
                                            </div> 
                                            @endif
                                            <div class="form-group row">
                                                <b class="col-sm-7 text-primary">Email: </b>
                                                <p class="col-sm-5 text-muted">{{$accreditation->trainer->email}}</p>
                                            </div> 
                                            <div class="form-group row">
                                                <b class="col-sm-7 text-primary">Address: </b>
                                                <p class="col-sm-5 text-muted">{{$accreditation->trainer->physical_address}}</p>
                                            </div> 
                                            <div class="form-group row">
                                                <b class="col-sm-7 text-primary">Postal Address: </b>
                                                <p class="col-sm-5 text-muted">{{$accreditation->trainer->postal_address ?? 'N/A'}}</p>
                                            </div> 
                                            <div class="form-group row">
                                                <b class="col-sm-7 text-primary">Contact: </b>
                                                <p class="col-sm-5 text-muted">
                                                    {{$accreditation->trainer->phone_home }}<br>
                                                    {{$accreditation->trainer->phone_mobile }}
                                                </p>
                                            </div> 
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-6">
                                            <div class="form-group row">
                                                <b class="col-sm-7 text-primary">Application No: </b>
                                                <p class="col-sm-5 text-muted">{{$accreditation->application_no ?? 'N/A'}}</p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-7 text-primary">Application Date: </b>
                                                <p class="col-sm-5 text-muted">{{$accreditation->application_date->toFormattedDateString() ?? 'N/A'}}</p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-7 text-primary">Application Category: </b>
                                                <p class="col-sm-5 text-muted"><span class="badge badge-primary">{{$registration->application_category ?? 'N/A'}}</span></p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-7 text-primary">Application Type: </b>
                                                <p class="col-sm-5 text-muted"><span class="badge badge-info">{{$registration->application_type ?? 'N/A'}}</span></p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-7 text-primary">Application status: </b>
                                                <p class="col-sm-5 text-muted">{{$accreditation->status ?? 'N/A'}}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card bg-info">
                                                <div class="card-header">
                                                    <h3 class="card-title">Applied Programmes for Accreditation</h3>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Programme Area</th>
                                                                <th>Level</th>
                                                                <th>Status</th>
                                                                <th>Accreditation Start Date</th>
                                                                <th>Accreditation End Date</th>
                                                                <th>Accreditation Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($accreditation->trainerAccreditations as $programme)
                                                                <tr>
                                                                    <td>{{$programme->area}}</td>
                                                                    <td>{{$programme->level}}</td>
                                                                    <td>{{$programme->status}}</td>
                                                                    <td>{{$programme->accreditation_start_date ?? 'N/A'}}</td>
                                                                    <td>{{$programme->accreditation_end_date ?? 'N/A'}}</td>
                                                                    <td>{{$programme->accreditation_status ?? 'N/A'}}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <a href="{{route('portal.trainer.accreditations.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"></i> Back</a>
                                        </div>
                                        <div class="form-group col-6">
                                            <a href="{{route('portal.trainer.accreditations.edit',$accreditation->id)}}" class="btn btn-danger text-white float-right"><i class="fas fa-edit"></i> Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
    </div>
@endsection