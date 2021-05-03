@extends('layouts.admin')
@section('page-title')
    Edit Training Provider Registration
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Training Provider Registration</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('registration-accreditation.registration.trainingproviders.index')}}">
                                Training Providers
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Edit Training provider</li>
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
                            <h3 class="card-title">Edit Training provider</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('registration-accreditation.registration.trainingproviders.update', $trainingprovider->id)}}" method="post" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-12"><h4 class="text-primary"><b>Training Provider Details</b></h4></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Training Provider Name: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="name" value="{{ $trainingprovider->name }}" required autofocus>
                                                    @error('name')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                             <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Category: <sup class="text-danger">*</sup></label>
                                                    <select name="category_id" id="category_id" class="form-control select2" required>
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
                                                    <input type="text" class="form-control" name="physical_address" value="{{ $trainingprovider->physical_address }}" required>
                                                    @error('physical_address')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Postal Address:</label>
                                                    <input type="text" class="form-control" name="postal_address" value="{{ $trainingprovider->postal_address }}">
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
                                                    <input type="text" class="form-control" name="telephone_work" value="{{ $trainingprovider->telephone_work }}">
                                                    @error('telephone_work')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Mobile Phone:</label>
                                                    <input type="text" class="form-control" name="mobile_phone" value="{{ $trainingprovider->mobile_phone }}">
                                                    @error('mobile_phone')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Fax:</label>
                                                    <input type="text" class="form-control" name="fax" value="{{ $trainingprovider->fax }}">
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
                                                    <input type="email" class="form-control" name="email" value="{{ $trainingprovider->email }}" required>
                                                    @error('email')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Webiste:</label>
                                                    <input type="text" class="form-control" name="website" value="{{ $trainingprovider->website }}">
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
                                                    <select name="region_id" id="region_id" class="form-control select2" required>
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
                                                    <select name="district_id" id="district_id" class="form-control select2" required>
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
                                                    <select name="town_village_id" id="town_village_id" class="form-control select2">
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
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-12"><h4 class="text-primary"><b>Application Details</b></h4></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Application No: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="application_no" value="{{ $trainingprovider->applications[0]->application_no ?? '' }}" required>
                                                    @error('application_no')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Application Date: <sup class="text-danger">*</sup></label>
                                                    <div class="input-group date" id="application_date" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" name="application_date" value="{{ $trainingprovider->applications[0]->application_date ?? '' }}" data-target="#application_date"/>
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
                                                        <option value="accepted" {{ ($trainingprovider->applications[0]->status ?? '') == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                        <option value="rejected" {{ ($trainingprovider->applications[0]->status ?? '') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                        <option value="pending" {{ ($trainingprovider->applications[0]->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    </select>
                                                    @error('status')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row license-registration-details">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>License Start Date: <sup class="text-danger">*</sup></label>
                                                    <div class="input-group date" id="license_start_date" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input license-registration" name="license_start_date" value="{{ $trainingprovider->licences[0]->licence_start_date ?? '' }}" data-target="#license_start_date"/>
                                                        <div class="input-group-append" data-target="#license_start_date" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                    @error('license_start_date')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row license-registration-details">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>License End Date: <sup class="text-danger">*</sup></label>
                                                    <div class="input-group date" id="license_end_date" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input license-registration" name="license_end_date" value="{{ $trainingprovider->licences[0]->licence_end_date ?? '' }}" data-target="#license_end_date"/>
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
                                            <button class="btn btn-primary mr-1">Save Registration</button>
                                            <a href="{{route('registration-accreditation.registration.trainingproviders.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
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
        })
    </script>
@endsection