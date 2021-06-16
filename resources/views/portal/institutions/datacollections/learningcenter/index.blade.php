@extends('layouts.portal')
@section('title','Learning center Datacollection')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                             <h4 class="card-title mb-0">Training Provider Datacollection</h4>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                             <a href="{{route('portal.institution.datacollection.programmes.create')}}" class="btn btn-success btn-square">
                                 <svg class="c-icon mr-2">
                                     <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-plus"></use>
                                 </svg>
                                 New Training provider Datacollection
                             </a>
                        </div>
                    </div>
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
                                    <td>{{$data->trainingprovider->name ?? 'N/A'}}</td>
                                    <td>{{$data->estimated_yearly_turnover}}</td>
                                    <td>{{$data->enrollment_capacity}}</td>
                                    <td>{{$data->no_of_lecture_rooms}}</td>
                                    <td>{{$data->no_of_computer_labs}}</td>
                                    <td>{{$data->total_no_of_computers_in_labs}}</td>
                                    <td>{{$data->created_at->toFormattedDateString()}}</td>
                                    <td>
                                        <a href="{{route('portal.institution.datacollection.programmes.edit',$data->id)
                                            }}" class="btn btn-sm btn-danger"
                                            title="edit institution details"
                                            >
                                            <i class="fas fa-edit"></i>    
                                        </a>
                                        <a href="{{route('portal.institution.datacollection.programmes.edit',$data->id)
                                            }}" class="btn btn-sm btn-info"
                                            title="view institution details"
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
@endsection