<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView(){
        if(Auth::check()){
            return back();
        }
        return view('auth.login'); 
    }

    public function login(Request $request){
        if(Auth::check()){
            return back();
        }
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->role === 'admin'){
                return redirect ('/');
            }if($user->role === 'karyawan'){
                return redirect('/karyawan');
            }
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(){
        if(Auth::check()){
            return back();
        }
        return view('auth.register');
    }

    public function registerProcess(Request $request){
        if(Auth::check()){
            return back();
        }
        $validated = $request->validate([
            "name" => "required|unique:users",
            "email" => "required|email|unique:users",
            "password" => "required|min:5",
            "role" => "required",
        ]);
        // $validated['role'] = 'karyawan';
        User::create($validated);
        return redirect('/products');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
}
