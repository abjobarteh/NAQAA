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
                            <form action="{{route('researchdevelopment.datacollection.institution-details.update', $data[0]->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Learning Center Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="training_provider_name" value="{{$data[0]->training_provider_name}}" required autofocus>
                                            @error('training_provider_name')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Email: <sup class="text-danger">*</sup></label>
                                            <input type="email" class="form-control" name="email" value="{{$data[0]->email}}" required>
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
                                            <input type="text" class="form-control" name="phone" value="{{$data[0]->phone}}" required>
                                            @error('phone')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Address: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="address" value="{{$data[0]->address}}" required>
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
                                            <input type="text" class="form-control" name="po_box" value="{{$data[0]->po_box}}">
                                            @error('po_box')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Webiste:</label>
                                            <input type="text" class="form-control" name="website" value="{{$data[0]->website}}">
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
                                            <input type="text" class="form-control" name="financial_source" required value="{{$data[0]->financial_source}}">
                                            @error('financial_source')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Estimated Yearly Tunrover:</label>
                                            <input type="text" class="form-control" name="estimated_yearly_turnover" value="{{$data[0]->estimated_yearly_turnover}}">
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
                                            <input type="text" class="form-control" name="enrollment_capacity" value="{{$data[0]->enrollment_capacity}}">
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
                                            <input type="text" class="form-control" name="no_of_lecture_rooms" value="{{$data[0]->no_of_lecture_rooms}}" required>
                                            @error('no_of_lecture_rooms')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>No. of Computer Labs: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="no_of_computer_labs" value="{{$data[0]->no_of_computer_labs}}" required>
                                            @error('no_computer_labs')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Total no. of Computers in Labs: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="total_no_of_computers_in_labs" value="{{$data[0]->total_no_of_computers_in_labs}}" required>
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
                                                    <option value="{{$id}}" {{$data[0]->ownership_id == $id ? 'selected' : ''}}>{{$ownership}}</option>
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
                                                    <option value="{{$id}}" {{$data[0]->classification_id == $id ? 'selected' : ''}}>{{$classification}}</option>
                                                @endforeach
                                            </select>
                                            @error('classification_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>District: <sup class="text-danger">*</sup></label>
                                            <select name="district_id" id="district_id" class="form-control select2" required>
                                                <option>Select district</option>
                                                @foreach ($districts as $id => $district)
                                                    <option value="{{$id}}" {{$data[0]->district_id == $id ? 'selected' : ''}}>{{$district}}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Local goverment area: <sup class="text-danger">*</sup></label>
                                            <select name="lga_id" id="lga_id" class="form-control select2" required>
                                                <option>Select local goverment area</option>
                                                @foreach ($lgas as $id => $lga)
                                                    <option value="{{$id}}" {{$data[0]->lga_id == $id ? 'selected' : ''}}>{{$lga}}</option>
                                                @endforeach
                                            </select>
                                            @error('lga_id')
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