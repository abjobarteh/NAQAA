<div>
    @section('title','New Accreditation')

    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">New Trainer Accreditation Application</h4>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                            <a href="{{route('portal.trainer.accreditations.index')}}" class="btn btn-success btn-square mr-1"><i class="fas fa-list"></i> Applications</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="submitApplication" autocomplete="off">
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
                                                @foreach ($trainer_types as $id =>  $type)
                                                <option value="{{$type}}">{{$type}}</option>
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
                                                <option value="">--- select practical trainer type ---</option>
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
                                                <th></th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td>
                                                    <input type="text" id="accreditation_area.0" wire:model="accreditation_area.0" class="form-control">
                                                    @error('accreditation_area.0')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <select class="form-control custom-select" wire:model="accreditation_level.0">
                                                        <option>--- select level ---</option>
                                                        @foreach ($levels as $id => $value)
                                                            <option value="{{$value}}">{{$value}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('accreditation_level.0')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <button type="button" class="btn text-white btn-info btn-sm" wire:click.prevent="addAccreditation({{$accreditation_counter}})">Add</button>
                                                </td>
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
                                                <td>
                                                    <button class="btn text-white btn-danger btn-sm" wire:click.prevent="removeAccreditation({{$key}})">Remove</button>
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
                                    <a href="{{route('portal.trainer.accreditations.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>