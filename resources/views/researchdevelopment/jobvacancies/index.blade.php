@extends('layouts.admin')
@section('page-title')
    Job Vacancies
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Job Vacancies Data Collection</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    @can('create_job_vacancy')
                        <a href="{{route('researchdevelopment.job-vacancies.create')}}" 
                            class="btn btn-primary float-right">
                            New Job Vacancy Data collection
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
                            <h3 class="card-title">Job Vacancy Data collection lists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Position Advertised</th>
                                        <th>Minimum Qualification Required</th>
                                        <th>Field(s) of Study</th>
                                        <th>Minimum required Job Experience (Years)</th>
                                        <th>Job Status</th>
                                        <th>Region</th>
                                        <th>Institution</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($jobvacancies as $vacancy)
                                        <tr>
                                            <td>{{$vacancy->position_advertised}}</td>
                                            <td>{{$vacancy->minimum_required_qualification}}</td>
                                            <td>
                                                @foreach ($vacancy->fields_of_study as $field)
                                                    <span class="badge badge-rounded badge-info">{{$field}}</span>
                                                @endforeach
                                            </td>
                                            <td>{{$vacancy->minimum_required_job_experience}}</td>
                                            <td>{{$vacancy->job_status}}</td>
                                            <td>{{$vacancy->region->name}}</td>
                                            <td>{{$vacancy->institution}}</td>
                                            <td>
                                                @can('edit_job_vacancy')
                                                    <a href="{{route('researchdevelopment.job-vacancies.edit',$vacancy->id)
                                                        }}" class="btn btn-sm btn-danger"
                                                        title="edit job vacancy details"
                                                        >
                                                        <i class="fas fa-edit"></i>    
                                                    </a>
                                                @endcan
                                                @can('show_job_vacancy')
                                                    <a href="{{route('researchdevelopment.job-vacancies.show',$vacancy->id)
                                                        }}" class="btn btn-sm btn-info"
                                                        title="view job vacancy details"
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