@extends('layouts.admin')

@section('page-title','Learning Center Reports')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Learning Center Reports</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Learning Center reports</h3>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-3">
                            <div class="d-flex flex-column align-items-center mb-3">
                                <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                <h6>Classification</h6>
                            </div>
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('registration-accreditation.reports.learning-center-reports','classification')}}">
                                View
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-3">
                            <div class="d-flex flex-column align-items-center mb-3">
                                <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                <h6>Ownership</h6>
                            </div>
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('registration-accreditation.reports.learning-center-reports','ownership')}}">
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
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('registration-accreditation.reports.learning-center-reports','accredited_programmes')}}">
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
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('registration-accreditation.reports.learning-center-reports','region')}}">
                                View
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-3">
                            <div class="d-flex flex-column align-items-center mb-3">
                                <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                <h6>District</h6>
                            </div>
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('registration-accreditation.reports.learning-center-reports','district')}}">
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