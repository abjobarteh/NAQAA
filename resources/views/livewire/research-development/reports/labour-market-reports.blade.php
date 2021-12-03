<div>
    @section('page-title','Labour Market Reports')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Labour Market</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Labour Market Reports</h3>
                </div>
                
                <div class="card-body">
                    <form wire:submit.prevent="getReport">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="date_advertised">Date Advertised:</label>
                                <input type="text" id="date_advertised" class="form-control" wire:model="date_advertised" placeholder="Enter date advertised">
                            </div>
                        </div>
                        @if($is_position_advertised)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="position_advertised">Position Advertised:</label>
                                <input type="text" id="position_advertised" class="form-control" wire:model="position_advertised" placeholder="Enter Position advertised">
                            </div>
                        </div>
                        @elseif($is_field_of_education)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="education_field">Field of Education:</label>
                                <select id="education_field" class="form-control custom-select" wire:model="education_field">
                                    <option value="">--- select field of education ---</option>
                                    @foreach ($fields_of_education as $id => $name)
                                        <option value="{{$name}}">{{$name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @elseif($is_employer_type)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="employer_type">Employer Type:</label>
                                <input type="text" class="form-control" placeholder="Enter employer type" wire:model="employer_type">
                            </div>
                        </div>
                        @elseif($is_job_status)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="education_level">Job Status:</label>
                                <select id="job_status" class="form-control custom-select" wire:model="job_status">
                                    <option value="">--- select job status ---</option>
                                    <option value="permanent">Permanent</option>
                                    <option value="temporary">Temporary</option>
                                    <option value="contract">Contract</option>
                                </select>
                            </div>
                        </div>
                        @elseif($is_minimum_qualification)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="minimum_qualification">Minimum Qualification:</label>
                                <select id="minimum_qualification" class="form-control custom-select" wire:model="minimum_qualification">
                                    <option value="">--- select minimum qualification ---</option>
                                    @foreach ($levels as $id => $name)
                                        <option value="{{$id}}">{{$name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @elseif($is_occupational_area)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="occupational_area">Occupational Area:</label>
                                <input type="text" class="form-control" placeholder="Enter occuptational area" wire:model="occupational_area">
                            </div>
                        </div>
                        @elseif($is_work_experience)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="work_experience">Years of Experience:</label>
                                <input type="text" class="form-control" placeholder="Enter years of work experience" wire:model="work_experience">
                            </div>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary btn-flat">Generate</button>
                                <a class="btn btn-warning btn-flat" href="{{route('researchdevelopment.reports.labour-market')}}">
                                    <i class="fas fa-arrow-left"></i> 
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
