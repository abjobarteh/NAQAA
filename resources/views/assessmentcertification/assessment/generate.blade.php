@extends('layouts.admin')
@section('page-title','Generate Candidates for Assessment')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 col-md-6">
            <h1 class="m-0">Generate Candidates for Assessment</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card generated-candidates">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Candidate Type:</label>
                                    <select name="candidate_type" id="candidate_type" class="form-control select2">
                                        <option value="">---select candidates type to assess---</option>
                                        <option value="regular" selected>Regular</option>
                                        <option value="private">Private</option>
                                    </select>
                                    @error('candidate_type')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row regular-students">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Institution:</label>
                                    <select name="institution_id" id="institution_id" class="form-control select2">
                                        <option value="">---select institution---</option>
                                        @foreach ($institutions as $id => $institution)
                                            <option value="{{$id}}">{{$institution}}</option>
                                        @endforeach
                                    </select>
                                    @error('institution_id')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Programme:</label>
                                    <select name="programme_id" id="programme_id" class="form-control select2">
                                        <option value="">---select programme---</option>
                                        @foreach ($programmes as $id => $programme)
                                            <option value="{{$id}}">{{$programme}}</option>
                                        @endforeach
                                    </select>
                                    @error('programme_id')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Level:</label>
                                    <select name="programme_level_id" id="programme_level_id" class="form-control select2">
                                        <option value="">---select programme level---</option>
                                        @foreach ($levels as $id => $level)
                                            <option value="{{$id}}">{{$level}}</option>
                                        @endforeach
                                    </select>
                                    @error('programme_level_id')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row private-students">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Registration No:</label>
                                    <input type="text" name="registration_no" id="registration_no" class="form-control" placeholder="Enter registration no">
                                    @error('registration_no')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date of Birth:</label>
                                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
                                    @error('date_of_birth')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-12 d-flex justify-content-center">
                                <div class="form-group justify-content-center">
                                    <button class="btn btn-success btn-flat btn-lg mr-1" id="generate-candidates">Generate candidates</button>
                                </div>
                            </div>
                        </div>
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
            if($('#candidate_type').val() == 'private'){
                    $('.private-students').show();
                    $('.regular-students').hide();
            }
            else{
                    $('.regular-students').show();
                    $('.private-students').hide();
            }

            $('#candidate_type').change(function(e){
                if ($(this).val() == "private") {
                    $('.private-students').show();
                    $('.regular-students').hide();
                }
                else{
                    $('.regular-students').show();
                    $('.private-students').hide();
                }
            })
            $('#generate-candidates').click( function(e){
                e.preventDefault()
                let candidateType = $('#candidate_type').val()
                let institution = $('#institution_id').val()
                let programme = $('#programme_id').val()
                let level = $('#programme_level_id').val()
                let registration_no = $('#registration_no').val();
                let date_of_birth = $('#date_of_birth').val()
                // let selectedcolumns  = $('#columns').val()
                let data = {};
                let errors = []

                if(candidateType === 'private')
                {
                    if(registration_no == '' || registration_no == undefined){
                        Swal.fire({
                                title: 'No Registration No',
                                text: 'Please enter registration no',
                                icon: 'error',
                                confirmButtonText: 'Close'
                        })
                        errors.push('registration_no_error')
                        return;
                    }

                    if(date_of_birth == '' || date_of_birth == undefined){
                        Swal.fire({
                                title: 'No Date of birth',
                                text: 'Please enter date of birth',
                                icon: 'error',
                                confirmButtonText: 'Close'
                        })
                        errors.push('date_of_birth_error')
                        return;
                    }

                    data = {
                        'registration_no' : registration_no,
                        'date_of_birth' : date_of_birth,
                        'candidate_type' : candidateType
                    }
                }
                else{
                    if(institution == '' || institution == undefined){
                        Swal.fire({
                                title: 'No institution selected',
                                text: 'Please select an institution',
                                icon: 'error',
                                confirmButtonText: 'Close'
                        })
                        errors.push('institution_error')
                        return;
                    }
                    if(programme == '' || programme == undefined){
                        Swal.fire({
                                title: 'No Programme selected',
                                text: 'Please select a programme',
                                icon: 'error',
                                confirmButtonText: 'Close'
                        })
                        errors.push('programme_error')
                        return;
                    }
                    if(level == '' || level == undefined){
                        Swal.fire({
                                title: 'No programme level selected',
                                text: 'Please select programme level',
                                icon: 'error',
                                confirmButtonText: 'Close'
                        })
                        errors.push('level_error')
                        return;
                    }

                    data = {
                        'institution' : institution,
                        'programme' : programme,
                        'level' : level,
                        'candidate_type' : candidateType
                    }
                }

                // if (selectedcolumns.length == 0){
                //     Swal.fire({
                //                 title: 'No Columns selected',
                //                 text: 'Please Select the columns you wish to extract',
                //                 icon: 'error',
                //                 confirmButtonText: 'Close'
                //     })
                //     errors.push('column_error')

                //     return;
                // }

                if(errors.length < 1){
                    $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                    });

                    $.ajax({
                    method: 'POST',
                    url: "{{ route('assessment-certification.assessment.generate-candidates') }}",
                    data: data,
                    success: function(response){
                        response = JSON.parse(response)
                        if(response.status == 404)
                        {
                            Swal.fire({
                                title: 'No candidates',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'Close'
                            })
                            $('.generated-candidates-table').remove();
                        }
                        else{

                        let temp =  '<div class="col-12 mt-4 generated-candidates-table">'+
                                    '<div class="card">'+
                                        '<div class="card-header">'+
                                            '<div class="row">'+
                                                '<h3 class="card-title text-primary"><i class="fas fa-list text-success"></i> Candidates Lists</h3>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="card-body">'+
                                            '<div class="row mb-2">'+
                                                '<div class="col-sm-10">'+
                                                    '<div class="form-group">'+
                                                        '<label>Assessors:</label>'+
                                                        '<select name="assessor_id" id="assessor_id" class="form-control custom-select">'+
                                                            '<option value="">---select assessor---</option>';
                                                            $.each(response.data.assessors, function(index,val){
                                                                temp+=`<option value="${val.id}">${val.firstname}. ${val.middlename}. ${val.lastname}</option>`;
                                                            })
                                                temp+='</select>'+
                                                    '</div>'+
                                                '</div>'+
                                                '<div class="col-sm-2 d-flex align-items-center">'+
                                                    '<button class="btn btn-success btn-flat btn-block" id="assign-candidates">Assign</button>'+
                                                '</div>'+
                                            '</div>'+
                                            '<table id="example1" class="table datatable table-bordered">'+
                                                '<thead>'+
                                                    '<tr>'+
                                                        `<th><input type="checkbox" id="select-all-candidates"/></th>`+
                                                        '<th>First Name</th>'+
                                                        '<th>Middle Name</th>'+
                                                        '<th>Last Name</th>'+
                                                        '<th>Date of Birth</th>'+
                                                        '<th>Gender</th>'+
                                                        '<th>Email</th>'+
                                                        '<th>Phone Number</th>'+
                                                        '<th>Address</th>'+
                                                    '</tr>'+
                                                    '</thead>'+
                                                    '<tbody>';
                                                        $.each(response.data.candidates, function(index,val){
                                                            temp+='<tr>'+
                                                                    `<td><input type="checkbox" name="candidates[]" class="candidates" value="${val.id}"/></td>`+
                                                                    `<td>${val.firstname}</td>`+
                                                                    `<td>${val.middlename}</td>`+
                                                                    `<td>${val.lastname}</td>`+
                                                                    `<td>${val.date_of_birth}</td>`+
                                                                    `<td>${val.gender}</td>`+
                                                                    `<td>${val.email}</td>`+
                                                                    `<td>${val.phone}</td>`+
                                                                    `<td>${val.address}</td>`+
                                                                '</tr>';
                                                        })

                                                    temp+='</tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div>'+
                                    '</div>';

                            $('.generated-candidates').append(temp);
                            $('.datatable').DataTable({
                                "responsive": true, "lengthChange": true, "autoWidth": false,"paging": true,
                                "lengthChange": true,"ordering": false,"info": true,
                                "searching": true,
                                "buttons": ["copy", "csv", "excel", "pdf", "print"]
                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

                        }
                    },
                    error: function(error){
                        Swal.fire({
                                title: 'Error',
                                text: error.responseJSON.message,
                                icon: 'error',
                                confirmButtonText: 'Close'
                        })
                    }
                })
            }

            })

            $(document).on('click', '#select-all-candidates', function(){  
                if ($("#select-all-candidates").is(':checked')){
                    $(".candidates").each(function (){
                    $(this).prop("checked", true);
                    });
                    }
                else{
                    $(".candidates").each(function (){
                            $(this).prop("checked", false);
                    });
                }
            });

             // Submit selected candidates
             $(document).on('click', '#assign-candidates', function(){ 
                assessor = $('#assessor_id').val()
                let selectedCandidates  = [];
                let errors = [];
                
                $('.candidates').each(function(){
                    if($(this).is(':checked')){
                        selectedCandidates.push(this.value)
                    }
                });

                if(assessor == null || assessor == '' || assessor == undefined){
                    Swal.fire({
                                title: 'No selected Assessor',
                                text: 'Please select an assessor',
                                icon: 'error',
                                confirmButtonText: 'Close'
                    })
                    errors.push('assessor_error')
                    return;
                }

                if (selectedCandidates.length == 0){
                    Swal.fire({
                                title: 'No Selected Candidate',
                                text: 'Please Select at least a candidate to assign to assessor',
                                icon: 'error',
                                confirmButtonText: 'Close'
                    })
                    errors.push('candidate_error')

                    return;
                }

                if(errors.length > 0){
                    Swal.fire({
                        title: 'Errors',
                        text: 'Please select an assessor and select candidates to assign to assesor ',
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
                                url:"{{ route('assessment-certification.assessment.assign-assessor') }}",  
                                data: {assessor:assessor,candidates:selectedCandidates},
                                type:'json',
                                success:function(response)  
                                {
                                    if(response.status == 200){
                                        Swal.fire({
                                            title: 'Success',
                                            text: response.message,
                                            icon: 'success',
                                            confirmButtonText: 'Close'
                                        }) 
                                    }
                                    else{
                                        Swal.fire({
                                            title: 'Error',
                                            text: response.message,
                                            icon: 'error',
                                            confirmButtonText: 'Close'
                                        }) 
                                    }
                                },
                                error: function(err)
                                {
                                    Swal.fire({
                                            title: 'Error',
                                            text: error.responseJSON.message,
                                            icon: 'error',
                                            confirmButtonText: 'Close'
                                    })
                                }  
                        });
     
                    }
            });
        })
    </script>
@endsection