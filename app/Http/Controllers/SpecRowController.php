<?php

namespace App\Http\Controllers;

use App\Models\SpecRow;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SpecRowController extends Controller
{

    public function view(Request $request, $id)
    {
        // this should be fine
        $spec = auth()->user()->specs->find($id);

        // fix this
        $rows = auth()->user()->specs->where('id', $id)->first()->rows()->get();
        return view('specs.view', compact('spec', 'rows'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required',
            'spec_id' => 'required',
            'priority' => 'required',
            'version' => '',
            'row_identifier' => '',
        ]);

        //is user allowed to edit current spec
        //Find user is related to spec via spec_user_role

        SpecRow::create($validatedData);

        $spec_id = $validatedData['spec_id'];

        $spec = auth()->user()->specs->find($spec_id);
        $rows = auth()->user()->specs->where('id', $spec_id)->first()->rows()->get();
        return view('specs.view', compact('spec', 'rows'));
    }
}
