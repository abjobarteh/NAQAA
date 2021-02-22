<div>
    <div class="modal fade" id="add-directorate" wire:ignore.self>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Directorate</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="createDirectorate">
                  <div class="form-group">
                    <label for="directorateName">Directorate Name</label>
                    <input type="text" class="form-control form-control-border" placeholder="Enter Directorate name" wire:model.lazy="directorateName" required autofocus>
                    @error('directorateName')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Directorate</button>
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
