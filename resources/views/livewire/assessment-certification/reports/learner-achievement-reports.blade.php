<div>
    @section('page-title','Assessment Certification Report')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Assessment Certification Report</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Assessment Certification reports</h3>
                </div>
                
                <div class="card-body">
                    <form wire:submit.prevent="getReport">
                        <div class="row">
                            @if($is_institution_type)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="institution_type">Training Institution Type:</label>
                                    <select class="form-control custom-select" wire:model="institution_type">
                                        <option>--- select institution type ---</option>
                                        @foreach ($classifications as $id => $name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @elseif($is_programme)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="programme">Programme/Qualification:</label>
                                    <select class="form-control custom-select" wire:model="programme">
                                        <option>--- select programme ---</option>
                                        @foreach ($qualifications as $id => $name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @elseif($is_field_of_education)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field_of_education">Field of Education:</label>
                                    <select class="form-control custom-select" wire:model="field_of_education">
                                        <option>--- select field of education ---</option>
                                        @foreach ($fieldofEducations as $id => $name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @elseif($is_level)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="research_purpose">GSQF/NQF Level:</label>
                                    <select class="form-control custom-select" wire:model="level">
                                        <option>--- select level ---</option>
                                        @foreach ($levels as $id => $name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @elseif($is_qualification_type)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="main_findings">Qualification Type:</label>
                                    <select class="form-control custom-select" wire:model="qua;ification_type">
                                        <option>--- select qualification type ---</option>
                                        <option value="full">Full</option>
                                        <option value="partial">Partial</option>
                                    </select>
                                </div>
                            </div>
                            @elseif($is_certification_status)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="authors">Certification Status:</label>
                                    <select class="form-control custom-select" wire:model="certification_status">
                                        <option>--- select certification status ---</option>
                                        <option value="competent">Competent</option>
                                        <option value="notcompetent">Not Competent</option>
                                        <option value="incomplete">Incomplete</option>
                                    </select>
                                </div>
                            </div>
                            @elseif($is_region)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="region">Region:</label>
                                    <select class="form-control custom-select" wire:model="region">
                                        <option>--- select region ---</option>
                                        @foreach ($regions as $id => $region)
                                            <option value="{{$id}}">{{$region}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-flat">Generate</button>
                                    <a class="btn btn-warning btn-flat" href="{{route('assessment-certification.learner-achievements')}}">
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

