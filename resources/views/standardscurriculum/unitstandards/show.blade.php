@extends('layouts.admin')
@section('page-title')
    View Unit Standard
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">View Unit Standard details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('standardscurriculum.unit-standards.index')}}">
                                Student data collection
                            </a>
                        </li>
                        <li class="breadcrumb-item active">view Student  data collection details</li>
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
                            <h3 class="card-title">Showing {{$unitstandard[0]->full_name}} Data Collection details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Qaulification: </b>
                                        <p class="col-sm-6 text-muted">{{$unitstandard[0]->qualification->name ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Unit Standard Title: </b>
                                        <p class="col-sm-6 text-muted">{{$unitstandard[0]->unit_standard_title}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Unit Standard Code: </b>
                                        <p class="col-sm-6 text-muted">{{$unitstandard[0]->unit_standard_code}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Field of Education : </b>
                                        <p class="col-sm-6 text-muted">{{$unitstandard[0]->fieldOfEducation->name}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Sub-Field of Education: </b>
                                        <p class="col-sm-6 text-muted">{{$unitstandard[0]->subFieldOfEducation->name ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">NQF/GSQF Level: </b>
                                        <p class="col-sm-6 text-muted">{{$unitstandard[0]->levelOfQualification->name}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Minimum Hours Required For the Unit Standard: </b>
                                        <p class="col-sm-6 text-muted">{{$unitstandard[0]->minimum_required_hours}}</p>
                                    </div> 
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Developed By (Stakeholders Involved): </b>
                                        @if (isset($unitstandard[0]->developed_by_stakeholders))
                                        @foreach($unitstandard[0]->developed_by_stakeholders as $stakeholder)
                                            <span class="badge rounded-pill bg-success m-1">{{$stakeholder}}</span>    
                                        @endforeach  
                                        @else
                                            <p class="col-sm-6 text-muted">N/A</p> 
                                        @endif
                                    </div> 
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Validated: </b>
                                        <p class="col-sm-6 text-muted">{{$unitstandard[0]->validated}}</p>
                                    </div> 
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Validation Date: </b>
                                        <p class="col-sm-6 text-muted">{{$unitstandard[0]->validation_date}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Stakeholders Involved in Validation: </b>
                                        @if (isset($unitstandard[0]->validated_by_stakeholders))
                                        @foreach($unitstandard[0]->validated_by_stakeholders as $stakeholder)
                                            <span class="badge rounded-pill bg-info m-1">{{$stakeholder}}</span>    
                                        @endforeach  
                                        @else
                                            <p class="col-sm-6 text-muted">N/A</p> 
                                        @endif
                                    </div> 
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Last Review Date: </b>
                                        @if ($unitstandard[0]->UnitStandardReviews()->exists())   
                                            <p class="col-sm-6 text-muted">{{$unitstandard[0]->UnitStandardReviews->review_date}}</p>
                                        @else
                                           <P class="col-sm-6 text-muted">{{'N/A'}} </P>
                                        @endif
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <a href="{{route('standardscurriculum.unit-standards.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection