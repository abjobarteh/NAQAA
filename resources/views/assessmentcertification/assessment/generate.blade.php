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
                <div class="card">
                    {{-- <div class="card-header">
                        <h3 class="card-title">Generate candidates for assessment</h3>
                    </div> --}}
                    <div class="card-body">
                       <form action="{{route('assessment-certification.assessment.generate-candidates')}}" method="POST">
                        @csrf
                        <div class="row">
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
                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="form-group d-flex flex-wrap">
                                    <label>Columns to extract:</label>
                                    <select name="columns[]" id="columns" class="form-control select2" multiple="multiple">
                                        <option value="">---select columns---</option>
                                        @foreach ($tableColumns as $column)
                                            <option value="{{$column}}">{{$column}}</option>
                                        @endforeach
                                    </select>
                                    @error('columns')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-success btn-flat btn-lg mr-1" id="generate-candidates">Generate candidates</button>
                                </div>
                            </div>
                        </div>
                       </form>
                        {{-- @if($candidates != null)
                        <div class="row mt-5">
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
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    {{-- <script>
        $(document).ready(function(){
            $('#generate-candidates').click( function(e){
                e.preventDefault()
                let institution = $('#institution_id').val()
                let programme = $('#programme').val()
                let level = $('#level').val()
                let selectedcolumns  = $('#columns').val()
                let errors = []

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

                if (selectedcolumns.length == 0){
                    Swal.fire({
                                title: 'No Columns selected',
                                text: 'Please Select the columns you wish to extract',
                                icon: 'error',
                                confirmButtonText: 'Close'
                    })
                    errors.push('column_error')

                    return;
                }

                if(errors.length < 1){
                    $.ajax({
                    method: 'get',
                    url: "{{ route('assessment-certification.assessment.generate-candidates') }}",
                    data: { institution: institution, programme:programme, level:level, columns:selectedcolumns},
                    success: function(res){
                        let response = JSON.parse(res)
                        if(response.status == 404)
                        {
                            Swal.fire({
                                title: 'No candidates',
                                text: response.data,
                                icon: 'success',
                                confirmButtonText: 'Close'
                            })
                        }
                        else{

                        let temp =  '<div class="col-8">'+
                                    '<table id="example2" class="table datatable table-bordered">'+
                                        '<thead>'+
                                            '<tr>'+
                                                `<th><input type="checkbox" id="select-all-candidates"/></th>`;
                                                for(i=0; i<selectedcolumns.length;i++)
                                                {
                                                    temp+=`<th>${selectedcolumns[i]}</th>`;
                                                }
                                            temp+='</tr>'+
                                            '</thead>'+
                                            '<tbody>';
                                                response.data.candidates.forEach(function(val, key){
                                                    console.log()
                                                    temp+='<tr>'+
                                                        // console.log(val)
                                                        `<th><input type="checkbox" class="candidates"/></th>`;
                                                        Object.keys(val).forEach(function(col,index){
                                                            temp+=`<td>${val[col]}</td>`; 
                                                        }) 
                                                    temp+='</tr>';
                                                })
                                                temp+='<tr>';

                                            temp+='</tbody>'+
                                    '</table>'+
                                    '</div>';

                            $('.generated-candidates').append(temp);
                            $('.datatable').DataTable({
                                "responsive": true, "lengthChange": true, "autoWidth": false,"paging": true,
                                "lengthChange": true,"ordering": false,"info": true,
                                "searching": true,
                                "buttons": ["copy", "csv", "excel", "pdf", "print"]
                            });

                        }
                    },
                    error: function(error){
                        console.log(error)
                    }
                })
            }

            })
        })
    </script> --}}
@endsection