@extends('layouts.portal')

@section('title','GSQ Candidate Registrations')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
       <div class="card">
           <div class="card-header">
               <div class="row">
                   <div class="col-sm-6">
                        <h4 class="card-title mb-0">Registered GSQ Candidates</h4>
                   </div>
                   <div class="col-sm-6 d-flex justify-content-end">
                    <a href="{{route('portal.institution.new-student-registration')}}" class="btn btn-success btn-square">
                        <svg class="c-icon mr-2">
                            <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-plus"></use>
                        </svg>
                        New Student Registration
                    </a>
               </div>
               </div>
           </div>
           <div class="card-body">
            <table id="example2" class="table datatable table-bordered table-hover">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Nationality</th>
                        <th>Programme</th>
                        <th>Level</th>
                        <th>Academic Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($candidates as $candidate)
                        <tr>
                            <td>{{$candidate->registeredStudent->firstname ?? 'N/A'}}</td>
                            <td>{{$candidate->registeredStudent->middlename ?? 'N/A'}}</td>
                            <td>{{$candidate->registeredStudent->lastname ?? 'N/A'}}</td>
                            <td>{{$candidate->registeredStudent->date_of_birth ?? 'N/A'}}</td>
                            <td>{{$candidate->registeredStudent->gender ?? 'N/A'}}</td>
                            <td>{{$candidate->registeredStudent->email ?? 'N/A'}}</td>
                            <td>{{$candidate->registeredStudent->phone ?? 'N/A'}}</td>
                            <td>{{$candidate->registeredStudent->nationality ?? 'N/A'}}</td>
                            <td>{{$candidate->programme->name ?? 'N/A'}}</td>
                            <td>{{$candidate->level->name ?? 'N/A'}}</td>
                            <td>{{$candidate->academic_year ?? 'N/A'}}</td>
                            <td>
                                @if($candidate->registration_status == 'Pending')
                                <a href="{{route('portal.institution.edit-student-registration',$candidate->id)}}" class="btn btn-sm btn-danger">
                                <i class="fas fa-edit"></i>
                                </a>
                                @endif
                                <a href="{{route('portal.institution.view-student-registration',$candidate->id)}}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        {{-- <tr>
                            <td colspan="12" class="text-center"><b>No Candidates currently assigned to you.</b></td>
                        </tr> --}}
                    @endforelse
                </tbody>
            </table>
           </div>
       </div>
    </div>
 </div>
@endsection
