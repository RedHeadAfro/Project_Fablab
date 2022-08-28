<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Emailadres: admin@ehb.be. Paswoord: 123456
class LoginController extends Controller{
    public function index(){
        return view('auth.login');
    }

    public function __construct(){
        $this->middleware(['guest']);
    }

    public function userLogin(Request $request){
        $credentials=$request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); 
            
            // normale users login
            return redirect()->route('home');
        }
         

        return back()->withErrors([
            'password' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}