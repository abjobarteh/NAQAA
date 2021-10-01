@extends('layouts.portal')
@section('title','Edit Registration Application')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">Edit Registration Application</h4>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                            <a href="{{route('portal.institution.registration.index')}}" class="btn btn-success btn-square mr-1"><i class="fas fa-list"></i> Applications</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('portal.trainer.registrations.update',$registration->id)}}" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-12"><h4 class="text-primary"><b>Trainer Details</b></h4></div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Trainer Type: <sup class="text-danger">*</sup></label>
                                        <select name="type" id="type" class="form-control select2">
                                            <option value="">Select type of trainer</option>
                                            <option value="trainer" {{ $registration->trainer->type == 'trainer' ? 'selected': '' }}>Trainer</option>
                                            <option value="assessor" {{ $registration->trainer->type == 'assessor' ? 'selected': '' }}>Assessor</option>
                                            <option value="verifier" {{ $registration->trainer->type == 'verifier' ? 'selected': '' }}>Verifier</option>
                                            <option value="mastercraftperson" {{ $registration->trainer->type == 'mastercraftperson' ? 'selected': '' }}>MasterCraft Person</option>
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
                                            <input type="text" class="form-control" name="firstname" value="{{ $registration->trainer->firstname }}" required autofocus>
                                            @error('firstname')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Middle Name:</label>
                                            <input type="text" class="form-control" name="middlename" value="{{ $registration->trainer->middlename }}">
                                            @error('middlename')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Last Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="lastname" value="{{ $registration->trainer->lastname }}" required>
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
                                            <select name="gender" id="gender" class="form-control select2">
                                                <option value="">Select gender</option>
                                                <option value="male" {{ $registration->trainer->gender == 'male' ? 'selected': '' }}>Male</option>
                                                <option value="female" {{ $registration->trainer->gender == 'female' ? 'selected': '' }}>Female</option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Date of Birth:</label>
                                            <input type="date" class="form-control datetimepicker-input" name="date_of_birth" value="{{ $registration->trainer->date_of_birth }}" data-target="#date_of_birth"/>
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
                                            <select name="nationality" id="nationality" class="form-control select2" required>
                                                <option value="">Select nationaltiy</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{$country}}" {{$country === $registration->trainer->nationality ? 'selected' : ''}}>{{$country}}</option>
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
                                            <input type="text" class="form-control" name="TIN" value="{{ $registration->trainer->TIN }}" required>
                                            @error('TIN')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 show-nin-number">
                                        <div class="form-group">
                                            <label>National Identification Number (NIN): <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control nin-number" name="NIN" value="{{ $registration->trainer->NIN }}" required>
                                            @error('NIN')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4 show-ain-number">
                                        <div class="form-group">
                                            <label>Alien Identification Number (AIN): <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control ain-number" name="AIN" value="{{ $registration->trainer->AIN }}" required>
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
                                            <input type="email" class="form-control" name="email" value="{{ $registration->trainer->email }}" required>
                                            @error('email')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Address: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="physical_address" value="{{ $registration->trainer->physical_address }}" required>
                                            @error('physical_address')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Postal Address:</label>
                                            <input type="text" class="form-control" name="postal_address" value="{{ $registration->trainer->postal_address }}">
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
                                            <input type="text" class="form-control" name="phone_home" value="{{ $registration->trainer->phone_home }}">
                                            @error('phone_home')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Mobile Phone: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="phone_mobile" value="{{ $registration->trainer->phone_mobile }}" required>
                                            @error('phone_mobile')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-12"><h4 class="text-primary"><b>Trainer Application Details</b></h4></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Application No: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="application_no" value="{{ $registration->application_no }}" required readonly>
                                            @error('application_no')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Application Date: <sup class="text-danger">*</sup></label>
                                            <input type="date" class="form-control datetimepicker-input" name="application_date" value="{{ $registration->application_date }}" data-target="#application_date"/>
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
                                                <option value="accepted" {{ $registration->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                <option value="rejected" {{ $registration->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                <option value="pending" {{ $registration->status == 'pending' ? 'selected' : '' }}>Pending</option>
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
                                            <input type="date" class="form-control datetimepicker-input license-registration" name="license_start_date" value="{{ $registration->registrationLicence->licence_start_date ?? '' }}" data-target="#license_start_date"/>
                                            @error('license_start_date')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>License End Date: <sup class="text-danger">*</sup></label>
                                            <input type="date" class="form-control datetimepicker-input license-registration" name="license_end_date" value="{{ $registration->registrationLicence->licence_end_date ?? '' }}" data-target="#license_end_date"/>
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
                                    <button class="btn btn-primary mr-1">Save Registration</button>
                                    <a href="{{route('portal.trainer.registrations.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form> 
                </div>
        </div>
    </div>
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
            // $('#date_of_birth').datetimepicker({
            //     format: 'YYYY-MM-DD'
            // });
            // $('#application_date').datetimepicker({
            //     format: 'YYYY-MM-DD'
            // });
            // $('#license_start_date').datetimepicker({
            //     format: 'YYYY-MM-DD'
            // });
            // $('#license_end_date').datetimepicker({
            //     format: 'YYYY-MM-DD'
            // });

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