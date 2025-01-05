@extends("layout")

@section('contenu')

<h1>Vos albums :</h1>
@foreach($personne->album as $albumm)

    <p class='hidden'>{{$test = $albumm->photos}}</p>
    <h2>{{$albumm->titre}}</h2>
    @foreach ($test as $p)
        <div class='photo_dashboard'>
            <a href="{{route('supprimer',['id' => $p->id])}}" class="button">SUPPRIMER</a>
        <img src='{{$p->url}}'>
        </div>
        @foreach ($p->tags as $tag)
        {{$tag->nom}}
        @endforeach
        
    @endforeach

@endforeach
    

@endsection

