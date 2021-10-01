@extends('layouts.admin')
@section('page-title')
    SubFields of Education
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">SubFields of Education</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 d-flex justify-content-end">
                    <a href="{{route('admin.configurations')}}" class="btn btn-success btn-flat mr-1"><i class="fas fa-list"></i> Configurations</a>
                    @can('create_general_configurations')
                    <a href="{{route('admin.education-subfields.create')}}" class="btn btn-primary float-right">Add SubField of Education</a>
                    @endcan
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">SubFields of Education Lists</h6>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>SubField Name</th>
                                        <th>Description</th>
                                        <th>Field Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($subfields as $subfield)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subfield->name }}</td>
                                        <td>{{ $subfield->description ?? 'N/A'}}</td>
                                        <td>{{ $subfield->educationField->name ?? 'N/A'}}</td>
                                        <td>
                                            @can('edit_general_configurations')
                                            <a href="{{ route('admin.education-subfields.edit',$subfield->id) }}" class="btn btn-primary btn-sm" title="Edit field of education"><i class="fas fa-user-edit"></i></a>
                                            @endcan
                                            @can('delete_general_configurations')
                                            <a href="{{ route('admin.education-subfields.destroy',$subfield->id) }}" class="btn btn-danger btn-sm" title="delete field of education"><i class="fas fa-trash"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">No registered Subfields of education in the system</td>
                                        </tr>
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