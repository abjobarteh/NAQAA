@extends('layouts.admin')
@section('page-title')
Edit Academic&Admin Staff Details Data collection
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Edit Academic&Admin Staff Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.datacollection.academicadminstaff-details.index')}}">
                                Program details data collection
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Edit Academic&Admin staff details collection</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Academic&Admin staff Details Collection</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('researchdevelopment.datacollection.academicadminstaff-details.update',$staff[0]->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>First Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="firstname" value="{{$staff[0]->firstname}}" required autofocus>
                                            @error('firstname')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Middle Name:</label>
                                            <input type="text" class="form-control" name="middlename" value="{{$staff[0]->middlename}}">
                                            @error('middlename')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="lastname" value="{{$staff[0]->lastname}}" required>
                                            @error('lastname')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Qualifications: <sup class="text-danger">*</sup></label>
                                            <select name="qualifications[]" id="qualifications" class="form-control select2" multiple="multiple" required>
                                                @foreach ($qualifications as $qualification)
                                                    <option value="{{$qualification}}" {{ (in_array($qualification, old('entry_requirements', [])) || isset($staff) && in_array($qualification, $staff[0]->qualifications)) ? 'selected' : '' }}>{{$qualification}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('qualifications'))
                                                <span class="text-danger mt-1">{{ $errors->first('qualifications') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Specialisation: <sup class="text-danger">*</sup></label>
                                            <input type="text" name="specialisation" value="{{$staff[0]->specialisation}}" class="form-control">
                                            @error('specialisation')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Rank:</label>
                                            <select name="rank_id" id="rank_id" class="form-control select2" required>
                                                <option>Select rank</option>
                                                @foreach ($ranks as $id => $rank)
                                                    <option value="{{$id}}" {{$id == $staff[0]->rank_id ? 'selected' : ''}}>{{$rank}}</option>
                                                @endforeach
                                            </select>
                                            @error('rank_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Role:</label>
                                            <select name="role_id" id="role_id" class="form-control select2" required>
                                                <option>Select role</option>
                                                @foreach ($roles as $id => $role)
                                                    <option value="{{$id}}" {{$id == $staff[0]->role_id ? 'selected' : ''}}>{{$role}}</option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Main Teaching Field of Study: <sup class="text-danger">*</sup></label>
                                            <input type="text" name="main_teaching_field_of_study" value="{{$staff[0]->main_teaching_field_of_study}}" class="form-control" required>
                                            @error('main_teaching_field_of_study')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Secondary Teaching Field(s) of Study:</label>
                                            <select name="secondary_teaching_fields_of_study[]" data-role="tagsinput" multiple  id="secondary_teaching_fields_of_study">
                                                @foreach ($staff[0]->secondary_teaching_fields_of_study as $field)
                                                    <option value="{{$field}}">{{$field}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('secondary_teaching_fields_of_study'))
                                                <span class="text-danger mt-1">{{ $errors->first('secondary_teaching_fields_of_study') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Learning Center: <sup class="text-danger">*</sup></label>
                                            <select name="institution_id" id="institution_id" class="form-control select2" required>
                                                <option>Select learning center</option>
                                                @foreach ($learningcenters as $id => $center)
                                                    <option value="{{$id}}" {{$id == $staff[0]->institution_id ? 'selected' : ''}}>{{$center}}</option>
                                                @endforeach
                                            </select>
                                            @error('institution_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary mr-1">Submit</button>
                                            <a href="{{route('researchdevelopment.datacollection.academicadminstaff-details.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
<style type="text/css">
    .bootstrap-tagsinput{
        width: 100%;
    }
    .label-info{
        background-color: #17a2b8;

    }
    .label {
        display: inline-block;
        padding: .25em .4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,
        border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>
@endsection