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
                    @can('create_data_collection')
                        <a href="{{route('researchdevelopment.datacollection.student-details.create')}}" 
                            class="btn btn-primary btn-flat float-right">
                            <i class="fas fa-plus"></i>
                            New Student Data collection
                        </a>
                    @endcan
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
                            <h3 class="card-title">Student Details Data collection lists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Fullname</th>
                                        <th>Student ID</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>Admission Date</th>
                                        <th>Expected Completion Date</th>
                                        <th>Programme</th>
                                        <th>Award</th>
                                        <th>Learning Center</th>
                                        <th>Qualification of Entry</th>
                                        <th>Field of Education</th>
                                        <th>Attendance Status</th>
                                        <th>Date of Birth</th>
                                        <th>Academic Year</th>
                                        <th>Nationality</th>
                                        <th>Date Collected</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $student)
                                        <tr>
                                            <td>{{$student->student_id}}</td>
                                            <td>{{$student->full_name}}</td>
                                            <td>{{$student->gender}}</td>
                                            <td>{{$student->phone ?? 'N/A'}}</td>
                                            <td>{{$student->admission_date ?? 'N/A'}}</td>
                                            <td>{{$student->completion_date ?? 'N/A'}}</td>
                                            <td>{{$student->programme_name}}</td>
                                            <td>{{$student->awardName->name ?? 'N/A'}}</td>
                                            <td>{{$student->trainingprovider->name ?? 'N/A'}}</td>
                                            <td>{{$student->awardName->name}}</td>
                                            <td>{{$student->field_of_education}}</td>
                                            <td>{{$student->attendance_status}}</td>
                                            <td>{{$student->date_of_birth}}</td>
                                            <td>{{$student->academic_year ?? 'N/A'}}</td>
                                            <td>{{$student->nationality ?? 'N/A'}}</td>
                                            <td>{{$student->created_at}}</td>
                                            <td>
                                                @can('edit_data_collection')
                                                    <a href="{{route('researchdevelopment.datacollection.student-details.edit',$student->id)
                                                        }}" class="btn btn-xs btn-danger"
                                                        title="edit student details"
                                                        >
                                                        <i class="fas fa-edit"></i>    
                                                    </a>
                                                @endcan
                                                @can('show_data_collection')
                                                    <a href="{{route('researchdevelopment.datacollection.student-details.show',$student->id)
                                                        }}" class="btn btn-xs btn-info"
                                                        title="view student details"
                                                        >
                                                        <i class="fas fa-eye"></i>    
                                                    </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="col-sm-2 col-lg-2 mt-3" >
                              <form action="{{ route('researchdevelopment.datacollection.student-data-imports') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" id="file" class="form-control" required>
                                <button type="submit" class="btn btn-primary mt-1 col-sm-12 col-lg-12 ">
                                  Bulk Upload
                                </button>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script>
  $(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    });
  });
</script>