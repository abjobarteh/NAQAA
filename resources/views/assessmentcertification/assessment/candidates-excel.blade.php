{{-- @extends('layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <table id="example2" class="table display nowrap table-bordered table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Birth Date</th>
                                            <th>Gender</th>
                                            <th>Contact Number</th>
                                            <th>Address</th>
                                            <th>Institution</th>
                                            <th>Programme</th>
                                            <th>Level</th>
                                            <th>Academic Year</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($candidates as $candidate)
                                            <tr>
                                                <td>{{$candidate->full_name}}</td>
                                                <td>{{$candidate->date_of_birth->toFormattedDateString()}}</td>
                                                <td>{{$candidate->gender}}</td>
                                                <td>{{$candidate->contact_number}}</td>
                                                <td>{{$candidate->address}}</td>
                                                <td>{{$candidate->institution->name ?? 'N/A'}}</td>
                                                <td>{{$candidate->programme->name ?? 'N/A'}}</td>
                                                <td>{{$candidate->level->name ?? 'N/A'}}</td>
                                                <td>{{$candidate->academic_year->toFormattedDateString()}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection --}}
<table id="example2" class="table display nowrap table-bordered table-hover" style="width:100%">
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Birth Date</th>
            <th>Gender</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Institution</th>
            <th>Programme</th>
            <th>Level</th>
            <th>Academic Year</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($candidates as $candidate)
            <tr>
                <td>{{$candidate->full_name}}</td>
                <td>{{$candidate->date_of_birth->toFormattedDateString()}}</td>
                <td>{{$candidate->gender}}</td>
                <td>{{$candidate->contact_number}}</td>
                <td>{{$candidate->address}}</td>
                <td>{{$candidate->institution->name ?? 'N/A'}}</td>
                <td>{{$candidate->programme->name ?? 'N/A'}}</td>
                <td>{{$candidate->level->name ?? 'N/A'}}</td>
                <td>{{$candidate->academic_year->toFormattedDateString()}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
