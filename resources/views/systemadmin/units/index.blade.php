@extends('layouts.admin')
@section('page-title')
    Units
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Units</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Units</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row mt-2 mb-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-header show-header" style="display: none">
                        <div class="alert alert-danger error-display">

                        </div>
                    </div>
                    <div class="card-body">
                        <form id="add-units">
                            <div class="row">
                                <div class="col-sm-12 mb-2">
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <select class="form-control select2" style="width: 100%;" name="directorate" required>
                                                <option selected>Select directorate</option>
                                                @forelse ($directorates as $key => $value)  
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @empty
                                                    <option>No Directorates registered in the system</option>
                                                @endforelse
                                              </select>
                                              <div class="mt-1 mb-1">
                                                @error('directorate')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-success btn-block" id="add-input" type="button">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="inputs">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                          <input type="text" class="form-control" placeholder="Enter unit name" name="name[]">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-info btn-block">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header --> 
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">Units List</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table datatable table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Directorate</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($units as $unit)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $unit->name }}</td>
                                    <td>{{ $unit->directorate->name }}</td>
                                    <td>
                                        @can('edit_unit')
                                        <a href="{{ route('admin.units.edit', $unit->id) }}" class="btn btn-danger"><i class="fas fa-edit "></i> Edit</a>
                                       @endcan
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-bold">No registered Units in the system</td>
                                    </tr>
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

@section('scripts')
        <script>
            $(document).ready(function(){
                let i = 1;
                $('#add-input').click(function(e){
                    e.preventDefault();
                    i++;
                    let input =  `<div class="row" id="row${i}">`+
                                    '<div class="col-md-6">'+
                                        '<div class="form-group">'+
                                             `<input type="text" class="form-control" placeholder="Enter unit name" name="name[]">`+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-2">'+
                                        '<div class="form-group">'+
                                            `<button class="btn btn-danger btn-block btn-remove" type="button" id="${i}">Remove</button>`+
                                        '</div>'+
                                    '</div>'+
                                '</div>';

                                $('#inputs').append(input);
                })


                $(document).on('click', '.btn-remove', function(){  
                    var button_id = $(this).attr("id");   
                    $('#row'+button_id+'').remove();  
                });  

                $(document).on('submit', '#add-units', function(e){  
                    e.preventDefault()

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({  
                            url:"{{ route('admin.units.store') }}",  
                            method:"POST",  
                            data:$('#add-units').serialize(),
                            type:'json',
                            success:function(data)  
                            {
                                if(data.success == 200)
                                {
                                    toastr.success('Units Sucessfully created')

                                    location.reload()
                                }
                            },
                            error: function(err)
                            {
                                let el = '<ul>';
            
                                $.each(err.responseJSON.errors, function(i,val){
                                     el += `<li>${val}</li>`;
                                })

                                    el += '</ul>';
                                    $(".show-header").css('display','block');
                                    $('.error-display').append(el);
                            }  
                    });   
                });  

            })
        </script>
@endsection