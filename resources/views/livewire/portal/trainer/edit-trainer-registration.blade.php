<div>
    @section('title','Edit Registration')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">New Trainer Registration Application</h4>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                            <a href="{{route('portal.trainer.registrations.index')}}" class="btn btn-success btn-square mr-1"><i class="fas fa-list"></i> Applications</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="updateTrainer" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-12"><h4 class="text-primary"><b>Trainer Details</b></h4></div>
                                </div>
                                <div class="row">
                                    <div class="@if(!$is_practical_trainer)col-sm-12 @else col-sm-6 @endif">
                                        <div class="form-group" wire:ignore>
                                            <label>Trainer Type: <sup class="text-danger">*</sup></label>
                                            <select id="trainer_type" class="form-control custom-select" wire:model="trainer_type">
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
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>First Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="firstname" wire:model="firstname" required autofocus readonly>
                                            @error('firstname')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Middle Name:</label>
                                            <input type="text" class="form-control" name="middlename" wire:model="middlename" readonly>
                                            @error('middlename')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="lastname" wire:model="lastname" required readonly>
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
                                            <select name="gender" id="gender" class="form-control custom-select" wire:model="gender" readonly>
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
                                            <input type="date" class="form-control" wire:model="dob" readonly/>
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
                                            <select id="country" class="form-control custom-select" wire:model="country" required readonly>
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
                                            <input type="text" class="form-control" name="TIN" wire:model="tin" required readonly>
                                            @error('tin')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @if($is_gambian)
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>National Identification Number (NIN)/Passport: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="NIN" wire:model="nin_passport" required readonly>
                                            @error('nin_passport')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Alien Identification Number (AIN): <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="ain" wire:model="ain" required readonly>
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
                                            <input type="email" class="form-control" name="email" wire:model="email" required readonly>
                                            @error('email')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Address: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="address" wire:model="address" required readonly>
                                            @error('address')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Postal Address:</label>
                                            <input type="text" class="form-control" name="postal_address" wire:model="postal_address" readonly>
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
                                            <input type="text" class="form-control" name="tel_home" wire:model="tel_home" readonly>
                                            @error('tel_home')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Mobile Phone: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="mobile" wire:model="mobile" required readonly>
                                            @error('mobile')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="card-title mx-2">Accreditation Details</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-responsive-sm" id="board_of_directors_table">
                                            <thead>
                                              <tr>
                                                <th>Accreditation area</th>
                                                <th>Accreditation level</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              </tr>
                                              @foreach ($accreditation_inputs as $key => $value)
                                              <tr>
                                                <td>
                                                    <input type="text" id="accreditation_area.{{$value}}" wire:model="accreditation_area.{{$value}}" class="form-control">
                                                    @error('accreditation_area.'.$value)
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <select class="form-control custom-select" wire:model="accreditation_level.{{$value}}">
                                                        <option>--- select level ---</option>
                                                        @foreach ($levels as $id => $value)
                                                            <option value="{{$value}}">{{$value}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('accreditation_level.'.$value)
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </td>
                                              </tr>
                                              @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-primary mr-1">Save Registration</button>
                                    <a href="{{route('portal.trainer.registrations.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>