<div>
    @section('page-title','Competent Students Export')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Competent Students Export</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="col-12 mb-2">
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form wire:submit.prevent="exportCompetentStudents">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Candidate Type:</label>
                                            <select class="form-control custom-select" wire:model="candidate_type">
                                                <option value="">---select candidates type to assess---</option>
                                                <option value="regular">Regular</option>
                                                <option value="private">Private</option>
                                            </select>
                                            @error('candidate_type')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                @if(!$isPrivate)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Education/Training Provider:</label>
                                            <select class="form-control custom-select" wire:model="training_provider_id">
                                                <option value="">---select education/training provider---</option>
                                                @foreach ($institutions as $id => $institution)
                                                    <option value="{{$id}}">{{$institution}}</option>
                                                @endforeach
                                            </select>
                                            @error('training_provider_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Programme:</label>
                                            <select class="form-control custom-select" wire:model="programme_id">
                                                <option value="">---select programme---</option>
                                                @foreach ($programmes as $id => $programme)
                                                    <option value="{{$id}}">{{$programme}}</option>
                                                @endforeach
                                            </select>
                                            @error('programme_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Level:</label>
                                            <select class="form-control custom-select" wire:model="programme_level_id">
                                                <option value="">---select programme level---</option>
                                                @foreach ($levels as $id => $level)
                                                    <option value="{{$id}}">{{$level}}</option>
                                                @endforeach
                                            </select>
                                            @error('programme_level_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Academic Year:</label>
                                            <input type="number" class="form-control" placeholder="Academic year" wire:model="academic_year" min="0" step="1">
                                            @error('academic_year')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                               @else
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Registration No:</label>
                                            <input type="text" class="form-control" placeholder="Enter registration no" wire:model="registration_no">
                                            @error('registration_no')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Date of Birth:</label>
                                            <input type="date" class="form-control" wire:model="date_of_birth">
                                            @error('date_of_birth')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div> 
                                </div> 
                                @endif
                                <div class="row">
                                    <div class="col-sm-12 d-flex justify-content-center">
                                        <div class="form-group justify-content-center">
                                            <button type="submit" class="btn btn-info btn-flat btn-lg mr-1">
                                                <i class="fab fa-get-pocket"></i>
                                                Generate candidates
                                            </button>
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
</div>
