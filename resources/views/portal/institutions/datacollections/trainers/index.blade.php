@extends('layouts.portal')
@section('title','Learning center Programmes Datacollection')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                             <h4 class="card-title mb-0">Academic & Admin Staff Datacollection</h4>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                             <a href="{{route('portal.institution.datacollection.trainers.create')}}" class="btn btn-success btn-square">
                                 <svg class="c-icon mr-2">
                                     <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-plus"></use>
                                 </svg>
                                 New Staff Datacollection
                             </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example2" class="table datatable table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Specialisation</th>
                                <th>Highest Qualification</th>
                                <th>Rank</th>
                                <th>Role</th>
                                <th>Main Teaching Programme</th>
                                <th>Submission Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($staffs as $staff)
                                <tr>
                                    <td>{{$staff->full_name}}</td>
                                    <td>{{$staff->specialisation}}</td>
                                    <td>{{$staff->highest_qualification}}</td>
                                    <td>{{$staff->rank ?? 'N/A'}}</td>
                                    <td>{{$staff->role ?? 'N/A'}}</td>
                                    <td>{{$staff->main_teaching_programme}}</td>
                                    <td>{{$staff->created_at}}</td>
                                    <td>
                                        <a href="{{route('portal.institution.datacollection.trainers.edit',$staff->id)
                                            }}" class="btn btn-sm btn-danger"
                                            title="edit staff details"
                                            >
                                            <i class="fas fa-edit"></i>    
                                        </a>
                                        <a href="{{route('portal.institution.datacollection.trainers.show',$staff->id)
                                            }}" class="btn btn-sm btn-info"
                                            title="view staff details"
                                            >
                                            <i class="fas fa-eye"></i>    
                                        </a>
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