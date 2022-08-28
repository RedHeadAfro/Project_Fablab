@extends('layouts.lsignup')

@section('title', 'Sign-up now')

<!-- Form for sign-up -->
@section('content')
<div class="signup_container">
    <div class="h-50 d-inline-block w-50 p-3" id="left_signup">
        <a href="{{route('home')}}"><img src="{{URL('images/ehb_log-removebg-preview.png')}}"
                alt="Erasmushogeschool logo" style="width: 100px;"></a>
        <h1 class="text-center mb-2">Make an account now !</h1>

        <form action="{{route('signup')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input name="name" type="text" class="form-control @error('name')border border-danger @enderror"
                    id="exampleInputPassword1" placeholder="Name" value="{{old('name')}}">

                @error('name')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
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
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password Confirmation</label>
                <input name="password_confirmation" type="password"
                    class="form-control @error('name')border border-danger @enderror" id="exampleInputPassword1"
                    placeholder="Repeat your password">

                @error('password')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-dark" id="space">Sign up now!</button>
            </div>
        </form>
        <div class="space"></div>
        <span class="display-4" id="login_warning">Already own an account? <a href="{{route('login')}}"
                id="links">Login</a></span>
    </div>
    <div>
        <img src="{{URL('images/Erasmushogeschool login (2).png')}}" alt="guy learning programming" id="right_signup">
    </div>
</div>
@endsection