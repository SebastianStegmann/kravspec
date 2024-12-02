<?php

namespace App\Http\Controllers;

use App\Models\SpecRow;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SpecController extends Controller
{

    public function index(Request $request)
    {
        if (!$request->header('HX-Request')) {
            return redirect()->route('dashboard');
        }
        // $specs = Spec::whereHas('users', function ($query) {
        //     $query->where('user_id', Auth::id());
        // })->paginate(10);
        $specs = auth()->user()->specs;
        // $specs = Spec::all();
        return view('specs.index', compact('specs'));
    }

    public function view(Request $request, $id)
    {

        $spec = auth()->user()->specs->find($id);
        $rows = auth()->user()->specs->where('id', $id)->first()->rows()->get();
        return view('specs.view', compact('spec', 'rows'));
    }

    public function create(Request $request, $spec_id)
    {
        return view('specs.form', compact('spec_id'));
    }

    public function storeRows(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required',
            'spec_id' => 'required',
            'priority' => 'required',
            'version' => '',
        ]);

        //is user allowed to edit current spec
        //Find user is related to spec via spec_user_role

        SpecRow::create($validatedData);

        $spec_id = $validatedData['spec_id'];

        $spec = auth()->user()->specs->find($spec_id);
        $rows = auth()->user()->specs->where('id', $spec_id)->first()->rows()->get();
        return view('specs.view', compact('spec', 'rows'));
    }

    // public function edit(Request $request): View
    // {
    // }
    //
    // /**
    //  * Update the user's profile information.
    //  */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    // }
    //
    // /**
    //  * Delete the user's account.
    //  */
    // public function destroy(Request $request): RedirectResponse
    // {
    // }
}
