@extends('layouts.admin')
@section('page-title')
    Research Survey
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Research Surveys Documentation</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('researchdevelopment.research-survey-documentation.create')}}" 
                        class="btn btn-primary float-right">
                        New Research Survey
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Research Surveys List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Research Topic</th>
                                        <th>Publisher</th>
                                        <th>Publication Date</th>
                                        <th>Funded by</th>
                                        <th>Cost (GMD)</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($surveys as $survey)
                                        <tr>
                                            <td>{{$survey->research_topic}}</td>
                                            <td>{{$survey->publisher}}</td>
                                            <td>{{$survey->publication_date}}</td>
                                            <td>{{$survey->funded_by}}</td>
                                            <td>{{$survey->cost}}</td>
                                            <td>
                                                <a href="{{route('researchdevelopment.research-survey-documentation.edit',$survey->id)
                                                    }}" class="btn btn-sm btn-danger"
                                                    title="edit research survey details"
                                                    >
                                                    <i class="fas fa-edit"></i>    
                                                </a>
                                                <a href="{{route('researchdevelopment.research-survey-documentation.show',$survey->id)
                                                    }}" class="btn btn-sm btn-info"
                                                    title="view research survey details"
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
    </div>
@endsection