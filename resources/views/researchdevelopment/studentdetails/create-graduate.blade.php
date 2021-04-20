@extends('layouts.admin')
@section('page-title')
    New Student Details Data collection
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Record New Graduate Student Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.datacollection.student-details.index')}}">
                                Student details data collection
                            </a>
                        </li>
                        <li class="breadcrumb-item active">New graduate Student details collection</li>
                    </ol>
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
                            <h3 class="card-title">New Student Graduate Details Collection</h3>
                        </div>
                        <div class="card-body">
                            <div class="row filter-row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Learning Center: <sup class="text-danger">*</sup></label>
                                        <select name="learningcenter" id="learningcenter" class="form-control select2" required>
                                            <option>Select learning center</option>
                                            @foreach ($learningcenters as $id => $center)
                                                <option value="{{$id}}">{{$center}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Admission Year: <sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control" name="admission_year" id="admission_year" required autofocus>
                                    </div>
                                </div>
                                <div class="col-sm-3 d-flex btn-block align-items-end">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block" id="submit-filter">Submit</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row m-2 student-details">
                                
                            </div>

                            <form action="{{route('researchdevelopment.datacollection.student-details.store')}}" method="post" autocomplete="off" id="new-graduation-form" hidden>
                                @csrf
                                <input type="hidden" name="studentdetail_type" value="graduate">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Learning Center: <sup class="text-danger">*</sup></label>
                                            <select name="institution_id" id="institution_id" class="form-control select2" required>
                                                <option>Select learning center</option>
                                                @foreach ($learningcenters as $id => $center)
                                                    <option value="{{$id}}">{{$center}}</option>
                                                @endforeach
                                            </select>
                                            @error('institution_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Student ID: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="student_id" value="{{ old('student_id') }}" required autofocus>
                                            @error('student_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>First Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>
                                            @error('firstname')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Middle Name:</label>
                                            <input type="text" class="form-control" name="middlename" value="{{ old('middlename') }}">
                                            @error('middlename')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required>
                                            @error('lastname')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Gender: <sup class="text-danger">*</sup></label>
                                            <select name="gender" id="gender" class="form-control select2" required>
                                                <option>Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Phone: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                                            @error('phone')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 show-admission">
                                        <div class="form-group">
                                            <label>Date of birth: <sup class="text-danger">*</sup></label>
                                            <div class="input-group date" id="date_of_birth" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input admission" name="date_of_birth" value="{{ old('date_of_birth') }}" data-target="#date_of_birth" required/>
                                                <div class="input-group-append" data-target="#date_of_birth" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @error('date_of_birth')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row show-admission">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nationality: <sup class="text-danger">*</sup></label>
                                            <select name="nationality" id="nationality" class="form-control select2 admission">
                                                <option>Select nationality</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{$country->name}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('nationality')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 show-admission">
                                        <div class="form-group">
                                            <label>Ethnicity: <sup class="text-danger">*</sup></label>
                                            <select name="ethnicity" id="ethnicity" class="form-control select2 admission">
                                                <option>Select ethnicity</option>
                                                @foreach ($ethnicities as $ethnicity)
                                                    <option value="{{$ethnicity->name}}">{{$ethnicity->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('ethnicity')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Programme: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="programme" value="{{ old('programme') }}" required>
                                            @error('programme')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Field of Education: <sup class="text-danger">*</sup></label>
                                            <select name="education_field_id" id="education_field_id" class="form-control select2">
                                                <option>Select Field of Education</option>
                                                @foreach ($fields as $id => $field)
                                                    <option value="{{$id}}">{{$field}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('education_field_id'))
                                                <span class="text-danger mt-1">{{ $errors->first('education_field_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4 show-admission">
                                        <div class="form-group">
                                            <label>Attendance Status: <sup class="text-danger">*</sup></label>
                                            <select name="attendance_status" id="attendance_status" class="form-control select2 admission">
                                                <option>Select attendance status</option>
                                                <option value="full_time">Full Time</option>
                                                <option value="part_time">Part Time</option>
                                            </select>
                                            @error('attendance_status')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Admission Date: <sup class="text-danger">*</sup></label>
                                            <div class="input-group date" id="admission_date" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" name="admission_date" value="{{ old('admission_date') }}" data-target="#admission_date" required/>
                                                <div class="input-group-append" data-target="#admission_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @error('admission_date')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 show-graduate">
                                        <div class="form-group">
                                            <label>Completion Date: <sup class="text-danger">*</sup></label>
                                            <div class="input-group date" id="completion_date" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input graduate" name="completion_date" value="{{ old('completion_date') }}" data-target="#completion_date" required/>
                                                <div class="input-group-append" data-target="#completion_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @error('completion_date')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 show-admission">
                                        <div class="form-group">
                                            <label>Qualification at Entry: <sup class="text-danger">*</sup></label>
                                            <select name="qualification_at_entry" id="qualification_at_entry" class="form-control select2 admission">
                                                <option>Select Qualification at entry</option>
                                                @foreach ($qualifications as $qualification)
                                                    <option value="{{$qualification->name}}">{{$qualification->name}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('qualification_at_entry'))
                                                <span class="text-danger mt-1">{{ $errors->first('qualification_at_entry') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Award: <sup class="text-danger">*</sup></label>
                                            <select name="award" id="award" class="form-control select2" >
                                                <option>Select Award</option>
                                                @foreach ($qualifications as $id => $qualification)
                                                    <option value="{{$qualification->name}}">{{$qualification->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('award')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary mr-1">Submit</button>
                                            <a href="{{route('researchdevelopment.datacollection.student-details.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
             //Date range picker
            $('#admission_date').datetimepicker({
            format: 'YYYY-MM-DD'
            });
            $('#completion_date').datetimepicker({
            format: 'YYYY-MM-DD'
            });
            $('#date_of_birth').datetimepicker({
            format: 'YYYY-MM-DD'
            });
            
            // Filter graduate students by admission year
            $('#submit-filter').click(function(e){
                    $.ajax({
                    method: 'GET',
                    url: "{{ route('researchdevelopment.datacollection.get-admission-details') }}",
                    data: {learningcenter: $('#learningcenter').val(),admission_year:$('#admission_year').val()},
                    success: function(response){
                        let data = JSON.parse(response)
                        if(data.length == 0)
                        {
                            toastr.error('No Students admitted in this year')
                            $('#new-graduation-form').attr('hidden',false)
                            $('.filter-row').attr('hidden',true)
                            $('.student-details').attr('hidden',true)
                        }
                        else{
                        let temp =  '<div class="row">'+
                                    '<div class="col-sm-8">'+
                                        '<div class="form-group">'+
                                            '<label>Completion Date: <sup class="text-danger">*</sup></label>'+
                                            '<div class="input-group date" id="graduation_date" data-target-input="nearest">'+
                                                '<input type="text" class="form-control datetimepicker-input" name="graduation_date" id="graduation_year" data-target="#graduation_date" required/>'+
                                                '<div class="input-group-append" data-target="#graduation_date" data-toggle="datetimepicker">'+
                                                    '<div class="input-group-text"><i class="fa fa-calendar"></i></div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-sm-4 d-flex align-items-end">'+
                                        '<div class="form-group">'+
                                            '<button class="btn btn-info btn-block" id="submit-graduates">Submit</button>'+
                                        '</div>'+
                                    '</div>'+
                            '<div class="col-12">'+
                            '<table id="example2" class="table datatable table-responsive">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th><input type="checkbox" id="select-all-students" /></th>'+
                                        '<th>StudentID</th>'+
                                        '<th>Fullname</th>'+
                                        '<th>Gender</th>'+
                                        '<th>Ethnicity</th>'+
                                        '<th>Date of Birth</th>'+
                                        '<th>Admission Date</th>'+
                                        '<th>Attendance Status</th>'+
                                        '<th>Qualification at Entry</th>'+
                                        '<th>Award</th>'+
                                    '</tr>'+
                                    '</thead>'+
                                    '<tbody>';
                                        data.forEach(function(val, key){
                                            temp+='<tr>'+
                                                `<td><input type="checkbox" name="students[]" class="students" value="${val.id}"/></td>`+
                                                `<td>${val.student_id}</td>`+
                                                `<td>${val.firstname +" " +val.middlename + " " +val.lastname }</td>`+
                                                `<td>${val.gender}</td>`+
                                                `<td>${val.ethnicity}</td>`+
                                                `<td>${val.date_of_birth}</td>`+
                                                `<td>${val.admission_date}</td>`+
                                                `<td>${val.attendance_status}</td>`+
                                                `<td>${val.qualification_at_entry}</td>`+
                                                `<td>${val.award}</td>`+
                                            '</tr>';
                                        })

                                    temp+='</tbody>'+
                            '</table>'+
                            '</div>'+
                            '</div>';

                            $('.student-details').append(temp);
                            $('.datatable').DataTable({
                                "responsive": true, "lengthChange": true, "autoWidth": false,"paging": true,
                                "lengthChange": true,"ordering": false,"info": true,
                                "searching": true,
                                "buttons": ["copy", "csv", "excel", "pdf", "print"]
                            });

                            $('#graduation_date').datetimepicker({
                                format: 'YYYY-MM-DD'
                            });
                        }
                    },
                    error: function(error){
                        console.log(error)
                    }
                })
            })

            // Submit graduation students data
            $(document).on('click', '#submit-graduates', function(){ 

                let graduation_date =  $('#graduation_year').val();
                let selectedstudents  = [];
                let errors = [];
            
                $('.students').each(function(){
                    if($(this).is(':checked')){
                        selectedstudents.push(this.value)
                    }
                 });


                if (selectedstudents.length == 0){
                    Swal.fire({
                                title: 'No Student selected',
                                text: 'Please Select at least one student',
                                icon: 'error',
                                confirmButtonText: 'Close'
                    })
                    errors.push('student_error')

                    return;
                }
                if(graduation_date == null || graduation_date == '' || graduation_date == undefined){
                    Swal.fire({
                                title: 'No Completion Date',
                                text: 'Please Enter the Date of Completion',
                                icon: 'error',
                                confirmButtonText: 'Close'
                    })
                    errors.push('graduation_date_error')
                    return;
                }

                if(errors.length > 0){
                    Swal.fire({
                        title: 'Errors',
                        text: 'Please enter review date and select at least one unit standard',
                        icon: 'error',
                        confirmButtonText: 'Close'
                    }) 
                }
                else{
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({  
                            method:"POST",  
                            url:"{{ route('researchdevelopment.datacollection.store-graduation-details') }}",  
                            data: {students:selectedstudents,graduationDate:graduation_date},
                            type:'json',
                            success:function(response)  
                            {
                                let data = JSON.parse(response)
                                if(data.status == 200){
                                    Swal.fire({
                                        title: 'Success',
                                        text: 'Graduation date successfully added successfully added',
                                        icon: 'success',
                                        confirmButtonText: 'Close'
                                    }) 
                                }
                            },
                            error: function(err)
                            {
                                console.log(err);
                            }  
                    });     
                }
            });

            // // Select all students checkbox
            $(document).on('click', '#select-all-students', function(){  
                if ($("#select-all-students").is(':checked')){
                    $(".students").each(function (){
                    $(this).prop("checked", true);
                    });
                    }
                else{
                    $(".students").each(function (){
                            $(this).prop("checked", false);
                    });
                }
            }); 

            // Display forms if there is validation error
            @if($errors->any())
                $('#new-graduation-form').attr('hidden',false)
                $('.filter-row').attr('hidden',true)
            @endif
    
        })
    </script>
@endsection
