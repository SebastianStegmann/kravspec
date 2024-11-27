<div id="specs-container">
    <h1> Your specifactions </h1>
    @foreach ($specs as $spec)
    <!-- <a href="/specs/{{$spec->id}}">Name: -->
    <!--     {{$spec->name}} -->
    <!-- </a> -->
    <div hx-get="/specs/{{$spec->id}}" hx-trigger="click" hx-target="#specs-container" hx-swap="outerHTML">
        Name: {{$spec->name}}
    </div>

    @endforeach
</div>
