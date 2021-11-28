<div>
    @section('page-title','Student Assessment Center')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Students Assessment Center</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card generated-candidates">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Assessment Type:</label>
                                        <select name="assessment_type" id="assessment_type" class="form-control custom-select" wire:model="assessment_type">
                                            <option value="">---select assessment type---</option>
                                            <option value="new">New Assessment</option>
                                            <option value="reassessment">Re-assessment</option>
                                        </select>
                                        @error('assessment_type')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="new-assessment">
                                @if(!$isReassessment)
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Candidate Type:</label>
                                            <select name="candidate_type" id="candidate_type" class="form-control custom-select" wire:model="candidate_type">
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
                                @endif
                                @if(!$isPrivate && !$isReassessment)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Education/Training Provider:</label>
                                            <select name="training_provider_id" id="training_provider_id" class="form-control custom-select" wire:model="training_provider_id">
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
                                            <select name="programme_id" id="programme_id" class="form-control custom-select" wire:model="programme_id">
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
                                            <select name="programme_level_id" id="programme_level_id" class="form-control custom-select" wire:model="programme_level_id">
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
                                @endif
                                @if($isPrivate || $isReassessment)
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Registration No:</label>
                                            <input type="text" name="registration_no" id="registration_no" class="form-control" placeholder="Enter registration no" wire:model="registration_no">
                                            @error('registration_no')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Date of Birth:</label>
                                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" wire:model="date_of_birth">
                                            @error('date_of_birth')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div> 
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-12 d-flex justify-content-center">
                                    <div class="form-group justify-content-center">
                                        <button class="btn btn-info btn-flat btn-lg mr-1" wire:click="getCandidates">
                                            <i class="fab fa-get-pocket"></i>
                                            Get candidates
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @if($candidatesExist)
                            <div class="col-12 mt-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title text-primary"><i class="fas fa-list text-primary"></i> Candidates Lists</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-12 d-flex align-self-end">
                                                <div class="form-group">
                                                    <button class="btn btn-success btn-block btn-flat" wire:click="generateCandidateIDs"><i class="fas fa-paperclip"></i> Generate Candidate IDs</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="example2" class="table table-sm datatable table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Full Name</th>
                                                        <th>Date of Birth</th>
                                                        <th>Gender</th>
                                                        <th>Email</th>
                                                        <th>Phone Number</th>
                                                        <th>Address</th>
                                                        <th>Assessment status</th>
                                                        <th>CandidateIDs</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($candidates as $candidate)
                                                        <tr>
                                                            <td>{{$candidate->registeredStudent->full_name}}</td>
                                                            <td>{{$candidate->registeredStudent->date_of_birth}}</td>
                                                            <td>{{$candidate->registeredStudent->gender}}</td>
                                                            <td>{{$candidate->registeredStudent->email}}</td>
                                                            <td>{{$candidate->registeredStudent->phone}}</td>
                                                            <td>{{$candidate->registeredStudent->address}}</td>
                                                            <td>{{$candidate->assessment_status ?? 'N/A'}}</td>
                                                            <td>{{$candidate->candidate_id?? 'N/A'}}</td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-flat btn-primary" wire:click="$emit('openAssessmentForm',{{$candidate->id}})" 
                                                                    title="Enter student assessment details">
                                                                    <i class="fab fa-wpforms"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @livewire('assessment-certification.assessment-form')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
