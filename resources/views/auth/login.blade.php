@extends('layouts.login')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-end">
    <div>
        <img src="{{URL('images/Erasmushogeschool login.png')}}" alt="simple design for login (contains alot of red)"
            id="left_login">
    </div>
    <div class="h-50 d-inline-block w-50 p-3" id="right_login">
        <a href="{{route('home')}}"><img src="{{URL('images/ehb_log-removebg-preview.png')}}"
                alt="Erasmushogeschool logo" style="width: 100px;" class="float-end"></a>
        <h1 class="text-center mb-2" style="margin-top: 100px;">Login</h1>

        <div class="space"></div>

        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="email" type="email" class="form-control @error('name')border border-danger @enderror"
                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email"
                    value="{{old('email')}}">

                @error('email')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control @error('name')border border-danger @enderror"
                    id="exampleInputPassword1" placeholder="Password">

                @error('password')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <!-- <div class="form-group form-check">
                <input name="remember" type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div> -->
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-dark" id="space">Get started</button>
            </div>
            <div class="space"></div>
            <span class="display-4" id="login_warning">Don't own an account? <a href="{{route('signup')}}"
                    id="links">Sign up</a></span>
            <span class="display-4" id="login_warning">Forgot your password? <a href="{{route('password.request')}}"
                    id="links">Send email</a></span>
        </form>
    </div>
</div>
@endsection