@extends('layouts.admin')
@section('page-title')
    Training Provider Registrations
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Training Providers Registrations</h1>
                </div><!-- /.col -->
                <div class="col-sm-12 col-md-6">
                    <a href="{{route('registration-accreditation.registration.trainingproviders.create')}}" 
                        class="btn btn-primary float-right">
                        New Training provider Registration
                    </a>
                </div><!-- /.col -->
                <div class="col-12">
                    <div class="card m-2">
                        <div class="card-body">
                            <form id="filter-trainingprovider-applications">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                       <!-- Date range -->
                                        <div class="form-group">
                                            <label>Date range:</label>
                        
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control float-right" id="application-daterange">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="roe">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Training Providers Registration/Accreditation lists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Physical Address</th>
                                        <th>Location</th>
                                        <th>Contact Numbers</th>
                                        <th>Category</th>
                                        <th>Application No.</th>
                                        <th>Application type</th>
                                        <th>Application status</th>
                                        <th>Application Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($registrations as $registration)
                                        <tr>
                                            <td>{{$registration->trainingprovider->name}}</td>
                                            <td>{{$registration->trainingprovider->email}}</td>
                                            <td>{{$registration->trainingprovider->physical_address}}</td>
                                            <td>{{$registration->trainingprovider->district->name ?? 'N/A'}},  {{$registration->trainingprovider->physical_address}}</td>
                                            <td>{{$registration->trainingprovider->telephone_work}} , <br> {{$registration->trainingprovider->mobile_phone}}</td>
                                            <td>{{$registration->trainingprovider->category->name}}</td>
                                            <td>{{$registration->application_no}}</td>
                                            <td>
                                                <span class="badge badge-info">
                                                    {{$registration->application_type}}
                                                 </span>
                                            </td>
                                            <td>
                                                <span class="badge {{$registration->status === 'accepted' ? 'badge-success' : 'badge-warning'}}">
                                                    {{$registration->status}}
                                                 </span>
                                            </td>
                                            <td>{{$registration->application_date->toFormattedDateString()}}</td>
                                            <td>
                                                <a href="{{route('registration-accreditation.registration.trainingproviders.edit',$registration->id)
                                                    }}" class="btn btn-sm btn-danger"
                                                    title="edit training provider details"
                                                    >
                                                    <i class="fas fa-edit"></i>    
                                                </a>
                                                <a href="{{route('registration-accreditation.registration.trainingproviders.show',$registration->id)
                                                    }}" class="btn btn-sm btn-info"
                                                    title="view training provider details"
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

@section('scripts')
    <script>
            //Date range picker
            $('#application-daterange').daterangepicker()
    </script>]
@endsection