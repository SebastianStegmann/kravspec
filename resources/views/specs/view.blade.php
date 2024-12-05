<div class="" id="specs-container">
    <h1> Name: {{$spec->name}} </h1>
    <div class="text-gray-600" hx-get="/specs" hx-trigger="click" hx-target="#specs-container" hx-swap="outerHTML">
        Name
        Status: still working on it or is it currently functioning as a contract?
        - Edit phase or contract

        <p>
            {{$spec->status ?  'active' : 'Edit phase' }}
        </p>
        <h2>Participants </h2>
        <ul>
            @forelse($users as $user)
            <li>
                {{$user->name}}
                Role: {{$user->pivot->role_id}}

                Remove from project
                Change role
            </li>
            @empty

            @endforelse
        </ul>
        Handle multiple teams?
        just have a role of people who need to accept changes?
    </div>
</div>
