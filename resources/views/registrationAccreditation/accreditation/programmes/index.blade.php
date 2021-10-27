@extends('layouts.admin')
@section('page-title')
    Programme Accreditations
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Programme Accreditations</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('registration-accreditation.accreditation.programmes.create')}}" 
                        class="btn btn-primary btn-flat float-right">
                        <i class="fas fa-plus"></i>
                        New Programme Accreditation
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
                            <h3 class="card-title">Programme Accreditation lists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Institution Name</th>
                                        <th>Programme Title</th>
                                        <th>Level</th>
                                        <th>Duration</th>
                                        <th>Programme Qualification Time</th>
                                        <th>Fees</th>
                                        <th>Application type</th>
                                        <th>Application date</th>
                                        <th>Aplication status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($accreditations as $accreditation)
                                        <tr>
                                            <td>{{$accreditation->trainingprovider->name}}</td>
                                            <td>{{$accreditation->trainingproviderprogramme->programme->name ?? 'N/A'}}</td>
                                            <td>{{$accreditation->trainingproviderprogramme->level ?? 'N/A'}}</td>
                                            <td>{{$accreditation->trainingproviderprogramme->studentship_duration ?? '0'}}</td>
                                            <td>{{$accreditation->trainingproviderprogramme->total_qualification_time ?? '0'}} Hours</td>
                                            <td><b>GMD</b>{{$accreditation->trainingproviderprogramme->level_of_fees ?? '0'}}</td>
                                            <td><span class="badge badge-primary">{{$accreditation->application_type}}</span></td>
                                            <td>{{$accreditation->application_date->toFormattedDateString()}}</td>
                                            <td>
                                                <span class="badge {{$accreditation->status === 'Approved' ? 'badge-success' : 'badge-warning'}}">
                                                    {{$accreditation->status}}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{route('registration-accreditation.accreditation.programmes.edit',$accreditation->id)
                                                    }}" class="btn btn-xs btn-danger"
                                                    title="edit trainer registration details"
                                                    >
                                                    <i class="fas fa-edit"></i>    
                                                </a>
                                                <a href="{{route('registration-accreditation.accreditation.programmes.show',$accreditation->id)
                                                    }}" class="btn btn-xs btn-info"
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