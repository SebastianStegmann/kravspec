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
}
