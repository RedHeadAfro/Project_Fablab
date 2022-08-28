@extends('layouts.login')

@section('title', 'Password forgotten')

@section('content')
<div class="d-flex justify-content-center">
    <div class="h-50 d-inline-block w-50 p-3" id="right_login">
        <h3 class="text-center mt-3">One more step</h3>
        <form action="{{route('password.email')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" class="form-control @error('email')border border-danger @enderror"
                    id="exampleInputEmail1" placeholder="Enter your email">

                @error('email')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-dark" id="space">
                    Send
                </button>
            </div>
        </form>
    </div>
</div>
@endsection