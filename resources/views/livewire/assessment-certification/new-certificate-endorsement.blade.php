<div>
    @section('page-title','New Certificate Endorsements')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Certificate Endorsements</h1>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title"><i class="fas fa-plus"></i> New Certificate Endorsement</h3>
                                </div>
                                <div class="col-md-6 d-flex flex-direction-row justify-content-end">
                                    <a href="{{route('assessment-certification.certificate-endorsements.index')}}" class="btn btn-success btn-flat"><i class="fas fa-list"></i> Endorsed Certificates</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($is_error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{$error_msg}}
                                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <form wire:submit.prevent="storeEndorsement" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group" wire:ignore>
                                            <label>Institution:</label>
                                            <select wire:model="training_provider_id" id="training_provider_id" class="form-control select2" required>
                                                <option value="">---select institution---</option>
                                                @foreach ($institutions as $id => $institution)
                                                    <option value="{{$id}}" {{ old('training_provider_id') === $id ? 'selected' : ''}}>{{$institution}}</option>
                                                @endforeach
                                            </select>
                                            @error('training_provider_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="@if($programmes_exist) col-sm-6 @else col-md-12 @endif">
                                        <div class="form-group" wire:ignore>
                                            <label>level: <sup class="text-danger">*</sup></label>
                                            <select wire:model="level" id="level" class="form-control select2" required>
                                                <option value="">---select programme level---</option>
                                                @foreach ($levels as $id => $level)
                                                    <option value="{{$level}}">{{$level}}</option>
                                                @endforeach
                                            </select>
                                            @error('level')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @if ($programmes_exist)
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Programme: <sup class="text-danger">*</sup></label>
                                            <select wire:model="programme" id="programme" class="form-control custom-select" required>
                                                <option value="">---select programme---</option>
                                                @foreach ($programmes as $pr)
                                                    <option value="{{$pr->programme->name}}">{{$pr->programme->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('programme')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Programme Start Date: <sup class="text-danger">*</sup></label>
                                            <input type="date" class="form-control" wire:model="programme_start_date" required/>
                                            @error('programme_start_date')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Programme End Date: <sup class="text-danger">*</sup></label>
                                            <input type="date" class="form-control" wire:model="programme_end_date" required/>
                                            @error('programme_end_date')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Total certificates declared: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" wire:model="total_certificates_declared" min="0" step="1" required>
                                            @error('total_certificates_declared')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Total certificates received: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" wire:model="total_certificates_received" min="0" step="1" required>
                                            @error('total_certificates_received')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Total males:</label>
                                            <input type="number" class="form-control" wire:model="total_males" min="0" step="1" required>
                                            @error('total_males')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Total females: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" wire:model="total_females" min="0" step="1" required>
                                            @error('total_females')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Total Endorsed certificates: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" wire:model="endorsed_certificates" min="0" step="1" required>
                                            @error('endorsed_certificates')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Total Non-Endorsed certificates: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" wire:model="non_endorsed_certificates" min="0" step="1" required>
                                            @error('non_endorsed_certificates')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header bg-secondary">
                                                <h3 class="card-title">Trainers</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <table class="table" id="trainers_table">
                                                            <thead>
                                                                <tr>
                                                                    <th>First name</th>
                                                                    <th>Midldle name</th>
                                                                    <th>Last name</th>
                                                                    <th>License No</th>
                                                                    <th>Module</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" id="firstnames" wire:model="firstnames.0" class="form-control" placeholder="Enter trainer firstname" />
                                                                        @error('firstnames.0')
                                                                            <span class="text-danger mt-1">{{$message}}</span>
                                                                        @enderror
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="middlenames" wire:model="middlenames.0" class="form-control" placeholder="Enter trainer middlename" />
                                                                        @error('middlenames.0')
                                                                            <span class="text-danger mt-1">{{$message}}</span>
                                                                        @enderror
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="lastnames" wire:model="lastnames.0" class="form-control" placeholder="Enter trainer lastname" />
                                                                        @error('lastnames.0')
                                                                            <span class="text-danger mt-1">{{$message}}</span>
                                                                        @enderror
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="license_nos" wire:model="license_nos.0" class="form-control" placeholder="Enter trainer license no" />
                                                                        @error('license_nos.0')
                                                                            <span class="text-danger mt-1">{{$message}}</span>
                                                                        @enderror
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="modules" wire:model="modules.0" class="form-control" placeholder="Enter module" />
                                                                        @error('modules.0')
                                                                            <span class="text-danger mt-1">{{$message}}</span>
                                                                        @enderror
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn text-white btn-info btn-sm" wire:click.prevent="addTrainer({{$trainer_counter}})">Add</button>
                                                                    </td>
                                                                </tr>
                                                                @foreach ($trainer_inputs as $key => $value)
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" id="firstnames.{{$key}}" wire:model="firstnames.{{$value}}" class="form-control" placeholder="Enter trainer firstname" />
                                                                        @error('firstnames.{{$value}}')
                                                                            <span class="text-danger mt-1">{{$message}}</span>
                                                                        @enderror
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="middlenames.{{$key}}" wire:model="middlenames.{{$value}}" class="form-control" placeholder="Enter trainer middlename" />
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="lastnames.{{$key}}" wire:model="lastnames.{{$value}}" class="form-control" placeholder="Enter trainer lastname" />
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="license_nos.{{$key}}" wire:model="license_nos.{{$value}}" class="form-control" placeholder="Enter trainer license no" />
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="modules.{{$key}}" wire:model="modules.{{$value}}" class="form-control" placeholder="Enter module" />
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn text-white btn-danger btn-sm" wire:click.prevent="removeTrainer({{$key}})">Remove</button>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary mr-1">Save details</button>
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
