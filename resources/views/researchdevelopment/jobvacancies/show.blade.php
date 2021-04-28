@extends('layouts.admin')
@section('page-title')
    View Job Vacancy Details
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Job Vacancies Data Collection details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.job-vacancies.index')}}">
                                Job vacancies
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Job vacancy data collection details</li>
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
                            <h3 class="card-title">Job Vacancy Data collection details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Position Advertised: </b>
                                        <p class="col-sm-6 text-muted">{{$jobvacancy[0]->position_advertised}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Minimum Required Qualification: </b>
                                        <p class="col-sm-6 text-muted">{{$jobvacancy[0]->minimum_required_qualification}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Minimum Required Job Experience (Years): </b>
                                        <p class="col-sm-6 text-muted">{{$jobvacancy[0]->minimum_required_job_experience}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Field(s) of Study: </b>
                                        @if(!is_null($jobvacancy[0]->fields_of_study))
                                        @foreach ($jobvacancy[0]->fields_of_study as $field)
                                            <span class="badge badge-rounded badge-info m-1">{{$field}}</span>
                                        @endforeach
                                        @else
                                            <p class="col-sm-6 text-muted text-danger">N/A</p>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Region: </b>
                                        <p class="col-sm-6 text-muted">{{$jobvacancy[0]->region->name}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-6 text-primary">Institution: </b>
                                        <p class="col-sm-6 text-muted">{{$jobvacancy[0]->institution}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <a href="{{route('researchdevelopment.job-vacancies.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection