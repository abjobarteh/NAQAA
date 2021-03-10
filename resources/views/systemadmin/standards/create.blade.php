@extends('layouts.app')

@section('content')
   <section class="content">
       <div class="container-fluid">
           <div class="card mt-2">
               <div class="card-header">
                   <h3 class="card-title">Add New Standards</h3>
               </div>

               <div class="card-body">
                   <form action="{{ route('systemadmin.standards.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Standard name" id="title" name="title" value="{{ old('title') }}"  required autofocus>
                                </div>
                                <div class="mt-1">
                                    @if($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea class="form-control" placeholder="Add description" id="description" name="description" value="{{ old('description') }}"></textarea>
                                </div>
                                <div class="mt-1">
                                    @if($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Maximum Score</label>
                                    <input type="text" class="form-control" placeholder="Enter maximum score" id="maximum_score" name="maximum_score" value="{{ old('maximum_score') }}"  required>
                                </div>
                                <div class="mt-1">
                                    @if($errors->has('maximum_score'))
                                        <span class="text-danger">{{ $errors->first('maximum_score') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-info">Save</button>
                                <a href="{{ route('systemadmin.standards.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"> back</i></a>
                            </div>
                        </div>
                    </form>
               </div>
           </div>
       </div>
   </section>

@endsection