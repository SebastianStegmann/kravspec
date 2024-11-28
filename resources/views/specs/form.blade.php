        <form hx-post="/spec-rows" hx-swap="outerHTML" hx-target="this">
            @csrf
            <label for="content"></label>
            <input name="content" placeholder="Content" />
            <label for="priority"></label>
            <input name="priority" placeholder="Priority" />

            <button type="submit">Submit</button>
        </form>
