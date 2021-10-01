@extends('layouts.admin')
@section('page-title')
    New Program Details Data collection
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Record New Program Details Data Collection</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.datacollection.program-details.index')}}">
                                Program details data collection
                            </a>
                        </li>
                        <li class="breadcrumb-item active">New program details collection</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">New Program Details Collection</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('researchdevelopment.datacollection.program-details.store')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 training_provider_column">
                                        <div class="form-group">
                                            <label>Education/Training Provider:</label>
                                            <select name="training_provider_id" id="training_provider_id" class="form-control select2" required>
                                                <option>Select learning center</option>
                                                @foreach ($learningcenters as $id => $center)
                                                    <option value="{{$id}}">{{$center}}</option>
                                                @endforeach
                                            </select>
                                            @error('training_provider_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group is-institution-registered-details">
                                            <label>Program Name: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="program_name" value="{{ old('program_name') }}" required autofocus>
                                            @error('program_name')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Duration: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="duration" value="{{ old('duration') }}" min="0" step="1" required>
                                            @error('duration')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tuition Fee per year: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="tuition_fee_per_year" value="{{ old('tuition_fee_per_year') }}" min="0" step="1" required>
                                            @error('tuition_fee_per_year')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Entry requirements: <sup class="text-danger">*</sup></label>
                                            <select name="entry_requirements[]" id="entry_requirements" class="form-control select2" multiple="multiple" required>
                                                <option>Select entry requirements</option>
                                                @foreach ($levels as $level)
                                                    <option value="{{$level}}">{{$level}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('entry_requirements'))
                                                <span class="text-danger mt-1">{{ $errors->first('entry_requirements') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Field of Education: <sup class="text-danger">*</sup></label>
                                            <select name="field_of_education" id="field_of_education" class="form-control select2" required>
                                                <option>Select field of education</option>
                                                @foreach ($educationfields as $id => $field)
                                                    <option value="{{$id}}">{{$field}}</option>
                                                @endforeach
                                            </select>
                                            @error('field_of_education')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Awarding body:</label>
                                            <select name="awarding_body" id="awarding_body" class="form-control select2" required>
                                                <option>Select awarding body</option>
                                                @foreach ($awardbodies as $id => $body)
                                                    <option value="{{$body}}">{{$body}}</option>
                                                @endforeach
                                            </select>
                                            @error('awarding_body')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary mr-1">Submit</button>
                                            <a href="{{route('researchdevelopment.datacollection.program-details.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
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

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#training_provider_id').change(function(e){
                e.preventDefault()
                let button = '<div class="col-sm-12">'+
                                '<div class="form-group">'+
                                    '<button class="btn btn-primary mr-1">Submit</button>'+
                                    '<button href="" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Check</button>'+
                                '</div>'+
                            '</div>';
                
            })
            $('#something').click(function(e){
                e.preventDefault()
                console.log('checking if institution is registered');

                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                });
                $.ajax({  
                            method:"POST",  
                            url:"{{ route('researchdevelopment.datacollection.check-is-institution-registered') }}",  
                            data: {training_provider_id:$('#training_provider_id')},
                            type:'json',
                            success:function(response)  
                            {
                                response = JSON.parse(response)
                                console.log(response)
                                // if(response.status == 404)
                                // {
                                //     Swal.fire({
                                //         title: 'No Results',
                                //         text: response.message,
                                //         icon: 'success',
                                //         confirmButtonText: 'Close'
                                //     })
                                // }
                                // if(response.status == 200){
                                    
                                // }
                            },
                            error: function(err)
                            {
                                console.log(err)
                                // Swal.fire({
                                //     title: 'Error',
                                //     text: err.responseJSON.message,
                                //     icon: 'error',
                                //     confirmButtonText: 'Close'
                                // })
                            }  
                    });
            })
        })
    </script>
@endsection