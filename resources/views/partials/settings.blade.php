@extends('layouts.ldashboard')

@section('title', 'Settings')

@section('content')
<!-- Settings page (modified): https://www.bootdey.com/snippets/tagged/settings -->
<div class="container mt-5">
    <div class="row justify-content-start">
        <div>
            <h2 class="h3 mb-4 page-title">Settings</h2>
            <div class="my-4">
                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist"></ul>
                <form>
                    <div class="row mt-5 align-items-center">
                        <div class="col-md-3 text-center mb-5">
                            <div class="avatar avatar-xl">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="..."
                                    class="avatar-img rounded-circle" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <h4 class="mb-1">{{$users->name}}</h4>
                                    <p class="small mb-3">Active since: {{$users->created_at->year}}</p>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-7">
                                    <p class="text-muted">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit nisl
                                        ullamcorper, rutrum metus in, congue lectus. In hac habitasse platea dictumst.
                                        Cras urna quam, malesuada vitae risus at,
                                        pretium blandit sapien.
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="small mb-0 text-muted">More info.</p>
                                    <p class="small mb-0 text-muted">More info..</p>
                                    <p class="small mb-0 text-muted">More info...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                @if($users->is_admin == true)
                                <h6 class="mb-1">Role: admin</h6>
                                @else
                                <h6 class="mb-1">Role: user</h6>
                                <p class="text-muted">
                                    You can recharge your card. <br>
                                    When payed, you will see your amount updated.<br>
                                    With that you can buy our products.
                                </p>
                                @endif
                            </div>
                            <div class="mb-3"></div>
                            <div class="col-md-7">
                                <h6 class="mb-1">Current email: {{$users->email}}</h6>
                                @if($users->email_verified_at == null)
                                <p class="small mb-3">Not yet verfied, please verify your email.</p>
                                @else
                                <p class="small mb-3">Verified: {{$users->email_verified_at->year}}</p>
                                @endif
                            </div>
                            <div class="col-md-7">

                                <h6 class="mb-1">Cardnumber: {{$users->card_number}}</h6>
                                @if($users->is_admin == false)
                                <p class="small mb-3">
                                    Current balance: {{$amounts}}
                                </p>
                                @else
                                <p class="small mb-3">Current balance: Not available</p>
                                @endif
                            </div>
                            <div>
                                @if($users->is_admin == false)
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-dark">
                                        <a href="{{route('recharge', $users->id)}}" class="none" style="color: white;">
                                            Recharge
                                        </a>
                                    </button>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection