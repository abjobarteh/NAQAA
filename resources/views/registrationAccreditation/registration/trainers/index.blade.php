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
                        class="btn btn-primary float-right">
                        Add Trainer
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
                            <h3 class="card-title">Trainers lists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date of Birth</th>
                                        <th>Gender</th>
                                        <th>Nationality</th>
                                        <th>Email</th>
                                        <th>TIN</th>
                                        <th>Contact Numbers</th>
                                        <th>Address</th>
                                        <th>Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($trainers as $trainer)
                                        <tr>
                                            <td>{{$trainer->firstname}}. {{$trainer->middlename ?? ''}} .{{$trainer->lastname}}</td>
                                            <td>{{$trainer->date_of_birth}}</td>
                                            <td>{{$trainer->gender}}</td>
                                            <td>{{$trainer->nationality}}</td>
                                            <td>{{$trainer->email}}</td>
                                            <td>{{$trainer->TIN}}</td>
                                            <td>{{$trainer->phone_home}} <br> {{$trainer->phone_mobile}}</td>
                                            <td>{{$trainer->physical_address}}</td>
                                            <td>{{$trainer->type}}</td>
                                            <td>
                                                <a href="{{route('registration-accreditation.registration.trainers.edit',$trainer->id)
                                                    }}" class="btn btn-sm btn-danger"
                                                    title="edit trainer registration details"
                                                    >
                                                    <i class="fas fa-edit"></i>    
                                                </a>
                                                <a href="{{route('registration-accreditation.registration.trainers.show',$trainer->id)
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