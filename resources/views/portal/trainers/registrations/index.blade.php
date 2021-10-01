@extends('layouts.portal')
@section('title','Registrations')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
       <div class="card">
           <div class="card-header">
               <div class="row">
                   <div class="col-sm-6">
                        <h4 class="card-title mb-0">Registration Applications</h4>
                   </div>
                   <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{route('portal.trainer.registrations.create')}}" class="btn btn-success btn-square">
                            <svg class="c-icon mr-2">
                                <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-plus"></use>
                            </svg>
                            New Application
                        </a>
                   </div>
               </div>
           </div>
           <div class="card-body">
            <table id="example2" class="table datatable table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Trainer Name</th>
                        <th>Birth Date</th>
                        <th>Gender</th>
                        <th>Nationality</th>
                        <th>Email</th>
                        <th>Trainer type</th>
                        <th>status</th>
                        <th>Application date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trainer_regitrations as $registration)
                        <tr>
                            <td>{{$registration->trainer->firstname}}. {{$registration->trainer->middlename ?? ''}} .{{$registration->trainer->lastname}}</td>
                            <td>{{$registration->trainer->date_of_birth->toFormattedDateString()}}</td>
                            <td>{{$registration->trainer->gender}}</td>
                            <td>{{$registration->trainer->nationality}}</td>
                            <td>{{$registration->trainer->email}}</td>
                            <td>{{$registration->trainer->type}}</td>
                            <td>
                                <span class="badge {{$registration->status === 'accepted' ? 'badge-success' : 'badge-warning'}}">
                                    {{$registration->status}}
                                </span>
                            </td>
                            <td>{{$registration->application_date->toFormattedDateString()}}</td>
                            <td>
                                <a href="{{route('portal.trainer.registrations.edit',$registration->id)
                                    }}" class="btn btn-sm btn-danger"
                                    title="edit trainer registration details"
                                    >
                                    <i class="fas fa-edit"></i>    
                                </a>
                                <a href="{{route('portal.trainer.registrations.show',$registration->id)
                                    }}" class="btn btn-sm btn-info"
                                    title="view trainer registration details"
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