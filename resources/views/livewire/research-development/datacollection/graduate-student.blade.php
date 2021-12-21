<div>
    @section('page-title','Graduate Students Data Collection')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Graduate Students Data Collection</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form wire:submit.prevent="getStudents">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Training Provider:</label>
                                            <select class="form-control custom-select" wire:model="training_provider_id">
                                                <option value="">---select training provider---</option>
                                                @foreach ($trainingproviders as $id => $trainingprovider)
                                                    <option value="{{$id}}">{{$trainingprovider}}</option>
                                                @endforeach
                                            </select>
                                            @error('training_provider_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>First Name:</label>
                                            <input type="text" class="form-control" placeholder="First Name" wire:model="firstname">
                                            @error('firstname')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Middle Name:</label>
                                            <input type="text" class="form-control" placeholder="Middle Name" wire:model="middlename">
                                            @error('middlename')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Last Name:</label>
                                            <input type="text" class="form-control" placeholder="Last Name" wire:model="lastname">
                                            @error('lastname')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Gender:</label>
                                            <select class="form-control custom-select" wire:model="gender">
                                                <option value="">---select gender---</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Programme:</label>
                                            <input type="text" class="form-control" placeholder="Programme" wire:model="programme">
                                            @error('programme')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Award:</label>
                                            <select class="form-control custom-select" wire:model="award_id">
                                                <option value="">---select award---</option>
                                                @foreach ($levels as $id => $level)
                                                    <option value="{{$id}}">{{$level}}</option>
                                                @endforeach
                                            </select>
                                            @error('award_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Admission Year:</label>
                                            <input type="number" class="form-control" placeholder="Admission year" wire:model="admission_year" min="0" step="1">
                                            @error('admission_year')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 d-flex justify-content-center">
                                        <div class="form-group justify-content-center">
                                            <button type="submit" class="btn btn-info btn-flat btn-lg mr-1">
                                                <i class="fas fa-search"></i>
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @if($studentsExist)
                            <div class="col-12 mt-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title text-primary"><i class="fas fa-list text-primary"></i> Candidates Lists</h3>
                                    </div>
                                    <div class="card-body">
                                        <table id="example2" class="table datatable table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Middle Name</th>
                                                    <th>Last Name</th>
                                                    <th>Date of Birth</th>
                                                    <th>Gender</th>
                                                    <th>Phone Number</th>
                                                    <th>Programme</th>
                                                    <th>Award</th>
                                                    <th>Admission Date</th>
                                                    <th>Graduation Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($students as $student)
                                                    <tr>
                                                        <td>{{$student->firstname}}</td>
                                                        <td>{{$student->middlename ?? 'N/A'}}</td>
                                                        <td>{{$student->lastname}}</td>
                                                        <td>{{$student->date_of_birth}}</td>
                                                        <td>{{$student->gender}}</td>
                                                        <td>{{$student->phone}}</td>
                                                        <td>{{$student->programme_name}}</td>
                                                        <td>{{$student->awardName->name ?? 'N/A'}}</td>
                                                        <td>{{$student->admission_date}}</td>
                                                        <td>{{$student->graduation_date ?? 'N/A'}}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-flat btn-success" wire:click="$emit('openGraduationDateForm',{{$student->id}})" 
                                                                title="Click to open student graduation date form">
                                                                <i class="fas fa-calendar-plus"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="graduation-date-modal" wire:ignore.self>
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>Student Graduation Date</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                          <div class="col-12">
                                              <div class="form-group">
                                                  <label for="graduation_date">Graduation date</label>
                                                  <input type="date" name="graduation_date" class="form-control" placeholder="Graduation date" wire:model="graduation_date" />
                                              </div>
                                          </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" wire:click="closeGraduationDateForm">Close</button>
                                      <button type="button" class="btn btn-flat btn-success" wire:click="saveStudentGraduationDate">Save Graduation Date</button>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal -->
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
