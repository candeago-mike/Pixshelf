@extends("layout")

@section('contenu')
@php
function afficherEtoilesIcones($note) {
    $etoilesPleines = $note;
    $etoilesVides = 5 - $etoilesPleines;
    $html = str_repeat('<i class="fas fa-star"></i>', $etoilesPleines); // Étoiles pleines
    $html .= str_repeat('<i class="far fa-star"></i>', $etoilesVides); // Étoiles vides
    return $html;
}
@endphp



<div class="tri">
<h2>Trier par :</h2>
<a href="?ordre=note">Tri par note</a>
<a href="?ordre=titre">Tri par titre</a>
</div>

<div class="toute_photo">
@foreach ($photos as $photo)
<div class="photo">
    <img src="{{$photo->url}}">

    <div class="carac_photo">
    <div class="notation">
    {!! afficherEtoilesIcones($photo->note) !!}
</div>
    @foreach ($photo->tags as $tag)
        <p>{{$tag->nom}}</p>  
    @endforeach
    </div>
    </div>
@endforeach
</div>
@endsection