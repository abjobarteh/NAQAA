@extends('layouts.systemadmin')

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
                <div class="card">
                    <div class="card-body">
                        <form id="filter_activitylogs_form" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="filter_param" id="filter_param" placeholder="User, Role, Action" />
                            </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control select2" style="width: 100%;" id="role" name="role" data-placeholder="Select Role">
                                            @foreach ($roles as $id => $roles)
                                                <option value="{{ $id }}">{{ $roles }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control select2" style="width: 100%;" id="user" name="user" data-placeholder="Select User">
                                            @foreach ($users as $id => $users)
                                                <option value="{{ $id }}">{{ $users }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-3">
                                        <button type="submit" class="btn btn-info btn-block">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h3 class="card-title">Activity Logs List</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table datatable table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Date</th>
                                    <th>Author</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Date</th>
                                    <th>Author</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                    <th>Description</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse ($activities as $activity)
                                    @if ($activity->causer_id == auth()->user()->id)
                                        <tr class="bg-info text-white">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $activity->created_at }}</td>
                                            <td>{{ $activity->causer->username }}</td>
                                            <td>{{ $activity->subject->getTable() }}</td>
                                            <td>{{ $activity->log_name }}</td>
                                            <td>{{ $activity->description }}</td>
                                        </tr>  
                                    @endif
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
    {{-- <script>
        let params = {
            filter_by_user: $('#user').val(),
        }
        $('#filter_activitylogs_form').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                headers: {'x-csrf-token': _token},
                method: 'POST',
                url: "{{ route('systemadmin.activities.filter') }}",
                data: params,
                success: function(response){
                    @foreach(response.data as activity)
                        @if (activity.causer_id == auth()->user()->id)
                            <tr class="bg-info text-white">
                                <td>{{!! loop.iteration !!}}</td>
                                <td>{{!! activity.created_at !!}}</td>
                                <td>{{!! activity.causer.username !!}}</td>
                                <td>{{!! activity.subject.getTable() !!}}</td>
                                <td>{{!! activity.log_name !!}}</td>
                                <td>{{!! activity.description !!}}</td>
                            </tr>  
                        @endif
                    @endforeach
                },
                error: function(error){
                    console.log(error)
                }
            })
        })
    </script> --}}
@endsection