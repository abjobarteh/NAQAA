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
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ten Latest Conducted Researches</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bodered table-hover">
                            <thead>
                                <tr>
                                    <th>Research Topic</th>
                                    <th>Purpose</th>
                                    <th>Publisher</th>
                                    <th>Publication Date</th>
                                    <th>Funded By</th>
                                    <th>Cost</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($latestresearches as $research)
                                        <tr>
                                            <td>{{$research->research_topic}}</td>
                                            <td>{{$research->purpose}}</td>
                                            <td>{{$research->publisher}}</td>
                                            <td>{{$research->publication_date}}</td>
                                            <td>{{$research->funded_by}}</td>
                                            <td>{{$research->cost}}</td>
                                        </tr> 
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
<!-- /.content -->
@endsection