@extends('layouts.admin')
@section('page-title')
    Accreditation Licences
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                          <ul class="nav nav-tabs" id="accreditation-licences-tab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active text-lg" id="custom-trainer-accreditations-tab" data-toggle="pill" href="#trainer-accreditations-tab" role="tab" aria-controls="trainer-accreditations-tab" aria-selected="true">Trainer Accreditations</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link text-lg" id="custom-programme-accreditations-tab" data-toggle="pill" href="#programme-accreditations-tab" role="tab" aria-controls="programme-accreditations-tab" aria-selected="false">Training Providers Programme Accreditations</a>
                            </li>
                          </ul>
                        </div>
                        <div class="card-body">
                          <div class="tab-content" id="accreditation-licences-tabContent">
                            <div class="tab-pane fade show active" id="trainer-accreditations-tab" role="tabpanel" aria-labelledby="all-licences-tab">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>FullName</th>
                                            <th>Application No</th>
                                            <th>Application category</th>
                                            <th>Application type</th>
                                            <th>Application date</th>
                                            <th>Application status</th>
                                            <th>Accreditation area, level and status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($traineraccreditations as $accreditation)
                                            <tr>
                                                <td>{{$accreditation[0]->application->trainer->firstname ?? ''}}. {{$accreditation[0]->application->trainer->middlename ?? ''}}.{{$accreditation[0]->application->trainer->lastname ?? ''}}</td>
                                                <td>{{$accreditation[0]->application->application_no ?? ''}}</td>
                                                <td><span class="badge badge-info badge-rounded">{{$accreditation[0]->application->application_category ?? 'N/A'}}</span></td>
                                                <td><span class="badge badge-info badge-rounded">{{$accreditation[0]->application->application_type ?? 'N/A'}}</span></td>
                                                <td>{{$accreditation[0]->application->application_date->toFormattedDateString() ?? 'N/A'}}</td>
                                                <td><span class="badge badge-rounded @if($accreditation[0]->application->status === 'accepted') badge-success @else badge-danger @endif">{{$accreditation[0]->application->status}}</span></td>
                                                <td>
                                                    @foreach ($accreditation as $field)
                                                        <span>{{$field->area}} -- {{$field->level}} -- <span class="badge badge-primary">{{$field->status ?? 'N/A'}}</span></span>
                                                        @if (!$loop->last)
                                                            <hr>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href="{{route('registration-accreditation.accreditation.trainers.edit',$accreditation[0]->application->id)
                                                    }}" class="btn btn-xs btn-danger"
                                                    title="edit trainer accreditation details"
                                                    >
                                                    <i class="fas fa-edit"></i>    
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="9"><span class="text-bold text-lg">No registered trainer accreditation details</span></td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="programme-accreditations-tab" role="tabpanel" aria-labelledby="valid-licences-tab">
                                {{-- <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Training Provider name</th>
                                            <th>Application No</th>
                                            <th>Application category</th>
                                            <th>Application type</th>
                                            <th>Application date</th>
                                            <th>Application status</th>
                                            <th>Accreditation area, level and status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($programaccreditations as $accreditation)
                                            <tr>
                                                <td>{{$accreditation[0]->application->trainer->firstname ?? ''}}. {{$accreditation[0]->application->trainer->middlename ?? ''}}.{{$accreditation[0]->application->trainer->lastname ?? ''}}</td>
                                                <td>{{$accreditation[0]->application->application_no ?? ''}}</td>
                                                <td><span class="badge badge-info badge-rounded">{{$accreditation[0]->application->application_category ?? 'N/A'}}</span></td>
                                                <td><span class="badge badge-info badge-rounded">{{$accreditation[0]->application->application_type ?? 'N/A'}}</span></td>
                                                <td>{{$accreditation[0]->application->application_date->toFormattedDateString() ?? 'N/A'}}</td>
                                                <td><span class="badge badge-rounded @if($accreditation[0]->application->status === 'accepted') badge-success @else badge-danger @endif">{{$accreditation[0]->application->status}}</span></td>
                                                <td>
                                                    @foreach ($accreditation as $field)
                                                        <span>{{$field->area}} -- {{$field->level}} -- {{$field->status}}</span>
                                                        @if (!$loop->last)
                                                            <hr>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href="{{route('registration-accreditation.accreditation.trainers.edit',$accreditation[0]->application->id)
                                                    }}" class="btn btn-xs btn-danger"
                                                    title="edit trainer accreditation details"
                                                    >
                                                    <i class="fas fa-edit"></i>    
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="9"><span class="text-bold text-lg">No registered trainer accreditation details</span></td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table> --}}
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