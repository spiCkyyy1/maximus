<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;

class AuthController extends Controller
{
    public function login(){
        return Inertia::render('Admin/Login');
    }

    public function register(){
        return Inertia::render('Admin/Register');
    }

    public function forgotPassword(){
        return Inertia::render('Admin/ForgotPassword');
    }

    public function verifyLogin(Request $request){

        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return Redirect::route('dashboard');
            // return Inertia::render('Admin/Dashboard', [
            //     'success' => 'Login Successful! ',
            // ]);
        }


        return Inertia::render('Admin/Login', [
            'invalid_credentials' => 'You have entered invalid credentials ',
        ]);
    }

    public function logout() {

        Session::flush();

        Auth::logout();

        return Redirect::route('login');

    }

    public function dashboard(){
        return Inertia::render('Admin/Dashboard');
    }
}
