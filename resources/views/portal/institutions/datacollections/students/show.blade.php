@extends('layouts.portal')
@section('title','Show Student details Datacollection')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">View Student Datacollection details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Showing {{$student->full_name}} Data Collection details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-6">
                                            <div class="form-group row">
                                                <b class="col-sm-6 text-primary">Full Name: </b>
                                                <p class="col-sm-6 text-muted">{{$student->full_name}}</p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-6 text-primary">Gender: </b>
                                                <p class="col-sm-6 text-muted">{{$student->gender}}</p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-6 text-primary">Phone Number: </b>
                                                <p class="col-sm-6 text-muted">{{$student->phone ?? 'N/A'}}</p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-6 text-primary">Date of birth: </b>
                                                <p class="text-muted text-sm col-sm-6">{{$student->date_of_birth}}</p>
                                            </div>
        
                                            <div class="form-group row">
                                                <b class="col-sm-6 text-primary">Nationality: </b>
                                                <p class="text-muted text-sm col-sm-6">{{$student->nationality}}</p>
                                            </div>
        
                                            <div class="form-group row">
                                                <b class="col-sm-6 text-primary">Attendance Status: </b>
                                                <p class="col-sm-6 text-muted">{{$student->attendance_status}}</p>
                                            </div>
        
                                            <div class="form-group row">
                                                <b class="col-sm-6 text-primary">Qualification At Entry: </b>
                                                <p class="col-sm-6 text-muted">{{$student->entryQualification->name ?? 'N/A'}}</p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-6 text-primary">Programme: </b>
                                                <p class="col-sm-6 text-muted">{{$student->programme_name}}</p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-6 text-primary">Admission Date: </b>
                                                <p class="col-sm-6 text-muted">{{$student->admission_date}}</p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-6 text-primary">Attendance Status: </b>
                                                <p class="col-sm-6 text-muted">{{$student->attendance_status}}</p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-6 text-primary">Completion Date: </b>
                                                <p class="col-sm-6 text-muted">{{$student->completion_date ?? 'N/A'}}</p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-6 text-primary">Award: </b>
                                                <p class="col-sm-6 text-muted">{{$student->awardName->name ?? 'N/A'}}</p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-6 text-primary">Field of Education: </b>
                                                <p class="col-sm-6 text-muted">{{$student->field_of_education ?? 'N/A'}}</p>
                                            </div>
                                            <div class="form-group row">
                                                <b class="col-sm-6 text-primary">Learning Center: </b>
                                                <p class="col-sm-6 text-muted">{{$student->trainingprovider->name ?? 'N/A'}}</p>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <a href="{{route('portal.institution.datacollection.students.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"></i> Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection