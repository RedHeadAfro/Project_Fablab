@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="h-50 d-inline-block w-100 p-3" id="hero">
        <h1 class="display-3">Fablab</h1>
    </div>
</div>

<div class="container d-flex">
    @foreach($products as $product)
    <div class="card" style="width: 18rem; margin-right:10px;">
        <img class="card-img-top" src="{{$product->url}}" alt="{{$product->name}}" style="height: 200px;">
        <div class="card-body">
            <h5 class="card-title" name="name">{{$product->name}}</h5>
            <p class="card-text" name="description">{{$product->description}}</p>
            <span name="price">€{{$product->price}}</span>

            <div class="d-flex justify-content-end align-items-center">
                <button>
                    <a href="{{route('addToCart', $product->id)}}" style="text-decoration: none; color:black">
                        <span class="material-icons">add_shopping_cart</span>
                    </a>
                </button>
            </div>

            @auth
            @if (auth()->user()->is_admin == true)
            <div class="d-flex justify-content-end align-items-center">
                <a class="nav-link" id="edit" href="{{route('show_product', $product->id)}} " style="color:black;">
                    <span class="material-icons">edit</span>
                </a>

                <form action="{{ route('delete',  $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>
                        <span class="material-icons">delete</span>
                    </button>
                </form>
            </div>
            @endif
            @endauth
        </div>
    </div>
    @endforeach
</div>

@endsection