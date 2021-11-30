<div>
    @section('title','Profile Settings')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">Profile Settings</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($is_success)
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{$message}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>  
                    @endif
                    <form wire:submit.prevent="saveProfile">
                    @csrf
                    <h4 class="card-title">Institutional Details</h4>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="category_id">Classification: <sup class="text-danger">*</sup></label>
                            <select wire:model="classification_id" id="classification_id" class="form-control custom-select">
                                <option value="">--- select classification</option>
                                @foreach ($classifications as $id => $classification)
                                    <option value="{{$id}}">{{$classification}}</option>
                                @endforeach
                            </select>
                            @error('classification_id')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="address">Physical Address (Admin Site): <sup class="text-danger">*</sup></label>
                            <input type="text" id="address" wire:model="address" class="form-control" required>
                            @error('address')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="postal_address">Postal Address:</label>
                            <input type="text" id="po_box" wire:model="po_box" class="form-control">
                            @error('po_box')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="telephone_work">Telephone (Work): <sup class="text-danger">*</sup></label>
                            <input type="number" id="telephone_work" wire:model="telephone_work" class="form-control" min="0" step="1" required>
                            @error('telephone_work')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="mobile_phone">Mobile Phone: <sup class="text-danger">*</sup></label>
                            <input type="number" id="mobile_phone" wire:model="mobile_phone" class="form-control" min="0" step="1" required>
                            @error('mobile_phone')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="fax">Fax:</label>
                            <input type="number" id="fax" wire:model="fax" class="form-control" min="0" step="1">
                            @error('fax')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="email">Email: <sup class="text-danger">*</sup></label>
                            <input type="email" id="email" wire:model="email" class="form-control" required>
                            @error('email')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="website">Website:</label>
                            <input type="text" id="website" wire:model="website" class="form-control">
                            @error('website')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="region_id">Region: <sup class="text-danger">*</sup></label>
                            <select wire:model="region_id" id="region_id" class="form-control select2" required>
                                <option value="">--- select region ---</option>
                                @foreach ($regions as $id => $region)
                                    <option value="{{$id}}">{{$region}}</option>
                                @endforeach
                            </select>
                            @error('region_id')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="district_id">District: <sup class="text-danger">*</sup></label>
                            <select wire:model="district_id" id="district_id" class="form-control select2" required>
                                <option value="">--- select district ---</option>
                                @foreach ($districts as $id => $district)
                                    <option value="{{$id}}">{{$district}}</option>
                                @endforeach
                            </select>
                            @error('district_id')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="town_village_id">Town/village:</label>
                            <select wire:model="town_village_id" id="town_village_id" class="form-control select2">
                                <option value="">--- select Town/village ---</option>
                                @foreach ($townvillages as $id => $townvillage)
                                    <option value="{{$id}}">{{$townvillage}}</option>
                                @endforeach
                            </select>
                            @error('town_village_id')
                                <span class="text-danger mt-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <button type="submit" id="save_profile" class="btn btn-primary btn-square">Save Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="card-title">Password Settings</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="updatePassword" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-12"><h4 class="text-primary"><b>Update Password</b></h4></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Current Password: <sup class="text-danger">*</sup></label>
                                        <input type="password" class="form-control" name="current_password" wire:model="current_password" required>
                                        @error('current_password')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>New Password: <sup class="text-danger">*</sup></label>
                                        <input type="password" class="form-control" name="new_password" wire:model="new_password" required>
                                        @error('new_password')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>New Password Confirmation: <sup class="text-danger">*</sup></label>
                                        <input type="password" class="form-control" name="new_password_confirmation" wire:model="new_password_confirmation">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success mr-1">Update Password</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

    @section('scripts')
        <script>

            $(document).ready(function() {

                $('.select2').select2();

                $('.select2').on('change', function (e) {
                    
                    var data = $('#'+$(this).attr('id')).select2("val");

                    @this.set(`${$(this).attr('id')}`, data);

                });
            });

        </script>
    @endsection
</div>
