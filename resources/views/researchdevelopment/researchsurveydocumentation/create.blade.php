@extends('layouts.admin')
@section('page-title')
    Add Research Survey
@endsection

@section('content')
    <div class="content-heaer">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Add Research Survey</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{route('researchdevelopment.research-survey-documentation.index')}}">Research surveys</a></li>
                        <li class="breadcrumb-item active">Add research survey</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add new Research Survey</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('researchdevelopment.research-survey-documentation.store')}}" method="POST" autocomplete="off">
                                @csrf
                                <div class="row">
                                    {{-- Form left side --}}
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Research Topic: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="research_topic" required autofocus>
                                                    @error('research_topic')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Publisher: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="publisher" required autofocus>
                                                    @error('publisher')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Publication Date: <sup class="text-danger">*</sup></label>
                                                    <div class="input-group date" id="publication_date" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" name="publication_date" data-target="#completion_date"/>
                                                        <div class="input-group-append" data-target="#publication_date" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                    @error('publication_date')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Funded By: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="funded_by" required autofocus>
                                                    @error('funded_by')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Cost (GMD): <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="cost" required autofocus>
                                                    @error('cost')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Name of Author(s): <sup class="text-danger">*</sup></label>
                                                    <select name="name_of_authors[]" data-role="tagsinput" multiple  id="name_of_authors">
                                                
                                                    </select>
                                                    @if($errors->has('name_of_authors'))
                                                        <span class="text-danger mt-1">{{ $errors->first('name_of_authors') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End form left side --}}

                                    {{-- Form right side --}}
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Purpose: <sup class="text-danger">*</sup></label>
                                                      <textarea class="form-control" name="purpose"></textarea>
                                                        @if($errors->has('purpose'))
                                                            <span class="text-danger mt-1">{{ $errors->first('purpose') }}</span>
                                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Key Findings: <sup class="text-danger">*</sup></label>
                                                      <textarea class="form-control" name="key_findings"></textarea>
                                                    @if($errors->has('key_findings'))
                                                        <span class="text-danger mt-1">{{ $errors->first('key_findings') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Recommendation: <sup class="text-danger">*</sup></label>
                                                      <textarea class="form-control" name="recommendation"></textarea>
                                                    @if($errors->has('recommendation'))
                                                        <span class="text-danger mt-1">{{ $errors->first('recommendation') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Remarks: <sup class="text-danger">*</sup></label>
                                                      <textarea class="form-control" name="remarks"></textarea>
                                                    @if($errors->has('remarks'))
                                                        <span class="text-danger mt-1">{{ $errors->first('remarks') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End form rigth side --}}
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-block btn-primary mr-1">Submit</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <a href="{{route('researchdevelopment.research-survey-documentation.index')}}" class="btn btn-block btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
<!-- summernote -->
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
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
<!-- Summernote -->
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $('#publication_date').datetimepicker({
    format: 'YYYY-MM-DD'
    });

    // initilaise summernote
    $('.summernote').summernote()
</script>
@endsection