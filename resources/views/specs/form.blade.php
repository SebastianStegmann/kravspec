        <form hx-post="/spec-rows" hx-swap="outerHTML" hx-target="#specs-container">
            @csrf
            <label for="content"></label>
            <input name="content" placeholder="Content" />
            <label for="priority"></label>
            <input name="priority" placeholder="Priority" />
            <input name="version" value="1"> </input>
            <input name="spec_id" value="{{$spec_id}}" />
            <button type="submit">Submit</button>
        </form>
