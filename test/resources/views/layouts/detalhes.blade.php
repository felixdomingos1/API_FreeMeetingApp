<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes | Receitas </title>
    <link rel="stylesheet" href="/css/home.css">  
    <style>
        .CardReceitas{
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            width: 100%;
            height: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .corpoDetalhes{
            background: #fff;
            padding: 1rem;
            border-radius: 4px;
            box-shadow: .4px 0px 40px rgba(0,0,0,0.260);
            width: 60%;
            height: 500px;
            margin-top: 8rem;
        }
        .imgCard{
            width:100% ;
            height: 60%;
            background: red;
            border-radius: 8px;
        }
        .tituloDetalhes{
            padding: 5px;
            font-size: 30px;
            color: #f5ae50;
        }
        .BackToHome{
            text-decoration: none;
            background: #f5ae50;
            color: #9d63d3;
            padding: 8px;
        }
    </style>
</head>

<body onload="detalhes('{{$receitaId}}')">
<header >
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


    <div class="CardReceitas">
        
        <div class="corpoDetalhes">
         

        </div>
    </div>
    
</body>

<script>
    
    let result = {}
    
    const detalhes =async (receitaId) => {
        const response = await  fetch(`http://localhost:8000/api/detalhes/${receitaId}` )
        
        result = await response.json()
        const corpoDetalhes = document.querySelector('.corpoDetalhes')
        console.log(result);
        corpoDetalhes.innerHTML +=`
        <div class="imgCard">
                
        </div>
        <div class="tituloDetalhes">${result['title']}</div>
        <div class="tituloDetalhes">Igrediente: ${result['ingredient']}</div>
        <div class="tituloDetalhes">Tempo de Preparo: ${result['preparationTime']}</div>
        <div  class="tituloDetalhes">Modo de Fazer: ${result['preparationMethod']}</div>
        <a href="{{ route('home')}} " class="BackToHome"> Voltar para o inicio </a>
        
            `
       }
    </script>
</html>