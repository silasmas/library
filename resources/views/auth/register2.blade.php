@extends("auth.template")

@section("content")
<div class="text-center middle-box loginscreen animated fadeInDown">
    <div>
        <div>
            <h3 class="logo-name">LIB</h3>
        </div>
        <h3>Créer votre compte chez {{ config('app.name') }}</h3>
        <p>Créez un compte pour le voir en action.</p>
        <form class="mb-4 m-t" role="form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Nom" required="">
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" name="email" class="form-control"  value="{{ old('email') }}" placeholder="Email" required="">
            </div>
            <div class="form-group">
                <input type="password"
                name="password" class="form-control" placeholder="Mot de passe" required autocomplete="new-password">
            </div>
            <div class="form-group">
                <input type="password" id="password_confirmation"
                name="password_confirmation" required autocomplete="new-password" class="form-control" placeholder="Confirmez le mot de passe">
            </div>
            <div class="form-group">
                <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Accepter les termes et la politique </label></div>
            </div>
            <button type="submit" class="block btn btn-primary full-width m-b">Enregistrer</button>

            <p class="text-center text-muted"><small>Vous avez déjà un compte?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="login.html">Se connecter</a>
        </form><br><br>
        {{-- <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2024</small> </p> --}}
    </div>
</div>

@endsection
