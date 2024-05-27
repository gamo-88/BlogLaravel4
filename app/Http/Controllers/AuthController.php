<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showFormLogin(){
        return view('auth.login');
    }
    
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('home');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showFormRegister(){
        return view('auth.register');
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'nom' => 'required|max:50',
            'email' => 'required|email|unique:users|',
            'password' => 'required|confirmed|min:8',
        ]);
 
        if ($validator->fails()) {
            return redirect()
                        ->route("register")
                        ->withErrors($validator)
                        ->withInput();
        }else {
            User::create([
                "name"=>$request->nom,
                "email"=>$request->email,
                "password"=>Hash::make($request->password)

            ]);

            return redirect()->route('login');
        }


    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');

    }
}
