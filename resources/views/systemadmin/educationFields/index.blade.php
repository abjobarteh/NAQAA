@extends('layouts.admin')
@section('page-title')
    Fields of Education
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Fields of Education</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 d-flex justify-content-end">
                    <a href="{{route('admin.configurations')}}" class="btn btn-success btn-flat mr-1"><i class="fas fa-list"></i> Configurations</a>
                    @can('create_general_configurations')
                    <a href="{{route('admin.education-fields.create')}}" class="btn btn-primary btn-flat float-right">Add Field of Education</a>
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
                            <h6 class="card-title">Fields of Education Lists</h6>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($fields as $field)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $field->name }}</td>
                                        <td>{{ $field->description ?? 'N/A'}}</td>
                                        <td>
                                            @can('edit_general_configurations')
                                            <a href="{{ route('admin.education-fields.edit',$field->id) }}" class="btn btn-primary btn-sm" title="Edit field of education"><i class="fas fa-user-edit"></i></a>
                                            @endcan
                                            @can('delete_general_configurations')
                                            <a href="{{ route('admin.education-fields.destroy',$field->id) }}" class="btn btn-danger btn-sm" title="delete field of education"><i class="fas fa-trash"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">No registered fields of education in the system</td>
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