@extends('layouts.admin')

@section('page-title')
Checklist Thematic Area
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 col-md-6">
            <h1 class="m-0">Checklist Thematic Areas</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 d-flex justify-content-end">
                <a href="{{route('registration-accreditation.checklist-thematic-area.create')}}" class="btn btn-primary btn-flat">
                    <i class="fas fa-plus"></i>
                    Add Thematic Area
                </a>
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
                        <h6 class="card-title">Thematic area Lists</h6>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table datatable table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($thematicareas as $id => $area)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $area }}</td>
                                    <td>
                                        <a href="{{ route('registration-accreditation.checklist-thematic-area.edit',$id) }}" class="btn btn-danger btn-sm" title="Edit award body">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No registered checklist thematic area in the system</td>
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