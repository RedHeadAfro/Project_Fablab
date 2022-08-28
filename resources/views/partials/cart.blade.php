@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<!-- Cartpage van:  https://mdbootstrap.com/docs/standard/extended/shopping-carts/ -->
<section class="h-100 h-custom" style="background-color: white;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                    </div>

                                    <hr class="my-4">
                                    <?php $total = 0 ?>
                                    @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                    <?php $total += $details['price'] * $details['quantity'] ?>
                                    <div class="d-flex justify-content-between align-items-center" style="width: 100%;">
                                        <div class="row mb-4 d-flex justify-content-start align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img class="card-img-top" src="{{$details['url']}}"
                                                    alt="{{ $details['name'] }}" style="height: 50px;">
                                            </div>
                                            <div class="col-md-5">
                                                <h6 class="text-muted" name="name">{{ $details['name'] }}</h6>
                                                <h6 class="text-black mb-0">{{ $details['description'] }}</h6>
                                            </div>
                                        </div>
                                        <form action="{{route('update_cart', $id)}}" method="post" class="col-md-5">
                                            @csrf
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <input type="text" name="quantity" class="form-control form-control-sm"
                                                    value="{{$details['quantity']}}">
                                            </div>
                                        </form>
                                        <div class="col-mb-5">
                                            <h6 class="mb-0" style="margin-right: 10px;">€{{ $details['price'] }}</h6>
                                        </div>
                                        <form action="{{ route('delete_cart', $id) }}" method="POST" class="col-mb-7">
                                            @csrf
                                            @method('DELETE')
                                            <button class="button_none" type="submit">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    </div>
                                    @endforeach
                                    <div class="pt-5">

                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-0">
                                            <a href="{{route('home')}}" class="text-body">
                                                <i class="fas fa-long-arrow-alt-left me-2"></i>
                                                Back to shop
                                            </a>
                                        </h6>
                                    </div>
                                    @else
                                    <div>
                                        <h3 class="mb-0">You're cart is empty.</h3>
                                        <small>
                                            <a href="{{route('home')}}" style="color:gray; text-decoration:gray ">
                                                <i class="fas fa-long-arrow-alt-left me-2"></i>
                                                Continue shopping
                                            </a>
                                        </small>
                                    </div>
                                    @endif

                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                    <hr class="my-4">
                                    @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase">{{ $details['name'] }}</h5>
                                        <h5>€{{ $details['quantity'] * $details['price'] }}</h5>
                                    </div>
                                    @endforeach
                                    @else
                                    <div>
                                        <small class="mb-0">Nothing to see here.</small>
                                    </div>
                                    @endif
                                    <hr class="my-4">
                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Total</h5>
                                        <h5>€{{ $total }}</h5>
                                    </div>
                                    <button type="button" class="btn btn-dark btn-block btn-lg"
                                        data-mdb-ripple-color="dark">
                                        <a href="{{route('show_payment')}}"
                                            style="color:white; text-decoration:none;">Pay</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection