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
                <a href="{{route('assessment-certification.new-student-registration')}}" 
                    class="btn btn-primary btn-flat float-right">
                    <i class="fas fa-plus"></i> 
                    New Student Registration
                </a>
                
                @livewire('assessment-certification.export-competent-students')
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
                        <table id="example2" class="table datatable table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Picture</th>
                                    <th>Student Name</th>
                                    <th>Birth Date</th>
                                    <th>Gender</th>
                                    <th>Phone Number</th>
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
                                        <td><img src="{{$student->picture ?? '/storage/uploads/no-image.png'}}" class="rounded-circle" alt="Student Profile Image" width="60"></td>
                                        <td>{{$student->full_name}}</td>
                                        <td>{{$student->date_of_birth}}</td>
                                        <td>{{$student->gender}}</td>
                                        <td>{{$student->phone}}</td>
                                        <td>{{$student->address}}</td>
                                        <td>{{$student->registration->candidate_type}}</td>
                                        <td>{{$student->registration->candidate_id ?? 'N/A'}}</td>
                                        <td>{{$student->registration->programme->name ?? 'N/A'}}</td>
                                        <td>{{$student->registration->level->name ?? 'N/A'}}</td>
                                        <td>{{$student->registration->trainingprovider->name ?? 'N/A'}}</td>
                                        <td>{{$student->registration->registration_no ?? 'N/A'}}</td>
                                        <td>{{$student->registration->registration_date ?? 'N/A'}}</td>
                                        <td>{{$student->registration->academic_year}}</td>
                                        <td>
                                            <a href="{{route('assessment-certification.edit-student-registration',$student->registration->id)
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
                                        <td colspan="14" class="text-center"><span class="text-bold text-primary text-lg">No registered students for assessment</span></td>
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