@extends('layouts.admin')
@section('page-title','New Student Registration')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Student Registration</h1>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title"><i class="fas fa-plus"></i> New Student Registration</h3>
                                </div>
                                <div class="col-md-6 d-flex flex-direction-row justify-content-end">
                                    <a href="{{route('assessment-certification.registrations.index')}}" class="btn btn-success btn-flat"><i class="fas fa-list"></i> Registered Students</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('assessment-certification.registrations.store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Institution:</label>
                                            <select name="training_provider_id" id="training_provider_id" class="form-control select2" required>
                                                <option value="">---select institution---</option>
                                                @foreach ($institutions as $id => $institution)
                                                    <option value="{{$id}}" {{ old('training_provider_id') === $id ? 'selected' : ''}}>{{$institution}}</option>
                                                @endforeach
                                            </select>
                                            @error('training_provider_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Candidate Type: <sup class="text-danger">*</sup></label>
                                            <select name="candidate_type" id="candidate_type" class="form-control select2" required>
                                                <option value="">---select candidate type---</option>
                                                <option value="private" {{ old('candidate_type') == 'private' ? 'selected': '' }}>Private</option>
                                                <option value="regular" {{ old('candidate_type') == 'regular' ? 'selected': '' }}>Regular</option>
                                            </select>
                                            @error('candidate_type')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Academic Year: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="academic_year" value="{{ old('academic_year') }}" required>
                                            @error('academic_year')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>First Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required>
                                            @error('firstname')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Middle Name:</label>
                                            <input type="text" class="form-control" name="middlename" value="{{ old('middlename') }}">
                                            @error('middlename')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required>
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
                                                <option value="">Select gender</option>
                                                <option value="male" {{ old('gender') == 'male' ? 'selected': '' }}>Male</option>
                                                <option value="female" {{ old('gender') == 'female' ? 'selected': '' }}>Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Date of Birth:</label>
                                            <div class="input-group date" id="date_of_birth" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" name="date_of_birth" value="{{ old('date_of_birth') }}" data-target="#date_of_birth" required/>
                                                <div class="input-group-append" data-target="#date_of_birth" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @error('date_of_birth')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Country of Origin: <sup class="text-danger">*</sup></label>
                                            <select name="nationality" id="nationality" class="form-control select2" required>
                                                <option value="">--- select country of origin ---</option>
                                                @foreach ($nationalities as $id => $nationality)
                                                    <option value="{{$nationality}}" {{$nationality === 'Gambia' ? 'selected' : ''}}>{{$nationality}}</option>
                                                @endforeach
                                            </select>
                                            @error('nationality')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Preferred Assessment Language:</label>
                                            <select name="local_language" id="local_language" class="form-control select2">
                                                <option value="">--- select local language spoken ---</option>
                                                @foreach ($local_languages as $id => $local_language)
                                                    <option value="{{$local_language}}">{{$local_language}}</option>
                                                @endforeach
                                            </select>
                                            @error('local_language')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Ethnicity:</label>
                                            <select name="ethnicity" id="ethnicity" class="form-control select2">
                                                <option value="">--- select local language spoken ---</option>
                                                @foreach ($local_languages as $id => $local_language)
                                                    <option value="{{$local_language}}">{{$local_language}}</option>
                                                @endforeach
                                            </select>
                                            @error('ethnicity')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Address: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                                            @error('address')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                            @error('email')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Contact Number: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>
                                            @error('phone')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Programme: <sup class="text-danger">*</sup></label>
                                            <select name="programme_id" id="programme_id" class="form-control select2" required>
                                                <option value="">---select programme---</option>
                                                @foreach ($programmes as $id => $programme)
                                                    <option value="{{$id}}" {{ old('programme_id') === $id ? 'selected' : ''}}>{{$programme}}</option>
                                                @endforeach
                                            </select>
                                            @error('programme_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>level: <sup class="text-danger">*</sup></label>
                                            <select name="programme_level_id" id="programme_level_id" class="form-control select2" required>
                                                <option value="">---select programme level---</option>
                                                @foreach ($levels as $id => $level)
                                                    <option value="{{$id}}" {{ old('programme_level_id') === $id ? 'selected' : ''}}>{{$level}}</option>
                                                @endforeach
                                            </select>
                                            @error('programme_level_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Regions:</label>
                                            <select name="region_id" id="region_id" class="form-control select2">
                                                <option value="">---select region---</option>
                                                @foreach ($regions as $id => $region)
                                                    <option value="{{$id}}" {{ old('region_id') === $id ? 'selected' : ''}}>{{$region}}</option>
                                                @endforeach
                                            </select>
                                            @error('region_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>District: <sup class="text-danger">*</sup></label>
                                            <select name="district_id" id="district_id" class="form-control select2">
                                                <option value="">---select district---</option>
                                                @foreach ($districts as $id => $district)
                                                    <option value="{{$id}}" {{ old('district_id') === $id ? 'selected' : ''}}>{{$district}}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Town/Vllage: <sup class="text-danger">*</sup></label>
                                            <select name="town_village_id" id="town_village_id" class="form-control select2">
                                                <option value="">---select town/village---</option>
                                                @foreach ($townvillages as $id => $townvillage)
                                                    <option value="{{$id}}" {{ old('town_village_id') === $id ? 'selected' : ''}}>{{$townvillage}}</option>
                                                @endforeach
                                            </select>
                                            @error('town_village_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Picture: <sup class="text-danger">*</sup></label>
                                            <input type="file" class="form-control" name="picture" value="{{ old('picture') }}">
                                            @error('picture')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary mr-1">Save Registration</button>
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

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#date_of_birth').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        })
    </script>
@endsection