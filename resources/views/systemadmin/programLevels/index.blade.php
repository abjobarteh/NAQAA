@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Program Levels</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <div class="float-right">
                    @can('institution_categories_create')
                    <a href="{{ route('systemadmin.program-levels.create') }}" class="btn btn-info">Add</a>
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
                        <h3 class="card-title">Program levels List</h3>
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
                                @forelse ($programlevels as $programlevel)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $programlevel->name }}</td>
                                    <td>{{ $programlevel->description ?? 'None' }}</td>
                                    <td>
                                        @can('program_level_edit')
                                        <a href="{{ route('systemadmin.program-levels.edit', $programlevel->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-edit "></i> Edit</a>
                                        @endcan
                                        @can('program_level_show')
                                        <a class="btn btn-info btn-sm" title="View programs in this level"><i class="fas fa-eye"></i> View</a>
                                        @endcan
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center text-bold">No registered program levels.</td>
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