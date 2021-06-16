@extends('layouts.portal')
@section('title','Edit Training provider Datacollection')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Training Provider Datacollection details</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('portal.institution.datacollection.programmes.update')}}" method="post" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Learning Center Name: <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" name="name" value="{{$data->trainingprovider->name}}" required autofocus>
                                    @error('name')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email: <sup class="text-danger">*</sup></label>
                                    <input type="email" class="form-control" name="email" value="{{$data->trainingprovider->email}}" required>
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
                                    <input type="text" class="form-control" name="phone" value="{{$data->trainingprovider->mobile_phone}}" required>
                                    @error('phone')
                                        <span class="text-danger mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Address: <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" name="address" value="{{$data->trainingprovider->address}}" required>
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
                                    <input type="text" class="form-control" name="po_box" value="{{$data->trainingprovider->po_box}}">
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
                                    <input type="number" class="form-control" name="estimated_yearly_turnover" value="{{$data->estimated_yearly_turnover}}" min="0" step="1">
                                    @error('estimated_yearly_turnover')
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
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Ownership: <sup class="text-danger">*</sup></label>
                                    <select name="ownership_id" id="ownership_id" class="form-control select2" required>
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
                                    <select name="classification_id" id="classification_id" class="form-control select2" required>
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
                                    <select name="region_id" id="region_id" class="form-control select2" required>
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
                                    <select name="district_id" id="district_id" class="form-control select2" required>
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
                                    <select name="lga_id" id="lga_id" class="form-control select2" required>
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
                        <div class="row">
                            <div class="col-sm-12 d-flex justify-content-end">
                                <div class="form-group">
                                    <button class="btn btn-success btn-square mr-1">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection