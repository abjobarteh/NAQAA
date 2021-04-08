@extends('layouts.admin')
@section('page-title')
    Edit Application Fee Tariff
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6 col-sm-12 text-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.configurations')}}">Configurations</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.application-fees-tariffs.index')}}">Application fees tariffs</a></li>
                        <li class="breadcrumb-item active">Edit application fee tariff</li>
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
                            <h3 class="card-title">Edit Application Fee Tariff</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.application-fees-tariffs.update', $fee[0]->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="name" class="col-form-label col-md-4">Amount: <span class="text-danger"><sup>*</sup></span></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="amount" value="{{$fee[0]->amount}}" placeholder="Enter fee amount" required autofocus>
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
                                            <option value="registration" {{$fee[0]->application_category == 'registration' ? 'selected' : ''}}>Registration</option>
                                            <option value="accreditation" {{$fee[0]->application_category == 'accreditation' ? 'selected' : ''}}>Accreditation</option>
                                            <option value="assessment-certification" {{$fee[0]->application_category == 'assessment-certification' ? 'selected' : ''}}>Assessment/Certification</option>
                                            <option value="registration-accreditation" {{$fee[0]->application_category == 'registration-accreditation' ? 'selected' : ''}}>Registration/Accreditation</option>
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
                                            <option value="new" {{$fee[0]->application_type == 'new' ? 'selected' : ''}}>New Application</option>
                                            <option value="renewal" {{$fee[0]->application_type == 'renewal' ? 'selected' : ''}}>Application Renewal</option>
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
                                            <option value="training-provider" {{$fee[0]->applicant_type == 'training-provider' ? 'selected' : ''}}>Training Provider</option>
                                            <option value="trainers" {{$fee[0]->applicant_type == 'trainers' ? 'selected' : ''}}>Trainers</option>
                                            <option value="students" {{$fee[0]->applicant_type == 'students' ? 'selected' : ''}}>Students</option>
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
                                        <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{$fee[0]->description}}</textarea>
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