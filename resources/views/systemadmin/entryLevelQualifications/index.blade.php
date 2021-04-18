@extends('layouts.admin')
@section('page-title')
    Qualifications
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Qualifications</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    @can('create_general_configurations')
                    <a href="{{route('admin.entry-level-qualifications.create')}}" class="btn btn-primary float-right">Add Qualification</a>
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
                            <h6 class="card-title">Qualifications Lists</h6>
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
                                    @forelse ($qualifications as $qualification)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $qualification->name }}</td>
                                        <td>{{ $qualification->description ?? 'N/A'}}</td>
                                        <td>
                                            @can('edit_general_configurations')
                                            <a href="{{ route('admin.entry-level-qualifications.edit',$qualification->id) }}" class="btn btn-primary btn-sm" title="Edit entry level qualification"><i class="fas fa-user-edit"></i></a>
                                            @endcan
                                            @can('edit_entry_level_qualifications')
                                            <a href="{{ route('admin.entry-level-qualifications.destroy',$qualification->id) }}" class="btn btn-danger btn-sm" title="delete entry level qualification"><i class="fas fa-trash"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">No registered entry level qualifications in the system</td>
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