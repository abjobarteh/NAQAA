@extends('layouts.admin')
@section('page-title')
    Student Details
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Student Details Data Collection</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('researchdevelopment.datacollection.student-details.create')}}" 
                        class="btn btn-primary float-right">
                        New Data collection
                    </a>
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
                            <h3 class="card-title">tudent Details Data collection lists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>StudentID</th>
                                        <th>Fullname</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>Admission Date</th>
                                        <th>Programme</th>
                                        <th>Award</th>
                                        <th>Learning Center</th>
                                        <th>Student Detail Type</th>
                                        <th>Date Collected</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $student)
                                        <tr>
                                            <td>{{$student->student_id ?? 'N/A'}}</td>
                                            <td>{{$student->full_name}}</td>
                                            <td>{{$student->gender}}</td>
                                            <td>{{$student->phone ?? 'N/A'}}</td>
                                            <td>{{$student->admission_date ?? 'N/A'}}</td>
                                            <td>{{$student->programme}}</td>
                                            <td>{{$student->studentaward->name}}</td>
                                            <td>{{$student->learningcenter->training_provider_name ?? 'N/A'}}</td>
                                            <td>{{$student->studentdetail_type}}</td>
                                            <td>{{$student->created_at}}</td>
                                            <td>
                                                <a href="{{route('researchdevelopment.datacollection.student-details.edit',$student->id)
                                                    }}" class="btn btn-sm btn-danger"
                                                    title="edit student details"
                                                    >
                                                    <i class="fas fa-edit"></i>    
                                                </a>
                                                <a href="{{route('researchdevelopment.datacollection.student-details.show',$student->id)
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
        </div>
    </section>
@endsection