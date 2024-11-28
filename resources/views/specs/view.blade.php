<div id="specs-container">
    <a href="#" hx-get="/specs" hx-swap="outerHTML" hx-target="#specs-container"><-- Go back to all specs</a>
            <h1> Viewing spec: {{$spec}}</h1>
            <table id="spec-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Content</th>
                        <th>Priority</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($rows as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->content}}</td>
                        <td>{{$row->priority}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div hx-get="/specs/create" hx-swap="outerHTML" hx-target="this">
                <p col-span="3">create new row</p>
            </div>

</div>
