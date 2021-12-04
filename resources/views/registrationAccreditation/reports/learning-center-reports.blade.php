<table id="example2" class="table datatable table-bordered table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Po Box</th>
            <th>Fax</th>
            <th>Telephone Work</th>
            <th>Mobile Phone</th>
            <th>Website</th>
            <th>Region</th>
            <th>District</th>
            <th>Town/Village</th>
            <th>Category</th>
            <th>Classification</th>
            <th>Ownership</th>
            <th>Manager</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($results as $result)
            <tr>
                <td>{{$result->name}}</td>
                <td>{{$result->email}}</td>
                <td>{{$result->address}}</td>
                <td>{{$result->po_box ?? 'N/A'}}</td>
                <td>{{$result->fax ?? 'N/A'}}</td>
                <td>{{$result->telephone_work ?? 'N/A'}}</td>
                <td>{{$result->mobile_phone}}</td>
                <td>{{$result->website ?? 'N/A'}}</td>
                <td>{{$result->region->name ?? 'N/A'}}</td>
                <td>{{$result->district->name ?? 'N/A'}}</td>
                <td>{{$result->townVillae->name ?? 'N/A'}}</td>
                <td>{{$result->category->name ?? 'N/A'}}</td>
                <td>{{$result->classification->name ?? 'N/A'}}</td>
                <td>{{$result->ownership->name ?? 'N/A'}}</td>
                <td>{{$result->manager ?? 'N/A'}}</td>
            </tr>
        @empty
            
        @endforelse
    </tbody>
</table>