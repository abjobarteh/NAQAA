@extends('layouts.systemadmin')

@section('content')
     <!-- Content Header (Page header) -->
     <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>NAQAA Settings</h3>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header -->
    <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('systemadmin.institution-categories.index') }}">
                            <div class="card card-primary card-outline">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <img src="/img/institution_icon.svg" alt="" class="rounded-circle" style="width: 100px; height: 100px">
                                    <h6>Institution categories</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('systemadmin.institution-types.index') }}">
                            <div class="card card-primary card-outline">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <img src="/img/school-building.svg" alt="" class="rounded-circle" style="width: 100px; height: 100px">
                                    <h6>Institution Types</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('systemadmin.program-levels.index') }}">
                            <div class="card card-primary card-outline">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <img src="/img/program-levels.svg" alt="" class="rounded-circle" style="width: 100px; height: 100px">
                                    <h6>Program Levels</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('systemadmin.program-categories.index') }}">
                            <div class="card card-primary card-outline">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <img src="/img/program-levels.svg" alt="" class="rounded-circle" style="width: 100px; height: 100px">
                                    <h6>Program Categories</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
    </section>
@endsection