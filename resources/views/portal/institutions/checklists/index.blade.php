@extends('layouts.portal')

@section('title')
Checklists Evidence
@endsection

@section('content')
<div class="container-fluid">
    <div class="fade-in">
       <div class="card">
           <div class="card-header">
               <div class="row">
                   <div class="col-sm-6">
                        <h4 class="card-title mb-0">Checklists Evidence list</h4>
                   </div>
                   <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{route('portal.institution.checklist-evidence.create')}}" class="btn btn-success btn-square">
                            <svg class="c-icon mr-2">
                                <use xlink:href="/vendor/@coreui/icons/svg/free.svg#cil-plus"></use>
                            </svg>
                            Upload Checklist Evidence
                        </a>
                   </div>
               </div>
           </div>
           <div class="card-body">
            <table id="example2" class="table datatable table-responsive-sm">
                <thead>
                  <tr>
                    <th>Checklist Name</th>
                    <th>Required</th>
                    <th>Upload Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($checklist_evidences as $evidence)
                    <tr>
                      <td>{{$evidence->checklist->name ?? 'N/A'}}</td>
                      <td><span class="badge badge-primary">{{$evidence->checklist->is_required ?? 'N/A'}}</span></td>
                      <td>{{$evidence->created_at ?? 'N/A'}}</td>
                      <td>
                        <a href="{{route('portal.institution.checklist-evidence.edit',$evidence->id)}}" class="btn btn-sm btn-danger"
                          title="Edit checklist evidence">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{$evidence->path}}" target="_blank" class="btn btn-sm btn-info"
                          title="View checklist evidence">
                        <i class="fas fa-file"></i>
                        </a>
                      </td>
                    </tr>
                  @empty
                      <tr>
                          <td colspan="10">No Checklist evidence uploaded</td>
                      </tr>
                  @endforelse
                </tbody>
              </table>
           </div>
       </div>
    </div>
 </div>
@endsection