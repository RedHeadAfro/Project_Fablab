@extends('layouts.ldashboard')

@section('title', 'Add users')

@section('content')
<div class="d-flex justify-content-center">
    <div class="h-50 d-inline-block w-50 p-3" id="right_login">
        <h3 class="text-center mt-3">Add new users</h3>
        <form action="{{route('store_user')}}" method="post">
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
                <button type="submit" class="btn btn-dark" id="space">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection