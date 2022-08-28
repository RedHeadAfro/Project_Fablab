<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoUserController extends Controller{
    public function index(){
        $users = Auth::user();

        // Als de user geen admin is 
        // kan de persoon zijn saldo bekijken
        if($users->is_admin == false)   {
            if(Payment::where('card_number', $users->card_number)->where('amount', '>', '0')->exists()){
                $amounts = Payment::where('card_number', $users->card_number)->first(['amount'])->amount;
                return view('partials.settings', compact('users', 'amounts'));
            } else 
            $amounts = "You don't have any balance";
            return view('partials.settings', compact('users', 'amounts'));
        }
        return view('partials.settings', compact('users'));
    }
}