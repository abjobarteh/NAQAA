@extends('layouts.portal')
@section('title','Programme Accreditations')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
       <div class="card">
           <div class="card-header">
               <div class="row">
                   <div class="col-sm-6">
                        <h4 class="card-title mb-0">Trainer Accreditation Applications</h4>
                   </div>
                   <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{route('portal.trainer.new-trainer-accreditation')}}" class="btn btn-success btn-square">
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
                    <th>Application No.</th>
                    <th>Application type</th>
                    <th>Application status</th>
                    <th>Application Form status</th>
                    <th>Application Date</th>
                    <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                @forelse ($accreditations as $accreditation)
                <tr>
                    <td>{{$accreditation->application_no ?? 'N/A'}}</td>
                    <td><span class="badge badge-primary">{{$accreditation->application_type ?? 'N/A'}}</span></td>
                    <td><span class="badge {{$accreditation->status == 'Pending' ? 'badge-danger' :  'badge-success'}}">{{$application->status ?? 'N/A'}}</span></td>
                    <td><span class="badge badge-info">{{$accreditation->application_form_status ?? 'N/A'}}</span></td>
                    <td>{{$accreditation->application_date ?? 'N/A'}}</td>
                    <td>
                        @if($accreditation->status == 'Pending' && $accreditation->application_form_status == 'Saved')
                        <a href="{{route('portal.trainer.edit-trainer-accreditation',$accreditation->id)
                            }}" class="btn btn-sm btn-danger"
                            title="edit trainer registration details"
                            >
                            <i class="fas fa-edit"></i>    
                        </a>
                        @endif
                        @if($accreditation->application_form_status === 'Saved')
                        <a href="{{route('portal.application-payment',$accreditation->id)}}" class="btn btn-sm btn-primary">
                        <i class="fas fa-coins"></i>
                        </a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center"><b>No Accreditation applications</b></td>
                </tr>
            @endforelse
              </tbody>
            </table>
           </div>
       </div>
    </div>
 </div>
@endsection