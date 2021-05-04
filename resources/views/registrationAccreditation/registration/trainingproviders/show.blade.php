@extends('layouts.admin')
@section('page-title')
    View Training provider Registration Details
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Training Provider Registration Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('registration-accreditation.registration.trainingproviders.index')}}">
                                Training provider registrations
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
                            <h3 class="card-title">Training Provider Registration Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Training Provider Name: </b>
                                        <p class="col-sm-5 text-muted">{{$trainingprovider->name}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Physical Address: </b>
                                        <p class="col-sm-5 text-muted">{{$trainingprovider->physical_address}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Location: </b>
                                        <p class="col-sm-5 text-muted">{{$trainingprovider->region->name ?? 'N/A'}},
                                            {{$trainingprovider->district->name ?? 'N/A'}}, {{$trainingprovider->townvillage->name ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Telephone (work): </b>
                                        <p class="col-sm-5 text-muted">{{$trainingprovider->telephone_work}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Telephone (home): </b>
                                        <p class="col-sm-5 text-muted">
                                            Mobile Phone: {{$trainingprovider->mobile_phone}} <br>
                                            Fax: {{$trainingprovider->fax}}
                                        </p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Website: </b>
                                        @if (!is_null($trainingprovider->website))
                                            <a href="{{$trainingprovider->website}}" target="_blank">{{$trainingprovider->website}} <i class="fas fa-external-link-alt"></i></a>   
                                        @else
                                            <p class="col-sm-5 text-muted">N/A</p>
                                        @endif    
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Email: </b>
                                        <p class="col-sm-5 text-muted">{{$trainingprovider->email}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Category: </b>
                                        <p class="col-sm-5 text-muted">{{$trainingprovider->category->name ?? 'N/A'}}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Application No: </b>
                                        <p class="col-sm-5 text-muted">{{$trainingprovider->applications[0]->application_no ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Application Date: </b>
                                        <p class="col-sm-5 text-muted">{{$trainingprovider->applications[0]->application_date ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Application Category: </b>
                                        <p class="col-sm-5 text-muted">{{$trainingprovider->applications[0]->application_category ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Application Type: </b>
                                        <p class="col-sm-5 text-muted">{{$trainingprovider->applications[0]->application_type ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Application status: </b>
                                        <p class="col-sm-5 text-muted">{{$trainingprovider->applications[0]->status ?? 'N/A'}}</p>
                                    </div>
                                    @if($trainingprovider->applications[0]->status === 'accepted')
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Licence Start Date: </b>
                                            <p class="col-sm-5 text-muted">{{$trainingprovider->licences[0]->licence_start_date ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Licence Ends Date: </b>
                                            <p class="col-sm-5 text-muted">{{$trainingprovider->licences[0]->licence_end_date ?? 'N/A'}}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <a href="{{route('registration-accreditation.registration.trainingproviders.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection