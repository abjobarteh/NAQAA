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
                <td>{{$result->registeredStudent->firstname}}</td>
                <td>{{$result->registeredStudent->middlename ?? 'N/A'}}</td>
                <td>{{$result->registeredStudent->lastname}}</td>
                <td>{{$result->registeredStudent->gender}}</td>
                <td>{{$result->registeredStudent->date_of_birth}}</td>
                <td>{{$result->registeredStudent->email}}</td>
                <td>{{$result->registeredStudent->phone}}</td>
                <td>{{$result->registeredStudent->nationality}}</td>
                <td>{{$result->registeredStudent->local_language}}</td>
                <td>{{$result->registeredStudent->address}}</td>
                <td>{{$result->candidate_type}}</td>
                <td>{{$result->programme->name ?? 'N/A'}}</td>
                <td>{{$result->level->name ?? 'N/A'}}</td>
                <td>{{$result->trainingprovider->name ?? 'N/A'}}</td>
                <td>{{$result->academic_year}}</td>
            </tr>
        @endforeach
    </tbody>
</table>