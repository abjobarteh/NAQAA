@extends('layouts.portal')
@section('title','Programme Accreditations')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
       <div class="card">
           <div class="card-header">
               <div class="row">
                   <div class="col-sm-6">
                        <h4 class="card-title mb-0">Trainer Accreditation Applicatons</h4>
                   </div>
                   <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{route('portal.trainer.accreditations.create')}}" class="btn btn-success btn-square">
                            <svg class="c-icon mr-2">
                                <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-plus"></use>
                            </svg>
                            New Trainer Accreditation Application
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
                      <th>Accreditation areas</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @forelse ($accreditations as $accreditation)
                      <tr>
                          <td>{{$accreditation->trainer->firstname}}. {{$accreditation->trainer->middlename ?? ''}} .{{$accreditation->trainer->lastname}}</td>
                          <td>{{$accreditation->trainer->date_of_birth->toFormattedDateString()}}</td>
                          <td>{{$accreditation->trainer->gender}}</td>
                          <td>{{$accreditation->trainer->nationality}}</td>
                          <td>{{$accreditation->trainer->email}}</td>
                          <td>{{$accreditation->trainer->type}}</td>
                          <td>
                              <span class="badge {{$accreditation->status === 'accepted' ? 'badge-success' : 'badge-warning'}}">
                                  {{$accreditation->status}}
                              </span>
                          </td>
                          <td>{{$accreditation->application_date->toFormattedDateString()}}</td>
                          <td>
                              @foreach ($accreditation->trainerAccreditations as $area)
                                  <p class="text-muted">{{$area->area}} - {{$area->level}},</p>
                              @endforeach
                          </td>
                          <td>
                              <a href="{{route('portal.trainer.accreditations.edit',$accreditation->id)
                                  }}" class="btn btn-sm btn-danger"
                                  title="edit trainer registration details"
                                  >
                                  <i class="fas fa-edit"></i>    
                              </a>
                              <a href="{{route('portal.trainer.accreditations.show',$accreditation->id)
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