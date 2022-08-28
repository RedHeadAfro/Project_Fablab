@extends('layouts.ldashboard')

@section('title', 'Dashboard')

@section('content')
<div class="container" id="background">
    <div class="container">
        <div class="h-50 d-inline-block w-100 p-3" id="hero">
            <h1 class="display-3">Dashboard</h1>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add users</h5>
                        <p class="card-text">Need to add users, click on the link to proceed</p>
                        <button type="button" class="btn btn-dark">
                            <a class="nav-link" id="sign_up" href="{{route('add_user')}}">Next</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add admins</h5>
                        <p class="card-text">Need to add admins, click on the link to proceed</p>
                        <button type="button" class="btn btn-dark">
                            <a class="nav-link" id="sign_up" href="{{route('add_admin')}}">Next</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Analytics</h5>
                        <p class="card-text">Proceed to see all sorts of data</p>
                        <button type="button" class="btn btn-dark">
                            <a class="nav-link" id="sign_up" href="{{route('analytics')}}">Next</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add new products</h5>
                        <p class="card-text">
                            Need to add new products, or edit other products, click on the link to proceed
                        </p>
                        <button type="button" class="btn btn-dark">
                            <a class="nav-link" id="sign_up" href="{{route('product')}}">Next</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection