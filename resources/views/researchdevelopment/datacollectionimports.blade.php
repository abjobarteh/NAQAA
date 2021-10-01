@extends('layouts.admin')
@section('page-title')
    Datacollection Import
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">DataCollection Import Center</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container">
            <div class="card h-100">
                <div class="card-header">
                    <h3 class="card-title">DataCollection Import</h3>
                </div>
                
                <div class="card-body">
                    <form action="{{route('researchdevelopment.datacollection-imports.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="excelFile">upload excel file</label>
                                    <input type="file" class="form-control" id="excelFile" name="excelFile">
                                    @error('excelFile')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="table_type">Import for:</label>
                                <select name="table_type" id="table_type" class="form-control select2">
                                    <option value="">--- select table to import to ---</option>
                                    <option value="job_vacancy">Job Vacancies information</option>
                                    <option value="institution_datacollection">Institutions Datacollection</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-2">
                                    <button class="btn btn-success btn-block btn-flat"><i class="fas fa-upload"></i> Import</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
