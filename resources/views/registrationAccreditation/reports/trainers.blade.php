@extends('layouts.admin')

@section('page-title','Registered Trainer Reports')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Registered Trainer Reports</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Registered Trainer reports</h3>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-3">
                            <div class="d-flex flex-column align-items-center mb-3">
                                <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                <h6>Highest Qualification</h6>
                            </div>
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('registration-accreditation.reports.registered-trainer-reports','highest_qualification')}}">
                                View
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-3">
                            <div class="d-flex flex-column align-items-center mb-3">
                                <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                <h6>Nationality</h6>
                            </div>
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('registration-accreditation.reports.registered-trainer-reports','nationality')}}">
                                View
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-3">
                            <div class="d-flex flex-column align-items-center mb-3">
                                <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                <h6>Field of Education</h6>
                            </div>
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('registration-accreditation.reports.registered-trainer-reports','field_of_education')}}">
                                View
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-3">
                            <div class="d-flex flex-column align-items-center mb-3">
                                <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                <h6>Accredited Programmes/Levels</h6>
                            </div>
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('registration-accreditation.reports.registered-trainer-reports','accredited_programmes')}}">
                                View
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-3">
                            <div class="d-flex flex-column align-items-center mb-3">
                                <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                <h6>Region</h6>
                            </div>
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('registration-accreditation.reports.registered-trainer-reports','region')}}">
                                View
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-3">
                            <div class="d-flex flex-column align-items-center mb-3">
                                <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                <h6>License Status</h6>
                            </div>
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('registration-accreditation.reports.registered-trainer-reports','license_status')}}">
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