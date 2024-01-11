<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil | Receitas </title>
</head>
<body>
    
<header class="Notifyheader">
       <span class='Logo'>Rece<strong>itas</strong> </span>
       <ul class='ulHeader'>
        <!-- <li class='active'>Inicio</li> -->
        <li><a href="{{ route('home')}}"> Inicio</a></li>
        <li><a href="{{ route('myReceitas')}}"> Minhas Receitas</a></li>
        <li><a href="{{ route('notification')}}"> Notificações</a></li>
        <li><a href="{{ route('profile')}}"> Perfil</a></li>
       </ul>
        <div class="singInOut">
            <span>Olá {{ $userData -> first_name}} {{ $userData -> last_name}}</span>
            <nav>
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class='logoutBtn'>Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endauth
            </nav>
        </div>
        </header>
    My profile
</body>
</html>