@extends('layouts.app')

@section('title', 'Recharge')

@section('content')
<div class="d-flex justify-content-center">
    <div class="h-50 d-inline-block w-50 p-3" id="right_login">
        <h3 class="text-center mt-3">Recharge your card</h3>
        <form action="{{route('processTransaction')}}" method="get">
            @csrf
            <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input name="name" type="name" class="form-control @error('name')border border-danger @enderror"
                    id="exampleInputName1" placeholder="Enter your name" value="{{old('name')}}">

                @error('name')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputCardNumber1">Card number</label>
                <input name="card_number" type="card_number"
                    class="form-control @error('card_number')border border-danger @enderror"
                    id="exampleInputCardNumber1" placeholder="Enter your card number">

                @error('card_number')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputAmount1">Amount</label>
                <input name="amount" type="amount" class="form-control @error('amount')border border-danger @enderror"
                    id="exampleInputAmount1" value="{{old('amount')}}">

                @error('amount')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group" style="display: none;">
                <input name="user_id" type="user_id" value="{{$users->id}}">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-dark" id="space">
                    Pay

                </button>
            </div>
        </form>
    </div>
</div>
@endsection