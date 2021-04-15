@extends('layouts.admin')
@section('page-title')
    Institution Details
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Institution Details Data Collection</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    @can('create_data_collection')
                        <a href="{{route('researchdevelopment.datacollection.institution-details.create')}}" 
                            class="btn btn-primary float-right">
                            New Data collection
                        </a>
                    @endcan
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
                            <h3 class="card-title">Institution Details Data collection lists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Learning Center name</th>
                                        <th>Estimated yearly turnover</th>
                                        <th>Enrollment capacity</th>
                                        <th>No. of lecture rooms</th>
                                        <th>No. of computer labs</th>
                                        <th>Total No. of computers in labs</th>
                                        <th>Date collected</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($institutionsdata as $data)
                                        <tr>
                                            <td>{{$data->training_provider_name}}</td>
                                            <td>{{$data->estimated_yearly_turnover}}</td>
                                            <td>{{$data->enrollment_capacity}}</td>
                                            <td>{{$data->no_of_lecture_rooms}}</td>
                                            <td>{{$data->no_of_computer_labs}}</td>
                                            <td>{{$data->total_no_of_computers_in_labs}}</td>
                                            <td>{{$data->created_at}}</td>
                                            <td>
                                                @can('edit_data_collection')
                                                    <a href="{{route('researchdevelopment.datacollection.institution-details.edit',$data->id)
                                                        }}" class="btn btn-sm btn-danger"
                                                        title="edit institution details"
                                                        >
                                                        <i class="fas fa-edit"></i>    
                                                    </a>
                                                @endcan
                                                @can('show_data_collection')
                                                    <a href="{{route('researchdevelopment.datacollection.institution-details.show',$data->id)
                                                        }}" class="btn btn-sm btn-info"
                                                        title="view institution details"
                                                        >
                                                        <i class="fas fa-eye"></i>    
                                                    </a>
                                                @endcan
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