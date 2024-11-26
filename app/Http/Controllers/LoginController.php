<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    // karena mengirim sesuatu dari form / menginput pakai request
    public function actionLogin(Request $request)
    {
        $credential = $request->only(['email', 'password']);
        // Auth
        // untuk mengecek email dan pass
        if (Auth::attempt($credential)) {
            return redirect()->intended('dashboard');
        } else{
            return back()->withErrors(['email'=> 'Mohon periksa kembali email dan password Anda'])->withInput();
        }
    }
}
