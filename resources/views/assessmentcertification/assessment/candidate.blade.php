@extends('layouts.admin')
@section('page-title','Candidates Generated')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 col-md-6">
            <h1 class="m-0">Results of Candidates Generated</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <a href="{{route('assessment-certification.assessment.candidates')}}" 
                    class="btn btn-success btn-flat float-right">
                    <i class="fas fa-arrow-left"></i> 
                    Go back
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
                        <div class="row">
                            <h3 class="card-title text-primary"><i class="fas fa-list text-success"></i> Candidates Lists</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <form action="{{ route('assessment-certification.assessment.assign-assessor') }}" method="post"> --}}
                            {{-- @csrf --}}
                            <div class="row d-flex flex-direction-row align-items-center">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label>Assessors:</label>
                                        <select name="assessor_id" id="assessor_id" class="form-control select2">
                                            <option value="">---select assessor---</option>
                                            @foreach ($assessors as $assessor)
                                                <option value="{{$assessor->id}}">{{$assessor->fullname}}</option>
                                            @endforeach
                                        </select>
                                        @error('assessor_id')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-sm-5">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Export To:</label>
                                            <select name="export_type" id="export_type" class="form-control select2">
                                                <option value="">---select export---</option>
                                                <option value="excel">Excel</option>
                                                <option value="pdf">PDF</option>
                                                
                                            </select>
                                            @error('export_type')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="col-sm-2">
                                    <button class="btn btn-success btn-flat btn-block" id="assign-candidates">Assign</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table id="example2" class="table display nowrap table-bordered table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <td><input type="checkbox" id="select-all-candidates"/></td>
                                                <th>Full Name</th>
                                                <th>Birth Date</th>
                                                <th>Gender</th>
                                                <th>Contact Number</th>
                                                <th>Address</th>
                                                <th>Institution</th>
                                                <th>Programme</th>
                                                <th>Level</th>
                                                <th>Academic Year</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($candidates as $candidate)
                                                <tr>
                                                    <td><input type="checkbox" name="candidates[]" class="candidates" value="{{$candidate->id}}" 
                                                        data-fullname="{{$candidate->full_name}}" data-birth_date="{{$candidate->date_of_birth->toFormattedDateString()}}"
                                                        data-gender="{{$candidate->gender}}" data-address="{{$candidate->address}}"
                                                        data-programme="{{$candidate->programme->name ?? 'N/A'}}" data-level="{{$candidate->level->name ?? 'N/A'}}"
                                                        data-academic_year="{{$candidate->academic_year->toFormattedDateString()}}"/></td>
                                                    <td>{{$candidate->full_name}}</td>
                                                    <td>{{$candidate->date_of_birth->toFormattedDateString()}}</td>
                                                    <td>{{$candidate->gender}}</td>
                                                    <td>{{$candidate->contact_number}}</td>
                                                    <td>{{$candidate->address}}</td>
                                                    <td>{{$candidate->institution->name ?? 'N/A'}}</td>
                                                    <td>{{$candidate->programme->name ?? 'N/A'}}</td>
                                                    <td>{{$candidate->level->name ?? 'N/A'}}</td>
                                                    <td>{{$candidate->academic_year->toFormattedDateString()}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div> 
                        {{-- </form> --}}
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
            // Select all candidates
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
                    let temp ='<div class="modal fade" id="assign-candidates-modal">'+
                        '<div class="modal-dialog modal-xl">'+
                        '<div class="modal-content">'+
                            '<div class="modal-header">'+
                            '<h4 class="modal-title">Confirm candidates to assign assessor</h4>'+
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                                '<span aria-hidden="true">&times;</span>'+
                            '</button>'+
                            '</div>'+
                            '<div class="modal-body">'+
                                '<table id="example2" class="table display nowrap table-bordered table-hover" style="width:100%">'+
                                    '<thead>'+
                                        '<tr>'+
                                            '<th>Full Name</th>'+
                                            '<th>Date of Birth</th>'+
                                            '<th>Gender</th>'+
                                            '<th>Address</th>'+
                                            '<th>Programme</th>'+
                                            '<th>Level</th>'+
                                            '<th>Academic Year</th>'+
                                        '</tr>'+
                                    '</thead>'+
                                    '<tbody>';
                                        $('.candidates').each(function(){
                                            if($(this).is(':checked')){
                                                selectedCandidates.push(this.value)
                                                temp+='<tr>'+
                                                            '<td>'+$(this).data('fullname')+'</td>'+
                                                            '<td>'+$(this).data('birth_date')+'</td>'+
                                                            '<td>'+$(this).data('gender')+'</td>'+
                                                            '<td>'+$(this).data('address')+'</td>'+
                                                            '<td>'+$(this).data('programme')+'</td>'+
                                                            '<td>'+$(this).data('level')+'</td>'+
                                                            '<td>'+$(this).data('academic_year')+'</td>'+
                                                        '</tr>';
                                            }
                                        });
                                    temp+='</tbody>'+
                                '</table>'+
                            '</div>'+
                            '<div class="modal-footer justify-content-between">'+
                            '<button type="button" class="btn btn-danger" data-dismiss="modal" id="hide-modal">Close</button>'+
                            '<button type="button" class="btn btn-success" id="confirm-selection">Save and Export</button>'+
                            '</div>'+
                        '</div>'+
                        '<!-- /.modal-content -->'+
                        '</div>'+
                        '<!-- /.modal-dialog -->'+
                    '</div>'+
                    '<!-- /.modal -->';

                    $('.content').append(temp)
                    $('#assign-candidates-modal').modal('show')

                    $('#confirm-selection').click(function(e){
                        e.preventDefault()
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
                                    $('#assign-candidates-modal').modal('hide') 
                                }
                            },
                            error: function(err)
                            {
                                console.log(err);
                            }  
                    });
                    })
     
                    }
                });

                // export buttons clicked
                $('.export-candidates').click(function(e){
                    e.preventDefault()
                    console.log($(this).data('export'))

                    let assessor = $('#assessor_id').val()
                    let selectedCandidates  = [];
                    let exportType = $(this).data('export')
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
                                method:"GET",  
                                url:"{{ route('assessment-certification.assessment.export-candidates') }}",  
                                data: {assessor:assessor,candidates:selectedCandidates, type:exportType},
                                type:'json',
                                success:function(response)  
                                {
                                    console.log(response)
                                    // if(response.status == 200){
                                    //     Swal.fire({
                                    //         title: 'Success',
                                    //         text: response.message,
                                    //         icon: 'success',
                                    //         confirmButtonText: 'Close'
                                    //     })
                                    // }
                                },
                                error: function(err)
                                {
                                    Swal.fire({
                                            title: 'Error',
                                            text: err.responseText,
                                            icon: 'error',
                                            confirmButtonText: 'Close'
                                    })
                                }  
                        });
                    // })
     
                    }
                })

                // $('#download-candidates').click(function(e){
                //     e.preve
                // })
        })
    </script>
@endsection