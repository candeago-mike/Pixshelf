@extends('layout')

@section('contenu')
<div class="hidden" id="les_albums">{{$albums}}</div>
<span class="hidden">{{$i = 0}}</span>
@foreach ($albums as $album)
<div class="album" id="album{{$i}}">
   <h1>{{$album->titre}}</h1><br>
<div class="hidden">
   @foreach ($album->photos as $photo)
    <img id='image{{$i}}' src="{{$photo->url}}">
   @endforeach
</div>
   <img id="Image{{$i}}" src="">
<br>
<div class="boutons_album">
    <button class="precedent" data-album="{{$i}}"><</button>
   <button class="suivant" data-album="{{$i}}">></button>
   </div>
   </div>
<span class="hidden">{{$i += 1}}</span>
@endforeach

<script>
    // Récupérer les albums en JSON
    let albums = @json($albums);


    // Parcourir chaque album pour initialiser l'affichage de la première image
    for (let i = 0; i < albums.length; i++) {
        let albumDiv = document.getElementById('album' + i);
        let photos = albumDiv.querySelectorAll('div.hidden img'); // Récupère les photos cachées
        let imageDisplay = document.getElementById('Image' + i); // Image visible
        if (photos.length > 0) {
            imageDisplay.src = photos[0].src; // Affiche la première image par défaut
        }
    }

    // Ajouter un événement "click" sur tous les boutons "Suivante"
    let buttons = document.querySelectorAll('.suivant');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            let albumIndex = parseInt(this.dataset.album); // Récupère l'index de l'album
            let albumDiv = document.getElementById('album' + albumIndex);
            let photos = albumDiv.querySelectorAll('div.hidden img'); // Récupère les photos cachées
            let imageDisplay = document.getElementById('Image' + albumIndex); // Image visible

            // Gérer l'index actuel de l'image
            let currentIndex = parseInt(imageDisplay.dataset.index || 0);
            let nextIndex = (currentIndex + 1) % photos.length; // Passer à la photo suivante (boucle)

            // Mettre à jour l'image visible
            imageDisplay.src = photos[nextIndex].src;
            imageDisplay.dataset.index = nextIndex; // Met à jour l'index actuel
        });
    });


    let buttonsPrev = document.querySelectorAll('.precedent'); // Boutons pour revenir en arrière
buttonsPrev.forEach(button => {
    button.addEventListener('click', function() {
        let albumIndex = parseInt(this.dataset.album); // Récupère l'index de l'album
        let albumDiv = document.getElementById('album' + albumIndex);
        let photos = albumDiv.querySelectorAll('div.hidden img'); // Récupère les photos cachées
        let imageDisplay = document.getElementById('Image' + albumIndex); // Image visible

        // Gérer l'index actuel de l'image
        let currentIndex = parseInt(imageDisplay.dataset.index || 0);
        let prevIndex = (currentIndex - 1 + photos.length) % photos.length; // Passer à la photo précédente (boucle)

        // Mettre à jour l'image visible
        imageDisplay.src = photos[prevIndex].src;
        imageDisplay.dataset.index = prevIndex; // Met à jour l'index actuel
    });
});

</script>
@endsection