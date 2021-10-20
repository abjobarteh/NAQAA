<div>
    @section('page-title','Research or Survey Documentation Report')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Research or Survey Documentation Report</h1>
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
                            @if($is_research_topic)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="research_topic">Research Topic:</label>
                                    <input type="text" class="form-control" placeholder="Enter research topic">
                                </div>
                            </div>
                            @elseif($is_research_purpose)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="research_purpose">Research Purpose:</label>
                                    <input type="text" class="form-control" placeholder="Enter research purpose">
                                </div>
                            </div>
                            @elseif($is_main_findings)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="main_findings">Main Findings:</label>
                                    <input type="text" class="form-control" placeholder="Enter research main findings">
                                </div>
                            </div>
                            @elseif($is_authors)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="authors">Author:</label>
                                    <input type="text" class="form-control" placeholder="Enter author full name">
                                </div>
                            </div>
                            @elseif($is_publication_date)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="publication_date">Publication Date:</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            @elseif($is_funding_body)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="funding_body">Funding body:</label>
                                    <input type="text" class="form-control" placeholder="Enter funding body">
                                </div>
                            </div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-flat">Generate</button>
                                    <a class="btn btn-warning btn-flat" href="{{route('researchdevelopment.reports.research-survey')}}">
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
