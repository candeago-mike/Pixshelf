@extends("layout")

@section('contenu')
    <form class='form_co' action="{{route('login')}}" method="post">
    @csrf
    <label for="email">Email</label>
    <input class='input' type="email" id='email' name="email" value="{{old('email')}}" placeholder="nom d'utilisateur">
    <br/>
    @error("email")
    {{$message}}
    @enderror
    <label for="password">Mot de passe</label>
    <input class='input' type="password" id='password' name="password" placeholder="mot de passe">
    <br/>
    @error("password")
    {{$message}}
    @enderror

    <button>Se connecter</button>

    <p> Pas encore inscrit ? <a class='clique' href='{{route('inscription')}}'>Clique Ici !</a></p>
   @endsection