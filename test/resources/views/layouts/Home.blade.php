<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Receitas</title>
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/home.css">  

    </head>
    <body>
       <header>
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

<!-- ////////////////////////////////////terá componentes aqui;;;;;;;;;;;;;;;; -->

            <main>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form  class='form' action="" id="publicReceitas" name="publicReceitas">
                    <input type="text" id="openModal">
                    <button >Publicar</button>
                </form>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Publicação</h2>
                        <form method="POST" action="{{ route('receitas')}}" enctype="multipart/form-data">
                        @csrf
                            <input type="text" name="title" id="title" placeholder="Título">
                            <input type="text" name="ingredient" id="ingredient" placeholder="Igredientes">
                            <input type="file" name="receitaImg" id="receitaImg" placeholder="Imagem" >
                            <input type="time" name="preparationTime" id="preparationTime" placeholder="Tempo de Cozimento">
                            <textarea name="preparationMethod" id="preparationMethod" placeholder="Modo de preparação"></textarea>
                            <button type="submit">Publicar</button>
                        </form>
                    </div>
                </div>
            <div class="containerReceitas">
           

                
                @foreach (array_reverse($receitas->all()) as $receita)
                <div class="card">
                       <a href="{{ route('detalhes', ['receitaId' => $receita->id ]) }}">
                       @if(isset($receita->receitaImg ))
                            <!-- <img  src="public/storage/app/imgs" alt="bkejbew">  -->
                            <img  src="{{ Storage::url($receita->receitaImg) }}" alt="bkejbew"> 
                        @endif
                        </a>
                        <h2>{{$receita->title}}</h2>
                        <div class="user-rating">
                            <input type="radio" id="star1" name="rating" value="1">
                            <label onclick='avaliarReceita("1","{{$userData->id}}","{{$receita->id}}","{{$receita->user_id}}")' for="star1">1</label>
                            <input type="radio" id="star2" name="rating" value="2">
                            <label onclick='avaliarReceita("2","{{$userData->id}}","{{$receita->id}}","{{$receita->user_id}}")' for="star2">2</label>
                            <input type="radio" id="star3" name="rating" value="3">
                            <label onclick='avaliarReceita("3","{{$userData->id}}","{{$receita->id}}","{{$receita->user_id}}")' for="star3">3</label>
                            <input type="radio" id="star4" name="rating" value="4">
                            <label onclick='avaliarReceita("4","{{$userData->id}}","{{$receita->id}}","{{$receita->user_id}}")' for="star4">4</label>
                            <input type="radio" id="star5" name="rating" value="5">
                            <label onclick='avaliarReceita("5","{{$userData->id}}","{{$receita->id}}","{{$receita->user_id}}")' for="star5">5</label>
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
                        <div class="share" onclick="sharing('{{ $receita->id }}','{{ $user->id}}','{{$receita->user_id}}')">Partilhar</div>
                        </div>
                        </div>
                    @endforeach
            </div>  
            </main>
            <footer>
                Copyright 2024, All right reserved
            </footer>

    </body>
    
    <!-- <script>
        avaliarReceita= () =>{
            fetch('api')
        }
    </script> -->

    <script>
       const  sharing = async (receitaId,userId,receitaUserId) => {
            alert('Partilhado com sucesso')
            const response = await fetch(`http://localhost:8000/api/sharing/${receitaId}/${userId}/${receitaUserId}`)
        }

        const avaliarReceita = async (number, avaliador,receitaId,receitaUserId) => {
            alert('Avaliado!')
             await fetch(`http://localhost:8000/api/avaliar/${receitaId}/${avaliador}/${number}/${receitaUserId}`)
        }
    </script>
    <script src="/js/index.js"></script>
    <script src="/js/home.js"></script>
</html>

