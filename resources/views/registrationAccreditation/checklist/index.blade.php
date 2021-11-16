@extends('layouts.admin')

@section('page-title')
Checklist Thematic Area
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 col-md-6">
            <h1 class="m-0">Checklists</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 d-flex justify-content-end">
                <a href="{{route('registration-accreditation.checklists.create')}}" class="btn btn-primary btn-flat">
                    <i class="fas fa-plus"></i>
                    Add Checklist
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
                        <h6 class="card-title">Checklist evidence Lists</h6>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table datatable table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>slug</th>
                                    <th>Checklist Type</th>
                                    <th>description</th>
                                    <th>Required</th>
                                    <th>Renewal required</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($checklists as $checklist)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $checklist->name }}</td>
                                    <td>{{ $checklist->slug }}</td>
                                    <td><span class="badge badge-primary">{{ $checklist->checklist_type ?? 'N/A' }}</span></td>
                                    <td>{{ $checklist->description ?? 'N/A' }}</td>
                                    <td><span class="badge badge-primary">{{ $checklist->is_required ?? 'N/A' }}</span></td>
                                    <td><span class="badge badge-info">{{ $checklist->is_renewal_required ?? 'N/A' }}</span></td>
                                    <td>
                                        <a href="{{ route('registration-accreditation.checklists.edit',$checklist->id) }}" class="btn btn-danger btn-xs" 
                                            title="Edit award body">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No registered checklists in the system</td>
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