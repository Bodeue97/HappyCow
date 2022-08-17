<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {

        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function register()
    {

        return view('register');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3|alpha',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $password = bcrypt($request->input('password'));

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $password,
            'role' => 'user',
        ]);

        auth()->login($user);

        return redirect('/');


    }

    public function login()
    {
        return view('login');
    }

    public function read(Request $request)
    {

        $request->validate([

            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput();


    }


    public function logout(Request $request)
    {

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');

    }


}
