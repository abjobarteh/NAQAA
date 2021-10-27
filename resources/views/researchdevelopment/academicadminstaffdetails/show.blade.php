@extends('layouts.admin')
@section('page-title')
    View Academic&Admin Staff Details Data Collection
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Academic&Admin Staff Data Collection details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.datacollection.academicadminstaff-details.index')}}">
                                Academic&Admin staff data collection
                            </a>
                        </li>
                        <li class="breadcrumb-item active">view Academic&Admin staff  data collection details</li>
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
                            <h3 class="card-title">Showing {{$staffdetail->full_name}} Data Collection details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Full Name: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail->full_name}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Gender: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail->gender}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Country of Origin/Citizenship: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail->nationality}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Date of Birth: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail->date_of_birth}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Phone Number: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail->phone}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Job Title: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail->job_title}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Salary Per Month: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail->salary_per_month}}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-6">
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Employment Date: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail->employment_date}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Employment Type: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail->employment_type}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Highest Qualification: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail->highest_qualification}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Other Qualifications: </b>
                                        @if (isset($staffdetail->other_qualifications))
                                        @foreach($staffdetail->other_qualifications as $qualification)
                                            <span class="badge badge-primary m-1">{{$qualification}}</span>    
                                        @endforeach  
                                        @else
                                            <p class="col-sm-7 text-muted">N/A</p> 
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Specialisation: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail->specialisation}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Rank: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail->rank?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Role: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail->role ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Main Teaching Programme: </b>
                                        <p class="col-sm-7 text-muted">{{$staffdetail->main_teaching_programme ?? 'N/A'}}</p>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-sm-5 text-primary">Secondary Teaching Programme(s): </b>
                                        @if (isset($staffdetail->secondary_teaching_programmes))
                                            @foreach($staffdetail->secondary_teaching_programmes as $field)
                                                <span class="badge badge-info m-1">{{$field}}</span>    
                                            @endforeach  
                                        @else
                                            <p class="col-sm-7 text-muted">N/A</p> 
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <a href="{{route('researchdevelopment.datacollection.academicadminstaff-details.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection