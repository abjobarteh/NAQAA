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
                                <table id="example2" class="table datatable table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Directorate</th>
                                            <th>Unit</th>
                                            <th>Designation</th>
                                            <th>Role</th>
                                            <th>Date Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->first_name.' '.$user->middle_name.' '.$user->last_name ?? $user->first_name.' '.$user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone_number }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->directorate_name ?? 'N/A'}}</td>
                                            <td>{{ $user->name ?? 'N/A'}}</td>
                                            <td>{{ $user->designation_name ?? 'N/A'}}</td>
                                            <td>
                                                @foreach ($user->roles as $role) 
                                                    <span class="badge bg-danger">{{ $role->name ?? 'N/A' }}</span>
                                                @endforeach
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                                            <td>
                                                @if ($user->user_status == 1)
                                                    <button class="btn btn-danger btn-sm" title="Deactivate Account" wire:click="changeUserAccountStatus('{{$user->id}}','0')"><i class="fas fa-user-lock"></i></button>
                                                @else
                                                    <button class="btn btn-success btn-sm" title="Activate Account" wire:click="changeUserAccountStatus('{{$user->id}}','1')"><i class="fas fa-user-check"></i></button>
                                                @endif
                                                <a href="/systemadmin/edit-user/{{$user->id }}" class="btn btn-primary btn-sm" title="Edit user details"><i class="fas fa-user-edit"></i></a>
                                                <a href="/systemadmin/activities/{{$user->id }}" class="btn btn-info btn-sm" title="view user activity"><i class="fas fa-eye"></i></a>
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
                <!-- DataTables -->
                <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
                <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
                <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
          @endsection
          @section('page-level-footer-files')
                <!-- SweetAlert2 -->
                <script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
                <!-- DataTables  & Plugins -->
                <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
                <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
                <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
                <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
                <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
                <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
                <script src="/plugins/jszip/jszip.min.js"></script>
                <script src="/plugins/pdfmake/pdfmake.min.js"></script>
                <script src="/plugins/pdfmake/vfs_fonts.js"></script>
                <script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
                <script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
                <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
                <script src="/js/custom.js"></script>
          @endsection
</div>
