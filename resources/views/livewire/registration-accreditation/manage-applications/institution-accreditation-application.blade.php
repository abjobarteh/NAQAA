<div>
    @section('page-title')
    Institution Programme Accreditation
    @endsection
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Institution Programme Accreditation Application</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('registration-accreditation.applications.index')}}">
                                Applications
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Institution Programme Accreditation</li>
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
                            <h3 class="card-title">Programme Accreditation Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Programme Title: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->programme->name}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Level: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->level}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Mentoring Institution: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->mentoring_institution}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Mentoring Institution Address: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->mentoring_institution_address}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Programme Affiliation Proof: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->programme_affiliation_proof}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Programme Support Proof: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->programme_support_proof}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Programme Aims: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->programme_aims}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Programme Objectives: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->programme_objectives}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Admission Requirements: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->admission_requirements}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Progression Requirements: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->progression_requirements}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Learning Outcomes: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->learning_outcomes}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Studentship Duration: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->studentship_duration}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Total Qualification Time Months: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->total_qualification_time_months}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Level of Fees: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->level_of_fees}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Department Name: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->department_name}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Department Establishment Date: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->department_establishment_date}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Curriculum Design Process: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->curriculum_design_process}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Curriculum Update: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->curriculum_update}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Programme Structure: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->programme_structure}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Student Assessment Mode: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->student_assessment_mode}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Certification Mode: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->certification_mode}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">External Examiners Appointment Evidence: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->external_examiners_appointment_evidence}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Staff Recruitment Policy: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->staff_recruitment_policy}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Provisions for Disability: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->provisions_for_disability}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-7 text-primary">Provided Safety Facilities: </b>
                                <p class="col-sm-5 text-muted">{{$application->trainingproviderprogramme->provided_safety_facilities}}</p>
                            </div>
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
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($application->programmeAccreditations as $accreditation)
                                        <tr>
                                            <td>{{ $accreditation->programme->programme->name }}</td>
                                            <td>{{ $accreditation->accreditation_status }}</td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center"><span class="text-bold text-lg">No Applied Programmes for Accreditation</span></td>
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
                            <h3 class="card-title">Training Provider Checklists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Checklist Name</th>
                                        <th>Attachement</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($checklists as $ch)
                                        <tr>
                                            <td>{{ $ch->checklist->name }}</td>
                                            <td>
                                                <a href="{{$ch->path ?? '#'}}" target="_blank" rel="noreferrer" class="btn btn-sm btn-info">View</a>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center"><span class="text-bold text-lg">No Checklist uploaded</span></td>
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
