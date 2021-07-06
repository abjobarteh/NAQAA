@extends('layouts.admin')
@section('page-title')
    Qualifications
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Qualifications Developed</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    @can('create_qualifications')
                        <a href="{{route('standardscurriculum.qualifications.create')}}" 
                            class="btn btn-primary btn-flat float-right">
                            <i class="fas fa-plus"></i>&nbsp;
                            New Qualification
                        </a>
                    @endcan
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="roe">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Qualifications Lists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Tuition Fee (GMD)</th>
                                        <th>Entry requirements</th>
                                        <th>Mode of Delivery</th>
                                        <th>Duration (months)</th>
                                        <th>Level</th>
                                        <th>Field of Education</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($qualifications as $qualification)
                                        <tr>
                                            <td>{{$qualification->name}}</td>
                                            <td>{{$qualification->tuition_fee ?? 'N/A'}}</td>
                                            <td>
                                                @forelse ($qualification->entry_requirements as $req)
                                                   <span class="badge badge-primary badge-rounded">{{$req}}</span> 
                                                @empty
                                                    
                                                {{'N/A'}}
                                                @endforelse
                                            </td>
                                            <td>{{$qualification->mode_of_delivery}}</td>
                                            <td>{{$qualification->minimum_duration}}</td>
                                            <td>{{$qualification->level->name ?? 'N/A'}}</td>
                                            <td>{{$qualification->fieldOfEducation->name ?? 'N/A'}}</td>
                                            <td>
                                                @can('edit_qualifications')
                                                    <a href="{{route('standardscurriculum.qualifications.edit',$qualification->id)}}" 
                                                        class="btn btn-xs btn-danger"
                                                        title="edit qualification details"
                                                        >
                                                        <i class="fas fa-edit"></i>    
                                                    </a>
                                                @endcan
                                                @can('show_qualifications')
                                                    <a href="{{route('standardscurriculum.qualifications.show',$qualification->id)}}" 
                                                        class="btn btn-xs btn-info"
                                                        title="view qualification details"
                                                        >
                                                        <i class="fas fa-eye"></i>    
                                                    </a>
                                                @endcan
                                                @can('show_qualifications')
                                                <button type="button" class="btn btn-xs btn-info" id="review-date-button"
                                                    data-qualification-id={{$qualification->id}} data-qualification-name="{{$qualification->name}}" 
                                                    title="update qualification review date">
                                                    <i class="fas fa-calendar-check"></i> 
                                                </button>
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
           {{-- Qualification review date modal --}}
           <div class="modal fade" id="update-review-date">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">New Qualification review date</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form id="review-qualification-date-form" name="review-qualification-date-form">
                        <input type="hidden" id="qualification_id">
                        <div class="form-group row">
                            <label class="col-sm-12">Name:</label>
                            <input type="text" class="col-sm-12 form-control" id="qualification_name" disabled>
                        </div>
                        <div class="form-group row">
                            <label>Validation Date:</label>
                            <div class="input-group date" id="review_date" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" id="review-date" name="review_date" data-target="#review_date" required/>
                                <div class="input-group-append" data-target="#review_date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" id="close-review-qualification-modal">Close</button>
                  <button type="button" class="btn btn-primary" id="submit-review-date">Save changes</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            //initialise Date range picker
            $('#review_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            // when review button is clicked show modal
            $(document).on('click', '#review-date-button', function(e){  
                showModal($(this).data('qualification-id'),$(this).data('qualification-name'))
            });

            // when modal close button is clicked hide modal
            $(document).on('click', '#close-review-qualification-modal', function(e){  
                hideModal();
            });

            // when submit review date function is clicked
            $(document).on('click', '#submit-review-date', function(e){  
                let review_date =  $('#review-date').val()
                var qualification_id = $('#qualification_id').val()
                let errors = [];

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
                        text: 'Please enter new review date',
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
                            data: {id:qualification_id,review_date:review_date},
                            type:'json',
                            success:function(response)  
                            {
                                // console.log(response)
                                let data = JSON.parse(response)
                                if(data.status == 200){
                                    Swal.fire({
                                        title: 'Success',
                                        text: data.message,
                                        icon: 'success',
                                        confirmButtonText: 'Close'
                                    })
                                    hideModal() 
                                }
                            },
                            error: function(err)
                            {
                                console.log(err);
                            }  
                    });     
                }
            });

            // function submitReviewDate(id,name){

            // }

            function showModal(id,name){
                // console.log(e)
                $('#update-review-date').modal('show')
                $('#qualification_name').val(name)
                $('#qualification_id').val(id)
            }

            function hideModal(){
                // console.log(e)
                $('#update-review-date').modal('hide')
                $('#update-review-date form')[0].reset()
            }

        })
    </script>
@endsection