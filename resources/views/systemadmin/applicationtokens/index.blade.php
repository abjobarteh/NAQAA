@extends('layouts.admin')

@section('page-title','Application Tokens')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Application Tokens</h1>
            </div><!-- /.col -->
            <div class="col-sm-6 d-flex justify-content-end">
                <a href="{{route('admin.application-tokens.create')}}" class="btn btn-primary btn-flat">
                    <i class="fas fa-plus"></i>
                    Generate Application Tokens
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
                        <h6 class="card-title">Application Type Lists</h6>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table datatable table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Application Name</th>
                                    <th>Fee</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($application_types as $application_type)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $application_type->name ?? 'N/A'}}</td>
                                    <td>D{{ $application_type->fee ?? '0' }}</td>
                                    <td>{{ $application_type->description ?? 'N/A' }}</td>
                                    <td>
                                        @can('edit_general_configurations')
                                        <a href="{{ route('admin.application-tokens.show',$application_type->id) }}" class="btn btn-info btn-sm" title="view application tokens"><i class="fas fa-eye"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No registered Application type in the system</td>
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
