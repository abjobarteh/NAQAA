@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Program Categories</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <div class="float-right">
                    @can('program_category_create')
                    <a href="{{ route('systemadmin.program-categories.create') }}" class="btn btn-info">Add</a>
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
                        <h3 class="card-title">Program categories List</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table datatable table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($programcategories as $programcategory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $programcategory->name }}</td>
                                    <td>
                                        @can('program_category_edit')
                                        <a href="{{ route('systemadmin.program-categories.edit', $programcategory->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-edit "></i> Edit</a>
                                        @endcan
                                        @can('program_category_show')
                                        <a class="btn btn-info btn-sm" title="View programs on this category"><i class="fas fa-eye"></i> View</a>
                                        @endcan
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center text-bold">No registered program categories.</td>
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