@extends('layouts.portal')
@section('title','Programme Accreditations')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
       <div class="card">
           <div class="card-header">
               <div class="row">
                   <div class="col-sm-6">
                        <h4 class="card-title mb-0">Programme Accreditation Applicaton</h4>
                   </div>
                   <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{route('portal.institution.accreditation.create')}}" class="btn btn-success btn-square">
                            <svg class="c-icon mr-2">
                                <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-plus"></use>
                            </svg>
                            New Accreditation Application
                        </a>
                   </div>
               </div>
           </div>
           <div class="card-body">
            <table class="table table-responsive-sm">
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
                        @if($application->status == 'pending')
                          <a href="{{route('portal.institution.accreditation.edit',$application->id)}}" class="btn btn-sm btn-danger">Edit</a>
                        @endif
                        <a href="{{route('portal.institution.accreditation.show',$application->id)}}" class="btn btn-sm btn-info">View</a>
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
@endsection