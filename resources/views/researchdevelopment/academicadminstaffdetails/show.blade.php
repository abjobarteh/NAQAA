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
                            <h3 class="card-title">Showing {{$staffdetail[0]->full_name}} Data Collection details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Full Name: </label>
                                        <h5>{{$staffdetail[0]->full_name}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Qualifications: </label>
                                        @if (isset($staffdetail[0]->qualifications))
                                        @foreach($staffdetail[0]->qualifications as $qualification)
                                            <span class="btn btn-sm btn-success m-1">{{$qualification}}</span>    
                                        @endforeach  
                                        @else
                                            <h5>N/A</h5> 
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Specialisation: </label>
                                        <h5>{{$staffdetail[0]->specialisation}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Rank: </label>
                                        <h5>{{$staffdetail[0]->rank->name ?? 'N/A'}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Role: </label>
                                        <h5>{{$staffdetail[0]->role->name ?? 'N/A'}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Main Teaching Field of Study: </label>
                                        <h5>{{$staffdetail[0]->main_teaching_field_of_study ?? 'N/A'}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Secondary Teaching Field of Study: </label>
                                        @if (isset($staffdetail[0]->secondary_teaching_fields_of_study))
                                            @foreach($staffdetail[0]->secondary_teaching_fields_of_study as $field)
                                                <span class="btn btn-sm btn-info m-1">{{$field}}</span>    
                                            @endforeach  
                                        @else
                                            <h5>N/A</h5> 
                                        @endif
                                        
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