@extends('layouts.admin')
@section('page-title')
    Add Localgoverment Area
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid mt-2">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Add Localgoverment Area</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.localgovermentareas.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Localgoverment area name" value="{{ old('name')}}" id="name" name="name"  required autofocus>
                                    <div class="mt-1">
                                        @if($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="region">Region</label>
                                    <select name="region_id" id="region" class="form-control custom-select">
                                        <option>Select region</option>
                                        @foreach ($regions as $id => $region)
                                            <option value="{{$id}}">{{$region}}</option>
                                        @endforeach
                                    </select>
                                    <div class="mt-1">
                                        @if($errors->has('region_id'))
                                            <span class="text-danger">{{ $errors->first('region_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-info btn-block">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> 
@endsection