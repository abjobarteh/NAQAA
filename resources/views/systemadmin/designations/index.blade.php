@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Designations</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                @can('designation_create')
                 <a href="{{ route('systemadmin.designations.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add Designation</a>
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
                            <h3 class="card-title">Designations List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Designation Name</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Designation Name</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @forelse ($designations as $desigantion)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $desigantion->name }}</td>
                                        <td>{{ $desigantion->created_at }}</td>
                                        <td>
                                            @can('designation_edit')
                                            <a href="{{ route('systemadmin.designations.edit', $desigantion->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                            @endcan
                                            @can('designation_show')
                                            <a href="{{ route('systemadmin.designations.show', $desigantion->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> view</a>
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