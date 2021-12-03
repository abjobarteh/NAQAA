<table id="example2" class="table datatable table-bordered table-hover">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Country of Origin</th>
            <th>Attendance Status</th>
            <th>Admission Date</th>
            <th>Completion Date</th>
            <th>Programme Name</th>
            <th>Field of Education</th>
            <th>Qualification at Entry</th>
            <th>Region</th>
            <th>Training Provider</th>
            <th>Academic Year</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($results as $result)
            <tr>
                <td>{{$result->firstname}}</td>
                <td>{{$result->middlename}}</td>
                <td>{{$result->lastname}}</td>
                <td>{{$result->gender}}</td>
                <td>{{$result->date_of_birth}}</td>
                <td>{{$result->email}}</td>
                <td>{{$result->phone}}</td>
                <td>{{$result->nationality}}</td>
                <td>{{$result->attendance_status}}</td>
                <td>{{$result->admission_date}}</td>
                <td>{{$result->completion_date}}</td>
                <td>{{$result->programme_name}}</td>
                <td>{{$result->field_of_education}}</td>
                <td>{{$result->entryQualification->name ?? 'N/A'}}</td>
                <td>{{$result->region->name ?? 'N/A'}}</td>
                <td>{{$result->trainingprovider->name ?? 'N/A'}}</td>
                <td>{{$result->academic_year}}</td>
            </tr>
        @empty
            
        @endforelse
    </tbody>
</table>