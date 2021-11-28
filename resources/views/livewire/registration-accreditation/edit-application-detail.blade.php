<div>
    <div>
    @if ($application->application_type === "institution_letter_of_interim_authorisation")
    @livewire('registration-accreditation.manage-applications.interim-authorisation-application',["application" => $application])    
    @endif
    </div>
    @if ($application->application_type === "institution_registration")
        @livewire('registration-accreditation.manage-applications.institution-registration-application',["application" => $application])    
    @endif
    @if ($application->application_type === "institution_accreditation")
        @livewire('registration-accreditation.manage-applications.institution-accreditation-application',["application" => $application])    
    @endif
    @if ($application->application_type === "trainer_registration")
        @livewire('registration-accreditation.manage-applications.trainer-registration-application',["application" => $application])    
    @endif
    @if ($application->application_type === "trainer_accreditation")
        @livewire('registration-accreditation.manage-applications.trainer-accreditation-application',["application" => $application])    
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Application Status</h3>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="UpdateApplication">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Application status: <sup class="text-danger">*</sup></label>
                                    <select name="status" id="application_status" class="form-control custom-select" wire:model="application_status">
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
                        {{-- <div class="row">
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
                        </div> --}}
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-primary mr-1">Update Application</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
