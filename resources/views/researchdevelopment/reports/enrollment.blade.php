@extends('layouts.admin')
@section('page-title','Enrollment Reports')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Learner Achievements Enrollment</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Learner Achievements Enrollment Reports</h3>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Classification Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.enrollment-reports','classification')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-chart-pie fa-3x text-info mb-1"></i>
                                    <h6>Programmes Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.enrollment-reports','programme')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-chart-pie fa-3x text-info mb-1"></i>
                                    <h6>Field of Educations Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.enrollment-reports','education_field')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-chart-pie fa-3x text-info mb-1"></i>
                                    <h6>Education Level Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.enrollment-reports','level')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-chart-pie fa-3x text-info mb-1"></i>
                                    <h6>LGA/Region Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.enrollment-reports','lga_region')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-chart-pie fa-3x text-info mb-1"></i>
                                    <h6>Sponsors Report</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('researchdevelopment.reports.enrollment-reports','sponsors')}}">
                                    View
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
@endsection
  
