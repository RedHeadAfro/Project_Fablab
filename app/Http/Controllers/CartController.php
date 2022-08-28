<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller{
    public function cart(){
        $products = Product::all();
        $cart = session()->get('cart');
        return view('partials.cart', compact('cart', 'products'));
    }

    public function addToCart($id){
        $product = Product::find($id);
        $cart = session()->get('cart');

        
        // Eerste product toevoegen en opslaan in een session
        // Standaard quantity is 1
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "url" => $product->url,
                        "description" => $product->description,
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back();
        }

        // Product bestaat niet nog niet in de Cart
        $cart[$id] = [
            "id" => $product->id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "url" => $product->url,
            "description" => $product->description,
        ];
        session()->put('cart', $cart);
        return redirect()->back();
    }

    // Quantity aanpassen
    public function update(Request $request, $id){
        // Session en product ophalen 
        $product = Product::find($id);
        $cart = session()->get('cart');
        
        // Oude hoeveelheid ophalen 
        $old_quantity = $cart[$id]['quantity'];
        // Oude hoeveelheden verwijderen 
        unset($cart[$old_quantity]);

        // Nieuwe hoeveelheid ophalen
        $new_quantity = $request->quantity;
        // De session ophalen en alleen de hoeveelheid aanpassen 
        $cart[$id] = [
            "id" => $product->id,
            "name" => $product->name,
            "quantity" => $new_quantity,
            "price" => $product->price,
            "url" => $product->url,
            "description" => $product->description,
        ];

        // Session saven 
        session()->put('cart', $cart);
        return redirect()->back();   
    }

    // Om product in de cart te verwijderen 
    public function delete($id){
        // Haalt session op 
        $cart = session()->get('cart');
        // Zoekt session (array) naar de value
        $key = array_search($cart[$id], $cart);
        // Mocht de key gevonden zijn 
        if ($key !== false) {
            // verwijder die dan uit de session
            unset($cart[$key]);
            // update session
            session()->put('cart', $cart);
        }        
        return redirect('cart');
    }
}