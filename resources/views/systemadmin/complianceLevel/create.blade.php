@extends('layouts.systemadmin')

@section('content')
   <section class="content">
       <div class="container-fluid">
           <div class="card mt-2">
               <div class="card-header">
                   <h3 class="card-title">Add New Compliance Level</h3>
               </div>

               <div class="card-body">
                   <form action="{{ route('systemadmin.compliance-levels.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter compliance level name" id="name" name="name" value="{{ old('name') }}"  required autofocus>
                                </div>
                                <div class="mt-1">
                                    @if($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Start Percentage</label>
                                    <input class="form-control" placeholder="Percentage Start" id="percentage_start" name="percentage_start" value="{{ old('percentage_start') }}" required/>
                                </div>
                                <div class="mt-1">
                                    @if($errors->has('percentage_start'))
                                        <span class="text-danger">{{ $errors->first('percentage_start') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Percentage End</label>
                                    <input class="form-control" placeholder="Percentage End" id="percentage_end" name="percentage_end" value="{{ old('percentage_end') }}" required/>
                                </div>
                                <div class="mt-1">
                                    @if($errors->has('percentage_end'))
                                        <span class="text-danger">{{ $errors->first('percentage_end') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-info">Save</button>
                                <a href="{{ route('systemadmin.compliance-levels.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"> back</i></a>
                            </div>
                        </div>
                    </form>
               </div>
           </div>
       </div>
   </section>

@endsection