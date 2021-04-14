@extends('layouts.admin')
@section('page-title')
    View Academic&Admin Staff Details Data Collection
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Academic&Admin Staff Data Collection details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.datacollection.academicadminstaff-details.index')}}">
                                Academic&Admin staff data collection
                            </a>
                        </li>
                        <li class="breadcrumb-item active">view Academic&Admin staff  data collection details</li>
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
                            <h3 class="card-title">Showing {{$staffdetail[0]->full_name}} Data Collection details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Full Name: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail[0]->full_name}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Qualifications: </b>
                                        @if (isset($staffdetail[0]->qualifications))
                                        @foreach($staffdetail[0]->qualifications as $qualification)
                                            <span class="btn btn-sm btn-success m-1">{{$qualification}}</span>    
                                        @endforeach  
                                        @else
                                            <p class="col-sm-7 text-muted">N/A</p> 
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Specialisation: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail[0]->specialisation}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Rank: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail[0]->rank->name ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Role: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail[0]->role->name ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Main Teaching Field of Study: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail[0]->main_teaching_field_of_study ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Secondary Teaching Field of Study: </b>
                                        @if (isset($staffdetail[0]->secondary_teaching_fields_of_study))
                                            @foreach($staffdetail[0]->secondary_teaching_fields_of_study as $field)
                                                <span class="btn btn-sm btn-info m-1">{{$field}}</span>    
                                            @endforeach  
                                        @else
                                            <p class="col-sm-7 text-muted">N/A</p> 
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <a href="{{route('researchdevelopment.datacollection.academicadminstaff-details.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection