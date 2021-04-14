@extends('layouts.admin')
@section('page-title')
    View Institution Details Data Collection
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">{{$data[0]->training_provider_name}} Data Collection details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.datacollection.institution-details.index')}}">
                                Institution details data collection
                            </a>
                        </li>
                        <li class="breadcrumb-item active">{{$data[0]->training_provider_name}} data collection details</li>
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
                            <h3 class="card-title">Showing {{$data[0]->training_provider_name}} Data Collection details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Training Provider Name: </b>
                                        <p class="col-sm-5 text-muted">{{$data[0]->training_provider_name}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Email: </b>
                                        <p class="col-sm-5 text-muted">{{$data[0]->email}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Phone Number: </b>
                                        <p class="col-sm-5 text-muted">{{$data[0]->phone}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Address: </b>
                                        <p class="col-sm-5 text-muted">{{$data[0]->address}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">P.O Box: </b>
                                        <p class="col-sm-5 text-muted">{{$data[0]->po_box}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Website: </b>
                                        @if (!is_null($data[0]->website))
                                            <a href="{{$data[0]->website}}" target="_blank">{{$data[0]->website}} <i class="fas fa-external-link-alt"></i></a>   
                                        @else
                                        <p class="col-sm-5 text-muted">N/A</p>
                                        @endif
                                        
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Region: </b>
                                        <p class="col-sm-5 text-muted">{{$data[0]->regionName->name}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">District: </b>
                                        <p class="col-sm-5 text-muted">{{$data[0]->district->name}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Local Goverment Area: </b>
                                        <p class="col-sm-5 text-muted">{{$data[0]->localgovermentarea->name}}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Financial Source: </b>
                                        <p class="col-sm-5 text-muted">{{$data[0]->financial_source}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Estimated Yearly Turnover: </b>
                                        <p class="col-sm-5 text-muted">{{$data[0]->estimated_yearly_turnover}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Enrollment Capacity: </b>
                                        <p class="col-sm-5 text-muted">{{$data[0]->enrollment_capacity}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">No. of Lecture Rooms: </b>
                                        <p class="col-sm-5 text-muted">{{$data[0]->no_of_lecture_rooms}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">No. of Computer Labs: </b>
                                        <p class="col-sm-5 text-muted">{{$data[0]->no_of_computer_labs}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Total No. of Computers in Labs: </b>
                                        <p class="col-sm-5 text-muted">{{$data[0]->total_no_of_computers_in_labs}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Ownership: </b>
                                        <p class="col-sm-5 text-muted">{{$data[0]->ownership->name}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-7 text-primary">Classification: </b>
                                        <p class="col-sm-5 text-muted">{{$data[0]->classification->name}}</p>
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