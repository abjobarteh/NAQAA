<div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="user">User:</label>
                        <select class="form-control custom-select" id="user" wire:model="user">
                            <option value="">--- select user ---</option>
                            @foreach ($users as $id => $user)
                                <option value="{{ $id }}">{{ $user }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                         <label for="startdate">Start date</label>
                         <input type="date" class="form-control" wire:model="start_date">
                     </div>
                     <!-- /.form group -->
                 </div>
                <div class="col-md-3">
                     <div class="form-group">
                        <label for="enddate">End date</label>
                         <input type="date" class="form-control" wire:model="end_date" max="{{date('Y-m-d')}}">
                     </div>
                     <!-- /.form group -->
                 </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for=""></label>
                        <button type="button" class="btn btn-info btn-block" wire:click="filterlogs">Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal for showing filtered logs result --}}
    @if($is_logs_empty == false)
    <div class="modal fade" id="filter-logs-modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Filtered Logs Results</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <table id="example2" class="table datatable table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Log Name</th>
                            <th>User</th>
                            <th>Description</th>
                            <th>Date</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $log->log_name }}</td>
                                    <td>{{ $log->causer->username }}</td>
                                    <td>{{ $log->description }}</td>
                                    <td>{{ $log->created_at }}</td>
                                </tr>  
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    @endif
</div>
