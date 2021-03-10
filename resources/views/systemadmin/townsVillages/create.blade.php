@extends('layouts.app')

@section('content')
   <section class="content">
       <div class="container-fluid">
           <div class="card mt-2">
               <div class="card-header">
                   <h3 class="card-title">Add Town/Village</h3>
               </div>

               <div class="card-body">
                   <form action="{{ route('systemadmin.towns-villages.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Districts</label>
                                    <select class="form-control select2" style="width: 100%;" id="district_id" name="district_id" data-placeholder="Select District" required>
                                        @foreach ($districts as $id => $districts)
                                            <option value="{{ $id }}">{{ $districts }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-1">
                                    @if($errors->has('district_id'))
                                        <span class="text-danger">{{ $errors->first('district_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Town/Village name" value="{{ old('name')}}" id="name" name="name"  required autofocus>
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