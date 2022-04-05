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
                @can('create_data_collection')
                <a href="{{route('researchdevelopment.datacollection.add-programme-details')}}" class="btn btn-primary btn-flat float-right">
                    <i class="fas fa-plus"></i> &nbsp;
                    New Programme Data collection
                </a>
                @endcan
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Program Details Data collection lists</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table datatable table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Training/Education Provider</th>
                                    <th>Programme</th>
                                    <th>Field of Education</th>
                                    <th>Duration (months)</th>
                                    <th>Tuition fee per year</th>
                                    <th>Entry requirements</th>
                                    <th>Awarding Body</th>
                                    <th>Academic year</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($programs as $program)
                                <tr>
                                    <td>{{$program->programmeDetails->trainingprovider->name ?? 'N/A'}}</td>
                                    <td>{{$program->programmeDetails->programme->name ?? 'N/A'}}</td>
                                    <td>{{$program->programmeDetails->fieldOfEducation->name ?? 'N/A'}}</td>
                                    <td>{{$program->duration}}</td>
                                    <td>{{$program->tuition_fee_per_year}}</td>
                                    <td>
                                        @foreach($program->entry_requirements as $id => $req)
                                        <span class="badge badge-rounded badge-success m-1">{{$req}}</span>
                                        @endforeach
                                    </td>
                                    <td>{{$program->awarding_body}}</td>
                                    <td>{{$program->academic_year}}</td>
                                    <td>
                                        @can('edit_data_collection')
                                        <a href="{{route('researchdevelopment.datacollection.edit-programme-details',$program->id)
                                                        }}" class="btn btn-sm btn-danger" title="edit program details">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @endcan
                                        @can('show_data_collection')
                                        <a href="{{route('researchdevelopment.datacollection.program-details.show',$program->id)
                                                        }}" class="btn btn-sm btn-info" title="view program details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @endcan
                                    </td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                        <div class="col-sm-2 col-lg-2 mt-3">
                            <form action="{{ route('researchdevelopment.datacollection.programme-offered-imports') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" id="file" class="form-control" required>
                                <button type="submit" class="btn btn-primary mt-1 col-sm-12 col-lg-12 ">
                                    Bulk Upload
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection