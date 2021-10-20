<table id="example2" class="table datatable table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Unit Standard Title</th>
            <th>Unit Standard Code</th>
            <th>Unit Standard Type</th>
            <th>Validated</th>
            <th>Status</th>
            <th>Validation date</th>
            <th>Qualification</th>
            <th>Field of Education</th>
            <th>Level</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $result)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$result->unit_standard_title}}</td>
                <td>{{$result->unit_standard_code}}</td>
                <td>{{$result->unit_standard_type}}</td>
                <td>{{$result->validated}}</td>
                <td>{{$result->status}}</td>
                <td>{{$result->validation_date}}</td>
                <td>{{$result->qualification->name ?? 'N/A'}}</td>
                <td>{{$result->qualification->fieldOfEducation->name ?? 'N/A'}}</td>
                <td>{{$result->qualification->level->name ?? 'N/A'}}</td>
            </tr>
        @endforeach
    </tbody>
</table>