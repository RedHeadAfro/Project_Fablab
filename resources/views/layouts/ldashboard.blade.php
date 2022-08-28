<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/background.css')}}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar navbar-light bg-light">
        <a href="{{route('home')}}">
            <img src="{{URL('images/ehb_log-removebg-preview.png')}}" alt="ehb logo" class="ehb_logo">
        </a>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>

            </ul>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 d-flex align-items-center">
                @if (auth()->user()->is_admin == true)
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
                </li>
                @endif
                <span class="v_line"></span>


                @auth
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-dark">Logout</button>
                </form>
                @endauth

                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Log-In</a>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-dark">
                        <a class="nav-link" id="sign_up" href="{{route('signup')}}">Sign-Up</a>
                    </button>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
    <!-- END NAVBAR -->

    @yield('content')

</body>

</html>