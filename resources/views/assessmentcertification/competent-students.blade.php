<table id="example2" class="table display nowrap table-bordered table-hover" style="width:100%">
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Birth Date</th>
            <th>Gender</th>
            <th>Phone Number</th>
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
                <td>{{$candidate->date_of_birth}}</td>
                <td>{{$candidate->gender == 'male' ? 'M' : 'F'}}</td>
                <td>{{$candidate->phone}}</td>
                <td>{{$candidate->address}}</td>
                <td>{{$candidate->trainingprovider->name ?? 'N/A'}}</td>
                <td>{{$candidate->programme->name ?? 'N/A'}}</td>
                <td>{{$candidate->level->name ?? 'N/A'}}</td>
                <td>{{$candidate->academic_year}}</td>
            </tr>
        @endforeach
    </tbody>
</table>