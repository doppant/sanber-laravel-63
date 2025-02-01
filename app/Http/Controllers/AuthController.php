<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Menampilkan register page
    public function showRegisterForm()
    {
        return view('register');
    }

    // Mneampilkan halaman welome
    public function showWelcome(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');

        return view('welcome', ['firstname'=>$firstname, 'lastname'=>$lastname]);
    }
}
