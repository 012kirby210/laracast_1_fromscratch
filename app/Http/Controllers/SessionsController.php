<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect('/')->with('success','See you soon');
    }

    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => [
                'required',
                'email',
            ],
            'password' => 'required'
        ]);

        if ( ! auth()->attempt($attributes) ){
            throw ValidationException::withMessages([
                'email' =>   'your credentials could not be verified'
            ]);
        }

        session()->regenerate();
        return redirect('/')->with('success','Welcome back');

    }
}
