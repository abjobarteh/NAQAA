@extends('layouts.admin')
@section('page-title')
    Program Details
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Program Details Data Collection</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('researchdevelopment.datacollection.program-details.create')}}" 
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
                            <h3 class="card-title">Program Details Data collection lists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Program name</th>
                                        <th>Field of Education</th>
                                        <th>Duration (months)</th>
                                        <th>Tuition fee per year</th>
                                        <th>Entry requirements</th>
                                        <th>Awarding Body</th>
                                        <th>Learning Center</th>
                                        <th>Date collected</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($programs as $program)
                                        <tr>
                                            <td>{{$program->program_name}}</td>
                                            <td>{{$program->educationfield->name}}</td>
                                            <td>{{$program->duration}}</td>
                                            <td>{{$program->tuition_fee_per_year}}</td>
                                            <td>
                                                @foreach($program->entry_requirements as $id => $req)
                                                    <span class="btn btn-sm btn-success m-1">{{$req}}</span>    
                                                @endforeach
                                            </td>
                                            <td>{{$program->awarding_body}}</td>
                                            <td>{{$program->learningcenter->training_provider_name}}</td>
                                            <td>{{$program->created_at}}</td>
                                            <td>
                                                <a href="{{route('researchdevelopment.datacollection.program-details.edit',$program->id)
                                                    }}" class="btn btn-sm btn-danger"
                                                    title="edit program details"
                                                    >
                                                    <i class="fas fa-edit"></i>    
                                                </a>
                                                <a href="{{route('researchdevelopment.datacollection.program-details.show',$program->id)
                                                    }}" class="btn btn-sm btn-info"
                                                    title="view program details"
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