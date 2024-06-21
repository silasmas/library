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
                                <div >
                                    <div class="image-imitation" style="background-image: url('../assets/img/livre/{{ $livre->couverture }}'); background-size: cover;
                                                             background-position: center; background-repeat: no-repeat;">
                                        [IMAGE 1]
                                    </div>
                                </div>

                                <div >
                                    <div class="image-imitation" style="background-image: url('../assets/img/livre/{{ $livre->couverture2 }}'); background-size: cover;
                                                             background-position: center; background-repeat: no-repeat;">
                                        [IMAGE 2]
                                    </div>
                                </div>
                                <div>
                                    <div class="image-imitation" style="background-image: url('../assets/img/livre/{{ $livre->couverture3 }}'); background-size: cover;
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
                                <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                                <dt>Nombre de page :</dt>
                                <dd>{{ $livre->nbrpage }}</dd>
                                <dt>Langue :</dt>
                                <dd>{{ $livre->langue }}</dd>
                                {{-- <dd>{{$livre->guidevideo}}</dd> --}}
                            </dl>
                            <hr>

                            <div>
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-sm" onclick="event.preventDefault(),addALl('{{ $livre->id }}','GET', '../addRead','')"><i class="fa fa-cart-plus"></i>Emprunter pour lire</button>
                                    <button class="btn btn-white btn-sm" onclick="event.preventDefault(),addALl('{{ $livre->id}}','GET', '../addFavorie','')"><i class="fa fa-star"></i> Ajouter aux favoris
                                    </button>
                                    <button class="btn btn-white btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-youtube-play"></i> Emplacement du livre </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content animated bounceInRight">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <i class="fa fa-laptop modal-icon"></i>
                                    <h4 class="modal-title">Video guider</h4>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        <div class="ibox-content">
                                            <figure>
                                                <iframe width="500" height="350" src="https://www.youtube.com/embed/zwT5w9n1Mnk?si=PTJ6lpHlt0LcRxN-" frameborder="0" allowfullscreen></iframe>
                                            </figure>
                                        </div>
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
