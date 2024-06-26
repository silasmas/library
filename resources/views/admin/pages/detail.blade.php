@extends("admin.parties.template")

@section("autres_style")
<link href="{{ asset('assets/css/slick/slick.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/slick/slick-theme.css') }}" rel="stylesheet">
@endsection

@section("content")
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Detail du livre</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">Ma library</a>
            </li>
            <li class="active">
                <strong>Detail</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox product-detail">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="product-images">
                                <div>
                                    <div class="image-imitation"
                                        style="background-image: url('../assets/img/livre/{{ $livre->couverture }}'); background-size: cover;
                                                             background-position: center; background-repeat: no-repeat;">
                                        [IMAGE 1]
                                    </div>
                                </div>

                                <div>
                                    <div class="image-imitation"
                                        style="background-image: url('../assets/img/livre/{{ $livre->couverture2 }}'); background-size: cover;
                                                             background-position: center; background-repeat: no-repeat;">
                                        [IMAGE 2]
                                    </div>
                                </div>
                                <div>
                                    <div class="image-imitation"
                                        style="background-image: url('../assets/img/livre/{{ $livre->couverture3 }}'); background-size: cover;
                                                             background-position: center; background-repeat: no-repeat;">
                                        [IMAGE 3]
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div class="col-md-7">

                            <h2 class="font-bold m-b-xs">
                                {{ $livre->titre }}
                            </h2>
                            <small>{{ "Auteur : ".$livre->auteur }}</small>
                            <div class="m-t-md">
                                <h2 class="product-main-price">{{ $livre->isbn }}
                                    <small class="text-muted">ISBN</small>
                                </h2>
                            </div>
                            <hr>

                            <h4>Description du livre</h4>

                            <div class="small text-muted">
                                {{ $livre->description }}
                            </div>
                            <dl class="small m-t-md">
                                <dt>Editeur :</dt>
                                <dd>{{ $livre->editeur }}</dd>
                                <dt>Date de publication :</dt>
                                <dd>{{ \Carbon\Carbon::parse($livre->datepublication )->isoFormat('LL') }} </dd>
                                <dt>Nombre de page :</dt>
                                <dd>{{ $livre->nbrpage }}</dd>
                                <dt>Langue :</dt>
                                <dd>{{ $livre->langue }}</dd>
                                <dt>Catégorie :</dt>
                                @forelse ($livre->categories as $c)
                                <dd>{{ $c->nom }}</dd>
                                @empty

                                @endforelse
                                {{-- <dd>{{$livre->guidevideo}}</dd> --}}
                            </dl>
                            <hr>

                            <div>
                                <div class="btn-group">
                                    @if ($livre->consulter->pluck('statu', 'livre_id')->filter(function ($statu) {
                                    return $statu == '1';
                                    })->isNotEmpty())
                                    <button class="btn btn-success btn-sm"
                                        onclick="event.preventDefault(),removeFavoris({{$livre->id }},'GET', '../removePret','Remettre le prêt','Vous êtes sur le point de mettre fin au prêt du livre')"><i
                                            class="fa fa-bookmark"></i>Emprunter pour lire</button>
                                    @else
                                    <button class="btn btn-white btn-sm"
                                        onclick="event.preventDefault(),addFavoris({{ $livre->id }},'GET', '../addPret')"><i
                                            class="fa fa-bookmark"></i>Emprunter pour lire</button>

                                    @endif
                                    @if ($livre->favories->pluck('livre_id')->filter(function ($livre_id) use ($livre){
                                    return $livre_id == $livre->id;
                                    })->isNotEmpty())
                                    <button class="btn btn-danger btn-sm"
                                        onclick="event.preventDefault();removeFavoris({{ $livre->id }},'GET', '../removeFavoris','Retirer des favoris','Etes-vous sûr de retirer ce livre de vos favoris?')"><i
                                            class="fa fa-heart"></i> Ajouter aux favoris
                                        @else
                                        <button class="btn btn-with btn-sm"
                                            onclick="event.preventDefault(),addFavoris('{{ $livre->id}}','GET', '../addFavorie','')"><i
                                                class="fa fa-heart"></i> Ajouter aux favoris

                                            @endif

                                    </button>
                                    @if ($livre->reserver->pluck('statu')->filter(function ($statu) {
                                        return $statu == "1";
                                        })->isNotEmpty())
                                        <button class="btn btn-info btn-sm"
                                            onclick="event.preventDefault(),removeFavoris({{$livre->id }},'GET', '../removeReservation','Remettre le prêt','Vous êtes sur le point de mettre fin au prêt du livre')"><i
                                                class="fa fa-check-square-o"></i>Reserver pour lire
                                        </button>
                                        @else
                                        <button class="btn btn-white btn-sm"
                                            onclick="event.preventDefault(),addFavoris({{ $livre->id }},'GET', '../addReservation')"><i
                                                class="fa fa-check-square-o"></i>Reserver pour lire
                                        </button>

                                        @endif
                                        <button class="btn btn-white btn-sm" data-toggle="modal"
                                            data-target="#myModal"><i class="fa fa-youtube-play"></i> Emplacement du
                                            livre </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include("admin.parties.modale")
                </div>
                <div class="ibox-footer">
                    {{-- <span class="pull-right">
                        Full stock - <i class="fa fa-clock-o"></i> 14.04.2016 10:04 pm
                    </span>
                    The generated Lorem Ipsum is therefore always free --}}
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
@section("autres-script")
<script src="{{ asset('assets/js/slick/slick.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.product-images').slick({
            dots: true
        });



    });

</script>
@endsection