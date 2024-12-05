<div class="" id="specs-container">
    <h1> My specifactions </h1>
    @foreach ($specs as $spec)
    <div class="text-gray-600" hx-get="/spec-rows/{{$spec->id}}" hx-trigger="click" hx-target="#specs-container" hx-swap="outerHTML">

        Name: {{$spec->name}}

    </div>
    <a hx-get="/specs/{{$spec->id}}" hx-trigger="click" hx-target="#specs-container" hx-swap="outerHTML">Spec settings</a>
    @endforeach

</div>
