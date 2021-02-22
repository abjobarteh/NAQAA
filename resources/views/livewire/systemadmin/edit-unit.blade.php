<div>
    <div class="modal fade" id="edit-unit" wire:ignore.self>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Unit</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="updateUnit">
                  <div class="form-group">
                    <label for="unitName">Unit Name</label>
                    <input type="text" class="form-control form-control-border" placeholder="Enter Unit Name"  wire:model.lazy="unitName" required autofocus>
                    @error('unitName')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="directorate">Directorate</label>
                        <select class="form-control-border custom-select" style="width: 100%;" wire:model.lazy="directorate" required>
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
                  <div class="form-group">
                    <button type="submit" class="btn btn-warning">Update <i class="fas fa-arrow-right"></i></button>
                  </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
</div>
