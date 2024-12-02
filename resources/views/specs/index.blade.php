<div class="" id="specs-container">
    <h1> Your specifactions </h1>
    @foreach ($specs as $spec)
    <div class="text-gray-600" hx-get="/specs/{{$spec->id}}" hx-trigger="click" hx-target="#specs-container" hx-swap="outerHTML">
        Name: {{$spec->name}}
    </div>

    @endforeach
</div>
