@extends('layouts.admin')
@section('page-title')
    Job Vacancies
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Job Vacancies Data Collection</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    @can('create_job_vacancy')
                        <a href="{{route('researchdevelopment.job-vacancies.create')}}" 
                            class="btn btn-primary float-right">
                            New Job Vacancy Data collection
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-2 d-flex justify-content-center">
                                    <h5 class="card-title">Job Vacancies Filter</h5>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="posistion_advertised" placeholder="Position advertised">
                                    </div>
                               </div>
                               <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="work_experience" placeholder="Years of work experience in range ex: 0-5">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <!-- Date range -->
                                     <div class="form-group">
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text">
                                                 <i class="far fa-calendar-alt"></i>
                                                 </span>
                                             </div>
                                             <input type="text" class="form-control float-right" id="advertised_daterange" value="" placeholder="daterange">
                                         </div>
                                         <!-- /.input group -->
                                     </div>
                                     <!-- /.form group -->
                                 </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control select2" id="qualification" name="qualification">
                                            <option value="">--- qualification ---</option>
                                            @foreach ($qualifications as $id => $qualification)
                                                <option value="{{ $qualification }}">{{ $qualification }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control select2" id="field_of_education" name="field_of_education">
                                            <option value="">--- Field of education ---</option>
                                            @foreach ($fields as $id => $field)
                                                <option value="{{ $field }}">{{ $field }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <button type="button" class="btn btn-info btn-block" id="filter-jobvacancy">Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card vacancy-card">
                        <div class="card-header">
                            <h3 class="card-title">Job Vacancy Data collection lists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Position Advertised</th>
                                        <th>Minimum Qualification Required</th>
                                        <th>Field(s) of Study</th>
                                        <th>Minimum required Job Experience (Years)</th>
                                        <th>Job Status</th>
                                        <th>Region</th>
                                        <th>Institution</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($jobvacancies as $vacancy)
                                        <tr>
                                            <td>{{$vacancy->position_advertised}}</td>
                                            <td>{{$vacancy->minimum_required_qualification}}</td>
                                            <td>
                                                @foreach ($vacancy->fields_of_study as $field)
                                                    <span class="badge badge-rounded badge-info">{{$field}}</span>
                                                @endforeach
                                            </td>
                                            <td>{{$vacancy->minimum_required_job_experience}}</td>
                                            <td>{{$vacancy->job_status}}</td>
                                            <td>{{$vacancy->region->name}}</td>
                                            <td>{{$vacancy->institution}}</td>
                                            <td>
                                                @can('edit_job_vacancy')
                                                    <a href="{{route('researchdevelopment.job-vacancies.edit',$vacancy->id)
                                                        }}" class="btn btn-sm btn-danger"
                                                        title="edit job vacancy details"
                                                        >
                                                        <i class="fas fa-edit"></i>    
                                                    </a>
                                                @endcan
                                                @can('show_job_vacancy')
                                                    <a href="{{route('researchdevelopment.job-vacancies.show',$vacancy->id)
                                                        }}" class="btn btn-sm btn-info"
                                                        title="view job vacancy details"
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

        $('#activity-daterange').daterangepicker({
                linkedCalendars:false,
                autoUpdateInput: false,
                locale: {
                    cancelLabel: 'Clear'
                }
            })
            $('#activity-daterange').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            });

            $('#activity-daterange').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
        });

        $('#filter-jobvacancy').click(function(e){
            e.preventDefault()
            let position_advertised = $('#position_advertised').val()
            let qualification = $('#qualification').val()
            let field_of_education = $('#field_of_education').val()
            let advertised_daterange = $('#advertised_daterange').val()
            let work_experience = $('#work_experience').val()
            let errors = []
            
            let data = {
                position_advertised:position_advertised,
                qualification:qualification,
                field_of_education:field_of_education,
                advertised_daterange:advertised_daterange,
                work_experience:work_experience,
            }

            if(
                position_advertised == undefined && advertised_daterange  == "" && work_experience == "" &&
                qualification == "" && field_of_education == ""
            )
            {
                    Swal.fire({
                        title: 'No single parameter field',
                        text: 'You are filtering withour no parameter',
                        icon: 'error',
                        confirmButtonText: 'Close'
                    })
                    errors.push('empty_parameter_error')
                    return;
                }

            $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({  
                            method:"POST",  
                            url:"{{ route('researchdevelopment.filter-vacancies') }}",  
                            data: data,
                            type:'json',
                            success:function(response)  
                            {
                                response = JSON.parse(response)
                                // console.log(response)
                                if(response.status == 404)
                                {
                                    Swal.fire({
                                        title: 'No Results',
                                        text: response.message,
                                        icon: 'success',
                                        confirmButtonText: 'Close'
                                    })
                                }
                                if(response.status == 200){
                                    let temp = '<table id="example1" class="table datatable table-bordered table-hover">'+
                                                    '<thead>'+
                                                        '<tr>'+
                                                            '<th>No</th>'+
                                                            '<th>Position Advertised</th>'+
                                                            '<th>Minimum Qualification Required</th>'+
                                                            // '<th>Field(s) of Study</th>'+
                                                            '<th>Minimum required Job Experience (Years)</th>'+
                                                            '<th>Job Status</th>'+
                                                            // '<th>Region</th>'+
                                                            '<th>Institution</th>'+
                                                        '</tr>'+
                                                    '</thead>'+
                                                    '<tbody>';
                                                        $.each(response.data, function(index,val){
                                                            temp+='<tr>'+
                                                                        `<td>${index+1}</td>`+
                                                                        '<td>'+val.position_advertised+'</td>'+
                                                                        '<td>'+val.minimum_required_qualification+'</td>'+
                                                                        '<td>'+val.minimum_required_job_experience+'</td>'+
                                                                        '<td>'+val.job_status+'</td>'+
                                                                        '<td>'+val.institution+'</td>'+
                                                                    '</tr>';
                                                        })
                                                    temp+='</tbody>'+
                                                '</table>';
                                        $('.vacancy-card .card-body').empty().append(temp)
                                        $('.vacancy-card .card-title').empty().append('Job Vacancy  filter results')
                                        $("#example1").DataTable({
                                            "responsive": true, "lengthChange": true, "autoWidth": false,"paging": true,
                                            "lengthChange": true,"ordering": true,"info": true,
                                            "searching": true,
                                            "buttons": [ "csv", "excel", "pdf", "print"]
                                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
        })
    })
</script>
@endsection