@extends('layouts.admin')
@section('page-title')
    View Qualification
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">View Qualification details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('standardscurriculum.unit-standards.index')}}">
                                Qualifications
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Qualification details</li>
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
                            <h3 class="card-title">{{$qualification->name}}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Qualification Name: </b>
                                        <p class="col-sm-6 text-muted">{{$qualification->name ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Qualification Code: </b>
                                        <p class="col-sm-6 text-muted">{{$qualification->qualification_code ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Tuition Fee: </b>
                                        <p class="col-sm-6 text-muted">{{$qualification->tuition_fee ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Minimum Duration (months): </b>
                                        <p class="col-sm-6 text-muted">{{$qualification->minimum_duration}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Mode of Delivery : </b>
                                        <p class="col-sm-6 text-muted">{{$qualification->mode_of_delivery}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">NQF/GSQF Level: </b>
                                        <p class="col-sm-6 text-muted">{{$qualification->level->name}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Entry Requirements: </b>
                                        @if (isset($qualification->entry_requirements))
                                        @foreach($qualification->entry_requirements as $req)
                                            <span class="badge badge-primary badge-rounded m-1">{{$req}}</span>    
                                        @endforeach  
                                        @else
                                            <p class="col-sm-6 text-muted">N/A</p> 
                                        @endif
                                    </div> 
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Field of Education: </b>
                                        <p class="col-sm-6 text-muted">{{$qualification->fieldOfEducation->name}}</p>
                                    </div> 
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Sub-field of Education: </b>
                                        <p class="col-sm-6 text-muted">{{$qualification->subfieldOfEducation->name ?? 'N/A'}}</p>
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <a href="{{route('standardscurriculum.qualifications.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection