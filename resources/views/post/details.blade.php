@extends('layouts.lanalytics')

@section('title', 'Edit users')

@section('content')
<div class="d-flex justify-content-center">
    <div class="h-50 d-inline-block w-50 p-3" id="right_login">
        <h3 class="text-center mt-3">Editing {{$users->name}}</h3>
        <form action="{{route('update_user', ['id' => $users->id])}}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input name="name" type="name" class="form-control" id="exampleInputName1"
                    placeholder="Enter the products name" value="{{old('name', $users->name)}}">

                @error('name')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                    placeholder="Enter the products name" value="{{old('email', $users->email)}}">

                @error('email')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputCardnumber1">Cardnumber</label>
                <input name="card_number" type="card_number" class="form-control" id="exampleInputCardnumber1"
                    value="{{old('card_number', $users->card_number)}}">

                @error('card_number')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputAdminRole1">Admin Role</label>
                <input type="number" name="is_admin" id="exampleInputAdminRole1" class="form-control"
                    value="{{old('is_admin', $users->is_admin)}}">
                <small id="exampleInputAdminRole1" class="form-text text-muted">Value 1 = Admin & Value 0 = Normal
                    user
                </small>

                @error('is_admin')
                <div class="alert-danger" style="background: #FFFFFF;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-dark" id="space">Finalize</button>
            </div>
        </form>
    </div>
</div>
@endsection