@extends('layouts.admin')
@section('page-title')
    Trainer Accreditations
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Trainers</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('registration-accreditation.accreditation.trainers.create')}}" 
                        class="btn btn-primary float-right">
                        New Trainer Accreditation
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="roe">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Trainers Accreditation lists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Trainer Name</th>
                                        <th>Birth Date</th>
                                        <th>Gender</th>
                                        <th>Nationality</th>
                                        <th>Email</th>
                                        <th>Trainer type</th>
                                        <th>status</th>
                                        <th>Application date</th>
                                        <th>Accreditation areas</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($accreditations as $accreditation)
                                        <tr>
                                            <td>{{$accreditation->trainer->firstname}}. {{$accreditation->trainer->middlename ?? ''}} .{{$accreditation->trainer->lastname}}</td>
                                            <td>{{$accreditation->trainer->date_of_birth->toFormattedDateString()}}</td>
                                            <td>{{$accreditation->trainer->gender}}</td>
                                            <td>{{$accreditation->trainer->nationality}}</td>
                                            <td>{{$accreditation->trainer->email}}</td>
                                            <td>{{$accreditation->trainer->type}}</td>
                                            <td>
                                                <span class="badge {{$accreditation->status === 'accepted' ? 'badge-success' : 'badge-warning'}}">
                                                    {{$accreditation->status}}
                                                </span>
                                            </td>
                                            <td>{{$accreditation->application_date->toFormattedDateString()}}</td>
                                            <td>
                                                @foreach ($accreditation->trainerAccreditations as $area)
                                                    <p class="text-muted">{{$area->area}} - {{$area->level}},</p>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{route('registration-accreditation.accreditation.trainers.edit',$accreditation->id)
                                                    }}" class="btn btn-sm btn-danger"
                                                    title="edit trainer registration details"
                                                    >
                                                    <i class="fas fa-edit"></i>    
                                                </a>
                                                <a href="{{route('registration-accreditation.accreditation.trainers.show',$accreditation->id)
                                                    }}" class="btn btn-sm btn-info"
                                                    title="view trainer registration details"
                                                    >
                                                    <i class="fas fa-eye"></i>    
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection