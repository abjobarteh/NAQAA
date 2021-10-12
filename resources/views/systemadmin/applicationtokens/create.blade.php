@extends('layouts.admin')

@section('page-title','Generate Application Tokens')


@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6 col-sm-12 text-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.application-tokens.index')}}">Application Tokens</a></li>
                    <li class="breadcrumb-item active">Generate Application Tokens</li>
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
                        <h3 class="card-title">Edit Application Type Fee Tariff</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.application-tokens.store')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="application_type_id" class="col-form-label col-md-4">Application Type: <span class="text-danger"><sup>*</sup></span></label>
                                <div class="col-md-8">
                                    <select name="application_type_id" id="application_type_id" class="form-control select2">
                                        <option>--- select application type ---</option>
                                        @foreach ($application_types as $id => $type)
                                            <option value="{{$id}}">{{$type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mt-1">
                                   @error('application_type_id')
                                       <span class="text-danger">{{$message}}</span>
                                   @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quantity" class="col-form-label col-md-4">Quantity: <span class="text-danger"><sup>*</sup></span></label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="quantity" placeholder="Enter quantity of tokens to generate" min="0" step="1" required>
                                </div>
                                <div class="col-md-12 mt-1">
                                   @error('quantity')
                                       <span class="text-danger">{{$message}}</span>
                                   @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-md-4">
                                    <button class="btn btn-primary pr-2">Save</button>
                                    <a href="{{route('admin.application-tokens.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"></i> Back</a>
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
