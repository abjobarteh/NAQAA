@extends('layouts.portal')
@section('title','Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
           <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Latest Applications</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-responsive-sm">
                                <thead>
                                  <tr>
                                    <th>Application No.</th>
                                    <th>Application type</th>
                                    <th>Application status</th>
                                    <th>Application Form status</th>
                                    <th>Application Date</th>
                                    <th>Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @forelse ($applications as $application)
                                    <tr>
                                      <td>{{$application->application_no ?? 'N/A'}}</td>
                                      <td><span class="badge badge-success">{{$application->application_type ?? 'N/A'}}</span></td>
                                      <td><span class="badge badge-success">{{$application->status ?? 'N/A'}}</span></td>
                                      <td><span class="badge badge-success">{{$application->application_form_status ?? 'N/A'}}</span></td>
                                      <td>{{$application->application_date ?? 'N/A'}}</td>
                                      <td>
                                        @if($application->status == 'Pending')
                                          <a href="{{route('portal.institution.registration.edit',$application->id)}}" class="btn btn-sm btn-danger">Edit</a>
                                        @endif
                                        <a href="{{route('portal.institution.registration.show',$application->id)}}" class="btn btn-sm btn-info">View</a>
                                      </td>
                                    </tr>
                                  @empty
                                      
                                  @endforelse
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection