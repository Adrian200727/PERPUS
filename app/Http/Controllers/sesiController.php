<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class sesiController extends Controller
{
    function index()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',

            ],
            [
                'email.required' => 'email wajib di isi',
                'password.required' => 'password wajib di isi'
            ]
        );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if(Auth::user()->role == 'admin'){
                return redirect('/admin');
            } elseif(Auth::user()->role == 'user'){
                return redirect('/user');
            }
        } else {
            return redirect('')->withErrors('Username dan password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
