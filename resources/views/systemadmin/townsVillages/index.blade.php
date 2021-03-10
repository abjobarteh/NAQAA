@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Towns/Villages</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                @can('towns_villages_create')
                 <a href="{{ route('systemadmin.towns-villages.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add Town/Village</a>
                @endcan
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
                        <div class="card-header bg-info">
                            <h3 class="card-title">Towns/Villages List</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Town/Village Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Town/Village Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @forelse ($townsVillages as $townVillage)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $townVillage->name }}</td>
                                        <td>
                                            @can('towns_villages_edit')
                                            <a href="{{ route('systemadmin.towns-villages.edit', $townVillage->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                            @endcan
                                            @can('towns_villages_show')
                                            <a href="{{ route('systemadmin.towns-villages.show', $townVillage->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> view</a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center text-bold">No registered Town/Village in the system</td>
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