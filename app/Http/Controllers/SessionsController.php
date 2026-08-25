<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function store(SessionsRequest $request) {
        $attributes = $request->validated();

        if (! Auth::attempt($attributes)) {
            return back()
                    ->withErrors(['password' => 'We were unable to authenticate using provided credientials.'])
                    ->withInput();
        }

        $request->session()->regenerate();

        return redirect()->intended()->with('success', 'Your are now loggin');
    }

    public function destroy(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
