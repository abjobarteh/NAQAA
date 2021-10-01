@extends('layouts.portal')
@section('title','Certificate Endorsements')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">Endorsed Certificates Requests</h4>
                        </div>
                        <div class="col-md-6 d-flex flex-direction-row justify-content-end">
                            <a href="{{route('portal.institution.certificate-endorsements.create')}}" class="btn btn-success btn-square"><i class="fas fa-plus"></i> Endorsed Certificates</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example2" class="table datatable table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Programme</th>
                                <th>Level</th>
                                <th>Total certificates declared</th>
                                <th>Total males</th>
                                <th>Total females</th>
                                <th>Total endorsed certificates</th>
                                <th>Total non-endorsed certificates</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($endorsements as $endorsement)
                                <tr>
                                    <td>{{$endorsement->programme}}</td>
                                    <td>{{$endorsement->level}}</td>
                                    <td>{{$endorsement->total_certificates_declared}}</td>
                                    <td>{{$endorsement->total_males ?? '0'}}</td>
                                    <td>{{$endorsement->total_females ?? '0'}}</td>
                                    <td>{{$endorsement->endorsed_certificates ?? '0'}}</td>
                                    <td>{{$endorsement->non_endorsed_certificates ?? '0'}}</td>
                                    <td><span class="badge badge-info">{{$endorsement->request_status}}</span></td>
                                    <td>
                                        @if($endorsement->request_status === 'Pending')
                                        <a href="{{route('portal.institution.certificate-endorsements.edit',$endorsement->id)
                                            }}" class="btn btn-sm btn-danger"
                                            title="edit certificate endorsement details"
                                            >
                                            <i class="fas fa-edit"></i>    
                                        </a>
                                        @endif
                                        <a href="{{route('portal.institution.certificate-endorsements.show',$endorsement->id)
                                            }}" class="btn btn-sm btn-info"
                                            title="view certificate endorsement registration details"
                                            >
                                            <i class="fas fa-eye"></i>    
                                        </a>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="13" class="text-center"><span class="text-bold text-primary text-lg">No recorded endorsed certificates</span></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection