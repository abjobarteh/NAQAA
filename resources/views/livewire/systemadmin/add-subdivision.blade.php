<div>
    <div class="modal fade" id="add-or-update-subdivision" wire:ignore.self>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Subdivision</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form wire:submit.prevent="createSubdivision">
                  <div class="form-group">
                    <label for="subdivisionName">Subdivision Name</label>
                    <input type="text" class="form-control form-control-border" placeholder="Enter subdivision name" wire:model.lazy="subdivisionName">
                    @error('subdivisionName')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="subdivisionType">Subdvision Type</label>
                    <select class="custom-select form-control-border" wire:model="subdivisionType">
                      <option selected>Select subdivision type</option>
                      <option value="regions">Region</option>
                      <option value="districts">District</option>
                      <option value="towns_villages">Towns/Village</option>
                    </select>
                    @error('subdivisionType')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>

                  @if($isCreatingDistrict)
                  <div class="form-group">
                    <label for="region">Regions</label>
                    <select class="custom-select form-control-border" wire:model="region">
                      <option selected>Select Region</option>
                      @forelse ($regions as $region)
                        <option value="{{$region->id}}">{{$region->region_name}}</option>
                      @empty
                        <option>No regions in the system</option>
                      @endforelse
                    </select>
                    @error('region')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                  @endif

                  @if($iscreatingTownsVillages)
                  <div class="form-group">
                    <label for="region">Districts</label>
                    <select class="custom-select form-control-border" wire:model="district">
                      <option selected>Select Districts</option>
                      @forelse ($districts as $district)
                        <option value="{{$district->id}}">{{$district->district_name}}</option>
                      @empty
                        <option>No districts in the system</option>
                      @endforelse
                    </select>
                    @error('district')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                  @endif
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
