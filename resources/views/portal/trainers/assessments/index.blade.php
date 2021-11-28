@extends('layouts.portal')

@section('title','Assigned Candidates')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
       <div class="card">
           <div class="card-header">
               <div class="row">
                   <div class="col-sm-6">
                        <h4 class="card-title mb-0">Assigned Candidates for Assessment</h4>
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
                        <th>Institution</th>
                        <th>Academic Year</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($assigned_candidates as $candidate)
                        <tr>
                            <td>{{$candidate->student->firstname ?? 'N/A'}}</td>
                            <td>{{$candidate->student->middlename ?? 'N/A'}}</td>
                            <td>{{$candidate->student->lastname ?? 'N/A'}}</td>
                            <td>{{$candidate->student->date_of_birth ?? 'N/A'}}</td>
                            <td>{{$candidate->student->gender ?? 'N/A'}}</td>
                            <td>{{$candidate->student->email ?? 'N/A'}}</td>
                            <td>{{$candidate->student->phone ?? 'N/A'}}</td>
                            <td>{{$candidate->student->nationality ?? 'N/A'}}</td>
                            <td>{{$candidate->registration->programme->name ?? 'N/A'}}</td>
                            <td>{{$candidate->registration->level->name ?? 'N/A'}}</td>
                            <td>{{$candidate->registration->trainigprovider->name ?? 'N/A'}}</td>
                            <td>{{$candidate->registration->academic_year ?? 'N/A'}}</td>
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
