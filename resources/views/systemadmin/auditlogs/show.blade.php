@extends('layouts.admin')
@section('page-title')
    View Activity
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.activities.index')}}">Activities</a></li>
                        <li class="breadcrumb-item active">View activity</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline-primary">
                        <div class="card-header">
                            <h3 class="card-title">Log Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                            <span class="text-bold">LogName: </span>
                                            <span>{{$activity[0]->log_name}}</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                            <span class="text-bold">Description: </span>
                                            <span>{{$activity[0]->description}}</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                            <span class="text-bold">User: </span>
                                            <span>{{$activity[0]->causer->username}}</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                            <span class="text-bold">Properties: </span>
                                            <span>{{$activity[0]->properties}}</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                            <span class="text-bold">Properties: </span>
                                            <span>{{$activity[0]->subject_type}}</span>
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