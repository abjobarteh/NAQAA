<div>
    @section('title','Student Details Datacollection')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                             <h4 class="card-title mb-0">Student Details Bulk Import</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                   <form wire:submit.prevent="importData">
                       <div class="form-group">
                           <input type="file" wire:model="excel_file">
                           @error('excel_file') <span class="text-danger mt-1">{{ $message }}</span> @enderror
                       </div>
                       <div class="form-group">
                           <button type="submit" class="btn btn-success">Start Import</button>
                       </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
