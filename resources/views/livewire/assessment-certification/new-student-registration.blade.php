<div>
    @section('page-title','New Student Registration')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Student Registration</h1>
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
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title"><i class="fas fa-plus"></i> New Student Registration</h3>
                            </div>
                            <div class="col-md-6 d-flex flex-direction-row justify-content-end">
                                <a href="{{route('assessment-certification.registrations.index')}}" class="btn btn-success btn-flat"><i class="fas fa-list"></i> Registered Students</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($is_error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{$error_msg}}
                                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form wire:submit.prevent="storeStudentRegistration" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group" wire:ignore>
                                        <label>Institution: <sup class="text-danger">*</sup></label>
                                        <select wire:model="training_provider_id" id="training_provider_id" class="form-control select2" required>
                                            <option value="">---select institution---</option>
                                            @foreach ($institutions as $id => $institution)
                                                <option value="{{$id}}">{{$institution}}</option>
                                            @endforeach
                                        </select>
                                        @error('training_provider_id')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group" wire:ignore>
                                        <label>Candidate Type: <sup class="text-danger">*</sup></label>
                                        <select wire:model="candidate_type" id="candidate_type" class="form-control select2" required>
                                            <option value="">---select candidate type---</option>
                                            <option value="private">Private</option>
                                            <option value="regular">Regular</option>
                                        </select>
                                        @error('candidate_type')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Academic Year: <sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control" wire:model="academic_year" required>
                                        @error('academic_year')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>First Name: <sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control" wire:model="firstname" required>
                                        @error('firstname')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Middle Name:</label>
                                        <input type="text" class="form-control" wire:model="middlename">
                                        @error('middlename')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Last Name: <sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control" wire:model="lastname" required>
                                        @error('lastname')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group" wire:ignore>
                                        <label>Gender: <sup class="text-danger">*</sup></label>
                                        <select wire:model="gender" id="gender" class="form-control select2" required>
                                            <option value="">Select gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        @error('gender')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth: <sup class="text-danger">*</sup></label>
                                        <input type="date" class="form-control" wire:model="date_of_birth" required/>
                                        @error('date_of_birth')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group" wire:ignore>
                                        <label>Country of Origin: <sup class="text-danger">*</sup></label>
                                        <select wire:model="nationality" id="nationality" class="form-control select2" required>
                                            <option value="">--- select country of origin ---</option>
                                            @foreach ($nationalities as $id => $nationality)
                                                <option value="{{$nationality}}">{{$nationality}}</option>
                                            @endforeach
                                        </select>
                                        @error('nationality')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group" wire:ignore>
                                        <label>Preferred Assessment Language:</label>
                                        <select wire:model="local_language" id="local_language" class="form-control select2">
                                            <option value="">--- select local language spoken ---</option>
                                            @foreach ($local_languages as $id => $local_language)
                                                <option value="{{$local_language}}">{{$local_language}}</option>
                                            @endforeach
                                        </select>
                                        @error('local_language')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group" wire:ignore>
                                        <label>Ethnicity:</label>
                                        <select wire:model="ethnicity" id="ethnicity" class="form-control select2">
                                            <option value="">--- select local language spoken ---</option>
                                            @foreach ($local_languages as $id => $local_language)
                                                <option value="{{$local_language}}">{{$local_language}}</option>
                                            @endforeach
                                        </select>
                                        @error('ethnicity')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Address: <sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control" wire:model="address" required>
                                        @error('address')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" class="form-control" wire:model="email">
                                        @error('email')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Contact Number: <sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control" wire:model="phone" required>
                                        @error('phone')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="@if($hide_unit_standards) col-sm-6 @endif col-sm-4">
                                    <div class="form-group" wire:ignore>
                                        <label>Programme: <sup class="text-danger">*</sup></label>
                                        <select wire:model="programme_id" id="programme_id" class="form-control select2" required>
                                            <option value="">---select programme---</option>
                                            @foreach ($programmes as $id => $programme)
                                                <option value="{{$id}}">{{$programme}}</option>
                                            @endforeach
                                        </select>
                                        @error('programme_id')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="@if($hide_unit_standards) col-sm-6 @endif col-sm-4">
                                    <div class="form-group" wire:ignore>
                                        <label>level: <sup class="text-danger">*</sup></label>
                                        <select wire:model="programme_level_id" id="programme_level_id" class="form-control select2" required>
                                            <option value="">---select programme level---</option>
                                            @foreach ($levels as $id => $level)
                                                <option value="{{$id}}">{{$level}}</option>
                                            @endforeach
                                        </select>
                                        @error('programme_level_id')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                @if (!$hide_unit_standards)
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Unit Standards: <sup class="text-danger">*</sup></label>
                                        <select wire:model="student_unit_standards" id="student_unit_standards" class="form-control custom-select" multiple required>
                                            <option value="">---select unit standards---</option>
                                            @foreach ($unit_standards as $id => $level)
                                                <option value="{{$level->unit_standard_title}}">{{$level->unit_standard_title}}</option>
                                            @endforeach
                                        </select>
                                        @error('programme_level_id')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div> 
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group" wire:ignore>
                                        <label>Regions:</label>
                                        <select wire:model="region_id" id="region_id" class="form-control select2">
                                            <option value="">---select region---</option>
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
                                        <select wire:model="district_id" id="district_id" class="form-control select2">
                                            <option value="">---select district---</option>
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
                                        <label>Town/Vllage: <sup class="text-danger">*</sup></label>
                                        <select wire:model="town_village_id" id="town_village_id" class="form-control select2">
                                            <option value="">---select town/village---</option>
                                            @foreach ($townvillages as $id => $townvillage)
                                                <option value="{{$id}}">{{$townvillage}}</option>
                                            @endforeach
                                        </select>
                                        @error('town_village_id')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Picture: <sup class="text-danger">*</sup></label>
                                        <input type="file" class="form-control" wire:model="picture">
                                        @error('picture')
                                            <span class="text-danger mt-1">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary mr-1">Save Registration</button>
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
