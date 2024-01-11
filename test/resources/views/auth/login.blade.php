<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Receitas</title>

    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/home.css">  
</head>
<body>
    <div class="bodyContent">
        <div class="container">
            <form class="login-form" method="Post" action="{{ route('login') }}">
                @csrf
                <h2>Login</h2>
                <input type="email"name="email" id="email" placeholder="Email">
                <input type="password" name="password" id="password" placeholder="Password">
                <button type="submit">Login</button>
                <a href="{{route('home')}}"> continuar anonimo </a>
                <a href="{{ route('signup') }}">Register</a>
            </form>
        </div>
    </div>
        
</body>
</html>