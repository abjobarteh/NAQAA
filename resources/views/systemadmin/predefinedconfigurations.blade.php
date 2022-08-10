@extends('layouts.admin')
@section('page-title')
    Predefine Configurations
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Predefined Configurations</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="d-flex flex-row mb-3"><i class="fas fa-school fa-3x text-primary"></i>
                            <div class="d-flex flex-column ml-2"><span class="text-black-50">Fields of Education</span></div>
                        </div>
                        <h6>Manage or add new Fields of Education.</h6>
                        <a href="{{route('admin.education-fields.index')}}"><div class="d-flex justify-content-between install mt-3"><span class="text-primary">View&nbsp;<i class="fa fa-angle-right"></i></span></div></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="d-flex flex-row mb-3"><i class="fas fa-clipboard-list fa-3x text-primary"></i>
                            <div class="d-flex flex-column ml-2"><span class="text-black-50">SubFields of Education</span></div>
                        </div>
                        <h6>Manage or create new SubFields for Fields of Education.</h6>
                        <a href="{{route('admin.education-subfields.index')}}"><div class="d-flex justify-content-between install mt-3"><span class="text-primary">View&nbsp;<i class="fa fa-angle-right"></i></span></div></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="d-flex flex-row mb-3"><i class="fas fa-tags fa-3x text-info"></i>
                            <div class="d-flex flex-column ml-2"><span class="text-black-50">Training Provider Staff Ranks</span></div>
                        </div>
                        <h6>Manage or create new Academic & Admin Staff Ranks for Training Providers.</h6>
                        <a href="{{route('admin.training-provider-staff-ranks.index')}}"><div class="d-flex justify-content-between install mt-3"><span class="text-primary">View&nbsp;<i class="fa fa-angle-right"></i></span></div></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="d-flex flex-row mb-3"><i class="fas fa-user-tag fa-3x text-secondary"></i>
                            <div class="d-flex flex-column ml-2"><span class="text-black-50">Training Provider Staff Roles</span></div>
                        </div>
                        <h6>Manage ore create new Academic & Admin Staff roles for Training Providers.</h6>
                        <a href="{{route('admin.training-provider-staff-roles.index')}}"><div class="d-flex justify-content-between install mt-3"><span class="text-primary">View&nbsp;<i class="fa fa-angle-right"></i></span></div></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="d-flex flex-row mb-3"><i class="fas fa-certificate fa-3x text-warning"></i>
                            <div class="d-flex flex-column ml-2"><span class="text-black-50">Qualification Levels</span></div>
                        </div>
                        <h6>Manage or add new Qualification Levels</h6>
                        <a href="{{route('admin.qualification-levels.index')}}"><div class="d-flex justify-content-between install mt-3"><span class="text-primary">View&nbsp;<i class="fa fa-angle-right"></i></span></div></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="d-flex flex-row mb-3"><i class="fas fa-layer-group fa-3x text-indigo"></i>
                            <div class="d-flex flex-column ml-2"><span class="text-black-50">Training Provider Classifications</span></div>
                        </div>
                        <h6>Manage or create new Training Provider Classifications.</h6>
                        <a href="{{route('admin.training-provider-classifications.index')}}"><div class="d-flex justify-content-between install mt-3"><span class="text-primary">View&nbsp;<i class="fa fa-angle-right"></i></span></div></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="d-flex flex-row mb-3"><i class="fas fa-chalkboard-teacher fa-3x text-teal"></i>
                            <div class="d-flex flex-column ml-2"><span class="text-black-50">Training Provider Ownerships</span></div>
                        </div>
                        <h6>Manage or create new Training Provider Ownerships.</h6>
                        <a href="{{route('admin.training-provider-ownerships.index')}}"><div class="d-flex justify-content-between install mt-3"><span class="text-primary">View&nbsp;<i class="fa fa-angle-right"></i></span></div></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="d-flex flex-row mb-3"><i class="fas fa-box fa-3x text-primary"></i>
                            <div class="d-flex flex-column ml-2"><span class="text-black-50">Training Provider Categories</span></div>
                        </div>
                        <h6>Manage or create new Training Provider categories.</h6>
                        <a href="{{route('admin.training-provider-categories.index')}}"><div class="d-flex justify-content-between install mt-3"><span class="text-primary">View&nbsp;<i class="fa fa-angle-right"></i></span></div></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="d-flex flex-row mb-3"><i class="fas fa-building fa-3x text-success"></i>
                            <div class="d-flex flex-column ml-2"><span class="text-black-50">Award Bodies</span></div>
                        </div>
                        <h6>Manage or Add new Award qualification awarding bodies.</h6>
                        <a href="{{route('admin.awarding-bodies.index')}}"><div class="d-flex justify-content-between install mt-3"><span class="text-primary">View&nbsp;<i class="fa fa-angle-right"></i></span></div></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="d-flex flex-row mb-3"><i class="fas fa-cash-register fa-3x text-info"></i>
                            <div class="d-flex flex-column ml-2"><span class="text-black-50">Application Fees</span></div>
                        </div>
                        <h6>Manage or add new Application fees tariffs/amounts .</h6>
                        <a href="{{route('admin.application-fees-tariffs.index')}}"><div class="d-flex justify-content-between install mt-3"><span class="text-primary">View&nbsp;<i class="fa fa-angle-right"></i></span></div></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="d-flex flex-row mb-3"><i class="fas fa-bars fa-3x text-success"></i>
                            <div class="d-flex flex-column ml-2"><span class="text-black-50">Jobvacancy Categories</span></div>
                        </div>
                        <h6>Manage or add new Jobvacancy categories .</h6>
                        <a href="{{route('admin.jobvacancies-category.index')}}"><div class="d-flex justify-content-between install mt-3"><span class="text-primary">View&nbsp;<i class="fa fa-angle-right"></i></span></div></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="d-flex flex-row mb-3"><i class="fas fa-language fa-3x text-primary"></i>
                            <div class="d-flex flex-column ml-2"><span class="text-black-50">Local languages</span></div>
                        </div>
                        <h6>Manage or add new local languages spoken.</h6>
                        <a href="{{route('admin.local-languages.index')}}"><div class="d-flex justify-content-between install mt-3"><span class="text-primary">View&nbsp;<i class="fa fa-angle-right"></i></span></div></a>
                    </div>
                </div>
                <!-- // New configuration for Mode of delivery-->
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="d-flex flex-row mb-3"><i class="fas fa-language fa-3x text-primary"></i>
                            <div class="d-flex flex-column ml-2"><span class="text-black-50">Mode of Delivery</span></div>
                        </div>
                        <h6>Manage or add new Mode of Delivery.</h6>
                        <a href="{{route('admin.mode-of-delivery.index')}}"><div class="d-flex justify-content-between install mt-3"><span class="text-primary">View&nbsp;<i class="fa fa-angle-right"></i></span></div></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection