@extends('layouts.admin')
@section('page-title','Activity Logs')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Activity Logs</h3>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header --> 

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
               @livewire('systemadmin.filter-logs')
            </div>
            <div class="col-12">
                <div class="card logs-card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">Activity Logs List</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table datatable table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Log Name</th>
                                    <th>User</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($activities as $activity)
                                        <tr @if($activity->causer_id == auth()->user()->id) class="text-dark-50" @endif>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $activity->log_name }}</td>
                                            <td>{{ $activity->causer->username }}</td>
                                            <td>{{ $activity->description }}</td>
                                            <td>{{ $activity->created_at }}</td>
                                            {{-- <td>
                                                <a href="{{route('admin.activities.show', $activity->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i> </a>
                                            </td> --}}
                                        </tr>  
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center text-bold">No logged activities in the system</td>
                                    </tr>
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
            //Date range picker
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

            $('#filter-logs').click(function(e){
                e.preventDefault()
                let user_id = $('#user').val()
                let activityDaterange = $('#activity-daterange').val()
                let errors = []

                if(user_id == null || user_id == '' || user_id == undefined){
                    Swal.fire({
                        title: 'No selected user',
                        text: 'Please select a user',
                        icon: 'error',
                        confirmButtonText: 'Close'
                    })
                    errors.push('user_error')
                    return;
                }

                $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({  
                                method:"POST",  
                                url:"{{ route('admin.filter-logs') }}",  
                                data: {user_id:user_id,daterange:activityDaterange},
                                type:'json',
                                success:function(response)  
                                {
                                    response = JSON.parse(response)
                                    if(response.status == 200){
                                        let temp = '<table id="example1" class="table datatable table-bordered table-hover">'+
                                                        '<thead>'+
                                                            '<tr>'+
                                                                '<th>No</th>'+
                                                                '<th>Log Name</th>'+
                                                                '<th>Description</th>'+
                                                                '<th>Date</th>'+
                                                            '</tr>'+
                                                        '</thead>'+
                                                        '<tbody>';
                                                            $.each(response.data, function(index,val){
                                                                temp+='<tr>'+
                                                                            `<td>${index+1}</td>`+
                                                                            '<td>'+val.log_name+'</td>'+
                                                                            '<td>'+val.description+'</td>'+
                                                                            '<td>'+val.created_at+'</td>'+
                                                                        '</tr>';
                                                            })
                                                        temp+='</tbody>'+
                                                    '</table>';
                                        $('.logs-card .card-body').empty().append(temp)
                                        $('.logs-card .card-title').empty().append('Filtered logs result')
                                        $("#example1").DataTable({
                                            "responsive": true, "lengthChange": true, "autoWidth": false,"paging": true,
                                            "lengthChange": true,"ordering": true,"info": true,
                                            "searching": true,
                                            "buttons": [ "csv", "excel", "pdf", "print"]
                                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                                        // $('#filter-logs-modal').modal('show')
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