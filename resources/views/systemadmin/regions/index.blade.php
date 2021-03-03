@extends('layouts.systemadmin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Regions</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                @can('region_create')
                 <a href="{{ route('systemadmin.regions.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add Region</a>
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
                            <h3 class="card-title">Regions List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Region Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Region Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @forelse ($regions as $region)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $region->name }}</td>
                                        <td>
                                            @can('region_edit')
                                            <a href="{{ route('systemadmin.regions.edit', $region->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                            @endcan
                                            @can('region_show')
                                            <a href="{{ route('systemadmin.regions.show', $region->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> view</a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center text-bold">No registered regions in the system</td>
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