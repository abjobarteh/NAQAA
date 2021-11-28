<div>
    @section('page-title')
    Trainer Registration
    @endsection
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Trainer Registration Application</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('registration-accreditation.applications.index')}}">
                                Applications
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Trainer Registration Details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                {{-- left Side --}}
                <div class="col-sm-12 col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Trainer Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">First Name: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainer->firstname}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Middle Name: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainer->middlename}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Last Name: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainer->lastname}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Date of Birth: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainer->date_of_birth ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Gender: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainer->gender ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Country of Citizenship: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainer->country_of_citizenship ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">TIN: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainer->tin ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">{{$application->trainer->country_of_citizenship == "Gambuia" ? "NIN" : "TIN"}}: </b>
                                            <p class="col-sm-5 text-muted">
                                                {{$application->trainer->country_of_citizenship == "Gambuia" ? $application->trainer->nin : $application->trainer->tin}}
                                            </p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Email: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainer->email?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Physical Address: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainer->physical_address ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Postal Address: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainer->postal_address ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Telphone Home: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainer->phone_home ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Mobile Phone: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainer->phone_mobile ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Application Trainer Type: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainer_type ?? 'N/A'}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- right Side --}}
                <div class="col-sm-12 col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Trainer Checklist Attachment</h3>
                        </div>
                        <div class="card-body">
                            @forelse ($checklists as $ch)
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">{{$ch->checklist->name}}: </b>
                                <a href="{{$ch->path ?? '#'}}" target="_blank" rel="noreferrer" class="btn btn-sm btn-info">View</a>
                            </div> 
                            @empty
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">No checklists uploaded! </b>
                            </div> 
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Applied Programme Accreditations</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Programme Name</th>
                                        <th>Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($application->trainerAccreditations as $accreditation)
                                        <tr>
                                            <td>{{ $accreditation->area }}</td>
                                            <td>{{ $accreditation->level }}</td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center"><span class="text-bold text-lg">No Applied Programmes for Accreditation!</span></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
