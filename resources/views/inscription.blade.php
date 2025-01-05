@extends("layout")

@section('contenu')
<form class='form_co' action="{{ route('register') }}" method="POST">
            @csrf

            <div>
                <label for="name">Nom</label>
                <input class='input' placeholder='Nom' type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="email">Email</label>
                <input class='input' placeholder='Email' type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password">Mot de passe</label>
                <input class='input' placeholder='Mot de passe' type="password" id="password" name="password" required>
                @error('password')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input class='input' placeholder='Confirmation Mot de passe' type="password" id="password_confirmation" name="password_confirmation" required>
                @error('password_confirmation')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">S'inscrire</button>
        </form>
    </div>

@endsection