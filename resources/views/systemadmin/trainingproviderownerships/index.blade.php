@extends('layouts.admin')
@section('page-title')
Training Provider Ownerships
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Training Provider Ownerships</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 d-flex justify-content-end">
                    <a href="{{route('admin.configurations')}}" class="btn btn-success btn-flat mr-1"><i class="fas fa-list"></i> Configurations</a>
                    @can('create_general_configurations')
                    <a href="{{route('admin.training-provider-ownerships.create')}}" class="btn btn-primary btn-flat float-right">Add Ownership</a>
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
                            <h6 class="card-title">Training Provider Ownerships Lists</h6>
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
                                    @forelse ($ownerships as $ownership)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ownership->name }}</td>
                                        <td>{{ $ownership->description ?? 'N/A'}}</td>
                                        <td>
                                            @can('edit_general_configurations')
                                            <a href="{{ route('admin.training-provider-ownerships.edit',$ownership->id) }}" class="btn btn-danger btn-sm" title="Edit training provider ownerships"><i class="fas fa-edit"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">No registered training provider ownerships in the system</td>
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