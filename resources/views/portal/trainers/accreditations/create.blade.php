@extends('layouts.portal')
@section('title','New Programme Accreditation')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="card-title">New Programme Accreditation Application</h4>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                            <a href="{{route('portal.trainer.accreditations.index')}}" class="btn btn-success btn-square mr-1"><i class="fas fa-list"></i> Accreditation Applications</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('portal.trainer.accreditations.store')}}" method="post" autocomplete="off">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="col-12"><h4 class="text-primary"><b>Trainer Accreditation Application Details</b></h4></div>
                                <div class="col-12">
                                    <table class="table" id="accreditation_areas_table">
                                        <thead>
                                            <tr>
                                                <th>Programme</th>
                                                <th>Level</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="area0">
                                                <td>
                                                    <input type="text" name="areas[]" class="form-control" placeholder="Enter accreditation area" />
                                                </td>
                                                <td>
                                                    <select name="levels[]" class="form-control custom-select">
                                                            <option value="">-- select level --</option>
                                                            @foreach ($levels as $id => $level)
                                                            <option value="{{$level}}">{{$level}}</option>
                                                        @endforeach
                                                        @error('levels')
                                                            <span class="text-danger mt-1">{{$message}}</span>
                                                        @enderror
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr id="area1"></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <button id="add_row" class="btn btn-info pull-left">+ Add Row</button>
                                    <button id='delete_row' class="float-right btn btn-danger">- Delete Row</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-primary mr-1">Submit Application</button>
                                    <a href="{{route('portal.trainer.accreditations.index')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            let row_number = 1;
            $("#add_row").click(function(e){
            e.preventDefault();
            let new_row_number = row_number - 1;
            $('#area' + row_number).html($('#area' + new_row_number).html()).find('td:first-child');
            $('#accreditation_areas_table').append('<tr id="area' + (row_number + 1) + '"></tr>');
            row_number++;
            });

            $("#delete_row").click(function(e){
            e.preventDefault();
            if(row_number > 1){
                $("#area" + (row_number - 1)).html('');
                row_number--;
            }
            });

        })
    </script>
@endsection