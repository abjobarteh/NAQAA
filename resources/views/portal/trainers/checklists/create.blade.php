@extends('layouts.portal')

@section('title')
Upload Checklist Evidence
@endsection

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="card-title">Checklist Evidence</h4>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{route('portal.trainer.checklist-evidence.index')}}" class="btn btn-success btn-square mr-1"><i class="fas fa-list"></i> Applications</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('portal.trainer.checklist-evidence.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @foreach ($checklists as $key =>  $checklist_evidences)
                <h4 class="card-title mx-2">{{$key}}</h4>
                    @foreach ($checklist_evidences as $checklist)
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="{{$checklist->slug}}">
                            {{$checklist->name}} 
                            @if ($checklist->is_required == 'yes')
                            <sup class="text-danger">*</sup>
                            @endif 
                        </label>
                        <div class="col-md-9">
                        <input id="{{$checklist->id}}" type="file" name="{{$checklist->slug}}" >
                        <br>
                        @if($errors->has($checklist->slug))
                        <span class="col-md-12 text-danger mt-1">{{$errors->first($checklist->slug)}}</span>
                        @endif
                        </div>
                    </div>
                    @endforeach
                @endforeach
                <div class="form-group">
                    <button type="submit" id="submit" class="btn btn-success btn-square btn-block">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection