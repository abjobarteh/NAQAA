@extends('layouts.admin')
@section('page-title')
    View Research Survey Detail
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Research Survey Detail</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item">
                      <a href="{{route('researchdevelopment.research-survey-documentation.index')}}">Research Survey</a>
                   </li>
                  <li class="breadcrumb-item active">Research Survey Detail</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Research Survey Detail</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="form-group row">
                            <b class="text-primary col-sm-4">Research Topic:</b>
                            <p class="text-muted col-sm-8">{{$survey[0]->research_topic}}</p>
                        </div>
                        <div class="form-group row">
                            <b class="text-primary col-sm-4">Publisher:</b>
                            <p class="text-muted col-sm-8">{{$survey[0]->publisher}}</p>
                        </div>
                        <div class="form-group row">
                            <b class="text-primary col-sm-4">Publication Date:</b>
                            <p class="text-muted col-sm-8">{{$survey[0]->publication_date}}</p>
                        </div>
                        <div class="form-group row">
                            <b class="text-primary col-sm-4">Funded By:</b>
                            <p class="text-muted col-sm-8">{{$survey[0]->funded_by}}</p>
                        </div>
                        <div class="form-group row">
                            <b class="text-primary col-sm-4">Cost (GMD):</b>
                            <p class="text-muted col-sm-8">GMD {{$survey[0]->cost}}</p>
                        </div>
                        <div class="form-group row">
                            <b class="text-primary col-sm-4">Name of Authors:</b>
                            <ul class="list-unstyled col-sm-8">
                                @foreach ($survey[0]->name_of_authors as $author)
                                <li>
                                    <p class="text-sm text-muted">{{$author}}</p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-8">
                        <div class="form-group">
                            <b class="text-primary">Purpose:</b>
                            <p class="text-muted" disabled>{{$survey[0]->purpose}}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="form-group">
                            <b class="text-primary">Key Findings:</b>
                            <p class="text-muted" disabled>{{$survey[0]->key_findings}}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="form-group">
                            <b class="text-primary">Recommendation:</b>
                            <p class="text-muted" disabled>{{$survey[0]->recommendation}}</p>
                        </div>
                        <div class="divider"></div>
                        <div class="form-group">
                            <b class="text-primary">Remarks:</b>
                            <p class="text-muted" disabled>{{$survey[0]->remarks}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <a href="{{route('researchdevelopment.research-survey-documentation.index')}}" class="btn btn-warning text-white"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection