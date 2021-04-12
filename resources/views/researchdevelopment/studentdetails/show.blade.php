@extends('layouts.admin')
@section('page-title')
    View Student Details Data Collection
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Student Data Collection details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.datacollection.student-details.index')}}">
                                Student data collection
                            </a>
                        </li>
                        <li class="breadcrumb-item active">view Student  data collection details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Showing {{$student[0]->full_name}} Data Collection details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Student Detail Data Collection Type: </label>
                                        <h5>{{$student[0]->studentdetail_type}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Full Name: </label>
                                        <h5>{{$student[0]->full_name}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Gender: </label>
                                        <h5>{{$student[0]->gender}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Phone Number: </label>
                                        <h5>{{$student[0]->phone ?? 'N/A'}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Programme: </label>
                                        <h5>{{$student[0]->programme}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Admission Date: </label>
                                        <h5>{{$student[0]->admission_date}}</h5>
                                    </div>
                                </div>
                                @if ($student[0]->studentdetail_type == 'admission')
                                    <div class="col-md-12">
                                        <div class="form-group d-flex align-items-center">
                                            <label class="mr-1">Attendance Status: </label>
                                            <h5>{{$student[0]->attendance_status}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group d-flex align-items-center">
                                            <label class="mr-1">Qualification At Entry: </label>
                                            <h5>{{$student[0]->qualificationAtEntry->name}}</h5>
                                        </div>
                                    </div> 
                                @else
                                    <div class="col-md-12">
                                        <div class="form-group d-flex align-items-center">
                                            <label class="mr-1">Completion Date: </label>
                                            <h5>{{$student[0]->completion_date}}</h5>
                                        </div>
                                    </div> 
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Award: </label>
                                        <h5>{{$student[0]->studentaward->name}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Field of Education: </label>
                                        <h5>{{$student[0]->educationField->name}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Learning Center: </label>
                                        <h5>{{$student[0]->learningcenter->training_provider_name}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection