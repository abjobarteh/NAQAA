@extends('layouts.admin')
@section('page-title')
    Localgoverment Areas
@endsection
@section('content')
     <!-- Content Header (Page header) -->
     <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Localgoverment Areas</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                @can('create_local_goverment_areas')
                 <a href="{{ route('admin.localgovermentareas.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add Localgoverment Area</a>
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
                            <h3 class="card-title">Localgoverment Areas List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Region</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Region</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @forelse ($lgas as $lga)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $lga->name }}</td>
                                        <td>{{ $lga->region->name }}</td>
                                        <td>
                                            @can('edit_local_goverment_areas')
                                            <a href="{{ route('admin.localgovermentareas.edit', $lga->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center text-bold">No registered Localgoverment Areas in the system</td>
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