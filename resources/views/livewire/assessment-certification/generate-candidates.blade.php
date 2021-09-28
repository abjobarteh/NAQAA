<div>
    @section('page-title','Generate Candidates for Assessment')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Generate Candidates for Assessment</h1>
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
                            <form wire:submit.prevent="getCandidates">
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
                                    <div class="col-sm-5">
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
                                    <div class="col-sm-4">
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
                            @if($candidatesExist)
                            <div class="col-12 mt-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title text-primary"><i class="fas fa-list text-primary"></i> Candidates Lists</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-12 col-md-5">
                                                <div class="form-group">
                                                    <label for="assessors">Assessors</label>
                                                    <select name="assessor_id" id="assessor_id" wire:model="assessor_id" class="form-control custom-select">
                                                        <option value="">--- select assessor ---</option>
                                                        @foreach ($assessors as $assessor)
                                                            <option value="{{$assessor->id}}">{{$assessor->full_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('assessor_id')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-5">
                                                <div class="form-group">
                                                    <label for="verifier_id">Verifiers</label>
                                                    <select name="verifier_id" id="verifier_id" wire:model="verifier_id" class="form-control custom-select">
                                                        <option value="">--- select verifier ---</option>
                                                        @foreach ($verifiers as $verifier)
                                                            <option value="{{$verifier->id}}">{{$verifier->full_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('verifier_id')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-2 d-flex align-self-end">
                                                <div class="form-group">
                                                    <button class="btn btn-success btn-block btn-flat" wire:click="assignAssessor"><i class="fas fa-paperclip"></i> assign</button>
                                                </div>
                                            </div>
                                        </div>
                                        <table id="example2" class="table datatable table-bordered">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" wire:model="selectAll"/></th>
                                                    <th>First Name</th>
                                                    <th>Middle Name</th>
                                                    <th>Last Name</th>
                                                    <th>Date of Birth</th>
                                                    <th>Gender</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Address</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($candidates as $candidate)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" wire:model="selectedCandidates" {{ in_array($candidate->id,$selectedCandidates) ? 'checked' : ''}} value="{{$candidate->id}}"/>
                                                        </td>
                                                        <td>{{$candidate->firstname}}</td>
                                                        <td>{{$candidate->middlename ?? 'N/A'}}</td>
                                                        <td>{{$candidate->lastname}}</td>
                                                        <td>{{$candidate->date_of_birth}}</td>
                                                        <td>{{$candidate->gender}}</td>
                                                        <td>{{$candidate->email}}</td>
                                                        <td>{{$candidate->phone}}</td>
                                                        <td>{{$candidate->address}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
