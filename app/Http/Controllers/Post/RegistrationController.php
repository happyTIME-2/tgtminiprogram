<?php

namespace App\Http\Controllers\Post;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class RegistrationController extends Controller
{
    //
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
        //$user = User::create(request(['name','email','password']));

        auth()->login($user);

        return redirect()->route('index');
    }

}
