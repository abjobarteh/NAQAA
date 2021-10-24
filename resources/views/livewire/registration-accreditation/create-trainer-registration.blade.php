<div>
    @section('page-title')
    New Trainer Registration
    @endsection
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Trainer Registration</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('registration-accreditation.registration.trainers.index')}}">
                                Trainers
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Add Trainer</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Trainer</h3>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="registerTrainer" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-12"><h4 class="text-primary"><b>Trainer Details</b></h4></div>
                                        </div>
                                        {{-- <div class="row">
                                            <div class="@if(!$is_practical_trainer)col-sm-12 @else col-sm-6 @endif">
                                                <div class="form-group" wire:ignore>
                                                    <label>Trainer Type: <sup class="text-danger">*</sup></label>
                                                    <select id="trainer_type" class="form-control select2" wire:model="trainer_type">
                                                        <option value="">Select type of trainer</option>
                                                        @foreach ($trainer_types as $trainer)
                                                        <option value="{{$trainer->name}}">{{$trainer->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('type')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            @if($is_practical_trainer)
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Practical Trainer Type: <sup class="text-danger">*</sup></label>
                                                    <select id="practical_trainer" class="form-control custom-select" wire:model="practical_trainer">
                                                        <option value="">Select practical trainer type</option>
                                                        <option value="CraftPerson">Craft Person</option>
                                                        <option value="MasterCraftPerson">Master Craft Person</option>
                                                    </select>
                                                    @error('practical_trainer')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            @endif
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>First Name: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="firstname" wire:model="firstname" required>
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
                                                <div class="form-group" wire:ignore>
                                                    <label>Gender: <sup class="text-danger">*</sup></label>
                                                    <select name="gender" id="gender" class="form-control select2" wire:model="gender">
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
                                                <div class="form-group" wire:ignore>
                                                    <label>Country of Origin/Citizenship:</label>
                                                    <select id="country" class="form-control select2" wire:model="country" required>
                                                        <option value="">Select country of origin/citizenship</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{$country}}" {{$country === 'Gambia' ? 'selected' : ''}}>{{$country}}</option>
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
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-12"><h4 class="text-primary"><b>Trainer Application Details</b></h4></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Application No: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="application_no" wire:model="application_no" required readonly>
                                                    @error('application_no')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Application Date: <sup class="text-danger">*</sup></label>
                                                    <input type="date" class="form-control" name="application_date" wire:model="application_date"/>
                                                    @error('application_date')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group" wire:ignore>
                                                    <label>Application status: <sup class="text-danger">*</sup></label>
                                                    <select name="status" id="application_status" class="form-control select2" wire:model="application_status">
                                                        <option>Select application status</option>
                                                        @foreach ($application_statuses as $status)
                                                            <option value="{{$status}}">{{$status}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('application_status')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        @if($is_approved)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>License No: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="license_no" wire:model="license_no"/>
                                                    @error('license_no')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>License Start Date: <sup class="text-danger">*</sup></label>
                                                    <input type="date" class="form-control" name="license_start_date" wire:model="license_start_date"/>
                                                    @error('license_start_date')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>License End Date: <sup class="text-danger">*</sup></label>
                                                    <input type="date" class="form-control" name="license_end_date" wire:model="license_end_date"/>
                                                    @error('license_end_date')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary mr-1">Save Registration</button>
                                            <a href="{{route('registration-accreditation.registration.trainers.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
