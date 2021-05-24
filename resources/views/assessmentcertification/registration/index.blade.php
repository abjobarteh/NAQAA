@extends('layouts.admin')
@section('page-title','Student Registrations')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 col-md-6">
            <h1 class="m-0">Registered Students</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <a href="{{route('assessment-certification.registrations.create')}}" 
                    class="btn btn-primary btn-flat float-right">
                    <i class="fas fa-plus"></i> 
                    New Student Registration
                </a>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Registered Students lists</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table datatable display nowrap table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Birth Date</th>
                                    <th>Gender</th>
                                    <th>Contact Number</th>
                                    <th>Address</th>
                                    <th>Candidate type</th>
                                    <th>CandidateID</th>
                                    <th>Programme</th>
                                    <th>Level</th>
                                    <th>Institution</th>
                                    <th>Regstration No</th>
                                    <th>Regstration Date</th>
                                    <th>Academic Year</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($registeredstudents as $student)
                                    <tr>
                                        <td>{{$student->full_name}}</td>
                                        <td>{{$student->date_of_birth->toFormattedDateString()}}</td>
                                        <td>{{$student->gender}}</td>
                                        <td>{{$student->contact_number}}</td>
                                        <td>{{$student->address}}</td>
                                        <td>{{$student->candidate_type}}</td>
                                        <td>{{$student->candidate_id ?? 'N/A'}}</td>
                                        <td>{{$student->programme->name}}</td>
                                        <td>{{$student->level->name}}</td>
                                        <td>{{$student->institution->name}}</td>
                                        <td>{{$student->registration->registration_no}}</td>
                                        <td>{{$student->registration->registration_date->toDayDateTimeString()}}</td>
                                        <td>{{$student->academic_year->toFormattedDateString()}}</td>
                                        <td>
                                            <a href="{{route('assessment-certification.registrations.edit',$student->id)
                                                }}" class="btn btn-sm btn-danger"
                                                title="edit student registration details"
                                                >
                                                <i class="fas fa-edit"></i>    
                                            </a>
                                            <a href="{{route('assessment-certification.registrations.show',$student->id)
                                                }}" class="btn btn-sm btn-info"
                                                title="view student registration details"
                                                >
                                                <i class="fas fa-eye"></i>    
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="13" class="text-center"><span class="text-bold text-primary text-lg">No registered students for assessment</span></td>
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