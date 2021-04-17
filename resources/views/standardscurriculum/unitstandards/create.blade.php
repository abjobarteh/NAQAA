@extends('layouts.admin')
@section('page-title')
    Add Unit Standard
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Add New Unit Standard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.datacollection.institution-details.index')}}">
                                Unit standards
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Add unit standards</li>
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
                            <h3 class="card-title">Add Unit Standards</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('standardscurriculum.unit-standards.store')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Unit Standard Title: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="unit_standard_title" value="{{ old('unit_standard_title') }}" required autofocus>
                                            @error('unit_standard_title')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Unit Standard Code: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="unit_standard_code" value="{{ old('unit_standard_code') }}" required>
                                            @error('unit_standard_code')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Minimum Hours Required: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="minimum_required_hours" value="{{ old('minimum_required_hours') }}" required>
                                            @error('unit_standard_code')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>NQF/GSQF Level: <sup class="text-danger">*</sup></label>
                                            <select name="qualification_level_id" id="qualification_level_id" class="form-control select2" required>
                                                <option>Select Level</option>
                                                @foreach ($levels as $id => $level)
                                                    <option value="{{$id}}">{{$level}}</option>
                                                @endforeach
                                            </select>
                                            @error('qualification_level_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Field of Education: <sup class="text-danger">*</sup></label>
                                            <select name="education_field_id" id="education_field_id" class="form-control select2" required>
                                                <option>Select field of education</option>
                                                @foreach ($fields as $id => $field)
                                                    <option value="{{$id}}">{{$field}}</option>
                                                @endforeach
                                            </select>
                                            @error('education_field_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Sub-Field of Education: <sup class="text-danger">*</sup></label>
                                            <select name="education_sub_field_id" id="education_sub_field_id" class="form-control select2" required>
                                                <option>Select sub-field</option>
                                                @foreach ($subfields as $id => $subfield)
                                                    <option value="{{$id}}">{{$subfield}}</option>
                                                @endforeach
                                            </select>
                                            @error('education_sub_field_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Validated: <sup class="text-danger">*</sup></label>
                                            <select name="validated" id="validated" class="form-control select2" required>
                                                <option>Select validation status</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                            @error('validated')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 is-validated">
                                        <div class="form-group">
                                            <label>Validation Date: <sup class="text-danger">*</sup></label>
                                            <div class="input-group date" id="validation_date" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input hide-validation-date" name="validation_date" value="{{ old('validation_date') }}" data-target="#validation_date" required/>
                                                <div class="input-group-append" data-target="#validation_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @error('validation_date')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Developed By (Stakeholders Involved): <sup class="text-danger">*</sup></label>
                                            <select name="developed_by_stakeholders[]" data-role="tagsinput" multiple  id="developed_by_stakeholders">
                                                
                                            </select>
                                            @error('developed_by_stakeholders')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Stakeholders Involved in Validation: <sup class="text-danger">*</sup></label>
                                            <select name="validated_by_stakeholders[]" data-role="tagsinput" multiple  id="validated_by_stakeholders">
                                                
                                            </select>
                                            @error('validated_by_stakeholders')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary mr-1">Submit</button>
                                            <a href="{{route('standardscurriculum.unit-standards.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
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

    <script>
        $(document).ready(function(){
             //Date range picker
            $('#validation_date').datetimepicker({
            format: 'YYYY-MM-DD'
            });
        })

        // $("#validated").change(function() {
        //     if ($(this).val() == "no") {
        //         $('.is-validated').hide();
        //         $('.hide-validation-date').prop('disabled', true);
        //     }
        //     else{
        //         $('.is-validated').show();
        //         $('.hide-validation-date').prop('disabled', false);
        //     }
        //     });
    </script>
@endsection