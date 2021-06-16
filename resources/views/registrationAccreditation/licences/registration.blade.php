@extends('layouts.admin')
@section('page-title')
    Registration Licences
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                          <ul class="nav nav-tabs" id="registration-licences-tab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active text-lg" id="custom-all-licences-tab" data-toggle="pill" href="#all-licences-tab" role="tab" aria-controls="all-licences-tab" aria-selected="true">All Licences</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link text-lg" id="custom-valid-licences-tab" data-toggle="pill" href="#valid-licences-tab" role="tab" aria-controls="valid-licences-tab" aria-selected="false">Valid Licences</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link text-lg" id="custom-expired-licences-tab" data-toggle="pill" href="#expired-licences-tab" role="tab" aria-controls="expired-licences-tab" aria-selected="false">Expired Licences</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link text-lg" id="custom-revoked-licences-tab" data-toggle="pill" href="#revoked-licences-tab" role="tab" aria-controls="revoked-licences-tab" aria-selected="false">Revoked Licences</a>
                            </li>
                          </ul>
                        </div>
                        <div class="card-body">
                          <div class="tab-content" id="registration-licences-tabContent">
                            <div class="tab-pane fade show active" id="all-licences-tab" role="tabpanel" aria-labelledby="all-licences-tab">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Licence Start Date</th>
                                            <th>Licence End Date</th>
                                            <th>Licence status</th>
                                            <th>Application date</th>
                                            <th>Application category</th>
                                            <th>Application type</th>
                                            <th>Applicant Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($all_licences as $licence)
                                            <tr>
                                                <td>
                                                    @if ($licence->application->applicant_type === 'training_provider')
                                                        {{$licence->trainingprovider->name}}
                                                    @else     
                                                        {{$licence->trainer->firstname ?? ''}}. {{$licence->trainer->middlename ?? ''}} .{{$licence->trainer->lastname ?? ''}}
                                                    @endif
                                                </td>
                                                <td>{{$licence->licence_start_date ?? 'N/A'}}</td>
                                                <td>{{$licence->licence_end_date ?? 'N/A'}}</td>
                                                <td><span class="badge badge-rounded @if($licence->license_status === 'valid') badge-success @else badge-danger @endif">{{$licence->license_status}}</span></td>
                                                <td>{{$licence->application->application_date->toFormattedDateString() ?? 'N/A'}}</td>
                                                <td><span class="badge badge-info badge-rounded">{{$licence->application->application_category ?? 'N/A'}}</span></td>
                                                <td><span class="badge badge-info badge-rounded">{{$licence->application->application_type ?? 'N/A'}}</span></td>
                                                <td>{{Str::studly($licence->application->applicant_type ?? 'N/A')}}</td>
                                                <td>
                                                    @if ($licence->application->applicant_type === 'training_provider')
                                                        <a href="{{route('registration-accreditation.registration.trainingproviders.edit',$licence->application->id)
                                                        }}" class="btn btn-xs btn-danger"
                                                        title="edit training provider licence registration details"
                                                        >
                                                        <i class="fas fa-edit"></i>    
                                                        </a>
                                                    @else     
                                                        <a href="{{route('registration-accreditation.registration.trainers.edit',$licence->application->id)
                                                        }}" class="btn btn-xs btn-danger"
                                                        title="edit trainer licence registration details"
                                                        >
                                                        <i class="fas fa-edit"></i>    
                                                        </a>
                                                    @endif
                                                    @if ($licence->license_status === 'expired')
                                                        <a href="{{route('registration-accreditation.licence.licence-renewal',$licence->id)
                                                        }}" class="btn btn-xs btn-success"
                                                        title="renew registration licence"
                                                        >
                                                        <i class="fas fa-sync"></i>    
                                                        </a>
                                                    @elseif($licence->license_status === 'valid')
                                                        <button 
                                                        data-licence-id="{{$licence->id}}"
                                                        data-status = "revoke"
                                                        class="btn btn-xs btn-info update-licence"
                                                        title="revoke registration licence"
                                                        >
                                                        <i class="fas fa-undo"></i>    
                                                        </button>
                                                    @else
                                                        <button 
                                                        data-licence-id="{{$licence->id}}"
                                                        data-status = "continue"
                                                        class="btn btn-xs btn-primary update-licence"
                                                        title="continue registration licence"
                                                        >
                                                        <i class="fas fa-redo"></i>    
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="9"><span class="text-bold text-lg">No registered registration Licences</span></td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="valid-licences-tab" role="tabpanel" aria-labelledby="valid-licences-tab">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Licence Start Date</th>
                                            <th>Licence End Date</th>
                                            <th>Licence status</th>
                                            <th>Application date</th>
                                            <th>Application category</th>
                                            <th>Application type</th>
                                            <th>Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($valid_licences as $licence)
                                            <tr>
                                                <td>
                                                    @if ($licence->application->applicant_type === 'training_provider')
                                                        {{$licence->trainingprovider->name}}
                                                    @else     
                                                        {{$licence->trainer->firstname ?? ''}}. {{$licence->trainer->middlename ?? ''}} .{{$licence->trainer->lastname ?? ''}}
                                                    @endif
                                                </td>
                                                <td>{{$licence->licence_start_date ?? 'N/A'}}</td>
                                                <td>{{$licence->licence_end_date ?? 'N/A'}}</td>
                                                <td><span class="badge badge-success badge-rounded">{{$licence->license_status}}</span></td>
                                                <td>{{$licence->application->application_date->toFormattedDateString() ?? 'N/A'}}</td>
                                                <td><span class="badge badge-info badge-rounded">{{$licence->application->application_category ?? 'N/A'}}</span></td>
                                                <td><span class="badge badge-info badge-rounded">{{$licence->application->application_type ?? 'N/A'}}</span></td>
                                                <td>{{Str::studly($licence->application->applicant_type ?? 'N/A')}}</td>
                                                <td>
                                                    @if ($licence->application->applicant_type === 'training_provider')
                                                        <a href="{{route('registration-accreditation.registration.trainingproviders.edit',$licence->application->id)
                                                        }}" class="btn btn-xs btn-danger"
                                                        title="edit training provider licence registration details"
                                                        >
                                                        <i class="fas fa-edit"></i>    
                                                        </a>
                                                    @else     
                                                        <a href="{{route('registration-accreditation.registration.trainers.edit',$licence->application->id)
                                                        }}" class="btn btn-xs btn-danger"
                                                        title="edit trainer licence registration details"
                                                        >
                                                        <i class="fas fa-edit"></i>    
                                                        </a>
                                                    @endif
                                                    <button 
                                                        data-licence-id="{{$licence->id}}"
                                                        data-status="revoke"
                                                        class="btn btn-xs btn-info update-licence"
                                                        title="revoke registration licence"
                                                        >
                                                        <i class="fas fa-undo"></i>    
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="9"><span class="text-bold text-lg">No valid Licences</span></td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="expired-licences-tab" role="tabpanel" aria-labelledby="expired-licences-tab">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Licence Start Date</th>
                                            <th>Licence End Date</th>
                                            <th>Licence status</th>
                                            <th>Application date</th>
                                            <th>Application category</th>
                                            <th>Application type</th>
                                            <th>Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($expired_licences as $licence)
                                            <tr>
                                                <td>
                                                    @if ($licence->application->applicant_type === 'training_provider')
                                                        {{$licence->trainingprovider->name}}
                                                    @else     
                                                        {{$licence->trainer->firstname ?? ''}}. {{$licence->trainer->middlename ?? ''}} .{{$licence->trainer->lastname ?? ''}}
                                                    @endif
                                                </td>
                                                <td>{{$licence->licence_start_date ?? 'N/A'}}</td>
                                                <td>{{$licence->licence_end_date ?? 'N/A'}}</td>
                                                <td><span class="badge badge-danger badge-rounded">{{$licence->license_status}}</span></td>
                                                <td>{{$licence->application->application_date->toFormattedDateString() ?? 'N/A'}}</td>
                                                <td><span class="badge badge-info badge-rounded">{{$licence->application->application_category ?? 'N/A'}}</span></td>
                                                <td><span class="badge badge-info badge-rounded">{{$licence->application->application_type ?? 'N/A'}}</span></td>
                                                <td>{{Str::studly($licence->application->applicant_type ?? 'N/A')}}</td>
                                                <td>
                                                    <a href="{{route('registration-accreditation.licence.licence-renewal',$licence->id)
                                                        }}" class="btn btn-xs btn-success"
                                                        title="renew registration licence"
                                                        >
                                                        <i class="fas fa-sync"></i>    
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9"><span class="text-bold text-lg">No Expired Licences</span></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="revoked-licences-tab" role="tabpanel" aria-labelledby="expired-licences-tab">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Licence Start Date</th>
                                            <th>Licence End Date</th>
                                            <th>Licence status</th>
                                            <th>Application date</th>
                                            <th>Application category</th>
                                            <th>Application type</th>
                                            <th>Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($revoked_licences as $licence)
                                            <tr>
                                                <td>
                                                    @if ($licence->application->applicant_type === 'training_provider')
                                                        {{$licence->trainingprovider->name}}
                                                    @else     
                                                        {{$licence->trainer->firstname ?? ''}}. {{$licence->trainer->middlename ?? ''}} .{{$licence->trainer->lastname ?? ''}}
                                                    @endif
                                                </td>
                                                <td>{{$licence->licence_start_date ?? 'N/A'}}</td>
                                                <td>{{$licence->licence_end_date ?? 'N/A'}}</td>
                                                <td><span class="badge badge-danger badge-rounded">{{$licence->license_status}}</span></td>
                                                <td>{{$licence->application->application_date->toFormattedDateString() ?? 'N/A'}}</td>
                                                <td><span class="badge badge-info badge-rounded">{{$licence->application->application_category ?? 'N/A'}}</span></td>
                                                <td><span class="badge badge-info badge-rounded">{{$licence->application->application_type ?? 'N/A'}}</span></td>
                                                <td>{{Str::studly($licence->application->applicant_type ?? 'N/A')}}</td>
                                                <td>
                                                    <button 
                                                        data-licence-id="{{$licence->id}}"
                                                        data-status = "continue"
                                                        class="btn btn-xs btn-success update-licence"
                                                        title="continue registration licence"
                                                        >
                                                        <i class="fas fa-redo"></i>    
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center"><span class="text-bold text-primary text-lg">No Revoked Licences</span></td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                          </div>
                        </div>
                        <!-- /.card -->
                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click','.update-licence', function(e){
                e.preventDefault();
                Swal.fire({
                title: 'Are you sure?',
                text: `This will ${$(this).data('status')} the registration licence!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `Yes, ${$(this).data('status')} it!`
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({  
                            method:"POST",  
                            url:"{{ route('registration-accreditation.licence.licence-status') }}",  
                            data: {id:$(this).data('licence-id'),status:$(this).data('status')},
                            type:'json',
                            success:function(response)  
                            {
                                let data = JSON.parse(response)
                                if(data.status == 200){
                                    Swal.fire(
                                    'Revoked!',
                                    'Licence successfully revoked.',
                                    'success'
                                    )
                                }
                                location.reload();
                            },
                            error: function(err)
                            {
                                console.log(err);
                            }  
                    });
                    // Swal.fire(
                    // 'Deleted!',
                    // 'Your file has been deleted.',
                    // 'success'
                    // )
                }
                })
                console.log($(this).data('licence-id'))
            })
        })
    </script>
@endsection