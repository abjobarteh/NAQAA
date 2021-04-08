@extends('layouts.admin')
@section('page-title')
    Academic & Admin Staff Ranks
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Academic & Admin Staff Ranks</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    @can('create_field_of_education')
                    <a href="{{route('admin.training-provider-staff-ranks.create')}}" class="btn btn-primary float-right">Add Rank</a>
                    @endcan
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Academic & Admin staff ranks Lists</h6>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($ranks as $rank)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rank->name }}</td>
                                        <td>{{ $rank->description ?? 'N/A'}}</td>
                                        <td>
                                            @can('edit_field_of_education')
                                            <a href="{{ route('admin.training-provider-staff-ranks.edit',$rank->id) }}" class="btn btn-primary btn-sm" title="Edit field of education"><i class="fas fa-user-edit"></i></a>
                                            @endcan
                                            @can('delete_field_of_education')
                                            <a href="{{ route('admin.training-provider-staff-ranks.destroy',$rank->id) }}" class="btn btn-danger btn-sm" title="delete field of education"><i class="fas fa-trash"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">No registered Academic and admin staff ranks in the system</td>
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