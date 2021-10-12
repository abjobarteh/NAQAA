@extends('layouts.admin')

@section('page-title','View Application Tokens')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6 col-sm-12 text-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.application-tokens.index')}}">Application Tokens</a></li>
                    <li class="breadcrumb-item active">View Application Tokens</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Application Tokens generated for <span class="text-primary">{{$application_type->name}}</span></h6>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table datatable table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Token string</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($application_type->tokens as $token_data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $token_data->token}}</td>
                                    <td>
                                        @if ($token_data->status == "available")
                                            <span class="badge badge-success badge-sm">{{ $token_data->status}}</span>
                                        @else
                                        <span class="badge badge-danger badge-sm">{{ $token_data->status}}</span>
                                            
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No tokens generated for this Application Type</td>
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
