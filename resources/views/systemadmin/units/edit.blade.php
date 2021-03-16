@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Units</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Units</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header --> 
<section class="content">
    <div class="container-fluid">
        <div class="row mt-2 mb-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Unit</div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.units.update', $unit->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <input type="text" class="form-control" placeholder="Enter unit name" name="name" value="{{ $unit->name }}}">
                                        </div>
                                    </div>
                                    <div class="mt-1">
                                        @if($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 mb-2">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <select class="form-control custom-select" style="width: 100%;" name="directorate" required>
                                                    <option selected>Select directorate</option>
                                                    @forelse ($directorates as $key => $value)  
                                                        <option value="{{$key}}" {{$key == $unit->id ? 'selected' : ''}}>{{$value}}</option>
                                                    @empty
                                                        <option>No Directorates registered in the system</option>
                                                    @endforelse
                                                  </select>
                                                  <div class="mt-1 mb-1">
                                                    @error('directorate')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-1">
                                        @if($errors->has('directorate'))
                                            <span class="text-danger">{{ $errors->first('directorate') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <button class="btn btn-info btn-block">Save</button>
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
