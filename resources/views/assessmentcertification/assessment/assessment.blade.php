@extends('layouts.admin')
@section('Student Assessment Center')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 col-md-6">
            <h1 class="m-0">Students Assessment Center</h1>
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
                                    <label>Assessment Type:</label>
                                    <select name="assessment_type" id="assessment_type" class="form-control select2">
                                        <option value="">---select assessment type---</option>
                                        <option value="new" selected>New Assessment</option>
                                        <option value="reassessment">Re-assessment</option>
                                    </select>
                                    @error('assessment_type')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="new-assessment">
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
                        </div>
                        <div class="re-assessment">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Candidate Previous Registration No:</label>
                                        <input type="text" name="candidate_registration_no" id="candidate_registration_no" class="form-control" placeholder="Enter candidate registration no">
                                        @error('candidate_registration_no')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Candidate Date of Birth:</label>
                                        <input type="date" name="candidate_date_of_birth" id="candidate_date_of_birth" class="form-control">
                                        @error('candidate_date_of_birth')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 d-flex justify-content-center">
                                <div class="form-group justify-content-center">
                                    <button class="btn btn-success btn-flat btn-lg mr-1" id="generate-candidates">Get candidates</button>
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
            // check assessment type is new or re-assessment
            if($('#assessment_type').val() == 'new'){
                    $('.new-assessment').show();
                    $('.re-assessment').hide();
            }
            else{
                    $('.re-assessment').show();
                    $('.new-assessment').hide();
            }

            // check if candidate type is private or regular
            if($('#candidate_type').val() == 'private'){
                    $('.private-students').show();
                    $('.regular-students').hide();
            }
            else{
                    $('.regular-students').show();
                    $('.private-students').hide();
            }

            // show proper assessment form when assessment type changes
            $('#assessment_type').change(function(e){
                if ($(this).val() == "new") {
                    $('.new-assessment').show();
                    $('.re-assessment').hide();
                }
                else{
                    $('.re-assessment').show();
                    $('.new-assessment').hide();
                }
            })

            // sho proper candidate form when candidate type changes
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

            // generate candidates button clicked
            $('#generate-candidates').click( function(e){
                e.preventDefault()
                let assessmentType = $('#assessment_type').val()
                let candidateType = $('#candidate_type').val()
                let institution = $('#institution_id').val()
                let programme = $('#programme_id').val()
                let level = $('#programme_level_id').val()
                let registration_no = $('#registration_no').val();
                let date_of_birth = $('#date_of_birth').val()
                let candidate_registration_no = $('#candidate_registration_no').val()
                let candidate_date_of_birth = $('#candidate_date_of_birth').val()
                let data = {};
                let errors = []
                if(assessmentType === 'new'){
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
                            'candidate_type' : candidateType,
                            'assessment_type':assessmentType
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
                            'candidate_type' : candidateType,
                            'assessment_type':assessmentType
                        }
                    }
                }
                else{
                    if(candidate_registration_no == '' || candidate_registration_no == undefined){
                            Swal.fire({
                                    title: 'No Registration No',
                                    text: 'Please enter candidate registration no',
                                    icon: 'error',
                                    confirmButtonText: 'Close'
                            })
                            errors.push('candidate_registration_no_error')
                            return;
                    }
                    if(candidate_date_of_birth == '' || candidate_date_of_birth == undefined){
                            Swal.fire({
                                    title: 'No Registration No',
                                    text: 'Please enter candidate date of birth',
                                    icon: 'error',
                                    confirmButtonText: 'Close'
                            })
                            errors.push('candidate_date_of_birth_error')
                            return;
                    }

                    data = {
                            'candidate_registration_no' : candidate_registration_no,
                            'candidate_date_of_birth' : candidate_date_of_birth,
                            'assessment_type':assessmentType
                        }
                }

                if(errors.length < 1){
                    $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                    });

                    $.ajax({
                    method: 'POST',
                    url: "{{ route('assessment-certification.assessment.generate-assessment-candidates') }}",
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
                                                '<div class="col-md-6">'+
                                                    '<h3 class="card-title text-primary"><i class="fas fa-list text-success"></i> Candidates Lists</h3>'+
                                                '</div>'+
                                                '<div class="col-md-6 d-flex justify-content-end">'+
                                                    '<button class="btn btn-success btn-flat mr-1" id="run-assessment">Run Candidates Assessment</button>'+
                                                    '<button class="btn btn-success btn-flat" id="generate-candidateids">Generate CandidateID</button>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="card-body">'+
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
                                                        '<th>Assessment status</th>'+
                                                        '<th>Qualification type</th>'+
                                                        '<th>Last assessment date</th>'+
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
                                                                    '<td>'+
                                                                        '<select name="assessment_status[]" class="form-control custom-select assessment_status">'+
                                                                            '<option value="">-- select assessment status --</option>'+
                                                                            '<option value="competent">Competent</option>'+
                                                                            '<option value="incompetent">Incompetent</option>'+
                                                                            '<option value="notcompetent">Not Competent</option>'+
                                                                        '</select>'+
                                                                    '</td>'+
                                                                    '<td>'+
                                                                        '<select name="qualification_type[]" class="form-control custom-select qualification_type">'+
                                                                            '<option value="">-- select qualification type --</option>'+
                                                                            '<option value="full">Full</option>'+
                                                                            '<option value="partial">Partial</option>'+
                                                                        '</select>'+
                                                                    '</td>'+
                                                                    '<td>'+
                                                                        '<input type="date" name="last_assessment_date[]" class="form-control last_assessment_date" placeholder="Last assessment date" />'+
                                                                    '</td>'+
                                                                '</tr>';
                                                        })

                                                    temp+='</tbody>'+
                                            '</table>'+
                                        '</div>'+
                                    '</div>'+
                                    '</div>';
                                
                            $('.generated-candidates-table').remove();
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
             $(document).on('click', '#run-assessment', function(){ 
                let selectedCandidates  = [];
                let assessment_status = [];
                let qualification_type = [];
                let last_assessment_date = [];
                let errors = [];
                
                $('.candidates').each(function(){
                    selectedCandidates.push($(this).val())
                });
                $('.assessment_status').each(function(){
                    if($(this).val() != ""){
                        assessment_status.push($(this).val())
                    }
                });
                $('.qualification_type').each(function(){
                    if($(this).val() != ""){
                        qualification_type.push($(this).val())
                    }
                });

                $('.last_assessment_date').each(function(){
                    if($(this).val() != ""){
                        last_assessment_date.push($(this).val())
                    }
                });

                if (
                    selectedCandidates.length != assessment_status.length 
                    ){
                    Swal.fire({
                        title: 'Missing assessment status details',
                        text: 'Please select the assessment status of candidates',
                        icon: 'error',
                        confirmButtonText: 'Close'
                    })
                    errors.push('assessment_details_error')

                    return;
                }
                if (
                    selectedCandidates.length != qualification_type.length
                    ){
                    Swal.fire({
                        title: 'Missing qualification type details',
                        text: 'Please select the qualification type of candidates',
                        icon: 'error',
                        confirmButtonText: 'Close'
                    })
                    errors.push('qualification_type_error')

                    return;
                }

                if (
                    selectedCandidates.length != last_assessment_date.length
                    ){
                    Swal.fire({
                        title: 'Error',
                        text: 'Please enter the last assessment date of candidates',
                        icon: 'error',
                        confirmButtonText: 'Close'
                    })
                    errors.push('last_assessmet_date_error')

                    return;
                }

                if (
                    selectedCandidates.length != assessment_status.length && 
                    selectedCandidates.length != qualification_type.length &&
                    selectedCandidates.length != last_assessment_date.length
                    ){
                    Swal.fire({
                        title: 'Missing assessment details',
                        text: 'Please fill all the assessment details of candidates',
                        icon: 'error',
                        confirmButtonText: 'Close'
                    })
                    errors.push('assessment_details_error')

                    return;
                }

                if(errors.length > 0){
                    Swal.fire({
                        title: 'Errors',
                        text: 'Please fill the assessment details of candidates',
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
                                url:"{{ route('assessment-certification.assessment.store-assessment-details') }}",  
                                data: {
                                    candidates:selectedCandidates,
                                    assessment_status:assessment_status,
                                    candidates:selectedCandidates,
                                    qualification_type:qualification_type,
                                    last_assessment_date:last_assessment_date
                                },
                                type:'json',
                                success:function(response)  
                                {
                                    console.log(response)
                                    if(response.status == 200){
                                        Swal.fire({
                                            title: 'Success',
                                            text: response.message,
                                            icon: 'success',
                                            confirmButtonText: 'Close'
                                        }) 
                                    }
                                    else if(response.status == 401){
                                        Swal.fire({
                                            title: 'Candidate duplicate assessment error',
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
                                            text: err.responseJSON.message,
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