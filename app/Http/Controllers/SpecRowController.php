<?php

namespace App\Http\Controllers;

use App\Models\SpecRow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpecRowController extends Controller
{

    public function view(Request $request, $id)
    {

        $spec = Auth::user()->specs->find($id);

        if (!$spec) {
            abort(404);
        }

        $rows = $spec->getGroupedLatestRows();
        $timeline = $spec->fetchTimelineOfAcceptedChanges();
        return view('spec-rows.index', compact('spec', 'rows', 'timeline'));
    }

    public function suggestions(Request $request, $id)
    {
        $spec = Auth::user()->specs->find($id);

        if (!$spec) {
            abort(404);
        }

        $rows = $spec->getGroupedNonAcceptedRows();
        return view('spec-rows.suggestions', compact('spec', 'rows'));
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
        return view('spec-rows.index', compact('spec', 'rows'));
    }
}
