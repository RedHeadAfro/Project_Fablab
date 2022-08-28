@extends('layouts.lanalytics')

@section('title', 'Analytics')

@section('content')
<!-- SEE REGISTERD USERS -->
<div class="section_one">
    <div class="container">
        <div class="h-50 d-inline-block w-100 p-3" id="hero">
            <h3 class="display-5">Registerd users</h3>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-dark">
                    <a href="{{route('analytics_sorted')}}" class="none" style="color: white;">
                        Sort by role
                    </a>
                </button>
            </div>
        </div>
    </div>

    <div class="container d-flex">
        <table class="table table-lighter table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Cardnumber</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row" name="id">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->card_number}}</td>
                    @if ($user->is_admin == true)
                    <td style="background: #7FFF00;">true</td>
                    @else
                    <td style="background: #e40611;">false</td>
                    @endif
                    <td>{{$user->created_at}}</td>
                    <td>
                        <a class="nav-link" id="edit" href="{{route('show_user', $user->id)}} " style="color:black;">
                            <span class="material-icons">edit</span>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('delete_user',  $user->id) }}" method="POST" style="margin-top: 8px;">
                            @csrf
                            @method('DELETE')
                            <button class="d-flex align-items-center">
                                <span class="material-icons d-flex align-items-center">delete</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- SEE USERS, THEIR CARDNUMBER AND THEIR BALANCE -->
<div class="section_two">
    <div class="container">
        <div class="h-50 d-inline-block w-100 p-3" id="hero">
            <h3 class="display-5">Card info</h3>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-dark">
                    <a href="{{route('analytics_sorted')}}" class="none" style="color: white;" id="btn">
                        Sort by balance
                    </a>
                </button>
            </div>
        </div>
    </div>

    <div class="container d-flex">
        <table class="table table-lighter table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Cardnumber</th>
                    <th scope="col">Balance</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <th scope="row" name="id">{{$payment->id}}</th>
                    <td>{{$payment->name}}</td>
                    <td>{{$payment->card_number}}</td>
                    @if($payment->amount == 0)
                    <td style="background: #e40611;">€{{$payment->amount}}</td>
                    @else
                    <td>€{{$payment->amount}}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



<!-- SEE ORDERS PLACED -->
<div class="section_two">
    <div class="container">
        <div class="h-50 d-inline-block w-100 p-3" id="hero">
            <h3 class="display-5">Orders placed</h3>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-dark">
                    <a href="{{route('analytics_sorted')}}" class="none" style="color: white;" id="btn">
                        Sort by name
                    </a>
                </button>
            </div>
        </div>
    </div>

    <div class="container d-flex">
        <table class="table table-lighter table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Order</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <th scope="row" name="id">{{$order->order_number}}</th>
                    <td>{{$order->name}}</td>
                    <td>{{$order->order}}</td>
                    <td>€{{$order->total_amount}}</td>
                    @if($order->status == 0)
                    <td>Order placed</td>
                    @else
                    <td>Closed</td>
                    @endif
                    <td>
                        <form action="{{ route('delete_order',  $order->id) }}" method="POST" style="margin-top: 8px;">
                            @csrf
                            @method('DELETE')
                            <button class="d-flex align-items-center">
                                <span class="material-icons d-flex align-items-center">delete</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection