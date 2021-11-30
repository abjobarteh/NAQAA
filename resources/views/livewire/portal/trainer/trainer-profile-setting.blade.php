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
                    <form wire:submit.prevent="saveProfile" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-12"><h4 class="text-primary"><b>Trainer Details</b></h4></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>First Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="firstname" wire:model="firstname" required autofocus>
                                            @error('firstname')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Middle Name:</label>
                                            <input type="text" class="form-control" name="middlename" wire:model="middlename">
                                            @error('middlename')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="lastname" wire:model="lastname" required>
                                            @error('lastname')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Gender: <sup class="text-danger">*</sup></label>
                                            <select name="gender" id="gender" class="form-control custom-select" wire:model="gender">
                                                <option value="">Select gender</option>
                                                <option value="M" {{ old('gender') == 'M' ? 'selected': '' }}>Male</option>
                                                <option value="F" {{ old('gender') == 'F' ? 'selected': '' }}>Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Date of Birth:</label>
                                            <input type="date" class="form-control" wire:model="dob"/>
                                            @error('dob')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Country of Origin/Citizenship:</label>
                                            <select id="country" class="form-control custom-select" wire:model="country" required>
                                                <option>Select country of origin/citizenship</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{$country}}">{{$country}}</option>
                                                @endforeach
                                            </select>
                                            @error('country')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tax Identification Number (TIN): <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="TIN" wire:model="tin" required>
                                            @error('tin')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @if($is_gambian)
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>National Identification Number (NIN)/Passport: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="NIN" wire:model="nin_passport" required>
                                            @error('nin_passport')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Alien Identification Number (AIN): <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="ain" wire:model="ain" required>
                                            @error('ain')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Email: <sup class="text-danger">*</sup></label>
                                            <input type="email" class="form-control" name="email" wire:model="email" required>
                                            @error('email')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Address: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="address" wire:model="address" required>
                                            @error('address')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Postal Address:</label>
                                            <input type="text" class="form-control" name="postal_address" wire:model="postal_address">
                                            @error('postal_address')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Telephone (Home):</label>
                                            <input type="text" class="form-control" name="tel_home" wire:model="tel_home">
                                            @error('tel_home')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Mobile Phone: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="mobile" wire:model="mobile" required>
                                            @error('mobile')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-primary mr-1">Save Profile</button>
                                </div>
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
