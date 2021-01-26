<div>
        <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <a href="{{route('systemadmin.add-user')}}" class="btn btn-primary float-right"><i class="fas fa-user-plus"></i> Add User</a>
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
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Department</th>
                                            <th>Role</th>
                                            <th>Date Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->middle_name ?? '' }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->phone_number }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->department_name ?? 'N/A'}}</td>
                                            <td>{{ $user->role_name ?? 'N/A' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                                            <td>
                                                @if ($user->user_status == 1)
                                                    <button class="btn btn-danger btn-sm" title="Deactivate Account" wire:click="changeUserAccountStatus('{{$user->id}}','0')"><i class="fas fa-user-lock"></i></button>
                                                @else
                                                    <button class="btn btn-success btn-sm" title="Activate Account" wire:click="changeUserAccountStatus('{{$user->id}}','1')"><i class="fas fa-user-check"></i></button>
                                                @endif
                                                <a href="/systemadmin/edit-user/{{$user->id }}" class="btn btn-primary btn-sm" title="Edit user details"><i class="fas fa-user-edit "></i></a>
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
        @section('page-level-header-files')
                <!-- SweetAlert2 -->
                <link rel="stylesheet" href="/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
          @endsection
          @section('page-level-footer-files')
                <!-- SweetAlert2 -->
                <script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
                <script src="/js/custom.js"></script>
          @endsection
</div>
