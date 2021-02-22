<div>
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Departments</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <button type="button" data-toggle="modal" data-target="#add-department" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add Department</button>
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
                            <h3 class="card-title">All Departments in the System</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Department Name</th>
                                        <th>Date Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($departments as $department)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $department->department_name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($department->created_at)->diffForHumans() }}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#add-department" class="btn btn-danger btn-sm" title="Edit {{$department->department_name}}" wire:click="$emit('editDepartment','{{json_encode($department)}}')"><i class="fas fa-edit "></i></button>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center text-bold">No registered Departments in the system</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @livewire('systemadmin.add-department')
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
