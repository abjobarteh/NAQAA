@extends('layouts.admin')
@section('page-title')
    Education/Training Provider Registrations
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                <h1 class="m-0">Education/Training Providers Registrations</h1>
                </div><!-- /.col -->
                <div class="col-sm-12 col-md-6">
                    <a href="{{route('registration-accreditation.registration.trainingproviders.create')}}" 
                        class="btn btn-primary btn-flat float-right">
                        <i class="fas fa-plus"></i>
                        New Education/Training provider Registration
                    </a>
                </div><!-- /.col -->
                <div class="col-12">
                    <div class="card m-2">
                        <div class="card-body">
                            <form id="filter-trainingprovider-applications">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Region: <sup class="text-danger">*</sup></label>
                                            <select name="region_id" id="region_id" class="form-control select2" required>
                                                <option value="">Select regions</option>
                                                @foreach ($regions as $id => $region)
                                                    <option value="{{$id}}">{{$region}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>District: <sup class="text-danger">*</sup></label>
                                            <select name="district_id" id="district_id" class="form-control select2" required>
                                                <option value="">Select district</option>
                                                @foreach ($districts as $id => $district)
                                                    <option value="{{$id}}">{{$district}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Town/Village: <sup class="text-danger">*</sup></label>
                                            <select name="town_village_id" id="town_village_id" class="form-control select2">
                                                <option value="">Select Town/village</option>
                                                @foreach ($townvillages as $id => $townvillage)
                                                    <option value="{{$id}}">{{$townvillage}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-12 col-md-4 col-lg-4">
                                       <!-- Date range -->
                                        <div class="form-group">
                                            <label>Date range:</label>
                        
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control float-right" id="application-daterange">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->
                                    </div> --}}
                                    <div class="col-md-12 mt-2">
                                        <button type="button" class="btn btn-info btn-block" id="filter-trainingproviders">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="roe">
                <div class="col-12">
                    <div class="card trainingprovider-card">
                        <div class="card-header">
                            <h3 class="card-title">Education/Training Providers Registration lists</h3>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table datatable table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Location</th>
                                        <th>Contact Numbers</th>
                                        <th>Classification</th>
                                        <th>Application No.</th>
                                        <th>Application type</th>
                                        <th>Application status</th>
                                        <th>Application Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($registrations as $registration)
                                        <tr>
                                            <td>{{$registration->trainingprovider->name}}</td>
                                            <td>{{$registration->trainingprovider->email}}</td>
                                            <td>{{$registration->trainingprovider->district->name ?? 'N/A'}},  {{$registration->trainingprovider->address}}</td>
                                            <td>{{$registration->trainingprovider->telephone_work ?? $registration->trainingprovider->mobile_phone}} , <br> {{$registration->trainingprovider->mobile_phone}}</td>
                                            <td>{{$registration->trainingprovider->classification->name}}</td>
                                            <td>{{$registration->application_no}}</td>
                                            <td>
                                                <span class="badge badge-info">
                                                    {{$registration->application_type}}
                                                 </span>
                                            </td>
                                            <td>
                                                <span class="badge {{$registration->status === 'Approved' ? 'badge-success' : 'badge-warning'}}">
                                                    {{$registration->status}}
                                                 </span>
                                            </td>
                                            <td>{{$registration->application_date->toFormattedDateString()}}</td>
                                            <td>
                                                <a href="{{route('registration-accreditation.registration.trainingproviders.edit',$registration->id)
                                                    }}" class="btn btn-sm btn-danger"
                                                    title="edit training provider details"
                                                    >
                                                    <i class="fas fa-edit"></i>    
                                                </a>
                                                <a href="{{route('registration-accreditation.registration.trainingproviders.show',$registration->id)
                                                    }}" class="btn btn-sm btn-info"
                                                    title="view training provider details"
                                                    >
                                                    <i class="fas fa-eye"></i>    
                                                </a>
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

@section('scripts')
<script>
        //Date range picker
        $('#application-daterange').daterangepicker()

        $('#filter-trainingproviders').click(function(e){
        e.preventDefault()
        let region = $('#region_id').val()
        let district = $('#district_id').val()
        let town_village = $('#town_village_id').val()
        let errors = []
        
        let data = {
            region:region,
            district:district,
            town_village:town_village,
        }

        if(region == "" && district == "" && town_village == ""){
            Swal.fire({
                title: 'Invalid Parameters',
                text: 'No Parameter selected. Please select a parameter to filter by!',
                icon: 'error',
                confirmButtonText: 'Close'
            })
            errors.push('empty_paramters_error')
            return;
        }

        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({  
                        method:"POST",  
                        url:"{{ route('registration-accreditation.registration.filter-trainingproviders') }}",  
                        data: data,
                        type:'json',
                        success:function(response)  
                        {
                            response = JSON.parse(response)
                            // console.log(response)
                            if(response.status == 404)
                            {
                                Swal.fire({
                                    title: 'No Results',
                                    text: response.message,
                                    icon: 'success',
                                    confirmButtonText: 'Close'
                                })
                            }
                            if(response.status == 200){
                                let temp = '<table id="example1" class="table datatable table-bordered table-hover">'+
                                                '<thead>'+
                                                    '<tr>'+
                                                        '<th></th>'+
                                                        '<th>Name</th>'+
                                                        '<th>Email</th>'+
                                                        '<th>Address</th>'+
                                                        '<th>Contact Numbers</th>'+
                                                        '<th>Classification</th>'+
                                                        '<th>Category</th>'+
                                                        '<th>Region</th>'+
                                                        '<th>District</th>'+
                                                        '<th>Town/Village</th>'+
                                                        '<th>License status</th>'+
                                                        '<th>License start date</th>'+
                                                        '<th>License end date</th>'+
                                                    '</tr>'+
                                                '</thead>'+
                                                '<tbody>';
                                                    $.each(response.data, function(index,val){
                                                        console.log(val)
                                                        temp+='<tr>'+
                                                                    `<td>${index+1}</td>`+
                                                                    `<td>${val.name}</td>`+
                                                                    `<td>${val.email}</td>`+
                                                                    `<td>${val.address}</td>`+
                                                                    `<td>${val.telephone_work},${val.mobile_phone}</td>`+
                                                                    `<td>${val.classification.name}</td>`+
                                                                    `<td>${val.category.name}</td>`+
                                                                    `<td>${val.region.name}</td>`+
                                                                    `<td>${val.district.name}</td>`+
                                                                    `<td>${val.town_village.name}</td>`+
                                                                    `<td><span class="badge badge-success">${val.valid_licence.license_status}</span></td>`+
                                                                    `<td>${val.valid_licence.licence_start_date}</td>`+
                                                                    `<td>${val.valid_licence.licence_end_date}</td>`+
                                                                '</tr>';
                                                    })
                                                temp+='</tbody>'+
                                            '</table>';
                                    $('.trainingprovider-card .card-body').empty().append(temp)
                                    $('.trainingprovider-card .card-title').empty().append(response.data.length+' Registered Training Provider results found')
                                    $("#example1").DataTable({
                                        "responsive": true, "lengthChange": true, "autoWidth": false,"paging": true,
                                        "lengthChange": true,"ordering": true,"info": true,
                                        "searching": true,
                                        "buttons": [ "csv", "excel", "pdf", "print"]
                                    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                            }
                        },
                        error: function(err)
                        {
                            Swal.fire({
                                title: 'Error',
                                text: err.responseJSON.message,
                                icon: 'error',
                                confirmButtonText: 'Close'
                            })
                        }  
                });
    })
</script>
@endsection