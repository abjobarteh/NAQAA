<table id="example2" class="table datatable table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Qualification Name</th>
            <th>Qualification Level</th>
            <th>Tuition Fee</th>
            <th>Entry Requirements</th>
            <th>Mode of Delivery</th>
            <th>Practical</th>
            <th>Minimum Duration</th>
            <th>Field of Education</th>
            <th>Subfield of Education</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($results as $result)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$result->name}}</td>
                <td>{{$result->level->name ?? 'N/A'}}</td>
                <td>{{$result->tuition_fee ?? 'N/A'}}</td>
                <td>{{json_encode($result->entry_requirements)}}</td>
                <td>{{$result->mode_of_delivery}}</td>
                <td>{{$result->practical}}</td>
                <td>{{$result->minimum_duration ?? 'N/A'}}</td>
                <td>{{$result->fieldOfEducation->name ?? 'N/A'}}</td>
                <td>{{$result->subfieldOfEducation->name ?? 'N/A'}}</td>
            </tr>
        @empty
        <tr>
            <td colspan="10">No Data exist for this report</td>
        </tr>
        @endforelse
    </tbody>
</table>