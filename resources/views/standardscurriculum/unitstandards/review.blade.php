@extends('layouts.admin')
@section('page-title')
    Review Unit Standards
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Review Unit Standards</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.datacollection.institution-details.index')}}">
                                Unit standards
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Review unit standards</li>
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
                            <h3 class="card-title">Review Unit Standards</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label>Qualification: <sup class="text-danger">*</sup></label>
                                        <select name="qualification_id" id="qualification_id" class="form-control select2">
                                            <option value="">Select Qualification</option>
                                            @foreach ($qualifications as $id => $qualification)
                                                <option value="{{$id}}">{{$qualification}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3 d-flex align-items-end">
                                    <div class="form-group">
                                        <button class="btn btn-info btn-block" id="submit-filter">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row standard-units">

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
             //Date range picker
            $('#validation_date').datetimepicker({
            format: 'YYYY-MM-DD'
            });
        })

         // Filter unit standards by graduation
         $('#submit-filter').click(function(e){
             let qualification = $('#qualification_id').val()
        
             if(qualification == null || qualification == '')
             {
                Swal.fire({
                    title: 'Error',
                    text: 'Please Select Qualification',
                    icon: 'error',
                    confirmButtonText: 'Close'
                })

                return;
             }
             else{
                $.ajax({
                    method: 'get',
                    url: "{{ route('standardscurriculum.retrieve-unit-standards') }}",
                    data: { qualification: $('#qualification_id').val() },
                    success: function(response){
                        let data = JSON.parse(response)
                        if(data.length == 0)
                        {
                            Swal.fire({
                                title: 'No Unit Standard',
                                text: 'No Unit standards exist for this Qualification',
                                icon: 'success',
                                confirmButtonText: 'Close'
                            })
                        }
                        else{
                        let temp =  '<div class="col-sm-8">'+
                                        '<div class="form-group">'+
                                            '<label>Review Date: <sup class="text-danger">*</sup></label>'+
                                            '<div class="input-group date" id="review_date" data-target-input="nearest">'+
                                                '<input type="text" class="form-control datetimepicker-input" name="review_date" id="date-review" data-target="#review_date" required/>'+
                                                '<div class="input-group-append" data-target="#review_date" data-toggle="datetimepicker">'+
                                                    '<div class="input-group-text"><i class="fa fa-calendar"></i></div>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-sm-4 d-flex align-items-end">'+
                                        '<div class="form-group">'+
                                            '<button class="btn btn-primary btn-block" id="submit-review-date">Save</button>'+
                                        '</div>'+
                                    '</div>'+
                            '<div class="col-12">'+
                            '<table id="example2" class="table datatable">'+
                                '<thead>'+
                                    '<tr>'+
                                        '<th><input type="checkbox" id="select-all-standards" /></th>'+
                                        '<th>Unit Standard Title</th>'+
                                        '<th>Unit Standard Code</th>'+
                                    '</tr>'+
                                    '</thead>'+
                                    '<tbody>';
                                        data.forEach(function(val, key){
                                            temp+='<tr>'+
                                                `<td><input type="checkbox" name="standards[]" class="standards" value="${val.id}"/></td>`+
                                                `<td>${val.unit_standard_title}</td>`+
                                                `<td>${val.unit_standard_code}</td>`+
                                            '</tr>';
                                        })

                                    temp+='</tbody>'+
                            '</table>'+
                            '</div>';

                            $('.standard-units').append(temp);
                            $('.datatable').DataTable({
                                "responsive": true, "lengthChange": true, "autoWidth": false,"paging": true,
                                "lengthChange": true,"ordering": false,"info": true,
                                "searching": true,
                                "buttons": ["copy", "csv", "excel", "pdf", "print"]
                            });

                            $('#review_date').datetimepicker({
                                format: 'YYYY-MM-DD'
                            });
                        }
                    },
                    error: function(error){
                        console.log(error)
                    }
                })
             }
        
            })

             // Select all standards checkbox
            $(document).on('click', '#select-all-standards', function(){  
                if ($("#select-all-standards").is(':checked')){
                    $(".standards").each(function (){
                    $(this).prop("checked", true);
                    });
                    }
                else{
                    $(".standards").each(function (){
                            $(this).prop("checked", false);
                    });
                }
            });
            
            // Submit selected standards students data
            $(document).on('click', '#submit-review-date', function(){ 

                let review_date =  $('#date-review').val();
                let selectedstandards  = [];
                let errors = [];

                 $('.standards').each(function(){
                    if($(this).is(':checked')){
                        selectedstandards.push(this.value)
                    }
                 });

                if (selectedstandards.length == 0){
                    Swal.fire({
                                title: 'No Selected Unit Standards',
                                text: 'Please Select at least a Unit Standard',
                                icon: 'error',
                                confirmButtonText: 'Close'
                    })
                    errors.push('unit_standard_error')

                    return;
                }

               if(review_date == null || review_date == '' || review_date == undefined){
                    Swal.fire({
                                title: 'No Review Date',
                                text: 'Please Enter the Date of Review',
                                icon: 'error',
                                confirmButtonText: 'Close'
                    })
                    errors.push('review_date_error')
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
                            url:"{{ route('standardscurriculum.update-review-date') }}",  
                            data: {standards:selectedstandards,reviewDate:review_date},
                            type:'json',
                            success:function(response)  
                            {
                                let data = JSON.parse(response)
                                if(data.status == 200){
                                    Swal.fire({
                                        title: 'Success',
                                        text: 'Unit Standard Last review date successfully added',
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
    </script>
@endsection