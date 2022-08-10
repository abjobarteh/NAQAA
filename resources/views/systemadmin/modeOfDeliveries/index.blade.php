@extends('layouts.admin')
@section('page-title')
Mode Of Delivery
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Mode Of Delivery</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 d-flex justify-content-end">
                    <a href="{{route('admin.configurations')}}" class="btn btn-success btn-flat mr-1"><i class="fas fa-list"></i> Configurations</a>
                    @can('create_general_configurations')
                    <a href="{{route('admin.mode-of-delivery.create')}}" class="btn btn-primary btn-flat float-right"><i class="fas fa-plus"></i> Add Mode Of Delivery</a>
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
                            <h6 class="card-title">Mode Of Delivery Lists</h6>
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
                                    @forelse ($mode_of_deliveries as $mode_of_delivery)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mode_of_delivery->name }}</td>
                                        <td>
                                            @can('edit_general_configurations')
                                            <a href="{{ route('admin.mode-of-delivery.edit',$mode_of_delivery->id) }}" class="btn btn-danger btn-sm" title="Edit Mode Of Delivery"><i class="fas fa-edit"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">No registered Mode Of Delivery in the system</td>
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