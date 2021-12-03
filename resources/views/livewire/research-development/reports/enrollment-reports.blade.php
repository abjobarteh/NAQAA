<div>
    @section('page-title','Enrollment Reports')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Learner Achievements Enrollment</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Learner Achievements Enrollment Reports</h3>
                </div>
                
                <div class="card-body">
                    <form wire:submit.prevent="getReport">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="research_topic">Enrollment Year:</label>
                                <input type="text" id="enrollment_year" class="form-control" wire:model="enrollment_year" placeholder="Enter Enrollment Year">
                            </div>
                        </div>
                        @if($is_classification)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="research_topic">Classification:</label>
                                <select id="classification" class="form-control custom-select" wire:model="classification">
                                    <option value="">--- select classification ---</option>
                                    @foreach ($classifications as $id => $name)
                                        <option value="{{$id}}">{{$name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @elseif($is_programme)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="programme">Programme:</label>
                                <input type="text" class="form-control" placeholder="Enter programme name" wire:model="programme">
                            </div>
                        </div>
                        @elseif($is_education_field)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="research_topic">Field of Education:</label>
                                <select id="education_field" class="form-control custom-select" wire:model="education_field">
                                    <option value="">--- select field of education ---</option>
                                    @foreach ($fields_of_education as $id => $name)
                                        <option value="{{$name}}">{{$name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @elseif($is_level)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="research_topic">Education Level:</label>
                                <select id="level" class="form-control custom-select" wire:model="level">
                                    <option value="">--- select education level ---</option>
                                    @foreach ($levels as $id => $name)
                                        <option value="{{$id}}">{{$name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @elseif($is_lga_region)
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="research_topic">Region:</label>
                                <select id="region" class="form-control custom-select" wire:model="lga_region">
                                    <option value="">--- select region ---</option>
                                    @foreach ($regions as $id => $name)
                                        <option value="{{$id}}">{{$name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary btn-flat">Generate</button>
                                <a class="btn btn-warning btn-flat" href="{{route('researchdevelopment.reports.enrollments')}}">
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
