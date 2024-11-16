<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Phone Application</title>
    {{-- FONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    {{-- ICONS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <section class="app">
        <nav>
            <div class="wrapper">
                <h1 class="brand">Online <i class="fa-solid fa-phone-volume"></i> Connection</h1>
                @include('layouts.navigation')
             </div>

            <div>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <div class="user">
                        <h5>{{Auth()->user()->name}}</h5>
                        <h6>{{Auth()->user()->role}}</h6>
                    </div>
                    <x-logout :value="__('logout')">
                        {{ __('Logout') }}
                    </x-logout>
                </form>
            </div>
        </nav>

        <div class="message">
            @if(session()->has('success'))
                <div class="status">
                    <p class="success">{{session()->get('success')}}</p>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="status">
                    <p class="error">{{session()->get('error')}}</p>
                </div>
            @endif
        </div>

        {{-- CONTENT SPECIFICATION AREA --}}
        <main>
            @yield('content')
        </main>
    </section>
</body>
</html>
