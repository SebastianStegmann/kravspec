<div id="specs-container">
    <a href="#" hx-get="/spec-rows/{{$spec->id}}" hx-swap="outerHTML" hx-target="#specs-container"><-- Go to current spec</a>
            <h1> Viewing suggestions for: {{$spec->name}}</h1>
            <table id="spec-table">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th scope="col" class="">#</th>
                        <th scope="col" class="">Row identifier</th>
                        <th scope="col" class="">Content</th>
                        <th scope="col" class="">Priority</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rows as $row)
                    <tr class="">
                        <td class="">{{$loop->iteration}}</td>
                        <td class="">{{$row->row_identifier}}</td>
                        <td class="">{{$row->content}}</td>
                        <td class="">{{$row->priority}}</td>
                        <td class="">
                            <button class="edit-button">Edit</button>
                        </td>
                    </tr>

                    <tr class="hidden">
                        <td colspan="4" class="">
                            <form hx-post="/spec-rows" hx-swap="this" hx-target="#specs-container" class="flex flex-col">
                                @csrf
                                <div class="flex">
                                    <p> {{$loop->iteration}}</p>
                                    <input type="text" value="{{$row->content}}" name="content" class="">
                                    <input type="text" value="{{$row->priority}}" name="priority" class="">
                                    <input name="row_identifier" value="{{$row->row_identifier}}">
                                    <!-- <input class="hidden" name="version" value=""> </input> -->
                                    <input class="hidden" name="spec_id" value="{{$spec->pivot->spec_id}}">
                                    <div class="w-2/12">
                                        <button type="submit" class="">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No rows yet</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <form hx-post="/spec-rows" hx-swap="outerHTML" hx-target="#specs-container">
                @csrf
                <label for="content"></label>
                <input name="content" placeholder="Content" />
                <label for="priority"></label>
                <input name="priority" placeholder="Priority" />
                <input class="hidden" name="version" value="1"> </input>
                <input class="hidden" name="spec_id" value="{{$spec->pivot->spec_id}}" />
                <button type="submit">Submit</button>
            </form>
            <!-- <div hx-get="/specs/create/{{$spec->pivot->spec_id}}" hx-swap="outerHTML" hx-target="this"> -->
            <!--     <p col-span="3">create new row</p> -->
            <!-- </div> -->

</div>
