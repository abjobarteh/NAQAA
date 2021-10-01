@extends('layouts.portal')
@section('title','Academic & Admin staff Datacollection')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Academic & Admin Staff Datacollection details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Full Name: </b>
                                <p class="col-sm-7 text-muted">{{$staffdetail->full_name}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Gender: </b>
                                <p class="col-sm-7 text-muted">{{$staffdetail->gender}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Nationality: </b>
                                <p class="col-sm-7 text-muted">{{$staffdetail->nationality}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Date of Birth: </b>
                                <p class="col-sm-7 text-muted">{{$staffdetail->date_of_birth}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Phone Number: </b>
                                <p class="col-sm-7 text-muted">{{$staffdetail->phone}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Job Title: </b>
                                <p class="col-sm-7 text-muted">{{$staffdetail->job_title}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Salary Per Month: </b>
                                <p class="col-sm-7 text-muted">{{$staffdetail->salary_per_month}}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Employment Date: </b>
                                <p class="col-sm-7 text-muted">{{$staffdetail->employment_date}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Employment Type: </b>
                                <p class="col-sm-7 text-muted">{{$staffdetail->employment_type}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Highest Qualification: </b>
                                <p class="col-sm-7 text-muted">{{$staffdetail->highest_qualification}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Other Qualifications: </b>
                                @if (isset($staffdetail->other_qualifications))
                                @foreach($staffdetail->other_qualifications as $qualification)
                                    <span class="btn btn-sm btn-success m-1">{{$qualification}}</span>    
                                @endforeach  
                                @else
                                    <p class="col-sm-7 text-muted">N/A</p> 
                                @endif
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Specialisation: </b>
                                <p class="col-sm-7 text-muted">{{$staffdetail->specialisation}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Rank: </b>
                                <p class="col-sm-7 text-muted">{{$staffdetail->rank ?? 'N/A'}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Role: </b>
                                <p class="col-sm-7 text-muted">{{$staffdetail->role ?? 'N/A'}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Main Teaching Field of Study: </b>
                                <p class="col-sm-7 text-muted">{{$staffdetail->main_teaching_field_of_study ?? 'N/A'}}</p>
                            </div>
                            <div class="form-group row">
                                <b class="col-sm-5 text-primary">Secondary Teaching Field of Study: </b>
                                @if (isset($staffdetail->secondary_teaching_fields_of_study))
                                    @foreach($staffdetail->secondary_teaching_fields_of_study as $field)
                                        <span class="btn btn-sm btn-info m-1">{{$field}}</span>    
                                    @endforeach  
                                @else
                                    <p class="col-sm-7 text-muted">N/A</p> 
                                @endif
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <a href="{{route('portal.institution.datacollection.trainers.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    //Date range picker
    // $('#employment_date').datetimepicker({
    // format: 'YYYY-MM-DD'
    // });
    // $('#date_of_birth').datetimepicker({
    // format: 'YYYY-MM-DD'
    // });
</script>
@endsection