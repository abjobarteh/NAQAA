@extends('layouts.admin')
@section('page-title')
    Assessor/Verifiers
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Assessor/Verifiers</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="roe">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Assessor/Verifiers lists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>FullName</th>
                                        <th>Birth Date</th>
                                        <th>Gender</th>
                                        <th>Nationality</th>
                                        <th>Email</th>
                                        <th>Phone number</th>
                                        <th>Programme</th>
                                        <th>Level</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($assessor_verifiers as $assessor_verifier)
                                        <tr>
                                            <td>{{$assessor_verifier->full_name}}</td>
                                            <td>{{$assessor_verifier->date_of_birth->toFormattedDateString()}}</td>
                                            <td>{{$assessor_verifier->gender}}</td>
                                            <td>{{$assessor_verifier->country_of_citizenship}}</td>
                                            <td>{{$assessor_verifier->email}}</td>
                                            <td>{{$assessor_verifier->phone_mobile}}</td>
                                            <td>{{$assessor_verifier->currentAccreditation->area ?? 'N/A'}}</td>
                                            <td>{{$assessor_verifier->currentAccreditation->level ?? 'N/A'}}</td>
                                            <td><span class="badge badge-rounded badge-primary">{{$assessor_verifier->type}}</span></td>
                                        </tr>
                                    @empty
                                        
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