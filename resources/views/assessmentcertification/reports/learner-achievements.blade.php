@extends('layouts.admin')

@section('page-title','Assessment Certification Reports')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Assessment & Certification Reports</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Assessment Certification reports</h3>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-3">
                            <div class="d-flex flex-column align-items-center mb-3">
                                <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                <h6>Training Institution Type</h6>
                            </div>
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('assessment-certification.learner-achievement-reports','institution_type')}}">
                                View
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-3">
                            <div class="d-flex flex-column align-items-center mb-3">
                                <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                <h6>Programme</h6>
                            </div>
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('assessment-certification.learner-achievement-reports','programme')}}">
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
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('assessment-certification.learner-achievement-reports','field_of_education')}}">
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
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('assessment-certification.learner-achievement-reports','level')}}">
                                View
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-3">
                            <div class="d-flex flex-column align-items-center mb-3">
                                <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                <h6>Qualification Type</h6>
                            </div>
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('assessment-certification.learner-achievement-reports','qualification_type')}}">
                                View
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-3">
                            <div class="d-flex flex-column align-items-center mb-3">
                                <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                <h6>Certification Status</h6>
                            </div>
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('assessment-certification.learner-achievement-reports','certification_status')}}">
                                View
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-3">
                            <div class="d-flex flex-column align-items-center mb-3">
                                <i class="fas fa-project-diagram fa-3x text-info mb-1"></i>
                                <h6>Local Goverment Area</h6>
                            </div>
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('assessment-certification.learner-achievement-reports','lga')}}">
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
                            <a class="btn btn-primary btn-flat btn-block" href="{{route('assessment-certification.learner-achievement-reports','region')}}">
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