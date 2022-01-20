<table id="example2" class="table display nowrap table-bordered table-hover" style="width:100%">
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Birth Date</th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Nationality</th>
            <th>Local Language</th>
            <th>Institution</th>
            <th>Programme</th>
            <th>Level</th>
            <th>Unit Standards</th>
            <th>Academic Year</th>
            <th>Qualification Type</th>
            <th>Last Assessment Date</th>
            <th>Assessment Center</th>
            <th>CandidateID</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($candidates as $candidate)
            <tr>
                <td>{{$candidate->registeredStudent->full_name ?? 'N/A'}}</td>
                <td>{{$candidate->registeredStudent->date_of_birth ?? 'N/A'}}</td>
                <td>{{$candidate->registeredStudent->gender == 'male' ? 'M' : 'F'}}</td>
                <td>{{$candidate->registeredStudent->phone ?? 'N/A'}}</td>
                <td>{{$candidate->registeredStudent->address ?? 'N/A'}}</td>
                <td>{{$candidate->registeredStudent->nationality ?? 'N/A'}}</td>
                <td>{{$candidate->registeredStudent->local_language ?? 'N/A'}}</td>
                <td>{{$candidate->trainingprovider->name ?? 'N/A'}}</td>
                <td>{{$candidate->programme->name ?? 'N/A'}}</td>
                <td>{{$candidate->level->name ?? 'N/A'}}</td>
                <td>{{$candidate->unit_standards}}</td>
                <td>{{$candidate->academic_year}}</td>
                <td>{{$candidate->latestAssessment->qualification_type ?? 'N/A'}}</td>
                <td>{{$candidate->latestAssessment->last_assessment_date ?? 'N/A'}}</td>
                <td>{{$candidate->latestAssessment->assessment_center ?? 'N/A'}}</td>
                <td>{{$candidate->candidate_id ?? 'N/A'}}</td>
            </tr>
        @endforeach
    </tbody>
</table>