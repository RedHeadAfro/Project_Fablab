@extends('layouts.app')

@section('title', 'Order has been placed')

@section('content')
<!-- Checkout page (modified): https://mdbootstrap.com/docs/standard/extended/order-details/ -->
<div class="container px-1 px-md-4 py-5 mx-auto" style="margin-top: 50px;">
    <div class="cards" style="background-size: cover;
    background-repeat: no-repeat;
    background: url('../images/Backgroundv4.png');">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex justify-content-between">
                <h5>ORDER <span class="text-primary font-weight-bold">#{{$order->order_number}}</span></h5>
                <p class="mb-0">Expected availability <span>{{$expected_date}}</span></p>

            </div>
        </div>
        <div class="row d-flex justify-content-around top">
            <div class="row d-flex icon-content">
                <ul id="progressbar" class="text-center">
                    <li class="active step0"></li>
                    <li class="step0"></li>
                </ul>
            </div>
        </div>
        <div class="d-flex justify-content-around">
            <div class="row d-flex icon-content">
                <span class="material-icons">credit_score</span>
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Processed</p>
                </div>
            </div>
            <div class="row d-flex icon-content">
                <span class="material-icons">store</span>
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Ready<br>to pickup</p>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <h6 class="mb-0">
            <a href="{{route('home')}}" class="text-body">
                <i class="fas fa-long-arrow-alt-left me-2"></i>
                Back to shop
            </a>
        </h6>
    </div>
</div>
@endsection