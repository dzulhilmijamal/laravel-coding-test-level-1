<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if($request->username == "administrator" && $request->password == "password"){
            Session::put('user', [
                'logged_in' => TRUE
            ]);
            Session::flash('success', 'Welcome to Laravel Live Coding Test'); 
            return Redirect::to(url('/events'));
        }else{
            Session::flash('failed', 'Login Failed'); 
            return Redirect::to(url('/'));
        }
    }

    public function logout()
    {
        Session::flush();
        return Redirect::to(url('/'));
    }
}
