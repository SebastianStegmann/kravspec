<?php

namespace App\Http\Controllers;

use App\Models\Spec;
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
        $specs = $id;
        return view('specs.view', compact('specs'));
    }

    public function create(Request $request)
    {
        return view('specs.form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // Add any other fields you want to validate here
        ]);

        Spec::create($validatedData);

        // After creation, you might want to redirect or show a success message
        return redirect()->route('dashboard')->with('status', 'Spec created successfully!');
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
