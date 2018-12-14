<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['destroy']);
    }

    public function create()
    {
        return view('sessions.login');
    }

    public function store()
    {
        if (! auth()->attempt(request(['email','password']))){
            return back()->withErrors([
                'message' => 'please check your credentials and try again.'
            ]);
        }

        return redirect()->route('index');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route('index');

    }
}
