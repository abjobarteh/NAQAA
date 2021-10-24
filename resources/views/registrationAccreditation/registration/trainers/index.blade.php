@extends('layouts.admin')
@section('page-title')
    Trainer Registrations
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Trainers</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('registration-accreditation.registration.trainers.create')}}" 
                        class="btn btn-primary btn-flat float-right">
                        <i class="fas fa-plus"></i>
                        New Trainer Registration
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
                            <h3 class="card-title">Trainers Registration Application lists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Trainer Name</th>
                                        <th>Birth Date</th>
                                        <th>Gender</th>
                                        <th>Country of Citizenship</th>
                                        <th>Email</th>
                                        <th>Trainer type</th>
                                        <th>status</th>
                                        <th>Application date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($trainer_regitrations as $registration)
                                        <tr>
                                            <td>{{$registration->trainer->full_name}}</td>
                                            <td>{{$registration->trainer->date_of_birth->toFormattedDateString()}}</td>
                                            <td>{{$registration->trainer->gender}}</td>
                                            <td>{{$registration->trainer->country_of_citizenship}}</td>
                                            <td>{{$registration->trainer->email}}</td>
                                            <td>{{$registration->trainer->type}}</td>
                                            <td>
                                                <span class="badge {{$registration->status === 'Approved' ? 'badge-success' : 'badge-warning'}}">
                                                    {{$registration->status}}
                                                 </span>
                                            </td>
                                            <td>{{$registration->application_date->toFormattedDateString()}}</td>
                                            <td>
                                                <a href="{{route('registration-accreditation.registration.trainers.edit',$registration->id)
                                                    }}" class="btn btn-sm btn-danger"
                                                    title="edit trainer registration details"
                                                    >
                                                    <i class="fas fa-edit"></i>    
                                                </a>
                                                <a href="{{route('registration-accreditation.registration.trainers.show',$registration->id)
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