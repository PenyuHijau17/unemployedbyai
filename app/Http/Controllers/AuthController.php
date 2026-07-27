<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    // ==========================
    // LOGIN PAGE
    // ==========================
    public function showLogin()
    {
        return view('auth.login');
    }



    // ==========================
    // REGISTER PAGE
    // ==========================
    public function showRegister()
    {
        return view('auth.register');
    }



    // ==========================
    // REGISTER PROCESS
    // ==========================
    public function register(Request $request)
    {

        $request->validate([

            'name' => [
                'required'
            ],

            'email' => [
                'required',
                'email',
                'unique:users'
            ],

            'password' => [
                'required',
                'min:6'
            ],

        ]);



        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password),

            'role' => 'customer',

        ]);



        return redirect()
            ->route('login')
            ->with(
                'success',
                'Register berhasil, silahkan login'
            );

    }




    // ==========================
    // LOGIN PROCESS
    // ==========================
    public function login(Request $request)
    {

        $credentials = $request->validate([

            'email' => [
                'required',
                'email'
            ],

            'password' => [
                'required'
            ],

        ]);



        if(Auth::attempt($credentials))
        {

            $request->session()->regenerate();



            // ADMIN
            if(Auth::user()->role == 'admin')
            {

                return redirect()
                    ->route('admin.dashboard');

            }



            // CUSTOMER
            return redirect()
                ->route('home');


        }



        return back()
            ->withErrors([

                'email' => 'Email atau password salah.'

            ])
            ->onlyInput('email');

    }




    // ==========================
    // LOGOUT
    // ==========================
    public function logout(Request $request)
    {

        Auth::logout();



        $request->session()->invalidate();


        $request->session()->regenerateToken();



        return redirect()
            ->route('login');

    }

}