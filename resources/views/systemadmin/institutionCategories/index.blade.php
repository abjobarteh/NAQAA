@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Institution Categories</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <div class="float-right">
                    @can('institution_categories_create')
                    <a href="{{ route('admin.institution-categories.create') }}" class="btn btn-info">Add</a>
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
                        <h3 class="card-title">Institution Categories List</h3>
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
                                @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @can('institution_categories_edit')
                                        <a href="{{ route('admin.institution-categories.edit', $category->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-edit "></i> Edit</a>
                                        @endcan
                                        @can('institution_categories_show')
                                        <a class="btn btn-info btn-sm" title="View institutions under this category"><i class="fas fa-eye"></i> View</a>
                                        @endcan
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center text-bold">No registered Institution categories.</td>
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