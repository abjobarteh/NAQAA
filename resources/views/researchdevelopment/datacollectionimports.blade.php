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
            <h1 class="m-0">DataCollection Imports</h1>
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
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('researchdevelopment.datacollection.datacollection-imports.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for="customFile">Datacollection Template:</label>
                                <div class="form-group">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="excelfile" name="excelfile">
                                      <label class="custom-file-label" for="customFile">upload excel file</label>
                                    </div>
                                    @error('excelfile')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                      <button class="btn btn-primary"><i class="fas fa-upload"></i> Upload</button>
                                  </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
