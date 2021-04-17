@extends('layouts.admin')
@section('page-title')
    Add Application Fee Tariff
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6 col-sm-12 text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.configurations')}}">Configurations</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.application-fees-tariffs.index')}}">Application fees tariffs</a></li>
                        <li class="breadcrumb-item active">Add application fee tariff</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Add Application Fee Tariff</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.application-fees-tariffs.store')}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-form-label col-md-4">Amount: <span class="text-danger"><sup>*</sup></span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="amount" value="{{ old('amount') }}" placeholder="Enter fee amount" required autofocus>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                       @error('amount')
                                           <span class="text-danger">{{$message}}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="application_category" class="col-form-label col-md-4">Application Category: <span class="text-danger"><sup>*</sup></span></label>
                                    <div class="col-md-8">
                                        <select name="application_category" id="application_category" class="form-control select2">
                                            <option>Select Application category...</option>
                                            <option value="registration">Registration</option>
                                            <option value="accreditation">Accreditation</option>
                                            <option value="assessment-certification">Assessment/Certification</option>
                                            <option value="registration-accreditation">Registration/Accreditation</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                       @error('application_category')
                                           <span class="text-danger">{{$message}}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="application_type" class="col-form-label col-md-4">Application Type: <span class="text-danger"><sup>*</sup></span></label>
                                    <div class="col-md-8">
                                        <select name="application_type" id="application_type" class="form-control select2">
                                            <option>Select Application type...</option>
                                            <option value="new">New Application</option>
                                            <option value="renewal">Application Renewal</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                       @error('application_type')
                                           <span class="text-danger">{{$message}}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="applicant_type" class="col-form-label col-md-4">Applicant Type: <span class="text-danger"><sup>*</sup></span></label>
                                    <div class="col-md-8">
                                        <select name="applicant_type" id="applicant_type" class="form-control select2">
                                            <option>Select Applicant type...</option>
                                            <option value="training-provider">Training Provider</option>
                                            <option value="trainers">Trainers</option>
                                            <option value="students">Students</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                       @error('applicant_type')
                                           <span class="text-danger">{{$message}}</span>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-form-label col-md-4">Description:</label>
                                    <div class="col-md-8">
                                        <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        @error('description')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-md-4">
                                        <button class="btn btn-primary pr-2">Save</button>
                                        <a href="{{route('admin.application-fees-tariffs.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"></i> Back</a>
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