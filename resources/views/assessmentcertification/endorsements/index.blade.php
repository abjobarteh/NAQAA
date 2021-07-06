@extends('layouts.admin')
@section('page-title','Endorsement of Certificates')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12 col-md-6">
            <h1 class="m-0">Certificate Endorsements</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <a href="{{route('assessment-certification.certificate-endorsements.create')}}" 
                    class="btn btn-primary btn-flat float-right">
                    <i class="fas fa-plus"></i> 
                    New Certificate Endorsements
                </a>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Endorsed Certificates lists</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table datatable table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Training Provider</th>
                                    <th>Programme</th>
                                    <th>Level</th>
                                    <th>Total certificates</th>
                                    <th>Total males</th>
                                    <th>Total females</th>
                                    <th>Total endorsed certificates</th>
                                    <th>Total non-endorsed certificates</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($endorsements as $endorsement)
                                    <tr>
                                        <td>{{$endorsement->trainingprovider->name ?? 'N/A'}}</td>
                                        <td>{{$endorsement->programme}}</td>
                                        <td>{{$endorsement->level}}</td>
                                        <td>{{$endorsement->total_certificates_received}}</td>
                                        <td>{{$endorsement->total_males ?? '0'}}</td>
                                        <td>{{$endorsement->total_females ?? '0'}}</td>
                                        <td>{{$endorsement->endorsed_certificates ?? '0'}}</td>
                                        <td>{{$endorsement->non_endorsed_certificates ?? '0'}}</td>
                                        <td>
                                            <a href="{{route('assessment-certification.certificate-endorsements.edit',$endorsement->id)
                                                }}" class="btn btn-xs btn-danger"
                                                title="edit certificate endorsement details"
                                                >
                                                <i class="fas fa-edit"></i>    
                                            </a>
                                            <a href="{{route('assessment-certification.certificate-endorsements.show',$endorsement->id)
                                                }}" class="btn btn-xs btn-info"
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
    </div>
</section>
@endsection