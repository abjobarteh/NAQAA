@extends('layouts.systemadmin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Standards</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <div class="float-right">
                    @can('standards_create')
                    <a href="{{ route('systemadmin.standards.create') }}" class="btn btn-primary">Add New</a>
                    @endcan
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Standards List</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table datatable table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>description</th>
                                    <th>maximum score</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($standards as $standard)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $standard->title }}</td>
                                    <td>{{ $standard->description }}</td>
                                    <td>{{ $standard->maximum_score }}</td>
                                    <td>
                                        @can('standards_edit')
                                        <a href="{{ route('systemadmin.standards.edit', $standard->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-edit "></i> Edit</a>
                                        @endcan
                                        @can('standards_show')
                                        <a class="btn btn-info btn-sm" title="View programs on this category"><i class="fas fa-eye"></i> View</a>
                                        @endcan
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center text-bold">No Standards currently registered in the system.</td>
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