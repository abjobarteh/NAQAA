<div>
    @section('page-title','Registered Trainer Report')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Registered Trainer Report</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registered Trainer reports</h3>
                </div>
                
                <div class="card-body">
                    <form wire:submit.prevent="getReport">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="trainer_type">Trainer Type:</label>
                                    <select class="form-control custom-select" wire:model="trainer_type">
                                        <option>--- select trainer type ---</option>
                                        @foreach ($trainer_types as $type)
                                            <option value="{{$type->slug}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if($is_highest_qualification)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="highest_qualification">Highest Qualification:</label>
                                    <select class="form-control custom-select" wire:model="highest_qualification">
                                        <option>--- select highest qualification ---</option>
                                        @foreach ($levels as $id => $name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @elseif($is_nationality)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nationality">Nationality:</label>
                                    <select class="form-control custom-select" wire:model="nationality">
                                        <option>--- select nationality ---</option>
                                        @foreach ($nationalities as $id => $name)
                                            <option value="{{$name}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @elseif($is_programme)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="programme">Programme Area:</label>
                                    <input type="text" id="programme" class="form-control" placeholder="Enter Programme area" wire:model="programme">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="level">Level:</label>
                                    <select class="form-control custom-select" wire:model="level">
                                        <option>--- select level ---</option>
                                        @foreach ($levels as $id => $name)
                                            <option value="{{$name}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @elseif($is_region)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="region">Region:</label>
                                    <select class="form-control custom-select" wire:model="region">
                                        <option>--- select region ---</option>
                                        @foreach ($regions as $id => $region)
                                            <option value="{{$id}}">{{$region}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @elseif($is_license_status)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="year">Year:</label>
                                    <input type="text" id="year" class="form-control" placeholder="Enter year" wire:model="year">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="license_status">License Status:</label>
                                    <select class="form-control custom-select" wire:model="license_status">
                                        <option>--- select license status ---</option>
                                        @foreach ($statuses as $status)
                                            <option value="{{$status}}">{{$status}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-flat">Generate</button>
                                    <a class="btn btn-warning btn-flat" href="{{route('registration-accreditation.reports.registered-trainers')}}">
                                        <i class="fas fa-arrow-left"></i> 
                                        Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

