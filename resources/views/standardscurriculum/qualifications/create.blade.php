@extends('layouts.admin')
@section('page-title')
    Add Qualification
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Add New Qualification</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.datacollection.institution-details.index')}}">
                                Qualifications
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Add qualification</li>
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
                            <h3 class="card-title">Add Qualification</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('standardscurriculum.qualifications.store')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Qualification Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                            @error('name')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Practical: <sup class="text-danger">*</sup></label>
                                            <select name="practical" id="practical" class="form-control select2" required>
                                                <option value="">--- select if qualification is practical</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                            @error('practical')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Tuition Fee:</label>
                                            <input type="number" class="form-control" name="tuition_fee" value="{{ old('tuition_fee') }}" min="0" step="1">
                                            @error('tuition_fee')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Minimum Duration (months): <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="minimum_duration" value="{{ old('minimum_duration') }}" min="0" step="1" required>
                                            @error('minimum_duration')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Mode of delivery: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="mode_of_delivery" value="{{ old('mode_of_delivery') }}" required>
                                            @error('mode_of_delivery')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Entry requirement(s): <sup class="text-danger">*</sup></label>
                                            <select name="entry_requirements[]" id="entry_requirements" class="form-control select2" multiple="multiple" data-placeholder="Select entry requirements" required>
                                                @foreach ($levels as $id => $level)
                                                    <option value="{{$level}}">{{$level}}</option>
                                                @endforeach
                                            </select>
                                            @error('entry_requirements')
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
                                            <label>Sub-Field of Education:</label>
                                            <select name="education_sub_field_id" id="education_sub_field_id" class="form-control select2">
                                                <option value="">Select sub-field of education</option>
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
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary mr-1">Submit</button>
                                            <a href="{{route('standardscurriculum.qualifications.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
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