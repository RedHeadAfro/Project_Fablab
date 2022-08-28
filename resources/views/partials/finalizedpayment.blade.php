@extends('layouts.app')

@section('title', 'Finish order')

@section('content')
<div class="d-flex justify-content-center">
    <div class="h-50 d-inline-block w-50 p-3" id="right_login">
        <h3 class="text-center mt-3">One more step</h3>
        <?php $total = 0 ?>
        @if(session('cart'))
        @foreach(session('cart') as $id => $details)
        <?php $total += $details['price'] * $details['quantity'] ?>
        <form action="{{route('place_order', $id)}}" method="post">
            @csrf
            @if ($loop->last)
            <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input name="name" type="name" class="form-control @error('name')border border-danger @enderror"
                    id="exampleInputName1" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="exampleInputCardNumber1">Card number</label>
                <input name="card_number" type="card_number"
                    class="form-control @error('card_number')border border-danger @enderror"
                    id="exampleInputCardNumber1" placeholder="Enter your card number">
            </div>


            <div class="form-group">
                <label for="exampleInputTotalAmount1">Total amount: </label>
                <span class="form-control @error('amount')border border-danger @enderror"
                    name="total_amount">{{ $total }}</span>
            </div>
            @endif
            @if (\Session::has('message'))
            <div class="alert-danger" style="background: #FFFFFF;">
                {!! \Session::get('message') !!}
            </div>
            @endif
            @if (\Session::has('error'))
            <div class="alert-danger" style="background: #FFFFFF;">
                {!! \Session::get('error') !!}
            </div>
            @endif
            @endforeach
            @endif
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-dark" id="space">
                    Place order
                </button>
            </div>
        </form>
    </div>
</div>
@endsection