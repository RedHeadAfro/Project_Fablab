<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthicationController extends Controller{
    public function index(){
        return view('auth.signup');
    }

    public function __construct(){
        $this->middleware(['guest']);
        // middleware is stel u voor je hebt een link dat je wilt 
        // tonen aan alleen mensen die ingelogd zijn dan zal hij u redirecten om in te loggen 
    }

    public function newUser(Request $request){
       $this->validate($request, [
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed',
       ]);

       User::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=> Hash::make($request->password),
           'card_number'=> Str::uuid(),
       ]);

       auth()->attempt($request->only('email', 'password'));
       return redirect()->route('home');
    }
}