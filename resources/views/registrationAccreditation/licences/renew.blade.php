@extends('layouts.admin')
@section('page-title')
    New Licence Renewal Registration
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Licence Renewal Registration</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('registration-accreditation.licence.registrations',)}}">
                                Expired licences
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Licence renewal</li>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title">New Licence Renewal Application</h3>
                                </div>
                                <div class="col-md-6 d-flex flex-direction-row justify-content-end">
                                    <a href="{{route('registration-accreditation.licence.registrations')}}" class="btn btn-success mr-1 btn-flat"><i class="fas fa-list"></i> Licences</a>
                                    @if (!is_null($trainingprovider))    
                                        <a href="{{route('registration-accreditation.registration.trainingproviders.create')}}" class="btn btn-primary btn-flat"><i class="fas fa-plus"></i> New Registration Application</a>
                                    @else
                                        <a href="{{route('registration-accreditation.registration.trainers.create')}}" class="btn btn-primary btn-flat"><i class="fas fa-plus"></i> New Registration Application</a>
                                        
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('registration-accreditation.licence.renewal')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="row">
                                    @if (!is_null($trainingprovider))
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-12"><h4 class="text-primary"><b>Training Provider Details</b></h4></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Training Provider Name: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="name" value="{{ $trainingprovider->name }}" required >
                                                    @error('name')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                             <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Category: <sup class="text-danger">*</sup></label>
                                                    <select name="category_id" id="category_id" class="form-control select2" required >
                                                        <option value="">Select category</option>
                                                        @foreach ($categories as $id => $categories)
                                                            <option value="{{$id}}" {{ $trainingprovider->category_id == $id ? 'selected' :'' }}>{{$categories}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Physical Address: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="physical_address" value="{{ $trainingprovider->physical_address }}" required >
                                                    @error('physical_address')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Postal Address:</label>
                                                    <input type="text" class="form-control" name="postal_address" value="{{ $trainingprovider->postal_address }}" >
                                                    @error('postal_address')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Telephone (Work):</label>
                                                    <input type="text" class="form-control" name="telephone_work" value="{{ $trainingprovider->telephone_work }}" >
                                                    @error('telephone_work')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Mobile Phone:</label>
                                                    <input type="text" class="form-control" name="mobile_phone" value="{{ $trainingprovider->mobile_phone }}" >
                                                    @error('mobile_phone')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Fax:</label>
                                                    <input type="text" class="form-control" name="fax" value="{{ $trainingprovider->fax }}" >
                                                    @error('fax')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Email: <sup class="text-danger">*</sup></label>
                                                    <input type="email" class="form-control" name="email" value="{{ $trainingprovider->email }}" required >
                                                    @error('email')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Webiste:</label>
                                                    <input type="text" class="form-control" name="website" value="{{ $trainingprovider->website }}" >
                                                    @error('website')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Region: <sup class="text-danger">*</sup></label>
                                                    <select name="region_id" id="region_id" class="form-control select2" required >
                                                        <option value="">Select regions</option>
                                                        @foreach ($regions as $id => $region)
                                                            <option value="{{$id}}" {{ $trainingprovider->region_id == $id ? 'selected' : '' }}>{{$region}}</option>
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
                                                    <select name="district_id" id="district_id" class="form-control select2" required >
                                                        <option value="">Select district</option>
                                                        @foreach ($districts as $id => $district)
                                                            <option value="{{$id}}" {{ $trainingprovider->district_id == $id ? 'selected' : '' }}>{{$district}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('district_id')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Town/Village: <sup class="text-danger">*</sup></label>
                                                    <select name="town_village_id" id="town_village_id" class="form-control select2" >
                                                        <option value="">Select Town/village</option>
                                                        @foreach ($townvillages as $id => $townvillage)
                                                            <option value="{{$id}}" {{ $trainingprovider->town_village_id == $id ? 'selected' : '' }}>{{$townvillage}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('town_village_id')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="training_provider_id" value="{{$trainingprovider->id}}">
                                    </div> 
                                    @else
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-12"><h4 class="text-primary"><b>Trainer Details</b></h4></div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Trainer Type: <sup class="text-danger">*</sup></label>
                                                <select name="type" id="type" class="form-control select2" >
                                                    <option value="">Select type of trainer</option>
                                                    <option value="trainer" {{ $trainer->type == 'trainer' ? 'selected': '' }}>Trainer</option>
                                                    <option value="assessor" {{ $trainer->type == 'assessor' ? 'selected': '' }}>Assessor</option>
                                                    <option value="verifier" {{ $trainer->type == 'verifier' ? 'selected': '' }}>Verifier</option>
                                                    <option value="mastercraftperson" {{ $trainer->type == 'mastercraftperson' ? 'selected': '' }}>MasterCraft Person</option>
                                                </select>
                                                @error('type')
                                                    <span class="text-danger mt-1">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>First Name: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="firstname" value="{{ $trainer->firstname }}" required >
                                                    @error('firstname')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Middle Name:</label>
                                                    <input type="text" class="form-control" name="middlename" value="{{ $trainer->middlename }}" >
                                                    @error('middlename')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Last Name: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="lastname" value="{{ $trainer->lastname }}" required >
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
                                                    <select name="gender" id="gender" class="form-control select2" >
                                                        <option value="">Select gender</option>
                                                        <option value="male" {{ $trainer->gender == 'male' ? 'selected': '' }}>Male</option>
                                                        <option value="female" {{ $trainer->gender == 'female' ? 'selected': '' }}>Female</option>
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
                                                        <input type="text" class="form-control datetimepicker-input" name="date_of_birth" value="{{ $trainer->date_of_birth }}" data-target="#date_of_birth" />
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
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Nationality:</label>
                                                    <select name="nationality" id="nationality" class="form-control select2" required >
                                                        <option value="">Select nationaltiy</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{$country}}" {{$country === $trainer->nationality ? 'selected' : ''}}>{{$country}}</option>
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
                                                    <label>Tax Identification Number (TIN): <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="TIN" value="{{ $trainer->TIN }}" required >
                                                    @error('TIN')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4 show-nin-number">
                                                <div class="form-group">
                                                    <label>National Identification Number (NIN): <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control nin-number" name="NIN" value="{{ $trainer->NIN }}" required>
                                                    @error('NIN')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4 show-ain-number">
                                                <div class="form-group">
                                                    <label>Alien Identification Number (AIN): <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control ain-number" name="AIN" value="{{ $trainer->AIN }}" required>
                                                    @error('AIN')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Email: <sup class="text-danger">*</sup></label>
                                                    <input type="email" class="form-control" name="email" value="{{ $trainer->email }}" required >
                                                    @error('email')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Address: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="physical_address" value="{{ $trainer->physical_address }}" required >
                                                    @error('physical_address')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Postal Address:</label>
                                                    <input type="text" class="form-control" name="postal_address" value="{{ $trainer->postal_address }}" >
                                                    @error('postal_address')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Telephone (Home):</label>
                                                    <input type="text" class="form-control" name="phone_home" value="{{ $trainer->phone_home }}" >
                                                    @error('phone_home')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Mobile Phone: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="phone_mobile" value="{{ $trainer->phone_mobile }}" required >
                                                    @error('phone_mobile')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="trainer_id" value="{{$trainer->id}}">
                                    </div> 
                                    @endif
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-12"><h4 class="text-primary"><b>Application Details</b></h4></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Application No: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="application_no" value="@error('application_no'){{ old('application_no') }}@enderror auto generated" required readonly>
                                                    @error('application_no')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Application Date: <sup class="text-danger">*</sup></label>
                                                    <div class="input-group date" id="application_date" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" name="application_date" value="{{ old('application_date') }}" data-target="#application_date"/>
                                                        <div class="input-group-append" data-target="#application_date" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                    @error('application_date')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Application status: <sup class="text-danger">*</sup></label>
                                                    <select name="status" id="application_status" class="form-control select2">
                                                        <option>Select application status</option>
                                                        <option value="accepted">Accepted</option>
                                                        <option value="rejected">Rejected</option>
                                                        <option value="pending">Pending</option>
                                                    </select>
                                                    @error('status')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row license-registration-details">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>License Start Date: <sup class="text-danger">*</sup></label>
                                                    <div class="input-group date" id="license_start_date" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input license-registration" name="license_start_date" value="{{ old('license_start_date') }}" data-target="#license_start_date"/>
                                                        <div class="input-group-append" data-target="#license_start_date" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                    @error('license_start_date')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>License End Date: <sup class="text-danger">*</sup></label>
                                                    <div class="input-group date" id="license_end_date" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input license-registration" name="license_end_date" value="{{ old('license_end_date') }}" data-target="#license_end_date"/>
                                                        <div class="input-group-append" data-target="#license_end_date" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                    @error('license_end_date')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-flat mr-1">Save Registration</button>
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
            if($('#nationality').val() == 'Gambia'){
                    $('.show-nin-number').show();
                    $('.ain-number').prop('hidden', true);
                    $('.ain-number').prop('disabled', true);
                    $('.nin-number').prop('hidden', false);
                    $('.nin-number').prop('disabled', false);
            }
            else{
                    $('.show-ain-number').show();
                    $('.show-nin-number').hide();
                    $('.ain-number').prop('hidden', false);
                    $('.ain-number').prop('disabled', false);
                    $('.nin-number').prop('hidden', true);
                    $('.nin-number').prop('disabled', true);
            }

            if($('#application_status').val() == 'accepted'){
                    $('.license-registration-details').show();
                    $('.license-registration').prop('hidden', false);
                    $('.license-registration').prop('disabled', false);
            }
            else{
                    $('.license-registration-details').hide();
                    $('.license-registration').prop('hidden', true);
                    $('.license-registration').prop('disabled', true); 
            }
            $('#application_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $('#license_start_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });
            $('#license_end_date').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            $("#application_status").change(function() {
                if ($(this).val() == "accepted") {
                    $('.license-registration-details').show();
                    $('.license-registration').prop('hidden', false);
                    $('.license-registration').prop('disabled', false);
                }
                else{
                    $('.license-registration-details').hide();
                    $('.license-registration').prop('hidden', true);
                    $('.license-registration').prop('disabled', true);
                }
            });

            // show AIN input field if country is not gambia
            $("#nationality").change(function() {
                if ($(this).val() != "Gambia") {
                    $('.show-ain-number').show();
                    $('.show-nin-number').hide();
                    $('.ain-number').prop('hidden', false);
                    $('.ain-number').prop('disabled', false);
                    $('.nin-number').prop('hidden', true);
                    $('.nin-number').prop('disabled', true);
                }
                else{
                    $('.show-ain-number').hide();
                    $('.show-nin-number').show();
                    $('.ain-number').prop('hidden', true);
                    $('.ain-number').prop('disabled', true);
                    $('.nin-number').prop('hidden', false);
                    $('.nin-number').prop('disabled', false);
                }
            });
        })
    </script>
@endsection