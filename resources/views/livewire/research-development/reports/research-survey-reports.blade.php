<div>
    @section('page-title','Research or Survey Documentation Report')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Research or Survey Dcoumentation Report</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Research survey reports</h3>
                </div>
                
                <div class="card-body">
                    <form wire:submit.prevent="getReport">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="research_topic">Research Topic</label>
                                    <input type="text" class="form-control" id="research_topic" wire:model="research_topic" placeholder="Research topic">
                                    @error('research_topic')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="research_purpose">Research Purpose</label>
                                    <input type="text" class="form-control" id="research_purpose" wire:model="research_purpose" placeholder="Research purpose">
                                    @error('research_purpose')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="main_findings">Main Findings</label>
                                    <input type="text" class="form-control" id="main_findings" wire:model="main_findings" placeholder="main findings">
                                    @error('main_findings')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="authors">Research Authors</label>
                                    <input type="text" class="form-control" id="Authors" wire:model="authors" placeholder="Research authors">
                                    @error('authors')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="publication_date">Publication Date</label>
                                    <input type="text" class="form-control" id="publication_date" wire:model="publication_date" placeholder="Publication date">
                                    @error('publication_date')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="funding_body">Research Purpose</label>
                                    <input type="text" class="form-control" id="funding_body" wire:model="funding_body" placeholder="Funding body">
                                    @error('funding_body')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <div class="form-group">
                                    <button class="btn btn-success btn-flat"><i class="fas fa-file-export"></i> Generate Report</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
