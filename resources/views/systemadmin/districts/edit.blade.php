@extends('layouts.admin')
@section('page-title')
    Edit District
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.districts.index')}}">Districts</a></li>
                        <li class="breadcrumb-item active">Edit district</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
   <section class="content">
       <div class="container-fluid">
           <div class="card mt-2">
               <div class="card-header">
                   <h3 class="card-title">Edit District</h3>
               </div>

               <div class="card-body">
                   <form action="{{ route('admin.districts.update', $district->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Region</label>
                                    <select class="form-control select2" style="width: 100%;" id="region_id" name="region_id" data-placeholder="Select Region" required>
                                        <option>Select region</option>
                                        @foreach ($regions as $id => $region)
                                            <option value="{{ $id }}" {{ $id == $district->region_id ? 'selected' : ''}}>{{ $region }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-1">
                                    @if($errors->has('region_id'))
                                        <span class="text-danger">{{ $errors->first('region_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter region name" value="{{ $district->name}}" id="name" name="name"  required autofocus>
                                </div>
                                <div class="mt-1">
                                    @if($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
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