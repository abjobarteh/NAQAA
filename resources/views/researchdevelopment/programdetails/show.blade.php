@extends('layouts.admin')
@section('page-title')
    View Program Details Data Collection
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">{{$programdetail[0]->training_provider_name}} Data Collection details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6 col-md-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('researchdevelopment.datacollection.program-details.index')}}">
                                Program details data collection
                            </a>
                        </li>
                        <li class="breadcrumb-item active">{{$programdetail[0]->training_provider_name}} data collection details</li>
                    </ol>
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
                            <h3 class="card-title">Showing {{$programdetail[0]->program_name}} Data Collection details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Program Name: </label>
                                        <h5>{{$programdetail[0]->program_name}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Field of Education: </label>
                                        <h5>{{$programdetail[0]->educationfield->name}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Duration (in Months): </label>
                                        <h5>{{$programdetail[0]->duration}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Tuition Fee Per Year: </label>
                                        <h5>{{$programdetail[0]->tuition_fee_per_year}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Entry Requirements: </label>
                                        @if (isset($programdetail[0]->entry_requirements))
                                            @foreach($programdetail[0]->entry_requirements as $req)
                                                <span class="btn btn-sm btn-success m-1">{{$req}}</span>    
                                            @endforeach  
                                        @else
                                            <h5>N/A</h5> 
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Awarding Body: </label>
                                        <h5>{{$programdetail[0]->awarding_body}}</h5>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group d-flex align-items-center">
                                        <label class="mr-1">Learning Center: </label>
                                        <h5>{{$programdetail[0]->learningcenter->training_provider_name}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection