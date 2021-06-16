@extends('layouts.admin')
@section('page-title')
    Research Survey
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Research Surveys Documentation</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    @can('create_research_survey_documentation')
                        <a href="{{route('researchdevelopment.research-survey-documentation.create')}}" 
                            class="btn btn-primary float-right">
                            New Research Survey
                        </a>
                    @endcan
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-2 d-flex justify-content-center">
                                    <h5 class="card-title">Research Survey Filter</h5>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                     <div class="form-group">
                                         <input type="text" class="form-control" id="topic" placeholder="Research Topic">
                                     </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                     <div class="form-group">
                                         <input type="text" class="form-control" id="purpose" placeholder="Research Purpose">
                                     </div>
                                 </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                     <div class="form-group">
                                         <input type="text" class="form-control" id="main_findings" placeholder="Main Findings">
                                     </div>
                                 </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                     <div class="form-group">
                                         <input type="text" class="form-control" id="authors" placeholder="Authors">
                                     </div>
                                 </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                     <div class="form-group">
                                         <input type="text" class="form-control" id="funding_body" placeholder="Funding Body">
                                     </div>
                                 </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                     <div class="form-group">
                                         <input type="date" class="form-control" id="publication_date" placeholder="Publication date">
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
                    <div class="card research-card">
                        <div class="card-header">
                            <h3 class="card-title">Research Surveys List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Research Topic</th>
                                        <th>Publisher</th>
                                        <th>Publication Date</th>
                                        <th>Funded by</th>
                                        <th>Cost (GMD)</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($surveys as $survey)
                                        <tr>
                                            <td>{{$survey->research_topic}}</td>
                                            <td>{{$survey->publisher}}</td>
                                            <td>{{$survey->publication_date}}</td>
                                            <td>{{$survey->funded_by}}</td>
                                            <td>{{$survey->cost}}</td>
                                            <td>
                                                @can('edit_research_survey_documentation')
                                                    <a href="{{route('researchdevelopment.research-survey-documentation.edit',$survey->id)
                                                        }}" class="btn btn-sm btn-danger"
                                                        title="edit research survey details"
                                                        >
                                                        <i class="fas fa-edit"></i>    
                                                    </a>
                                                @endcan
                                                @can('show_research_survey_documentation')
                                                    <a href="{{route('researchdevelopment.research-survey-documentation.show',$survey->id)
                                                        }}" class="btn btn-sm btn-info"
                                                        title="view research survey details"
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
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){

        $('#filter-jobvacancy').click(function(e){
            e.preventDefault()
            let topic = $('#topic').val()
            let purpose = $('#purpose').val()
            let main_findings = $('#main_findings').val()
            let authors = $('#authors').val()
            let funding_body = $('#funding_body').val()
            let publication_date = $('#publication_date').val()
            
            let data = {
                topic:topic,
                purpose:purpose,
                main_findings:main_findings,
                authors:authors,
                funding_body:funding_body,
                publication_date:publication_date,
            }

            // if(qualification == null || qualification == '' || qualification == undefined){
            //     Swal.fire({
            //         title: 'No selected Qualification',
            //         text: 'Please select a qualification',
            //         icon: 'error',
            //         confirmButtonText: 'Close'
            //     })
            //     errors.push('qualification_error')
            //     return;
            // }

            $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({  
                            method:"POST",  
                            url:"{{ route('researchdevelopment.filter-research-survey') }}",  
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
                                                            '<th>Research Topic</th>'+
                                                            '<th>Publisher</th>'+
                                                            '<th>Publication Date</th>'+
                                                            '<th>Funded by</th>'+
                                                            '<th>Cost (GMD)</th>'+
                                                        '</tr>'+
                                                    '</thead>'+
                                                    '<tbody>';
                                                        $.each(response.data, function(index,val){
                                                            temp+='<tr>'+
                                                                        `<td>${index+1}</td>`+
                                                                        '<td>'+val.research_topic+'</td>'+
                                                                        '<td>'+val.publisher+'</td>'+
                                                                        '<td>'+val.publication_date+'</td>'+
                                                                        '<td>'+val.funded_by+'</td>'+
                                                                        '<td>'+val.cost+'</td>'+
                                                                    '</tr>';
                                                        })
                                                    temp+='</tbody>'+
                                                '</table>';
                                        $('.research-card .card-body').empty().append(temp)
                                        $('.research-card .card-title').empty().append('Research Survey  filter results')
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