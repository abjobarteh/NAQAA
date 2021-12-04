<div>
    @section('page-title','Learning Center Report')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Learning Center Report</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Learning Center reports</h3>
                </div>
                
                <div class="card-body">
                    <form wire:submit.prevent="getReport">
                        <div class="row">
                            @if($is_classification)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="classification">Classification:</label>
                                    <select class="form-control custom-select" wire:model="classification">
                                        <option>--- select classification ---</option>
                                        @foreach ($classifications as $id => $name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @elseif($is_ownership)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="ownership">Ownership:</label>
                                    <select class="form-control custom-select" wire:model="ownership">
                                        <option>--- select ownership ---</option>
                                        @foreach ($ownerships as $id => $name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @elseif($is_programme)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="programme">Programme:</label>
                                    <select class="form-control custom-select" wire:model="programme">
                                        <option>--- select field of education ---</option>
                                        @foreach ($programmes as $id => $name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="level">Level:</label>
                                    <select class="form-control custom-select" wire:model="level">
                                        <option>--- select level ---</option>
                                        @foreach ($levels as $id => $name)
                                            <option value="{{$name}}">{{$name}}</option>
                                        @endforeach
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
                            @elseif($is_district)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="district">District:</label>
                                    <select class="form-control custom-select" wire:model="district">
                                        <option>--- select district ---</option>
                                        @foreach ($districts as $id => $district)
                                            <option value="{{$id}}">{{$district}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-flat">Generate</button>
                                    <a class="btn btn-warning btn-flat" href="{{route('registration-accreditation.reports.learning-centers')}}">
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

