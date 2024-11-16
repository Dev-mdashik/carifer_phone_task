<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //** we can see the register page by using this register function **//
    public function register()
    {
        return view('auth.register');
    }

    //** we can see the login page by using this login function **//
    public function login()
    {
        return view('auth.login');
    }

    public function registerpost(Request $req)
    {
        //** With Proper Validation **//
        $req->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'lowercase', 'string', 'max:150', 'unique:users,email'],
            'password' => ['required', 'min:8'],
            'confirmpassword' => ['same:password', 'min:8'],
        ],[
            //** With Custom Message **//
            'confirmpassword.same' => 'The confirm password field must match with password.'
        ]);

        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        if($user->save())
        {
            return redirect()->route('login')->with('success', 'User Registered Successfully');
        }
        return redirect()->route('register')->with('error', 'User Not Registered');
    }

    public function loginpost(Request $req)
    {
        $req->validate([
            'email' => ['required', 'email', 'lowercase', 'string', 'max:150'],
            'password' => ['required', 'min:8'],
        ]);

        $credential = $req->only('email', 'password');
        if(Auth::attempt($credential))
        {
            if(Auth()->user()->role == 'admin')
            {
                return redirect()->route('admin')->with('success', 'Loggedin Successfully');
            }
            return redirect()->route('pho.home')->with('success', 'Loggedin Successfully');
        }
        return redirect()->route('login')->with('error', 'Login Failed');
    }

    public function destroy(Request $req)
    {
        // $req->session()->invalidate();
        // or
        Auth::logout();
        return redirect('login');
    }
}
