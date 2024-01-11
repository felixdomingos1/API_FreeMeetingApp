<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificações | Receitas </title>
    <link rel="stylesheet" href="/css/home.css">  

</head>
<body >
<body onload="myNotification('{{$userData->id}}', '{{ $users}}')">
    
<header class="Notifyheader">
    <span class='Logo'>Rece<strong>itas</strong> </span>
    <ul class='ulHeader'>
    <!-- <li class='active'>Inicio</li> -->
         <li><a href="{{ route('home')}}"> Inicio</a></li>
        <li><a href="{{ route('myReceitas')}}"> Minhas Receitas</a></li>
        <li><a href="{{ route('notification')}}"> Notificações</a></li>
        <li><a href=" "> Perfil </a></li>
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
<div class="NotifyContainer">

   

    
</div>
</body>

<script>
      const  myNotification = async (userId, users ) => {
            const response = await fetch(`http://localhost:8000/api/myNoyifies/${userId}`)
            

            const allNotifies = await response.json()


            const NotifyContainer = document.querySelector('.NotifyContainer')

            for (const notification of allNotifies) {
                if(notification.receitaUserId === userId){
                    const { notifiedBy_id } = notification

                    const response2 = await fetch(`http://localhost:8000/api/user/${notifiedBy_id}`)

                    const notifiedUserData= await response2.json()

                    const {first_name,last_name, email } = notifiedUserData[0];

                    if (notification.type =='shared') {
                        var notifySMS = ` <span>${first_name} ${last_name} Partilhou a sua receita</span>`
                    }



                    NotifyContainer.innerHTML +=  `
                    <div class="contentNotify">
                        <div class="HotifyHeader">
                            <div class="userImgNotify">
                                <!-- <img src="" alt=""> -->
                                <span>${first_name[0]}${last_name[0]}</span>
                            </div>
                            <div class="userDataNotify">
                                <span>${first_name} ${last_name}</span>
                                <p>${email}</p>
                            </div>        
                        </div>
                        <div class="contextNotify">
                            ${notifySMS}
                        
                            
                        </div>
                    </div>
                    `

                }
               
               

        //     console.log(data);
        }}
</script>
</html>