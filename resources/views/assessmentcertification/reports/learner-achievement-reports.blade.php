<table id="example2" class="table datatable table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Nationality</th>
            <th>Local Language</th>
            <th>Address</th>
            <th>Candidate Type</th>
            <th>Programme</th>
            <th>Level</th>
            <th>Training Provider</th>
            <th>Academic Year</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $result)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$result->firstname}}</td>
                <td>{{$result->middlename ?? 'N/A'}}</td>
                <td>{{$result->lastname}}</td>
                <td>{{$result->gender == 'male' ? 'M' : 'F'}}</td>
                <td>{{$result->date_of_birth}}</td>
                <td>{{$result->email}}</td>
                <td>{{$result->phone}}</td>
                <td>{{$result->nationality}}</td>
                <td>{{$result->local_language}}</td>
                <td>{{$result->address}}</td>
                <td>{{$result->candidate_type}}</td>
                <td>{{$result->proramme->name ?? 'N/A'}}</td>
                <td>{{$result->level->name ?? 'N/A'}}</td>
                <td>{{$result->trainingprovider->name ?? 'N/A'}}</td>
                <td>{{$result->academic_year}}</td>
            </tr>
        @endforeach
    </tbody>
</table>