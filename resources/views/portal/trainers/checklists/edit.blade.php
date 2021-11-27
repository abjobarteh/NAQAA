@extends('layouts.portal')

@section('title')
Edit Checklist Evidence
@endsection

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="card-title">Edit Checklist Evidence</h4>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{route('portal.trainer.checklist-evidence.index')}}" class="btn btn-success btn-square mr-1"><i class="fas fa-list"></i> Checklist</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('portal.trainer.checklist-evidence.update',$checklist_evidence->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h4 class="card-title mx-2">{{$checklist_evidence->checklist->thematicArea->name}}</h4>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="registration_license">{{$checklist_evidence->checklist->name}}</label>
                    <div class="col-md-9">
                    <input id="{{$checklist_evidence->checklist->id}}" type="file" name="{{$checklist_evidence->checklist->slug}}" >
                    <br>
                    @if($errors->has($checklist_evidence->checklist->slug))
                    <span class="col-md-12 text-danger mt-1">{{$errors->first($checklist_evidence->checklist->slug)}}</span>
                    @endif
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" id="submit" class="btn btn-success btn-square btn-block">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection