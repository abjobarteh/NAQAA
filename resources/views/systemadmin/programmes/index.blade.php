@extends('layouts.admin')
@section('page-title')
    National Programmes
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">National Programmes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    @can('create_general_configurations')
                    <a href="{{route('admin.programmes.create')}}" class="btn btn-primary float-right">Add Programme</a>
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
                            <h6 class="card-title">National Programmes Lists</h6>
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
                                    @forelse ($programmes as $program)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $program->name }}</td>
                                        <td>
                                            @can('edit_general_configurations')
                                            <a href="{{ route('admin.programmes.edit',$program->id) }}" class="btn btn-primary btn-sm" title="Edit award body"><i class="fas fa-user-edit"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">No registered national programmes in the system</td>
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