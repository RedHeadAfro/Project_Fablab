<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;

class OrderController extends Controller{
    public function payment(Request $request, $id){
        // Session ophalen 
        $total = session()->get('cart');
        // naam van producten ophalen
        $order = $total[$id]['name'];
        // array naar string 
        $order_json = json_encode($order);
        
        // Check of kaart in de database bestaat.
        if( DB::table('payments')->where('card_number', $request->card_number)->exists()) {
            $date_today = Carbon::now();
            $week = 7;
            $expected_date = $date_today->addDays($week)->format('Y-m-d');

            // De saldo van de persoon ophalen via naam
            $card_balance = DB::table('payments')->where('name', $request->name)->first()->amount;
            $total = $total[$id]['price'] * $total[$id]['quantity'];
            // Totaalprijs berekenen 
            $payment = (float) $card_balance - $total;

            if($payment < 0) {
                return back()->with('message', 'Insufficient balance');
            } 
            // Genoeg geld = order geplaatst
            $order = new Order();
            $order->name = $request->name;
            $order->order = json_decode($order_json);
            $order->total_amount = $total;
            $order->order_number = $this->generateUniqueCode();
            $order->save();

            // Info van de kaarthouder ophalen 
            // En dan de nieuwe saldo berekenen
            // Nieuwe saldo updaten     
            $card_holder = DB::table('payments')->where('card_number', $request->card_number)->get();
            $current_balance = $card_holder[0]->amount;
            $new_balance = $current_balance - $total;
            DB::table('payments')->where('card_number', $request->card_number)->update(['amount' => $new_balance]);

            // Sessie deleten nadat de order is geplaatst 
            session()->forget('cart');
            return view('partials.checkout', compact('order', 'expected_date'));
        } 

        return back()->with('error', 'The card does not exist in our database.');
    }

    /**
     * Write referal_code on Method
     *
     * @return response()
     */
    // Unieke code generator
    public function generateUniqueCode(){
        do {
            $order_number = random_int(100000, 999999);
        } while (Order::where("order_number", "=", $order_number)->first());
  
        return $order_number;
    }

    // Om producten te verwijderen 
    public function delete($id){
        $orders = Order::find($id);
        $orders->delete();
        return back();
    }
}