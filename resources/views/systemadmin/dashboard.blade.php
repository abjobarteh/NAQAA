@extends('layouts.admin')

@section('content')
         <!-- Content Header (Page header) -->
         <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Welcome, {{ auth()->user()->firstname}}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    <!-- /.content-header --> 
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            @foreach ($tiles as $tile)
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box {{$tile['background']}}">
                        <div class="inner">
                        <h3>{{$tile['data']}}</h3>

                        <p>{{$tile['name']}}</p>
                        </div>
                        <div class="icon">
                        <i class="{{$tile['icon']}}"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->    
            @endforeach
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-12 connectedSortable">
                <!-- TABLE: LATEST ORDERS -->
            <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Latest System Activities</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                      <tr>
                        <th>User</th>
                        <th>Log name</th>
                        <th>Description</th>
                        <th>Timestamp</th>
                      </tr>
                      </thead>
                      <tbody>
                        @forelse ($activities as $activity)
                                <tr>
                                    <td>{{ $activity->causer->username ?? 'N/A' }}</td>
                                    <td>{{ $activity->log_name }}</td>
                                    <td>{{ $activity->description }}</td>
                                    <td>{{ $activity->created_at }}</td>
                                </tr>  
                        @empty
                            <tr>
                                <td colspan="10" class="text-center text-bold">No logged activities in the system</td>
                            </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
<!-- /.content -->
@endsection