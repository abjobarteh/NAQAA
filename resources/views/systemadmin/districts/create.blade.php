@extends('layouts.systemadmin')

@section('content')
   <section class="content">
       <div class="container-fluid">
           <div class="card mt-2">
               <div class="card-header">
                   <h3 class="card-title">Add District</h3>
               </div>

               <div class="card-body">
                   <form action="{{ route('systemadmin.districts.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Region</label>
                                    <select class="form-control select2" style="width: 100%;" id="region_id" name="region_id" data-placeholder="Select Region" required>
                                        @foreach ($regions as $id => $regions)
                                            <option value="{{ $id }}">{{ $regions }}</option>
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
                                    <input type="text" class="form-control" placeholder="Enter district name" value="{{ old('name')}}" id="name" name="name"  required autofocus>
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