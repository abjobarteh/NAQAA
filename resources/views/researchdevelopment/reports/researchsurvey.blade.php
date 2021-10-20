@extends('layouts.admin')

@section('page-title','Research Survey Reports')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Research or Survey Documentation Reports</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Research survey reports</h3>
            </div>
            
            <div class="card-body">
                <form wire:submit.prevent="getReport">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Research Topic Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.research-survey-reports','research_topic')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Research Purpose Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.research-survey-reports','research_purpose')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Main Findings Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.research-survey-reports','main_findings')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Authors Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.research-survey-reports','authors')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Publication Date Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.research-survey-reports','publication_date')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Funding body Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.research-survey-reports','funding_body')}}">
                                    View
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
