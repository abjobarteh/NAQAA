@extends('layouts.admin')
@section('page-title')
    Training Provider Staff Roles
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Training Provider Staff Roles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    @can('create_academic_admin_staff_role')
                    <a href="{{route('admin.training-provider-staff-roles.create')}}" class="btn btn-primary float-right">Add Role</a>
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
                            <h6 class="card-title">Training Provider staff roles Lists</h6>
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
                                    @forelse ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->description ?? 'N/A'}}</td>
                                        <td>
                                            @can('edit_academic_admin_staff_role')
                                            <a href="{{ route('admin.training-provider-staff-roles.edit',$role->id) }}" class="btn btn-primary btn-sm" title="Edit training provider staff role"><i class="fas fa-user-edit"></i></a>
                                            @endcan
                                            @can('delete_academic_admin_staff_role')
                                            <a href="{{ route('admin.training-provider-staff-roles.destroy',$role->id) }}" class="btn btn-danger btn-sm" title="delete training provider staff role"><i class="fas fa-trash"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">No registered training provider staff roles in the system</td>
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