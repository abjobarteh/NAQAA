<div>
    @section('page-title','Add Programme Details')

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
                            <form wire:submit.prevent="updateProgramme" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 training_provider_column">
                                        <div class="form-group" wire:ignore>
                                            <label>Education/Training Provider:</label>
                                            <select name="training_provider_id" id="training_provider_id" wire:model="training_provider_id" class="form-control select2" required>
                                                <option value="">--- select education/training provider ---</option>
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
                                    @if (!$isAccredited)
                                        <div class="col-sm-6">
                                            <div class="form-group is-institution-registered-details">
                                                <label>Program Name: <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control" name="program_name" wire:model.lazy="program_name" value="{{ old('program_name') }}" required autofocus>
                                                @error('program_name')
                                                    <span class="text-danger mt-1">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div> 
                                    @else
                                        <div class="@if($specify_programme)col-sm-4 @else col-sm-6 @endif">
                                            <div class="form-group">
                                                <label>Programmes:</label>
                                                <select name="programme_id" id="programme_id" wire:model="programme_id" class="form-control custom-select" required>
                                                    <option value="">--- select programme ---</option>
                                                    @foreach ($accredited_programmes as $id => $programme)
                                                        <option value="{{$id}}">{{$programme}}</option>
                                                    @endforeach
                                                    <option value="not-specified">Not specified</option>
                                                </select>
                                                @error('programme_id')
                                                    <span class="text-danger mt-1">{{$message}}</span>
                                                @enderror
                                            </div> 
                                        </div>
                                    @endif
                                    @if($specify_programme)
                                        <div class="col-sm-4">
                                            <div class="form-group is-institution-registered-details">
                                                <label>Specify Program: <sup class="text-danger">*</sup></label>
                                                <input type="text" class="form-control" name="program_name" wire:model.lazy="program_name" value="{{ old('program_name') }}" required autofocus>
                                                @error('program_name')
                                                    <span class="text-danger mt-1">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div> 
                                    @endif
                                    <div class="@if($specify_programme)col-sm-4 @else col-sm-6 @endif">
                                        <div class="form-group">
                                            <label>Duration: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="duration" wire:model.lazy="duration" value="{{ old('duration') }}" min="0" step="1" required>
                                            @error('duration')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Academic year: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="academic_year" wire:model.lazy="academic_year" value="{{ old('academic_year') }}" min="0" step="1" required>
                                            @error('academic_year')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Tuition Fee per year: <sup class="text-danger">*</sup></label>
                                            <input type="number" class="form-control" name="tuition_fee_per_year" wire:model.lazy="tuition_fee_per_year" value="{{ old('tuition_fee_per_year') }}" min="0" step="1" required>
                                            @error('tuition_fee_per_year')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group" wire:ignore>
                                            <label>Entry requirements: <sup class="text-danger">*</sup></label>
                                            <select name="entry_requirements[]" id="entry_requirements" wire:model="entry_requirements" class="form-control select2" multiple="multiple" required>
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
                                        <div class="form-group" wire:ignore>
                                            <label>Field of Education: <sup class="text-danger">*</sup></label>
                                            <select name="field_of_education" id="field_of_education" wire:model="field_of_education" class="form-control select2" required>
                                                <option value="">Select field of education</option>
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
                                        <div class="form-group" wire:ignore>
                                            <label>Awarding body:</label>
                                            <select name="awarding_body" id="awarding_body" wire:model="awarding_body" class="form-control select2" required>
                                                <option value="">Select awarding body</option>
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
    @section('scripts')
    <script>

        $(document).ready(function() {
    
            $('.select2').select2();
    
            $('.select2').on('change', function (e) {
                
                var data = $('#'+$(this).attr('id')).select2("val");
    
                @this.set(`${$(this).attr('id')}`, data);
    
            });
        });
    
    </script>
    @endsection
</div>
