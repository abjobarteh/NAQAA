@extends('layouts.admin')
@section('page-title')
    Edit Institution Details Data collection
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Edit Institution Details Data Collection</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.datacollection.institution-details.index')}}">
                                Institution details data collection
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Edit institution details data collection</li>
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
                            <h3 class="card-title">Edit Institution Details Collection</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('researchdevelopment.datacollection.institution-details.update', $data->id)}}" method="post" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Registration Status: <sup class="text-danger">*</sup></label>
                                            <select name="registration_status" id="registration_status" class="form-control custom-select" required>
                                                <option>--- select registration status ---</option>
                                                <option value="yes" {{$data->trainingprovider->is_registered == '1' ? 'selected' : ''}}>Yes</option>
                                                <option value="no" {{$data->trainingprovider->is_registered == '0' ? 'selected' : ''}}>No</option>
                                            </select>
                                            @error('registration_status')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row is-registered-details">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Education/Training Provider: <sup class="text-danger">*</sup></label>
                                            <select name="training_provider" id="training_provider" class="form-control select2 is-registered" required>
                                                <option>--- select education/training provider ---</option>
                                                @foreach ($registered_institutions as $id => $institution)
                                                  <option value="{{$id}}" {{$data->institution_id == $id ? 'selected' : ''}}>{{$institution}}</option>  
                                                @endforeach
                                            </select>
                                            @error('training_provider')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="not-registered-details">
                                    @if($data->trainingprovider->is_registered == '0')
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Education/Training Provider Name: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control not-registered" name="name" value="{{$data->trainingprovider->name}}" required autofocus>
                                                    @error('name')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Email: <sup class="text-danger">*</sup></label>
                                                    <input type="email" class="form-control not-registered" name="email" value="{{$data->trainingprovider->email}}" required>
                                                    @error('email')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Phone: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control not-registered" name="phone" value="{{$data->trainingprovider->mobile_phone}}" required>
                                                    @error('phone')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Address: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control not-registered" name="address" value="{{$data->trainingprovider->address}}" required>
                                                    @error('address')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>P.O Box:</label>
                                                    <input type="text" class="form-control not-registered" name="po_box" value="{{$data->trainingprovider->po_box}}">
                                                    @error('po_box')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Webiste:</label>
                                                    <input type="text" class="form-control" name="website" value="{{$data->trainingprovider->website}}">
                                                    @error('website')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Ownership: <sup class="text-danger">*</sup></label>
                                                    <select name="ownership_id" id="ownership_id" class="form-control select2 not-registered" required>
                                                        <option>Select ownership</option>
                                                        @foreach ($ownerships as $id => $ownership)
                                                            <option value="{{$id}}" {{$data->trainingprovider->ownership_id == $id ? 'selected' : ''}}>{{$ownership}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('ownership_id')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Classification: <sup class="text-danger">*</sup></label>
                                                    <select name="classification_id" id="classification_id" class="form-control select2 not-registered" required>
                                                        <option>Select classification</option>
                                                        @foreach ($classifications as $id => $classification)
                                                            <option value="{{$id}}" {{$data->trainingprovider->classification_id == $id ? 'selected' : ''}}>{{$classification}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('classification_id')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Region: <sup class="text-danger">*</sup></label>
                                                    <select name="region_id" id="region_id" class="form-control select2 not-registered" required>
                                                        <option>Select regions</option>
                                                        @foreach ($regions as $id => $region)
                                                            <option value="{{$id}}"{{$data->trainingprovider->region_id == $id ? 'selected' : ''}}>{{$region}}</option>
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
                                                    <select name="district_id" id="district_id" class="form-control select2 not-registered" required>
                                                        <option>Select district</option>
                                                        @foreach ($districts as $id => $district)
                                                            <option value="{{$id}}" {{$data->trainingprovider->district_id == $id ? 'selected' : ''}}>{{$district}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('district_id')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Local goverment area: <sup class="text-danger">*</sup></label>
                                                    <select name="lga_id" id="lga_id" class="form-control select2 not-registered" required>
                                                        <option>Select local goverment area</option>
                                                        @foreach ($lgas as $id => $lga)
                                                            <option value="{{$id}}" {{$data->trainingprovider->lga_id == $id ? 'selected' : ''}}>{{$lga}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('lga_id')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Education/Training Provider Name: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control not-registered" name="name" value="{{ old('name') }}" required autofocus>
                                                    @error('name')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Email: <sup class="text-danger">*</sup></label>
                                                    <input type="email" class="form-control not-registered" name="email" value="{{ old('email') }}" required>
                                                    @error('email')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Phone: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control not-registered" name="phone" value="{{ old('phone') }}" required>
                                                    @error('phone')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Address: <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control not-registered" name="address" value="{{ old('address') }}" required>
                                                    @error('address')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>P.O Box:</label>
                                                    <input type="text" class="form-control not-registered" name="po_box" value="{{ old('po_box') }}">
                                                    @error('po_box')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Webiste:</label>
                                                    <input type="text" class="form-control not-registered" name="website" value="{{ old('website') }}">
                                                    @error('website')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Ownership: <sup class="text-danger">*</sup></label>
                                                    <select name="ownership_id" id="ownership_id" class="form-control select2 not-registered" required>
                                                        <option>Select ownership</option>
                                                        @foreach ($ownerships as $id => $ownership)
                                                            <option value="{{$id}}">{{$ownership}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('ownership_id')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Classification: <sup class="text-danger">*</sup></label>
                                                    <select name="classification_id" id="classification_id" class="form-control select2 not-registered" required>
                                                        <option>Select classification</option>
                                                        @foreach ($classifications as $id => $classification)
                                                            <option value="{{$id}}">{{$classification}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('classification_id')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Region: <sup class="text-danger">*</sup></label>
                                                    <select name="region_id" id="region_id" class="form-control select2 not-registered" required>
                                                        <option>Select regions</option>
                                                        @foreach ($regions as $id => $region)
                                                            <option value="{{$id}}">{{$region}}</option>
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
                                                    <select name="district_id" id="district_id" class="form-control select2 not-registered" required>
                                                        <option>Select district</option>
                                                        @foreach ($districts as $id => $district)
                                                            <option value="{{$id}}">{{$district}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('district_id')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Local goverment area: <sup class="text-danger">*</sup></label>
                                                    <select name="lga_id" id="lga_id" class="form-control select2 not-registered" required>
                                                        <option>Select local goverment area</option>
                                                        @foreach ($lgas as $id => $lga)
                                                            <option value="{{$id}}">{{$lga}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('lga_id')
                                                        <span class="text-danger mt-1">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Academic Year: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="academic_year" value="{{ $data->academic_year }}" required autofocus>
                                            @error('academic_year')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Financial Source: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="financial_source" required value="{{$data->financial_source}}">
                                            @error('financial_source')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Estimated Yearly Tunrover:</label>
                                            <input type="number" class="form-control" name="yearly_turnover" value="{{$data->yearly_turnover}}" min="0" step="1">
                                            @error('yearly_turnover')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Enrollment Capacity:</label>
                                            <input type="number" class="form-control" name="enrollment_capacity" value="{{$data->enrollment_capacity}}" min="0" step="1">
                                            @error('enrollment_capacity')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>No. of Lecture rooms: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="no_of_lecture_rooms" value="{{$data->no_of_lecture_rooms}}" min="0" step="1" required>
                                            @error('no_of_lecture_rooms')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>No. of Computer Labs: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="no_of_computer_labs" value="{{$data->no_of_computer_labs}}" min="0" step="1" required>
                                            @error('no_computer_labs')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Total no. of Computers in Labs: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="total_no_of_computers_in_labs" value="{{$data->total_no_of_computers_in_labs}}" min="0" step="1" required>
                                            @error('total_no_of_computers_in_labs')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary mr-1">Submit</button>
                                            <a href="{{route('researchdevelopment.datacollection.institution-details.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
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
            $('.license-registration-details').hide();

            if($('#registration_status').val() === 'yes'){
                    $('.not-registered-details').hide();
                    $('.not-registered').prop('hidden', true);
                    $('.not-registered').prop('disabled', true);
            }
            else{
                    $('.is-registered-details').hide();
                    $('.is-registered').prop('hidden', false);
                    $('.is-registered').prop('disabled', false);
            }

            // check institution registration status
            $("#registration_status").change(function() {
                if ($(this).val() != "yes") {
                    $('.not-registered-details').show();
                    $('.is-registered-details').hide();
                    $('.not-registered').prop('hidden', false);
                    $('.not-registered').prop('disabled', false);
                    $('.is-registered').prop('hidden', true);
                    $('.is-registered').prop('disabled', true);
                }
                else{
                    $('.is-registered-details').show();
                    $('.not-registered-details').hide();
                    $('.is-registered').prop('hidden', false);
                    $('.is-registered').prop('disabled', false);
                    $('.not-registered').prop('hidden', true);
                    $('.not-registered').prop('disabled', true);
                }
            });

        })
    </script>
@endsection