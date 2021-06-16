@extends('layouts.portal')
@section('title','Learning center Programmes Datacollection')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                             <h4 class="card-title mb-0">Programme Datacollection</h4>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                             <a href="{{route('portal.institution.datacollection.programmes.create')}}" class="btn btn-success btn-square">
                                 <svg class="c-icon mr-2">
                                     <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-plus"></use>
                                 </svg>
                                 New Programme Datacollection
                             </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example2" class="table datatable table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Program name</th>
                                <th>Field of Education</th>
                                <th>Duration (months)</th>
                                <th>Tuition fee per year</th>
                                <th>Entry requirements</th>
                                <th>Awarding Body</th>
                                <th>Learning Center</th>
                                <th>Date collected</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($programs as $program)
                                <tr>
                                    <td>{{$program->programme->programme_title}}</td>
                                    <td>{{$program->programme->fieldOfEducation->name ?? 'N/A'}}</td>
                                    <td>{{$program->duration}}</td>
                                    <td>{{$program->tuition_fee_per_year}}</td>
                                    <td>
                                        @foreach($program->entry_requirements as $id => $req)
                                            <span class="btn btn-sm btn-success m-1">{{$req}}</span>    
                                        @endforeach
                                    </td>
                                    <td>{{$program->awarding_body}}</td>
                                    <td>{{$program->programme->trainingprovider->name ?? 'N/A'}}</td>
                                    <td>{{$program->created_at->toFormattedDateString()}}</td>
                                    <td>
                                        <a href="{{route('portal.institution.datacollection.programmes.edit',$program->id)
                                            }}" class="btn btn-sm btn-danger"
                                            title="edit program details"
                                            >
                                            <i class="fas fa-edit"></i>    
                                        </a>
                                        <a href="{{route('portal.institution.datacollection.programmes.show',$program->id)
                                            }}" class="btn btn-sm btn-info"
                                            title="view program details"
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