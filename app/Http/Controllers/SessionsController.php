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

        if ( auth()->attempt($attributes) ){
            session()->regenerate();
            return redirect('/')->with('success','Welcome back');
        }

        throw ValidationException::withMessages([
            'email' =>   'your credentials could not be verified'
        ]);
//        return back()->
//            withInput($attributes)->
//            withErrors(['email' => 'your credentials could not be verified']);
    }
}
