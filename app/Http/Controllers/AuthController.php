<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = $request->only('email', 'password');

        
        if (Auth::attempt($user)) {
            return redirect()->route('clients.home');
        }
        return redirect()->back()->withErrors([
            'email' => 'Infor is Faulse'
        ]);
    }

    public function showFormRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data=$request->all();
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',

          ]);
        //  dd($data);
        //  exit();
        $user = User::query()->create($data);

        Auth::login($user);
        return redirect()->route('clients.home');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
