@extends('layouts.admin')
@section('page-title')
    Dashboard
@endsection
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
           
        </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
<!-- /.content -->
@endsection