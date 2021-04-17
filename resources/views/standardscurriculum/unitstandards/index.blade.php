@extends('layouts.admin')
@section('page-title')
    Unit Standards
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Unit Standards Developed</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    @can('create_unit_standards')
                        <a href="{{route('standardscurriculum.unit-standards.create')}}" 
                            class="btn btn-primary float-right">
                            New Unit Standard
                        </a>
                    @endcan
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="roe">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Unit Standards Lists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Unit Standard Name</th>
                                        <th>Unit Standard Code</th>
                                        <th>Minimum Required Hours</th>
                                        <th>Validated</th>
                                        <th>Field of Education</th>
                                        <th>Sub Field of Education</th>
                                        <th>Qualification Level</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($unitstandards as $unitstandard)
                                        <tr>
                                            <td>{{$unitstandard->unit_standard_title}}</td>
                                            <td>{{$unitstandard->unit_standard_code}}</td>
                                            <td>{{$unitstandard->minimum_required_hours}}</td>
                                            <td>{{$unitstandard->validated}}</td>
                                            <td>{{$unitstandard->fieldOfEducation->name}}</td>
                                            <td>{{$unitstandard->subFieldOfEducation->name}}</td>
                                            <td>{{$unitstandard->levelOfQualification->name}}</td>
                                            <td>
                                                @can('edit_unit_standards')
                                                    <a href="{{route('standardscurriculum.unit-standards.edit',$unitstandard->id)
                                                        }}" class="btn btn-sm btn-danger"
                                                        title="edit unit standard details"
                                                        >
                                                        <i class="fas fa-edit"></i>    
                                                    </a>
                                                @endcan
                                                @can('show_unit_standards')
                                                    <a href="{{route('standardscurriculum.unit-standards.show',$unitstandard->id)
                                                        }}" class="btn btn-sm btn-info"
                                                        title="view unit standard details"
                                                        >
                                                        <i class="fas fa-eye"></i>    
                                                    </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection