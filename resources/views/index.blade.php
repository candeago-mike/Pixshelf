@extends("layout")

@section('contenu')

<div class="pres">

            <h3>Tous vos albums photos en format numérique !</br>Gardez vos souvenirs en <strong>sécurité</strong>.</br>
                 Créez et revivez vos plus beaux moments dans un espace conçu pour préserver vos instants précieux.</h3>

        </div>

            <div id="caroussel">
                <div class="accueilpics">
                    <img src="https://www.lodge-coco.com/wp-content/uploads/2020/05/Plage-Grande-Anse-Deshaies-Guadeloupe-1000-768x513.jpg">
                    <img src="https://www.autolagon.fr/blog/wp-content/uploads/2019/08/58845566_719194398539870_1399447932997992448_o-1080x675.jpg">
                    <img src="https://media.skirentalsolution.sport2000.fr/images/cache/cms_image_runtime/rc/bkNlTEFr/cms/CMS%20Guide%20Sport%202000/Ski-Alpin-histoire.jpg">
         
                </div>
            </div>
        
        </div>
        







    <!-- @foreach ($albums as $album)
    <div style="display : flex;" class='container'>
        <h2>{{$album -> titre}}</h2>

        @foreach ($album->photos as $photo)
        <div >
            <p>{{$photo->titre}}</p>
            <img src='{{$photo->url}}'>
            @foreach ($photo->tags as $tag)
                <p>{{$tag->nom}}</p>
            @endforeach
            </div>
        @endforeach
        </div>
    @endforeach -->
    <div id="modal" class="modal">
        <img class="modal-content" id="modal-image" alt="Expanded Image">
    </div>
@endsection

