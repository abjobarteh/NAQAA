<div>
    @section('page-title')
       Interim Authorisation Application
    @endsection
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Interim Authorisation Application</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('registration-accreditation.applications.index')}}">
                                Applications
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Interim Authorisation Details</li>
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
                            <h3 class="card-title">Interim Authorisation Application Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Proposed Name: </b>
                                <p class="col-sm-5 text-muted">{{$application->interimAuthorisation->proposed_name}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Street: </b>
                                <p class="col-sm-5 text-muted">{{$application->interimAuthorisation->street}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Region: </b>
                                <p class="col-sm-5 text-muted">{{$application->interimAuthorisation->region->name}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">District: </b>
                                <p class="col-sm-5 text-muted">{{$application->interimAuthorisation->district->name}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Town/Village: </b>
                                <p class="col-sm-5 text-muted">{{$application->interimAuthorisation->townVillage->name ?? 'N/A'}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Mission: </b>
                                <p class="col-sm-5 text-muted">{{$application->interimAuthorisation->mission ?? 'N/A'}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Vision: </b>
                                <p class="col-sm-5 text-muted">{{$application->interimAuthorisation->vision ?? 'N/A'}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Objectives: </b>
                                <p class="col-sm-5 text-muted">{{$application->interimAuthorisation->objectives ?? 'N/A'}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Organogramme: </b>
                                <a href="{{$application->interimAuthorisation->organogramme ?? '#'}}" target="_blank" rel="noreferrer" class="btn btn-sm btn-info">View</a>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Physical Structure Plan: </b>
                                <a href="{{$application->interimAuthorisation->physical_structure_plan ?? '#'}}" target="_blank" rel="noreferrer" class="btn btn-sm btn-info">View</a>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Five Year Strategic Plan: </b>
                                <a href="{{$application->interimAuthorisation->five_year_strategic_plan ?? '#'}}" target="_blank" rel="noreferrer" class="btn btn-sm btn-info">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Details of Promoters</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Date of Birth</th>
                                        <th>Address</th>
                                        <th>Occupation</th>
                                        <th>Passport copy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($application->interimAuthorisation->promoters as $promoter)
                                        <tr>
                                            <td>{{ $promoter->fullname }}</td>
                                            <td>{{ $promoter->date_of_birth }}</td>
                                            <td>{{ $promoter->address }}</td>
                                            <td>{{ $promoter->occupation }}</td>
                                            <td>
                                                <a href="{{ $promoter->passport_copy ?? '#'}}" target="_blank" rel="noreferrer" class="btn btn-sm btn-info">View</a>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center"><span class="text-bold text-lg">No Funding sources uploaded</span></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Sources of Funding Details</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Funding Name</th>
                                        <th>Funding Evidence</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($application->interimAuthorisation->sources_of_funding_details as $source)
                                        <tr>
                                            <td>{{ $source->funding_name }}</td>
                                            <td>
                                                <a href="{{ $source->evidence ?? '#'}}" target="_blank" rel="noreferrer" class="btn btn-sm btn-info">View</a>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center"><span class="text-bold text-lg">No Funding sources uploaded</span></td>
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
