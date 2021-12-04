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
            <th>Phone Mobile</th>
            <th>Physical Address</th>
            <th>Postal Address</th>
            <th>Country of Citizenship</th>
            <th>TIN</th>
            <th>NIN</th>
            <th>AIN</th>
            <th>License No</th>
            <th>License Status</th>
            <th>Trainer Type</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $result)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$result->firstname}}</td>
                <td>{{$result->middlename ?? 'N/A'}}</td>
                <td>{{$result->lastname}}</td>
                <td>{{$result->gender}}</td>
                <td>{{$result->date_of_birth}}</td>
                <td>{{$result->email}}</td>
                <td>{{$result->phone_mobile}}</td>
                <td>{{$result->physical_address}}</td>
                <td>{{$result->postal_address ?? 'N/A'}}</td>
                <td>{{$result->country_of_citizenship}}</td>
                <td>{{$result->TIN ?? 'N/A'}}</td>
                <td>{{$result->NIN ?? 'N/A'}}</td>
                <td>{{$result->AIN ?? 'N/A'}}</td>
                <td>{{$result->validLicence->license_no ?? 'N/A'}}</td>
                <td>{{$result->validLicence->license_status ?? 'N/A'}}</td>
                <td>{{$result->validLicence->trainer_type ?? 'N/A'}}</td>
            </tr>
        @endforeach
    </tbody>
</table>