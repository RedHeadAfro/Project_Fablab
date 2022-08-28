<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller{
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction(Request $request){  
        return redirect()->route('home');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request){
        $requested_amount = $request->amount;  
        $total = session()->get('total');

        
        if(!$total) {
            $total = [
                'name' => $request->name,
                'card_number' => $request->card_number,
                'amount' => $request->amount,
            ];
        
            session()->put('total', $total);
        }
        
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "EUR",
                        "value" => "$requested_amount"
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('createTransaction')
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        
        $total = session()->get('total');

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {   
            $payment = Payment::all();
            
            // Als de kaartnummer al in de database zit
            if (DB::table('payments')->where('card_number', $total['card_number'])->where('name', $total['name'])->exists()){
                // Dan de saldo updaten     
                $old_amount = Payment::where('card_number', $total['card_number'])->where('name', $total['name'])->first()->amount;
                $recharge = $total['amount'];
                
                DB::table('payments')->where('card_number', $total['card_number'])->where('name', $total['name'])->update(['amount' => $payment->amount = $old_amount + $recharge]);

                session()->forget('total');
            // Anders, zit de kaart niet in de database 
            } else  {
                // Dan maken we nieuwe payment
                $payments = new Payment();
                $payments->name = $total['name'];
                $payments->card_number = $total['card_number'];
                $payments->amount = $total['amount'];
                $payments->save();

                session()->forget('total');
                return redirect('home');
            }

            session()->forget('total');
            return redirect()
                ->route('createTransaction')
                ->with('success', 'Transaction complete.');
        } else {

            session()->forget('total');
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }

        session()->forget('total');
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request){
        return redirect()
            ->route('createTransaction')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}