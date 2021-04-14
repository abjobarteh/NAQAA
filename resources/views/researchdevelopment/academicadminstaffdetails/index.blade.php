@extends('layouts.admin')
@section('page-title')
    Acadmic&Admin Staff Details
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Academic&Admin Staff Data Collection</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('researchdevelopment.datacollection.academicadminstaff-details.create')}}" 
                        class="btn btn-primary float-right">
                        New Data collection
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
                            <h3 class="card-title">Academic&Admin Staff Details Data collection lists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example-2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Fullname</th>
                                        <th>Specialisation</th>
                                        <th>Highest Qualification</th>
                                        <th>Rank</th>
                                        <th>Role</th>
                                        <th>Main Teaching Field of Study</th>
                                        <th>Learning Center</th>
                                        <th>Date Collected</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($staffs as $staff)
                                        <tr>
                                            <td>{{$staff->full_name}}</td>
                                            <td>{{$staff->specialisation}}</td>
                                            <td>{{$staff->highest_qualification}}</td>
                                            <td>{{$staff->rank->name ?? 'N/A'}}</td>
                                            <td>{{$staff->role->name ?? 'N/A'}}</td>
                                            <td>{{$staff->main_teaching_field_of_study}}</td>
                                            <td>{{$staff->learningcenter->training_provider_name ?? 'N/A'}}</td>
                                            <td>{{$staff->created_at}}</td>
                                            <td>
                                                <a href="{{route('researchdevelopment.datacollection.academicadminstaff-details.edit',$staff->id)
                                                    }}" class="btn btn-sm btn-danger"
                                                    title="edit staff details"
                                                    >
                                                    <i class="fas fa-edit"></i>    
                                                </a>
                                                <a href="{{route('researchdevelopment.datacollection.academicadminstaff-details.show',$staff->id)
                                                    }}" class="btn btn-sm btn-info"
                                                    title="view staff details"
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