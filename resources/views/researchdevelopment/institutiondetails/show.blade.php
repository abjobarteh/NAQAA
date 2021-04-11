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
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Training Provider Name: </label>
                                        <h5>{{$data[0]->training_provider_name}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Email: </label>
                                        <h5>{{$data[0]->email}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Phone Number: </label>
                                        <h5>{{$data[0]->phone}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Address: </label>
                                        <h5>{{$data[0]->address}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">P.O Box: </label>
                                        <h5>{{$data[0]->po_box}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Website: </label>
                                        @if (!is_null($data[0]->website))
                                            <a href="{{$data[0]->website}}" target="_blank">{{$data[0]->website}} <i class="fas fa-external-link-alt"></i></a>   
                                        @else
                                        <h5>N/A</h5>
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Financial Source: </label>
                                        <h5>{{$data[0]->financial_source}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Estimated Yearly Turnover: </label>
                                        <h5>{{$data[0]->estimated_yearly_turnover}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Enrollment Capacity: </label>
                                        <h5>{{$data[0]->enrollment_capacity}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">No. of Lecture Rooms: </label>
                                        <h5>{{$data[0]->no_of_lecture_rooms}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">No. of Computer Labs: </label>
                                        <h5>{{$data[0]->no_of_computer_labs}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Total No. of Computers in Labs: </label>
                                        <h5>{{$data[0]->total_no_of_computers_in_labs}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Ownership: </label>
                                        <h5>{{$data[0]->ownership->name}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Classification: </label>
                                        <h5>{{$data[0]->classification->name}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">District: </label>
                                        <h5>{{$data[0]->district->name}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Local Goverment Area: </label>
                                        <h5>{{$data[0]->localgovermentarea->name}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection