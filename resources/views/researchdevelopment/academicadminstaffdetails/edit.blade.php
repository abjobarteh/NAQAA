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
                            <form action="{{route('researchdevelopment.datacollection.academicadminstaff-details.update',$staff->id)}}" method="post" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Learning Center: <sup class="text-danger">*</sup></label>
                                            <select name="institution_id" id="institution_id" class="form-control select2" required>
                                                <option>Select learning center</option>
                                                @foreach ($learningcenters as $id => $center)
                                                    <option value="{{$id}}" {{$id == $staff->institution_id ? 'selected' : ''}}>{{$center}}</option>
                                                @endforeach
                                            </select>
                                            @error('institution_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>First Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="firstname" value="{{$staff->firstname}}" required autofocus>
                                            @error('firstname')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Middle Name:</label>
                                            <input type="text" class="form-control" name="middlename" value="{{$staff->middlename}}">
                                            @error('middlename')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="lastname" value="{{$staff->lastname}}" required>
                                            @error('lastname')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Gender: <sup class="text-danger">*</sup></label>
                                            <select name="gender" id="gender" class="form-control select2" required>
                                                <option>Select Gender</option>
                                                <option value="male" {{$staff->gender == 'male' ? 'selected' : ''}}>Male</option>
                                                <option value="female" {{$staff->gender == 'female' ? 'selected' : ''}}>Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Country of citizenship:</label>
                                            <select name="nationality" id="nationality" class="form-control select2">
                                                <option>--- select country of citizenship ---</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{$country->name}}" {{$staff->nationality == $country->name ? 'selected' : ''}}>{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('nationality')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Date of Birth: <sup class="text-danger">*</sup></label>
                                            <div class="input-group date" id="date_of_birth" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" name="date_of_birth" value="{{$staff->date_of_birth}}" data-target="#employment_date"/>
                                                <div class="input-group-append" data-target="#date_of_birth" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @error('date_of_birth')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Phone:</label>
                                            <input type="text" class="form-control" name="phone" value="{{$staff->phone}}" required>
                                            @error('phone')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Email: <sup class="text-danger">*</sup></label>
                                            <input type="email" class="form-control" name="email" value="{{$staff->email}}" required>
                                            @error('email')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Job Title: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="job_title" value="{{$staff->job_title}}" required>
                                            @error('job_title')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Salary Per Month:</label>
                                            <input type="number" class="form-control" name="salary_per_month" value="{{$staff->salary_per_month}}" min="0" step="1">
                                            @error('salary_per_month')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Employment Date: <sup class="text-danger">*</sup></label>
                                            <div class="input-group date" id="employment_date" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" name="employment_date" value="{{$staff->employment_date}}" data-target="#employment_date"/>
                                                <div class="input-group-append" data-target="#employment_date" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @error('employment_date')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Employment Type:</label>
                                            <select name="employment_type" id="employment_type" class="form-control select2" required>
                                                <option>Select employment type</option>
                                                <option value="permanent" {{$staff->highest_qualification == 'permanent' ? 'selected' : ''}}>Permanent</option>
                                                <option value="temporary" {{$staff->highest_qualification == 'temporary' ? 'selected' : ''}}>Temporary</option>
                                            </select>
                                            @error('employment_type')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Highest Qualification: <sup class="text-danger">*</sup></label>
                                            <select name="highest_qualification" id="highest_qualification" class="form-control select2" required>
                                                <option>Select highest qualification</option>
                                                @foreach ($qualifications as $qualification)
                                                    <option value="{{$qualification}}" {{$qualification == $staff->highest_qualification ? 'selected' : ''}}>{{$qualification}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('highest_qualification'))
                                                <span class="text-danger mt-1">{{ $errors->first('qualifications') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Other Qualifications:</label>
                                            <select name="other_qualifications[]" data-role="tagsinput" multiple  id="other_qualifications">
                                                @foreach ($staff->other_qualifications as $qualification)
                                                    <option value="{{$qualification}}">{{$qualification}}</option>
                                                @endforeach
                                            </select>
                                            @error('other_qualifications')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Specialisation: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="specialisation" value="{{$staff->specialisation}}" required>
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
                                            <select name="rank" id="rank" class="form-control select2">
                                                <option value="">Select rank</option>
                                                @foreach ($ranks as $id => $rank)
                                                    <option value="{{$rank}}" {{$rank == $staff->rank ? 'selected' : ''}}>{{$rank}}</option>
                                                @endforeach
                                            </select>
                                            @error('rank')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Role:</label>
                                            <select name="role" id="role" class="form-control select2">
                                                <option value="">Select role</option>
                                                @foreach ($roles as $id => $role)
                                                    <option value="{{$role}}" {{$role == $staff->role ? 'selected' : ''}}>{{$role}}</option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Main Teaching Programme: <sup class="text-danger">*</sup></label>
                                            <input type="text" name="main_teaching_programme" value="{{$staff->main_teaching_programme}}" class="form-control" required>
                                            @error('main_teaching_programme')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Secondary Teaching Programme(s):</label>
                                            <select name="secondary_teaching_programmes[]" data-role="tagsinput" multiple  id="secondary_teaching_programmes">
                                                @foreach ($staff->secondary_teaching_programmes as $field)
                                                    <option value="{{$field}}">{{$field}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('secondary_teaching_programmes'))
                                                <span class="text-danger mt-1">{{ $errors->first('secondary_teaching_programmes') }}</span>
                                            @endif
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
<script>
    //Date range picker
    $('#employment_date').datetimepicker({
    format: 'YYYY-MM-DD'
    });
    $('#date_of_birth').datetimepicker({
    format: 'YYYY-MM-DD'
    });
</script>
@endsection