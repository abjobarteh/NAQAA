<div>
    @section('title','Candidates Assesment Results')

    <div class="container-fluid">
        <div class="fade-in">
           <div class="card">
               <div class="card-header">
                   <div class="row">
                       <div class="col-sm-6">
                            <h4 class="card-title mb-0">Candidates Assesment Results</h4>
                       </div>
                   </div>
               </div>
               <div class="card-body">
                @if ($is_error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{$error_msg}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>  
                @endif
                    <div class="row">
                        <div class="col-12">
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
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            <div class="form-group justify-content-center">
                                <button class="btn btn-info btn-flat btn-lg mr-1" wire:click="getCandidates">
                                    <i class="fab fa-get-pocket"></i>
                                    Get candidates
                                </button>
                            </div>
                        </div>
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
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($candidates as $candidate)
                                        <tr>
                                            <td>{{$candidate->student->full_name}}</td>
                                            <td>{{$candidate->student->date_of_birth}}</td>
                                            <td>{{$candidate->student->gender}}</td>
                                            <td>{{$candidate->student->email}}</td>
                                            <td>{{$candidate->student->phone}}</td>
                                            <td>{{$candidate->student->address}}</td>
                                            <td>{{$candidate->assessment_status ?? 'N/A'}}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-flat btn-primary" wire:click="$emit('openTrainerAssessmentForm',{{$candidate->id}})" 
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
            @livewire('portal.trainer.assessment-form')
            @endif
        </div>
     </div>
</div>
