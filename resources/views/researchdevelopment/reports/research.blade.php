@extends('layouts.admin')
@section('page-title')
    Research Survey Report Generation
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Reports Generation for Learners</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Research survey reports Generation for indicators</h3>
                </div>
                
                <div class="card-body">
                    <form action="{{route('researchdevelopment.reports.research-report-generation')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="research_topic">Research Topic</label>
                                    <input type="text" class="form-control" id="research_topic" name="research_topic" placeholder="Research topic">
                                    @error('research_topic')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="research_purpose">Research Purpose</label>
                                    <input type="text" class="form-control" id="research_purpose" name="research_purpose" placeholder="Research purpose">
                                    @error('research_purpose')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="main_findings">Main Findings</label>
                                    <input type="text" class="form-control" id="main_findings" name="main_findings" placeholder="main findings">
                                    @error('main_findings')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="authors">Research Authors</label>
                                    <input type="text" class="form-control" id="Authors" name="authors" placeholder="Research authors">
                                    @error('authors')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="publication_date">Publication Date</label>
                                    <input type="text" class="form-control" id="publication_date" name="publication_date" placeholder="Publication date">
                                    @error('publication_date')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="funding_body">Research Purpose</label>
                                    <input type="text" class="form-control" id="funding_body" name="funding_body" placeholder="Funding body">
                                    @error('funding_body')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <div class="form-group">
                                    <button class="btn btn-success btn-flat"><i class="fas fa-file-export"></i> Generate Report</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
