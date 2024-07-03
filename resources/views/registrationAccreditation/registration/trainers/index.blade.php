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
                    @can('create_registration')
                    <a href="{{route('registration-accreditation.registration.create-trainer-registration')}}" 
                        class="btn btn-primary btn-flat float-right">
                        <i class="fas fa-plus"></i>
                        New Trainer Registration
                    </a>
                    @endcan
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
                                        <th class = "all">Trainer Name</th>
                                        <th class = "all">Birth Date</th>
                                        <th class = "all">Gender</th>
                                        <th class = "all">Country of Citizenship</th>
                                        <th class = "all">Email</th>
                                        <th class = "all">Contact Numbers</th>
                                        <th class = "all">Application No</th>
                                        <th class = "all">status</th>
                                        <th class = "all">Application date</th>
                                        <th class = "all">Trainer Type</th>
                                        <th class = "all">Licence start data</th>
                                        <th class = "all">Licence end data</th>
                                        <th class = "all">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($trainer_registrations as $registration)
                                        <tr>
                                            <td>{{$registration->trainer->full_name}}</td>
                                            <td>{{$registration->trainer->date_of_birth}}</td>
                                            <td>{{$registration->trainer->gender}}</td>
                                            <td>{{$registration->trainer->country_of_citizenship}}</td>
                                            <td>{{$registration->trainer->email}}</td>
                                            <td>{{$registration->trainer->phone_home ?? $registration->trainer->phone_mobile}} , <br> {{$registration->trainer->phone_mobile}}</td>
                                            <td>{{$registration->application_no}}</td>
                                            <td>
                                                <span class="badge {{$registration->status === 'Approved' ? 'badge-success' : 'badge-danger'}}">
                                                    {{$registration->status}}
                                                 </span>
                                            </td>
                                            <td>{{$registration->application_date}}</td>
                                            <td>{{$registration->registrationLicence->trainer_type ?? 'N/A'}}</td>
                                            <td>{{$registration->registrationLicence->licence_start_date ?? 'N/A'}}</td>
                                            <td>{{$registration->registrationLicence->licence_end_date ?? 'N/A'}}</td>
                                            <td>
                                                @can('edit_registration')
                                                <a href="{{route('registration-accreditation.registration.edit-trainer-registration',$registration->id)
                                                    }}" class="btn btn-xs btn-danger"
                                                    title="edit trainer registration details"
                                                    >
                                                    <i class="fas fa-edit"></i>    
                                                </a>
                                                @endcan
                                                @can('show_registration')
                                                <a href="{{route('registration-accreditation.registration.trainers.show',$registration->id)
                                                    }}" class="btn btn-xs btn-info"
                                                    title="view trainer registration details"
                                                    >
                                                    <i class="fas fa-eye"></i>    
                                                </a>
                                                @endcan
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