<div>
    @section('page-title','Qualification Report')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Qualification Report</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Qualification reports</h3>
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
                            @elseif($is_mode_of_delivery)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="main_findings">Mode of Delivery:</label>
                                   <input type="text" id="mode_of_delivery" wire:model="mode_of_delivery" class="form-control" placeholder="Enter mode of delivery">
                                </div>
                            </div>
                            @elseif($is_minimum_duration)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="main_findings">Minimum Duration (Months):</label>
                                   <input type="number" id="minimum_duration" wire:model="minimum_duration" class="form-control" placeholder="Enter minimum duration in months" min="0" step="1">
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
                                    <a class="btn btn-warning btn-flat" href="{{route('standardscurriculum.reports.qualification')}}">
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

