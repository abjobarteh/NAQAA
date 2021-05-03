@extends('layouts.admin')
@section('page-title')
    New Training Provider Registration
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
                        <li class="breadcrumb-item active">Add Training provider</li>
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
                            <h3 class="card-title">Add Training provider</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('registration-accreditation.registration.trainingproviders.store')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Training Provider Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                            @error('name')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                     <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Category: <sup class="text-danger">*</sup></label>
                                            <select name="category_id" id="category_id" class="form-control select2" required>
                                                <option>Select category</option>
                                                @foreach ($categories as $id => $categories)
                                                    <option value="{{$id}}">{{$categories}}</option>
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
                                            <input type="text" class="form-control" name="physical_address" value="{{ old('physical_address') }}" required>
                                            @error('physical_address')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Postal Address:</label>
                                            <input type="text" class="form-control" name="postal_address" value="{{ old('postal_address') }}">
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
                                            <input type="text" class="form-control" name="telephone_work" value="{{ old('telephone_work') }}">
                                            @error('telephone_work')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Mobile Phone:</label>
                                            <input type="text" class="form-control" name="mobile_phone" value="{{ old('mobile_phone') }}">
                                            @error('mobile_phone')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Fax:</label>
                                            <input type="text" class="form-control" name="fax" value="{{ old('fax') }}">
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
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                            @error('email')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Webiste:</label>
                                            <input type="text" class="form-control" name="website" value="{{ old('website') }}" required>
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
                                            <select name="region" id="region" class="form-control select2" required>
                                                <option>Select regions</option>
                                                @foreach ($regions as $id => $region)
                                                    <option value="{{$id}}">{{$region}}</option>
                                                @endforeach
                                            </select>
                                            @error('region')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>District: <sup class="text-danger">*</sup></label>
                                            <select name="district_id" id="district_id" class="form-control select2" required>
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
                                            <label>Town/Village: <sup class="text-danger">*</sup></label>
                                            <select name="town_village_id" id="town_village_id" class="form-control select2" required>
                                                <option>Select Town/village</option>
                                                @foreach ($townvillages as $id => $townvillage)
                                                    <option value="{{$id}}">{{$townvillage}}</option>
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
                                            <button class="btn btn-primary mr-1">Submit</button>
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