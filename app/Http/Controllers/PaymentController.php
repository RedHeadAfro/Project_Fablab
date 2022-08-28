<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id){
        $users = User::findOrFail($id);
        return view('partials.recharge', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function linkUserAndPayment(Request $request, $id){ 
        $users = User::findOrFail($id);
        $payment = Payment::all();
        $amount = Payment::where('id', $id)->value('amount');
        
        // Als de kaartnummer al in de database zit
        if (DB::table('payments')->where('card_number', $request->card_number)->exists()) {
            // Dan de saldo updaten     
            $old_amount = Payment::where('card_number', $request->card_number)->first(['amount'])->amount;
            $recharge = $request->amount;
            
            //DB::table('payments')->update(['amount' => $payment->amount = $old_amount + $recharge]);
            return view('partials.paypal', compact('recharge'));

        // Anders, zit de kaart niet in de database 
        } else  {
            // Dan maken we nieuwe payment
            $payments = new Payment();
            $payments->name = $request->name;
            $payments->card_number = $request->card_number;
            $payments->amount = $request->amount;
            $payments->user_id = $request->user_id;
            $payments->save();

            return redirect('home');
        }

        dd("Niets gevonden");
    }


    public function showFinalizedTotal(){
        $order = session()->all();
        return view('partials.finalizedpayment');
    }
}