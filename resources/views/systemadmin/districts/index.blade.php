@extends('layouts.systemadmin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Districts</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                @can('district_create')
                 <a href="{{ route('systemadmin.districts.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add District</a>
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
                            <h3 class="card-title">Districts List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>District Name</th>
                                        {{-- <th>Region</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>District Name</th>
                                        {{-- <th>Region</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @forelse ($districts as $district)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $district->name }}</td>
                                        {{-- <td>{{ $district->regions->name }}</td> --}}
                                        <td>
                                            @can('district_edit')
                                            <a href="{{ route('systemadmin.districts.edit', $district->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                            @endcan
                                            @can('district_show')
                                            <a href="{{ route('systemadmin.districts.show', $district->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> view</a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center text-bold">No registered Districts in the system</td>
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