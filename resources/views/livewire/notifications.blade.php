<div>
    @section('page-title','Notifications')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Notifications</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card research-card">
                        <div class="card-header">
                            <h3 class="card-title">Notifications Lists</h3>
                            <a href="#" class="btn btn-sm btn-primary float-right"
                                title="Mark all as read"
                                wire:click="markAllRead"
                                >
                                <i class="fas fa-check-double"></i>    
                                Mark All as Read
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Notification Message</th>
                                        <th>Time</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($notifications as $notification)
                                        <tr>
                                            <td>{{$notification->data['message']}}</td>
                                            <td>{{$notification->created_at->diffForHumans()}}</td>
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
</div>
