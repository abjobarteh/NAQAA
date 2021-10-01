<div>
    @section('page-title','Labour Market Related Data Report')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Registered Trainers</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registered Trainers Reports</h3>
                </div>
                
                <div class="card-body">
                    <form wire:submit.prevent="getReport">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="research_topic">Programme</label>
                                    <input type="text" class="form-control" id="position_advertised" wire:model="position_advertised" placeholder="Programme">
                                    @error('position_advertised')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="field_of_education">Field of Education</label>
                                    <select wire:model="field_of_education" class="form-control custom-select">
                                        <option value="">--- field of education ---</option>
                                        @foreach ($fields_of_education as $field)
                                            <option value="{{$field}}">{{$field}}</option>
                                        @endforeach
                                    </select>
                                    @error('field_of_education')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="educational_level">Educational Level</label>
                                    <select wire:model="educational_level" class="form-control custom-select">
                                        <option value="">--- educational level ---</option>
                                        @foreach ($levels as $level)
                                            <option value="{{$level}}">{{$level}}</option>
                                        @endforeach
                                    </select>
                                    @error('educational_level')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="job_status">Classifications</label>
                                    <select wire:model="job_status" id="job_status" class="form-control custom-select">
                                        <option>--- classifications ---</option>
                                        <@foreach ($classifications as $classification)
                                            <option value="{{$classification}}">{{$classification}}</option>
                                        @endforeach
                                    </select>
                                    @error('job_status')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="educational_level">Region</label>
                                    <select wire:model="educational_level" class="form-control custom-select">
                                        <option value="">--- region ---</option>
                                        @foreach ($levels as $level)
                                            <option value="{{$level}}">{{$level}}</option>
                                        @endforeach
                                    </select>
                                    @error('educational_level')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="job_status">District</label>
                                    <select wire:model="job_status" id="job_status" class="form-control custom-select">
                                        <option>--- district ---</option>
                                        <@foreach ($classifications as $classification)
                                            <option value="{{$classification}}">{{$classification}}</option>
                                        @endforeach
                                    </select>
                                    @error('job_status')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="job_status">Localgoverment Area</label>
                                    <select wire:model="job_status" id="job_status" class="form-control custom-select">
                                        <option>--- localgoverment area ---</option>
                                        <@foreach ($classifications as $classification)
                                            <option value="{{$classification}}">{{$classification}}</option>
                                        @endforeach
                                    </select>
                                    @error('job_status')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <div class="form-group">
                                    <button class="btn btn-success btn-flat"><i class="fas fa-file-export"></i> Generate Report</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
