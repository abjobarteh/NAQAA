<table id="example2" class="table datatable table-bordered table-hover">
    <thead>
        <tr>
            <th>Research Topic</th>
            <th>Publisher</th>
            <th>Publication Date</th>
            <th>Name of Authors</th>
            <th>Cost (GMD)</th>
            <th>Funded by</th>
            <th>Key Findings</th>
            <th>Recommendation</th>
            <th>Remarks</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($results as $result)
            <tr>
                <td>{{$result->research_topic}}</td>
                <td>{{$result->publisher}}</td>
                <td>{{$result->publication_date}}</td>
                <td>
                    @foreach ($result->name_of_authors as $author)
                    <li>
                        <p>{{$author}}</p>
                        @if(!$loop->last),@endif
                    </li>
                    @endforeach
                </td>
                <td>{{$result->cost}}</td>
                <td>{{$result->funded_by}}</td>
                <td>{{$result->key_findings}}</td>
                <td>{{$result->recommendation}}</td>
                <td>{{$result->remarks}}</td>
            </tr>
        @empty
            
        @endforelse
    </tbody>
</table>