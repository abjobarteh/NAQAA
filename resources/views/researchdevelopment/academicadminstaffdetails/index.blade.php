@extends('layouts.admin')
@section('page-title')
    Academic&Admin Staff Details
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Academic&Admin Staff Data Collection</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    @can('create_data_collection')
                        <a href="{{route('researchdevelopment.datacollection.academicadminstaff-details.create')}}" 
                            class="btn btn-primary float-right">
                            Add staff
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
                            <h3 class="card-title">Academic&Admin Staff Details Data collection lists</h3>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Fullname</th>
                                        <th>Specialisation</th>
                                        <th>Highest Qualification</th>
                                        <th>Rank</th>
                                        <th>Role</th>
                                        <th>Main Teaching Field of Study</th>
                                        <th>Learning Center</th>
                                        <th>Gender</th>
                                        <th>Nationality</th>
                                        <th>Date of Birth</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                        <th>Job Title</th>
                                        <th>Salary (P/M)</th>
                                        <th>Employment Date</th>
                                        <th>Employement Type</th>
                                        <th>Other Qualification</th>
                                        <th>Secondary Teaching</th>
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
                                            <td>{{$staff->rank ?? 'N/A'}}</td>
                                            <td>{{$staff->role ?? 'N/A'}}</td>
                                            <td>{{$staff->main_teaching_programme}}</td>
                                            <td>{{$staff->learningcenter->name ?? 'N/A'}}</td>
                                            <td>{{$staff->gender}}</td>
                                            <td>{{$staff->nationality}}</td>
                                            <td>{{$staff->date_of_birth}}</td>
                                            <td>{{$staff->phone}}</td>
                                            <td>{{$staff->email}}</td>
                                            <td>{{$staff->job_title}}</td>
                                            <td>{{$staff->salary_per_month}}</td>
                                            <td>{{$staff->employment_date}}</td>
                                            <td>{{$staff->employment_type}}</td>
                                            <td>{{$staff->other_qualifications ?? 'N/A'}}</td>
                                            <td>{{$staff->secondary_teaching_programmes ?? 'N/A'}}</td>
                                            <td>{{$staff->created_at}}</td>
                                            <td>
                                                @can('edit_data_collection')
                                                <a href="{{route('researchdevelopment.datacollection.academicadminstaff-details.edit',$staff->id)
                                                    }}" class="btn btn-xs btn-danger"
                                                    title="edit staff details"
                                                    >
                                                    <i class="fas fa-edit"></i>    
                                                </a>
                                                @endcan
                                                @can('show_data_collection')
                                                <a href="{{route('researchdevelopment.datacollection.academicadminstaff-details.show',$staff->id)
                                                    }}" class="btn btn-xs btn-info"
                                                    title="view staff details"
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
        </div>
    </section>
@endsection