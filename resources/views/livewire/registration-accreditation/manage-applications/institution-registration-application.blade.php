<div>
    @section('page-title')
    Institution Registration
    @endsection
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Institution Registration Application</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('registration-accreditation.applications.index')}}">
                                Applications
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Institutin Registration Details</li>
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
                            <h3 class="card-title">Training Provider Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Training Provider Name: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainingprovider->name}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Email: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainingprovider->email}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Address: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainingprovider->address}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Po Box: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainingprovider->po_box ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Fax: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainingprovider->fax ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Telephone (Work): </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainingprovider->telephone_work ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Mobile Phone: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainingprovider->mobile_phone ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Website: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainingprovider->website ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Region: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainingprovider->region->name ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">District: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainingprovider->district->name ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Category: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainingprovider->category->name ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Ownership: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainingprovider->ownership->name ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Classification: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainingprovider->classification->name ?? 'N/A'}}</p>
                                        </div>
                                        <div class="form-group row">
                                            <b class="col-sm-7 text-primary">Manager: </b>
                                            <p class="col-sm-5 text-muted">{{$application->trainingprovider->manager ?? 'N/A'}}</p>
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
                            <h3 class="card-title">Application Checklist Attachment</h3>
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
            </div>
        </div>
    </section>
</div>
