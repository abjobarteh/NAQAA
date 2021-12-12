<div>
    @section('page-title','GSQ Portal Registrations')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Portal Registrations</h1>
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
                            <form wire:submit.prevent="getPendingRegistrations">
                                <div class="row">
                                    <div class="col-sm-6">
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Academic Year:</label>
                                            <input type="number" class="form-control" placeholder="Academic year" wire:model="academic_year" min="0" step="1">
                                            @error('academic_year')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 d-flex justify-content-center">
                                        <div class="form-group justify-content-center">
                                            <button type="submit" class="btn btn-info btn-flat btn-lg mr-1">
                                                <i class="fab fa-get-pocket"></i>
                                                Get Candidates
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
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="assessors">Total candidates : <b>{{ $candidates->count() }}</b></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 d-flex align-self-end">
                                                <div class="form-group">
                                                    <button class="btn btn-success btn-block btn-flat" wire:click="approveRegistrations">
                                                        <i class="fas fa-check-double"></i> Approved All Registration
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <table id="example2" class="table datatable table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Middle Name</th>
                                                    <th>Last Name</th>
                                                    <th>Date of Birth</th>
                                                    <th>Gender</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Address</th>
                                                    <th>Programme</th>
                                                    <th>Level</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($candidates as $candidate)
                                                    <tr>
                                                        <td>{{$candidate->registeredStudent->firstname}}</td>
                                                        <td>{{$candidate->registeredStudent->middlename ?? 'N/A'}}</td>
                                                        <td>{{$candidate->registeredStudent->lastname}}</td>
                                                        <td>{{$candidate->registeredStudent->date_of_birth}}</td>
                                                        <td>{{$candidate->registeredStudent->gender}}</td>
                                                        <td>{{$candidate->registeredStudent->email}}</td>
                                                        <td>{{$candidate->registeredStudent->phone}}</td>
                                                        <td>{{$candidate->registeredStudent->address}}</td>
                                                        <td>{{$candidate->programme->name ?? 'N/A'}}</td>
                                                        <td>{{$candidate->level->name ?? 'N/A'}}</td>
                                                        <td>
                                                            <span class="badge badge-primary badge-rounded badge-sm">
                                                            {{$candidate->registration_status ?? 'N/A'}}
                                                            </span>
                                                        </td>
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
