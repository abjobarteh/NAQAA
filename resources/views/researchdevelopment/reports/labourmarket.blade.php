@extends('layouts.admin')

@section('page-title','Labour Market Reports')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Labour Market Reports</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Labour Market reports</h3>
            </div>
            
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Position Advertised Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.labour-market-reports','position_advertised')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Job Status Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.labour-market-reports','job_status')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Employer Type Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.labour-market-reports','employer_type')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Minimum Qualification Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.labour-market-reports','minimum_qualification')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Field of Education Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.labour-market-reports','field_of_education')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Occupational Area Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.labour-market-reports','occupational_area')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Work Experience Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.labour-market-reports','work_experience')}}">
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
