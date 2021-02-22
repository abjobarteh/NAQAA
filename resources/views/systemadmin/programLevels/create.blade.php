@extends('layouts.systemadmin')

@section('content')
   <section class="content">
       <div class="container-fluid">
           <div class="card mt-2">
               <div class="card-header">
                   <h3 class="card-title">Create Program Level</h3>
               </div>

               <div class="card-body">
                   <form action="{{ route('systemadmin.program-levels.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter program level name" id="name" name="name"  required autofocus>
                                </div>
                                <div class="mt-1">
                                    @if($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea class="form-control" placeholder="Add description" id="description" name="description"></textarea>
                                </div>
                                <div class="mt-1">
                                    @if($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-info">Save</button>
                                <a href="{{ route('systemadmin.program-levels.index')}}" class="btn btn-warning text-white">back <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </form>
               </div>
           </div>
       </div>
   </section>

@endsection