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
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                        <h3>50</h3>

                        <p>Research Development</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->    
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Graphs
                </h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Institutions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Trainers</a>
                    </li>
                    </ul>
                </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                <div class="tab-content p-0">
                    {{-- Chart data goes here --}}
                </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
<!-- /.content -->
@endsection