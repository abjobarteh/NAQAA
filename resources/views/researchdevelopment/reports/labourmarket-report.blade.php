<table id="example2" class="table datatable table-bordered table-hover">
    <thead>
        <tr>
            <th>Position Advertised</th>
            <th>Min. required Job experience</th>
            <th>Min. required qaulification</th>
            <th>Fields of Study</th>
            <th>Occupational group</th>
            <th>Job Vacancy category</th>
            <th>Job status</th>
            <th>Institution</th>
            <th>Date Advertised</th>
            <th>Region</th>
            <th>District</th>
            <th>Town Village</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($results as $result)
            <tr>
                <td>{{$result->position->name}}</td>
                <td>{{$result->minimum_required_job_experience}}</td>
                <td>{{$result->minimum_required_qualification}}</td>
                <td>
                    @foreach ($result->fields_of_study as $field)
                    <li>
                        <p>{{$field}}</p>
                        @if(!$loop->last),@endif
                    </li>
                    @endforeach
                </td>
                <td>{{$result->occupational_group}}</td>
                <td>{{$result->vacancyCategory->name ?? 'N/A'}}</td>
                <td>{{$result->job_status}}</td>
                <td>{{$result->institution}}</td>
                <td>{{$result->date_advertised}}</td>
                <td>{{$result->region->name}}</td>
                <td>{{$result->district->name}}</td>
                <td>{{$result->localgovermentarea->name}}</td>
            </tr>
        @empty
            
        @endforelse
    </tbody>
</table>