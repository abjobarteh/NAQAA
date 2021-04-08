@extends('layouts.admin')
@section('page-title')
Application Fees Tariffs
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Application Fees Tariffs</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    @can('create_application_fees')
                    <a href="{{route('admin.application-fees-tariffs.create')}}" class="btn btn-primary float-right">New Application Fee Tariff</a>
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
                            <h6 class="card-title">Application Fees Tariffs Lists</h6>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Application Category</th>
                                        <th>Application Type</th>
                                        <th>Applicant Type</th>
                                        <th>Approved</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($fees as $fee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $fee->description ?? 'N/A'}}</td>
                                        <td>{{ $fee->amount }}</td>
                                        <td>{{ $fee->application_category }}</td>
                                        <td>{{ $fee->application_type }}</td>
                                        <td>{{ $fee->applicant_type }}</td>
                                        <td>
                                            @if ($fee->approved == 0)
                                                <span class="btn btn-block btn-danger">Not Approved</span>
                                            @else
                                                <span class="btn btn-block btn-success">Approved</span>
                                            @endif
                                        </td>
                                        <td>
                                            @can('edit_application_fees')
                                            <a href="{{ route('admin.application-fees-tariffs.edit',$fee->id) }}" class="btn btn-primary btn-sm" title="Edit application fee tariff"><i class="fas fa-user-edit"></i></a>
                                            @endcan
                                            @can('delete_application_fees')
                                            <a href="{{ route('admin.application-fees-tariffs.destroy',$fee->id) }}" class="btn btn-danger btn-sm" title="delete application fee tariff"><i class="fas fa-trash"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">No registered Application fee tariffs in the system</td>
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