@extends('layouts.admin')
@section('page-title')
    View Institution Details Data Collection
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">{{$data->trainingprovider->name}} Data Collection details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.datacollection.institution-details.index')}}">
                                Institution details data collection
                            </a>
                        </li>
                        <li class="breadcrumb-item active">{{$data->trainingprovider->name}} data collection details</li>
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
                            <h3 class="card-title">Showing {{$data->trainingprovider->name}} Data Collection details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Training Provider Name: </b>
                                        <p class="col-sm-5 text-muted">{{$data->trainingprovider->name}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Email: </b>
                                        <p class="col-sm-5 text-muted">{{$data->trainingprovider->email}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Phone Number: </b>
                                        <p class="col-sm-5 text-muted">{{$data->trainingprovider->mobile_phone}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Address: </b>
                                        <p class="col-sm-5 text-muted">{{$data->trainingprovider->address}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">P.O Box: </b>
                                        <p class="col-sm-5 text-muted">{{$data->trainingprovider->po_box}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Website: </b>
                                        @if (!is_null($data->trainingprovider->website))
                                            <a href="{{$data->trainingprovider->website}}" target="_blank">{{$data->trainingprovider->website}} <i class="fas fa-external-link-alt"></i></a>   
                                        @else
                                        <p class="col-sm-5 text-muted">N/A</p>
                                        @endif
                                        
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Region: </b>
                                        <p class="col-sm-5 text-muted">{{$data->trainingprovider->region->name}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">District: </b>
                                        <p class="col-sm-5 text-muted">{{$data->trainingprovider->district->name}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Local Goverment Area: </b>
                                        <p class="col-sm-5 text-muted">{{$data->trainingprovider->localgovermentarea->name}}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Financial Source: </b>
                                        <p class="col-sm-5 text-muted">{{$data->financial_source}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Estimated Yearly Turnover: </b>
                                        <p class="col-sm-5 text-muted">{{$data->estimated_yearly_turnover}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Enrollment Capacity: </b>
                                        <p class="col-sm-5 text-muted">{{$data->enrollment_capacity}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">No. of Lecture Rooms: </b>
                                        <p class="col-sm-5 text-muted">{{$data->no_of_lecture_rooms}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">No. of Computer Labs: </b>
                                        <p class="col-sm-5 text-muted">{{$data->no_of_computer_labs}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Total No. of Computers in Labs: </b>
                                        <p class="col-sm-5 text-muted">{{$data->total_no_of_computers_in_labs}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Ownership: </b>
                                        <p class="col-sm-5 text-muted">{{$data->trainingprovider->ownership->name}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Classification: </b>
                                        <p class="col-sm-5 text-muted">{{$data->trainingprovider->classification->name}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <a href="{{route('researchdevelopment.datacollection.institution-details.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection