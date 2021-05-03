@extends('layouts.admin')
@section('page-title')
    Registration Training Provider
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Training Providers</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <a href="{{route('registration-accreditation.registration.trainingproviders.create')}}" 
                        class="btn btn-primary float-right">
                        Add Training provider
                    </a>
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
                            <h3 class="card-title">Training Providers lists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Physical address</th>
                                        <th>Postal address</th>
                                        <th>Email</th>
                                        <th>District</th>
                                        <th>Town/Village</th>
                                        <th>Telephone (work)</th>
                                        <th>Mobile Phone</th>
                                        <th>Category</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($trainingproviders as $trainingprovider)
                                        <tr>
                                            <td>{{$trainingprovider->name}}</td>
                                            <td>{{$trainingprovider->physical_address}}</td>
                                            <td>{{$trainingprovider->postal_address}}</td>
                                            <td>{{$trainingprovider->email}}</td>
                                            <td>{{$trainingprovider->district->name}}</td>
                                            <td>{{$trainingprovider->townVillage->name}}</td>
                                            <td>{{$trainingprovider->telephone_work}}</td>
                                            <td>{{$trainingprovider->mobile_phone}}</td>
                                            <td>{{$trainingprovider->category->name}}</td>
                                            <td>
                                                <a href="{{route('registration-accreditation.registration.trainingproviders.edit',$trainingprovider->id)
                                                    }}" class="btn btn-sm btn-danger"
                                                    title="edit training provider details"
                                                    >
                                                    <i class="fas fa-edit"></i>    
                                                </a>
                                                <a href="{{route('registration-accreditation.registration.trainingproviders.show',$trainingprovider->id)
                                                    }}" class="btn btn-sm btn-info"
                                                    title="view training provider details"
                                                    >
                                                    <i class="fas fa-eye"></i>    
                                                </a>
                                            </td>
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