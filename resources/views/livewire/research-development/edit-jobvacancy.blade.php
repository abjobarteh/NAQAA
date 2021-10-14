<div>
    @section('page-title','New Job Vacancy Details')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Record New Job Vacancy Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.job-vacancies.index')}}">
                                Job vacancy details
                            </a>
                        </li>
                        <li class="breadcrumb-item active">New Job Vacancy</li>
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
                            <h3 class="card-title">New Job Vacancy Details</h3>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="updateJobvacancy" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="@if($position_exist) col-sm-6 @else col-sm-4 @endif">
                                        <div class="form-group" wire:ignore>
                                            <label>Position Advertised:</label>
                                            <select name="position_advertised" id="position_advertised" wire:model="position_advertised" class="form-control select2" required>
                                                <option>Select position</option>
                                                @foreach ($job_positions as $id => $position)
                                                    <option value="{{$id}}">{{$position}}</option>
                                                @endforeach
                                                <option value="not-specified">Not specified</option>
                                            </select>
                                            @error('position_advertised')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @if(!$position_exist)
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Position Advertised:</label>
                                            <input type="text" class="form-control" name="position_name" wire:model="position_name">
                                            @error('position_name')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @endif
                                    <div class="@if($position_exist) col-sm-6 @else col-sm-4 @endif">
                                        <div class="form-group">
                                            <label>Date Advertised : <sup class="text-danger">*</sup></label>
                                            <input type="date" class="form-control" name="date_advertised" wire:model="date_advertised" value="{{ old('date_advertised') }}"/>
                                            @error('date_advertised')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group" wire:ignore>
                                            <label>Jobvacancy category:</label>
                                            <select name="jobvacancy_category_id" id="jobvacancy_category_id" class="form-control select2" wire:model="jobvacancy_category_id" required>
                                                <option>--- select jobvacancy category ---</option>
                                                @foreach ($job_categories as $id => $job_category)
                                                    <option value="{{$id}}">{{$job_category}}</option>
                                                @endforeach
                                            </select>
                                            @error('jobvacancy_category_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Occupational group:</label>
                                            <input type="text" class="form-control" wire:model="occupational_group">
                                            @error('occupational_group')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Minimum Required Relevant Job Experience (Years):</label>
                                            <input type="number" class="form-control" name="minimum_required_job_experience" wire:model="minimum_required_job_experience" value="{{ old('minimum_required_job_experience') }}" min="0" step="1">
                                            @error('minimum_required_job_experience')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group" wire:ignore>
                                            <label>Minimum Required Level of Qualification:</label>
                                            <select name="minimum_required_qualification" id="minimum_required_qualification" wire:model="minimum_required_qualification" class="form-control select2" required>
                                                <option>Select qualification</option>
                                                @foreach ($qualifications as $id => $qualification)
                                                    <option value="{{$qualification}}">{{$qualification}}</option>
                                                @endforeach
                                            </select>
                                            @error('minimum_required_qualification')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group" wire:ignore>
                                            <label>Field(s) of Study:</label>
                                            <select id="fields_of_study" class="form-control select2" multiple="multiple" wire:model="fields_of_study" required>
                                                <option>Select field of study</option>
                                                @foreach ($fields as $id => $field)
                                                    <option value="{{$field}}">{{$field}}</option>
                                                @endforeach
                                            </select>
                                            @error('fields_of_study')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group" wire:ignore>
                                            <label>Job Status: <sup class="text-danger">*</sup></label>
                                            <select id="job_status" class="form-control select2" wire:model="job_status" required>
                                                <option>Select job status</option>
                                                <option value="permanent">Permanent</option>
                                                <option value="temporary">Temporary</option>
                                                <option value="contract">Contract</option>
                                            </select>
                                            @error('job_status')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Institution: <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="institution" wire:model="institution" value="{{ old('institution') }}">
                                            @error('institution')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group" wire:ignore>
                                            <label>Region: <sup class="text-danger">*</sup></label>
                                            <select name="region_id" id="region_id" class="form-control select2" wire:model="region_id" required>
                                                <option>Select regions</option>
                                                @foreach ($regions as $id => $region)
                                                    <option value="{{$id}}">{{$region}}</option>
                                                @endforeach
                                            </select>
                                            @error('region_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group" wire:ignore>
                                            <label>District: <sup class="text-danger">*</sup></label>
                                            <select name="district_id" id="district_id" class="form-control select2" wire:model="district_id" required>
                                                <option>Select district</option>
                                                @foreach ($districts as $id => $district)
                                                    <option value="{{$id}}">{{$district}}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group" wire:ignore>
                                            <label>Local goverment area: <sup class="text-danger">*</sup></label>
                                            <select name="localgoverment_area_id" id="localgoverment_area_id" class="form-control select2" wire:model="localgoverment_area_id" required>
                                                <option>Select local goverment area</option>
                                                @foreach ($lgas as $id => $lga)
                                                    <option value="{{$id}}">{{$lga}}</option>
                                                @endforeach
                                            </select>
                                            @error('localgoverment_area_id')
                                                <span class="text-danger mt-1">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary mr-1">Submit</button>
                                            <a href="{{route('researchdevelopment.job-vacancies.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
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
