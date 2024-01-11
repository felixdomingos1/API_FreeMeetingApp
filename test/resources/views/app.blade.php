<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/home.css">
    <title>Receitas</title>
    <style>
        .containerReceitas{
            width: 1300px;
            margin: 0px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-top: 8rem;
        }
        .headerInit{
            display: flex;
            justify-content: space-around;
            align-items: center;
            box-shadow: 1px 2px 3px rgba(0,0,0,0.346);
            top: 0;
        }
        nav ul{
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .Btns li{
            color: #fff;
            font-size: 20px;
            list-style: none;
        }
        .loginBtn{
            background: #da8920;
            padding: 14px;
        }
        .registerBtn{
            background: #eba231;
            padding: 14px;
        }
        .Btns li a{
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header class="headerInit">
        <span class='Logo'>Rece<strong>itas</strong> </span>
        <nav>
            <ul class="Btns">
                <li><a href="{{ route('login') }}" class="loginBtn"> Login </a></li>
                <li>
                    @guest
                        <a href="{{ route('signup') }}" class="registerBtn"> Register </a>
                    @endguest
                </li>
            </ul>
        </nav>
    </header>
    <div class="containerReceitas initialHome">
        @foreach (array_reverse($receitas->all()) as $receita)
        <div class="card ">
            <a href="{{ route('detalhes', ['receitaId' => $receita->id ]) }}">  <img  src="/imgs/pratodecomidafotomarcossantos003.jpg" alt=""> </a>
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
        @endforeach
    </div>  
</body>
</html>