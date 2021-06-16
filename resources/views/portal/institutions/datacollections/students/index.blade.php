@extends('layouts.portal')
@section('title','Student Details Datacollection')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                             <h4 class="card-title mb-0">Student Details Datacollection</h4>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                             <a href="{{route('portal.institution.datacollection.students.create')}}" class="btn btn-success btn-square">
                                 <svg class="c-icon mr-2">
                                     <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-plus"></use>
                                 </svg>
                                 New Student Datacollection
                             </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example2" class="table datatable table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Admission Date</th>
                                <th>Programme</th>
                                <th>Award</th>
                                <th>Learning Center</th>
                                <th>Date Collected</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td>{{$student->full_name}}</td>
                                    <td>{{$student->gender}}</td>
                                    <td>{{$student->phone ?? 'N/A'}}</td>
                                    <td>{{$student->admission_date ?? 'N/A'}}</td>
                                    <td>{{$student->programme_name}}</td>
                                    <td>{{$student->awardName->name ?? 'N/A'}}</td>
                                    <td>{{$student->trainingprovider->name ?? 'N/A'}}</td>
                                    <td>{{$student->created_at}}</td>
                                    <td>
                                        <a href="{{route('portal.institution.datacollection.students.edit',$student->id)
                                            }}" class="btn btn-sm btn-danger"
                                            title="edit student details"
                                            >
                                            <i class="fas fa-edit"></i>    
                                        </a>
                                        <a href="{{route('portal.institution.datacollection.students.show',$student->id)
                                            }}" class="btn btn-sm btn-info"
                                            title="view student details"
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