<div>
    @section('page-title','Unit Standard Report')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Unit Standard Report</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Unit Standard reports</h3>
                </div>
                
                <div class="card-body">
                    <form wire:submit.prevent="getReport">
                        <div class="row">
                            @if($is_field_of_education)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="research_topic">Field of Education:</label>
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
                            @elseif($is_validated)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="main_findings">Validated:</label>
                                    <select class="form-control custom-select" wire:model="validated">
                                        <option>--- select validation status ---</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                            @elseif($is_entry_requirements)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="authors">Entry Requirements:</label>
                                    <select class="form-control custom-select" wire:model="entry_requirements">
                                        <option>--- select entry requirements ---</option>
                                        @foreach ($levels as $id => $name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-flat">Generate</button>
                                    <a class="btn btn-warning btn-flat" href="{{route('standardscurriculum.reports.unit-standards')}}">
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

