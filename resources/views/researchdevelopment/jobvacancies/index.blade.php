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
                        <a href="{{route('researchdevelopment.add-jobvacancy')}}" 
                            class="btn btn-primary btn-flat float-right">
                            <i class="fas fa-plus"></i> &nbsp;
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
                                            <td>{{$vacancy->position->name ?? 'N/A'}}</td>
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
                                                    <a href="{{route('researchdevelopment.edit-jobvacancy',$vacancy->id)
                                                        }}" class="btn btn-xs btn-danger"
                                                        title="edit job vacancy details"
                                                        >
                                                        <i class="fas fa-edit"></i>    
                                                    </a>
                                                @endcan
                                                @can('show_job_vacancy')
                                                    <a href="{{route('researchdevelopment.job-vacancies.show',$vacancy->id)
                                                        }}" class="btn btn-xs btn-info"
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