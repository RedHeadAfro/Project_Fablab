<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller{
    // Returned alle producten in de database
    public function index(){
        $products = Product::all();
        return view('post.index', compact('products'));
    } 

    // Redirect naar dashboard
    public function dashboard(){
        if(auth()->user()->is_admin == true)    {
            return view('partials.dashboard');
        } else return redirect()->route('home');
    } 

    // Houdt de producten bij op basis van naam, omschrijving en prijs
    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required|max:255',
            'price'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            'url'=>'required',
       ]);

        $products = new Product();
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->url = $request->url;
        $products->save();

        return redirect('dashboard');
    }

    // Stuurt ze door naar de database
    public function postProducts(){
        $products = Product::all();
        return view('partials.home', compact('products'));
    }

    // Dit is om producten te editen 
    public function edit($id){
        $products = Product::find($id);
        return view('post.edit', compact('products'));
    }

    // Dit is om de producten die aangepast zijn bij te houden 
    public function update(Request $request, $id){
        $products = Product::find($id);
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->url = $request->url;
        $products->update();

        return redirect('home');
    }

    // Om producten te verwijderen 
    public function delete($id){
        $products = Product::find($id);
        $products->delete();
        return redirect('home');
    }
}