<div>
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Units</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{route('systemadmin.index')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('systemadmin.directorates')}}">Directorates</a></li>
                        <li class="breadcrumb-item active">Units</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row mt-2 mb-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" placeholder="Enter the No of units to create" wire:model="row" required>
                                        </div>
                                        <div class="col-sm-5">
                                            <select class="form-control custom-select" style="width: 100%;" wire:model.lazy="directorate" required>
                                                <option selected>Select directorate</option>
                                                @forelse ($directorates as $dt)  
                                                    <option value="{{$dt->id}}">{{$dt->directorate_name}}</option>
                                                @empty
                                                    <option>No Directorates registered in the system</option>
                                                @endforelse
                                              </select>
                                              <div class="mt-1 mb-1">
                                                @error('directorate')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-success btn-block" wire:click.prevent="add({{$rows}})">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <input type="text" class="form-control" placeholder="Enter unit name" wire:model="unit.0" required>
                                        </div>
                                        <div class="mt-1 mb-1">
                                          @error('unit.0')
                                              <span class="text-danger">{{$message}}</span>
                                          @enderror
                                      </div>
                                    </div>
                                </div>
                                @foreach ($inputs as $key => $value)
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter unit name" wire:model="unit.{{ $value }}">
                                            </div>
                                            <div class="mt-1 mb-1">
                                            @error('unit.'.$value)
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <button class="btn btn-danger btn-block" wire:click.prevent="remove({{ $key }})">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <button class="btn btn-info" wire:click.prevent="createUnits()">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div><!-- /.container-fluid -->
        </div>
    <!-- /.content-header --> 
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-danger">
                            <h3 class="card-title">All Units in the System</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Directorate</th>
                                        <th>Date Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($units as $unit)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $unit->name }}</td>
                                        <td>{{ $unit->directorate_name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($unit->created_at)->diffForHumans() }}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#edit-unit" class="btn btn-danger btn-sm" title="Edit {{$unit->name}}" wire:click="$emit('editUnit','{{json_encode($unit)}}')"><i class="fas fa-edit "></i></button>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center text-bold">No registered Units in the system</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @livewire('systemadmin.edit-unit')
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
