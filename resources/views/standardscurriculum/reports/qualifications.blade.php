@extends('layouts.admin')

@section('page-title','Qualification Reports')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Qualification Reports</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Qualification reports</h3>
            </div>
            
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Field of Education</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('standardscurriculum.reports.qualification-reports','field_of_education')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Level</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('standardscurriculum.reports.qualification-reports','level')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Entry Requiremenets</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('standardscurriculum.reports.qualification-reports','entry_requirements')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Mode of Delivery</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('standardscurriculum.reports.qualification-reports','mode_of_delivery')}}">
                                    View
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card p-3">
                                <div class="d-flex flex-column align-items-center mb-3">
                                    <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                    <h6>Minimum Duration (Months)</h6>
                                </div>
                                <a class="btn btn-primary btn-flat btn-block" href="{{route('standardscurriculum.reports.qualification-reports','minimum_duration')}}">
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