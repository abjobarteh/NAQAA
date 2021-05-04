@extends('layouts.admin')
@section('page-title')
    View Trainer Registration Details
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Trainer Registration Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('registration-accreditation.registration.trainers.index')}}">
                                Trainers
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Registration Details</li>
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
                            <h3 class="card-title">Trainer Registration Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">First Name: </b>
                                        <p class="col-sm-5 text-muted">{{$trainer->firstname}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Middle Name: </b>
                                        <p class="col-sm-5 text-muted">{{$trainer->middlename}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Last Name: </b>
                                        <p class="col-sm-5 text-muted">{{$trainer->lastname}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Date of Birth: </b>
                                        <p class="col-sm-5 text-muted">{{$trainer->date_of_birth}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Gender: </b>
                                        <p class="col-sm-5 text-muted">{{$trainer->gender}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Nationality: </b>
                                        <p class="col-sm-5 text-muted">{{$trainer->nationality}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Tax Identification Number: </b>
                                        <p class="col-sm-5 text-muted">{{$trainer->TIN}}</p>
                                    </div>
                                    @if ($trainer->nationality === 'Gambia')
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">National Identification Number: </b>
                                        <p class="col-sm-5 text-muted">{{$trainer->NIN}}</p>
                                    </div> 
                                    @else
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Alien Identification Number: </b>
                                        <p class="col-sm-5 text-muted">{{$trainer->AIN}}</p>
                                    </div> 
                                    @endif
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Email: </b>
                                        <p class="col-sm-5 text-muted">{{$trainer->email}}</p>
                                    </div> 
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Address: </b>
                                        <p class="col-sm-5 text-muted">{{$trainer->physical_address}}</p>
                                    </div> 
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Postal Address: </b>
                                        <p class="col-sm-5 text-muted">{{$trainer->postal_address ?? 'N/A'}}</p>
                                    </div> 
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Contact: </b>
                                        <p class="col-sm-5 text-muted">{{$trainer->phone_home }}<br>{{$trainer->phone_mobile }}</p>
                                    </div> 
                                </div>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Application No: </b>
                                        <p class="col-sm-5 text-muted">{{$trainer->applications[0]->application_no ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Application Date: </b>
                                        <p class="col-sm-5 text-muted">{{$trainer->applications[0]->application_date ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Application Category: </b>
                                        <p class="col-sm-5 text-muted">{{$trainer->applications[0]->application_category ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Application Type: </b>
                                        <p class="col-sm-5 text-muted">{{$trainer->applications[0]->application_type ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Application status: </b>
                                        <p class="col-sm-5 text-muted">{{$trainer->applications[0]->status ?? 'N/A'}}</p>
                                    </div>
                                    @if($trainer->applications[0]->status === 'accepted')
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Licence Start Date: </b>
                                            <p class="col-sm-5 text-muted">{{$trainer->licences[0]->licence_start_date ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Licence Ends Date: </b>
                                            <p class="col-sm-5 text-muted">{{$trainer->licences[0]->licence_end_date ?? 'N/A'}}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <a href="{{route('registration-accreditation.registration.trainers.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection