@extends('layouts.admin')
@section('page-title','Users')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                @can('create_user')
                <a href="{{route('admin.users.create')}}" class="btn btn-primary float-right"><i class="fas fa-user-plus"></i> Add User</a>
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
                    <div class="card-header">
                        <h3 class="card-title">All Users in the System</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table datatable table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Designation</th>
                                    <th>Enabled</th>
                                    <th>Role</th>
                                    <th>Date Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->full_name ?? 'N/A' }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phonenumber ?? 'N/A' }}</td>
                                    <td>{{ $user->address ?? 'N/A' }}</td>
                                    <td>{{ $user->designation->name ?? 'N/A'}}</td>
                                    <td>
                                        @if ($user->user_status == 1)
                                            <span class="badge bg-success">Enabled</span>
                                        @else
                                            <span class="badge bg-danger">Disabled</span>
                                        @endif
                                    </td>
                                    <td>
                                        @foreach ($user->roles as $role) 
                                            <span class="badge bg-danger">{{ $role->name ?? 'N/A' }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                                    <td>
                                        @if ($user->user_category != "portal")
                                        @can('edit_user')
                                        <a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-primary btn-sm" title="Edit user details"><i class="fas fa-user-edit"></i></a>
                                        @endcan 
                                        @endif
                                        @can('show_user')
                                        <a href="{{ route('admin.users.show',$user->id) }}" class="btn btn-info btn-sm" title="view user"><i class="fas fa-eye"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No registered Users in the system</td>
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