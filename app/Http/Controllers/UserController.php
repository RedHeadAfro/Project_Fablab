<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller{
    public function index(Request $request){
        // Haalt alle users en details van de kaaeten van de users op
        $users = User::all();
        $payments = Payment::all();
        $orders = Order::all();

        return view('partials.analytics', compact('users', 'payments', 'orders'));
    }

    // Functie om op role of op saldo te sorteren
    public function sort(){
        $users = User::orderBy('is_admin')->get();
        $payments = Payment::orderBy('amount','desc')->get();
        $orders = Order::orderBy('name', 'asc')->get();
        return view('partials.analytics', compact('users', 'payments', 'orders'));
    }


    // Users functies
    public function form(){
        $users = User::all();
        return view('post.user', compact('users'));
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
           'card_number'=> (string) Str::uuid(),
       ]);

       return redirect()->route('dashboard');
    }

    // Admin functies
    public function adminForm(){
        $users = User::all();
        return view('post.admin', compact('users'));
    } 

    public function newAdmin(Request $request){
       $this->validate($request, [
            'name'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed',
            'is_admin'=>'required',
       ]);

       User::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=> Hash::make($request->password),
           'is_admin'=>$request->is_admin,
           'card_number'=> NULL,
       ]);

       return redirect()->route('dashboard');
    }

    public function isAdmin(){
        // Haalt alle users op 
        $users = User::all();

        // Checkt of in de kolom is_admin 0 of 1 is
        // 0 = geen admin
        // 1 = wel admin
        if($users->is_admin == 1)   {
            return true;
        } else return false;
    }

    // Functies om users aan te passen en te verwijderen
    public function edit($id){
        $users = User::find($id);
        return view('post.details', compact('users'));
    }

    public function update(Request $request, $id){
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->card_number = $request->card_number;
        $users->is_admin = $request->is_admin;
        $users->update();

        return redirect('analytics');
    }
 
    public function delete($id){
        $users = User::find($id);
        $users->delete();
        return redirect('analytics');
    }
}