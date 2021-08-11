@extends('layouts.portal')
@section('title','Show Programmes offered Datacollection')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">View Programmes Offered Datacollection details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Program Name: </b>
                                <p class="col-sm-7 text-muted">{{$programdetail->programme->programme_title}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Field of Education: </b>
                                <p class="col-sm-7 text-muted">{{$programdetail->programme->fieldOfEducation->name}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Duration (in Months): </b>
                                <p>{{$programdetail->duration}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Tuition Fee Per Year: </b>
                                <p class="col-sm-7 text-muted">{{$programdetail->tuition_fee_per_year}}</p>
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <a href="{{route('portal.institution.datacollection.programmes.index')}}" class="btn btn-warning text-white">
                              <i class="fas fa-arrow-left"></i>  Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection