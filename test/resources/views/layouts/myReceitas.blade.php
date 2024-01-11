<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Receitas | Receitas </title>
    <link rel="stylesheet" href="/css/home.css">  
    <style>
        .MyReceitas{
            margin-top: 9rem;
        }
    </style>
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
<div class="containerReceitas MyReceitas">

                
           @foreach (array_reverse($receitas->all()) as $receita)
                    @if($receita['user_id'] == $userData->id)
                    

           <div class="card">

      
                  <a href="{{ route('detalhes', ['receitaId' => $receita->id ]) }}">  <img  src="{{ Storage::url($receita->receitaImg) }}" alt=""> </a>
                   <h2>{{$receita->title}}</h2>
                   <div class="user-rating">
                       <input type="radio" id="star1" name="rating" value="1">
                       <label onclick='avaliarReceita("1")' for="star1">1</label>
                       <input type="radio" id="star2" name="rating" value="2">
                       <label onclick='avaliarReceita("2")' for="star2">2</label>
                       <input type="radio" id="star3" name="rating" value="3">
                       <label onclick='avaliarReceita("3")' for="star3">3</label>
                       <input type="radio" id="star4" name="rating" value="4">
                       <label onclick='avaliarReceita("4")' for="star4">4</label>
                       <input type="radio" id="star5" name="rating" value="5">
                       <label onclick='avaliarReceita("5")' for="star5">5</label>
                   </div>
                   <div class="user-datas">
                   @foreach ($users as $user)
                       @if ($user->id == $receita->user_id)
                       <div class="imgUser">
                         {{$user -> first_name[0]}}{{$user -> last_name[0]}}
                       </div>
                       <div class="userName">
                       </div>
                           {{ $user->first_name }} {{ $user->last_name }}
                       @endif
                   @endforeach
                   </div>
                   </div> 
                   @endif
               @endforeach
          
           
       </div>  

</body>
</html>