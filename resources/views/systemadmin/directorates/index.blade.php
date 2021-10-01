@extends('layouts.admin')
@section('page-title','Directorates')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Directorates</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                @can('create_directorate')
                 <a href="{{ route('admin.directorates.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add Directorate</a>
                @endcan
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
                        <div class="card-header bg-info">
                            <h3 class="card-title">Directorates List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Directorate Name</th>
                                        <th>Directorate Code</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($directorates as $directorate)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $directorate->name }}</td>
                                        <td>{{ $directorate->directorate_code ?? 'N/A' }}</td>
                                        <td>{{ $directorate->created_at }}</td>
                                        <td>
                                            @can('edit_directorate')
                                            <a href="{{ route('admin.directorates.edit', $directorate->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center text-bold">No registered Directorates in the system</td>
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