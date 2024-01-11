<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | Receitas</title>
     
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/home.css">  
</head>
<body>
    <div class="bodyContent">
        
    <div class="container">
        <form class="signup-form" method="POST" action="{{ route('signup') }}">
            @csrf
        <h2>Signup</h2>
        <input type="text" name="first_name" id="first_name" placeholder="Primeiro nome">
        <input type="text" name="last_name" id="last_name" placeholder="Último nome">
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="password"name="password" id="password" placeholder="Palavra Passe">
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar Palavra Passe">
        <button type="submit">Signup</button>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <li><a href="{{ route('login') }}"> Login</a></li>
        </form>
    </div>
    </div>
    
</body>
</html>