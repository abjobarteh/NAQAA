@extends('layouts.admin')
@section('page-title')
    Training Provider Registrations
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Submitted Applications</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="roe">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Submitted Application lists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Application No</th>
                                        <th>Application date</th>
                                        <th>Application category</th>
                                        <th>Application type</th>
                                        <th>Applicant type</th>
                                        <th>Applicant status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($applications as $application)
                                        <tr>
                                            <td>
                                                @if ($application->applicant_type === 'training_provider')
                                                    {{$application->trainingprovider->name}}
                                                @else     
                                                    {{$application->trainer->firstname ?? ''}}. {{$licence->trainer->middlename ?? ''}} .{{$licence->trainer->lastname ?? ''}}
                                                @endif
                                            </td>
                                            <td>{{$application->application_no ?? 'N/A'}}</td>
                                            <td>{{$application->application_date->toFormattedDateString() ?? 'N/A'}}</td>
                                            <td><span class="badge badge-success badge-rounded">{{$application->application_category ?? 'N/A'}}</span></td>
                                            <td><span class="badge badge-info badge-rounded">{{$application->application_type ?? 'N/A'}}</span></td>
                                            <td>{{Str::studly($application->applicant_type ?? 'N/A')}}</td>
                                            <td><span class="badge badge-danger badge-rounded">{{$application->status ?? 'N/A'}}</span></td>
                                            <td>
                                                @if ($application->applicant_type === 'training_provider')
                                                    <a href="{{route('registration-accreditation.applications.edit',$application->id)
                                                    }}" class="btn btn-xs btn-danger"
                                                    title="edit application details"
                                                    >
                                                    <i class="fas fa-edit"></i>    
                                                    </a>
                                                    <a href="{{route('registration-accreditation.applications.show',$application->id)
                                                    }}" class="btn btn-xs btn-info"
                                                    title="view application details"
                                                    >
                                                    <i class="fas fa-eye"></i>    
                                                    </a>
                                                @else     
                                                    <a href="{{route('registration-accreditation.applications.edit',$application->id)
                                                    }}" class="btn btn-xs btn-danger"
                                                    title="edit application details"
                                                    >
                                                    <i class="fas fa-edit"></i>    
                                                    </a>
                                                    <a href="{{route('registration-accreditation.applications.show',$application->id)
                                                    }}" class="btn btn-xs btn-info"
                                                    title="view application details"
                                                    >
                                                    <i class="fas fa-eye"></i>    
                                                    </a>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
            //Date range picker
            $('#application-daterange').daterangepicker()
    </script>
@endsection