@extends('layouts.admin')
@section('page-title')
    View Program Details Data Collection
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">View Data Collection details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.datacollection.program-details.index')}}">
                                Program details data collection
                            </a>
                        </li>
                        <li class="breadcrumb-item active">view data collection details</li>
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
                            <h3 class="card-title">View Data Collection details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Program Name: </b>
                                        <p class="col-sm-7 text-muted">{{$programdetail->programmeDetails->programme->name ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Field of Education: </b>
                                        <p class="col-sm-7 text-muted">{{$programdetailprogrammeDetails->programme->fieldOfEducation->name ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Duration (in Months): </b>
                                        <p>{{$programdetail->duration}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Tuition Fee Per Year: </b>
                                        <p class="col-sm-7 text-muted">D{{$programdetail->tuition_fee_per_year}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Entry Requirements: </b>
                                        @if (isset($programdetail->entry_requirements))
                                            @foreach($programdetail->entry_requirements as $req)
                                                <span class="btn btn-sm btn-success m-1">{{$req}}</span>    
                                            @endforeach  
                                        @else
                                            <p class="col-sm-7 text-muted">N/A</p> 
                                        @endif
                                        
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Awarding Body: </b>
                                        <p class="col-sm-7 text-muted">{{$programdetail->awarding_body ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Learning Center: </b>
                                        <p class="col-sm-7 text-muted">{{$programdetail->programmeDetails->trainingprovider->name ?? 'N/A'}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <a href="{{route('researchdevelopment.datacollection.program-details.index')}}" class="btn btn-warning text-white">
                                      <i class="fas fa-arrow-left"></i>  Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection