<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Jacquard+12&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cookie&family=Dancing+Script:wght@400..700&family=Jacquard+12&family=Meow+Script&family=Micro+5&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cookie&family=Dancing+Script:wght@400..700&family=Jacquard+12&family=Meow+Script&family=Micro+5&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Parkinsans:wght@300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <title>Accueil - PIXSHELF</title>
</head>

<header>    <div class="biglogo">
        <h1>PIXSHELF</h1>
    </div>

    <div class="etagere">
        <h2 class="v">V</h2>
        <h2 class="otre">otre étagère numérique</h2>
    </div>



<div class="barrenav">

    <nav>
        <a href=    "{{route('index')}}" class="navpixshelf">PIXSHELF</a>
    </nav>

    <nav class="navtitre">
        <a href="{{route('albums')}}" class="navalbum">ALBUMS <i class='bx bx-photo-album'></i></a>
        <a href="{{route('creation')}}" class="navalbum">CREATION D'ALBUMS <i class='bx bx-plus-circle'></i></a>
        <a href="{{route('photos')}}" class="navalbum">PHOTOS <i class='bx bx-camera'></i></a>
        @auth
        <div class="dropdown">
            <a href="{{route('dashboard')}}" class='navconnexion'>{{Auth::user()->name}}</a>
            <div class="dropdown-content">
            <a href="{{route('logout')}}" class='navdeco'>Déconnexion</a>
        </div>
        </div>
        @else
        
            <a href="{{route( 'login')}}" class="navconnexion">CONNEXION <i class='bx bx-user-circle'></i></a>

        @endauth
    </nav>

</div></header>

<body>

    <div id='content'class='container'>
    <main> @yield('contenu') </main>
    </div>    


<div class="plusbasdroite">

    <a href="{{route('creation')}}" class="plus"><i class='bx bx-plus-circle'></i></a>

</div>
    <div id="modal" class="modal">
        <img class="modal-content" id="modal-image" alt="Expanded Image">
    </div>
    <script>

    const modal = document.getElementById('modal');
    const modalImage = document.getElementById('modal-image');
    const photos = document.querySelectorAll('img');

        photos.forEach(photo => {

        photo.addEventListener('click', () => {
            if (modal.style.display == 'flex') {
                modal.style.display = 'none'
            }else{
                modal.style.display = 'flex';
                modalImage.src = photo.src;
            }
    });
    });


    </script>





<footer>

<div class="footeraccueil">
  <span class="footertxt">Site fait par Mike Candeago et Elise Boulet</span>

  <div class="reseaux">
  
    <h3><i class='bx bx-phone'></i></h3>
    <h3><i class='bx bxl-gmail' ></i></h3>
    <h3><i class='bx bxl-instagram' ></i></h3>
    <h3><i class='bx bxl-twitter' ></i></h3>
  

</div>
</div>


</footer>


</body>
</html>