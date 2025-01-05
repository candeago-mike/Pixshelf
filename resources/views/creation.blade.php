@extends("layout")

@section('contenu')

@if (session('succes'))
    <div class="alert alert-success">
        {{ session('succes') }}
    </div>
@endif

<h1>Créer ton album</h1>
    <form method="POST" action="{{route('creationT')}}">
        @csrf
        <input type="text" id='titre' class="titreinput" name="titre" placeholder="titre">
    </br>
    <button type="submit">Créer</button>
    </form>


<h1> Ajoute des photos </h1>

    <form method='POST' action="{{route('ajout')}}" enctype="multipart/form-data">
        @csrf
        <input type='text' name="titre" placeholder='titre'>

        <select name='note'>
            <option class="option">1</option>
            <option class="option">2</option>
            <option class="option">3</option>
            <option class="option">4</option>
            <option class="option">5</option>
        </select>

        <select name="id_album">
            @foreach ($personne->album as $p)
                <option value="{{$p->id}}">{{$p->titre}}</option>
            @endforeach
        </select>
        <input type="file" id='url' name="url" required>
        <label for="url" class="label">Choisir un fichier</label>


        <select id='select' name="id_tag[]" multiple>
            @foreach ($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->nom}}</option>
            @endforeach
        </select>

<br>

        <button type="submit">Ajouter</button>
    </form>


    <script>

    document.addEventListener("DOMContentLoaded", () => {
    const spacers = document.querySelectorAll(".spacer");
  
    const handleScroll = () => {
      spacers.forEach((spacer) => {
        const spacerTop = spacer.getBoundingClientRect().top;
        const viewportHeight = window.innerHeight;
  
        if (spacerTop < viewportHeight - 100) {
          spacer.classList.add("active");
        }
      });
    };
  
    window.addEventListener("scroll", handleScroll);
    handleScroll(); // Pour activer immédiatement les animations visibles au chargement
  });
  
  </script>

@endsection