<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        //validate data
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        //login code
        if(Auth::attempt($request->only('email','password'))){
            return redirect('home');
        }

        //If login fails redirect to register with error
        return redirect('login')->withError('Login details are not valid');
    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        //validate data
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);

        //save in users table and use users model
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //Login user here after registeration
        if(Auth::attempt($request->only('email','password'))){
            return redirect('home');
        }

        //If login fails redirect to register with error
        return redirect('register')->withError('Error');
    }

    public function home()
    {
        return view('home'); //redirect to dashboard if successfull login
    }

    public function logout()
    {
        Session::Flush(); //removing sessions
        Auth::logout(); //removing auth login
        return redirect('');
    }
}
