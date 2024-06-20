@extends("auth.template")

@section("content")
<div class="loginColumns animated fadeInDown">
    <div class="row">

        <div class="col-md-6">
            <h2 class="font-bold">Bienvenu à {{ config('app.name') }}</h2>

            <p>
                Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
            </p>

            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
            </p>

            <p>
                When an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </p>

            <p>
                <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
            </p>

        </div>
        <div class="col-md-6">
            <div class="ibox-content">
                <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required="">
                        {{-- <span style="color: red">{{ $errors->get('email') }}</span> --}}
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" autocomplete="current-password"  name="password"  class="form-control" placeholder="Mot de passe" required="">
                        {{-- <span style="color: red">{{ $errors->get('password') }}</span> --}}
                    </div>
                    <button type="submit" class="block btn btn-primary full-width m-b">Se conncter</button>

                    <a href="#">
                        <small>Mot de passe oublié?</small>
                    </a>

                    <p class="text-center text-muted">
                        <small>Vous n'avez pas de compte?</small>
                    </p>
                    <a class="btn btn-sm btn-white btn-block" href="{{ route('register') }}">Crée un compte</a>
                </form>
                <p class="m-t">
                    {{-- <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> --}}
                </p>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            Copyright {{ config('app.name') }}
        </div>
        <div class="text-right col-md-6">
           <small>© 2024</small>
        </div>
    </div>
</div>

@endsection
