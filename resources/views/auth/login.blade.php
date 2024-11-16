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
    <section class='Auth'>
       {{-- session message --}}
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
        <div class='card'>
            <div class='img-box'>
                <img src="{{asset('images/login-register.jpg')}}" alt="">
                <h3>Welcome to the Carifer Task</h3>
                <span>Sign In your Account</span>
            </div>
            <form action="{{route('loginpost')}}" method="POST">
            @csrf
                <main class=''>
                    <h1 class=''>Login Form</h1>
                    <div class='form-control'>
                        <label for="email">Email</label>
                        <input type="email" name='email' value="{{old('email')}}">
                        @if($errors->has('email'))
                            <p class="error">{{$errors->first('email')}}</p>
                        @endif
                    </div>
                    <div class='form-control'>
                        <label for="password">Password</label>
                        <input type="password" name='password' value="{{old('password')}}">
                        @if($errors->has('password'))
                            <p class="error">{{$errors->first('password')}}</p>
                        @endif
                    </div>
                    <button type="submit" class='submit'>Login</button>
                    <a href="{{ route('register')}}">Join with Us, Register!</a>
                </main>
            </form>
        </div>
    </section>
</body>
</html>