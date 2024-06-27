<div class="col-md-4">
    <div class="ibox">
        <div class="ibox-content product-box">
            <div class="product-imitation"
                style="background-image: url('assets/img/livre/{{ $l->couverture }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
            </div>
            <div class="product-desc">
                {{-- @forelse ($l->categories as $c)
               <small class="text-muted">{{ $c->nom }}</small>
                <span class="product-price">
                    {{ $c->nom }}
                </span>
                @empty
                @endforelse --}}
                <small class="text-muted">{{ $l->auteur }}</small>
                <a href="{{ route('detail',['id'=>$l->isbn]) }}" class="product-name"> {{ Str::limit($l->titre, 20,
                    '...') }}</a>
                <div class="small m-t-xs">
                    {{ Str::limit($l->description, 80, '...') }}
                </div>
                <div class="m-t text-righ">
                    <a href="{{ route('detail',['id'=>$l->isbn]) }}"
                        class="btn btn-xs btn-outline btn-primary">Detail <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
                <hr>
                @include("admin.pages.parties.favorie")
            </div>
        </div>
    </div>
</div>
<div class="text-center row">
    <div class="col-md-4">
        <div class="text-left">
            @php
            $livreId = favorisVIsible("mesFavoris")==true?$l->livre->id:$l->id;
            // $livreId = favorisVIsible("mesFavoris")?$l->livre->id:$l->id;
            dd($livreId);
            $conditionsRespectees = $userFavorie->favories->pluck('livre_id')->filter(function ($livre_id) use
            ($livreId) {
            return $livre_id == $livreId;
            })->isNotEmpty();
            @endphp
            @if ($conditionsRespectees)
            <a href=""
                onclick="event.preventDefault();removeFavoris({{ $livreId }},'GET', 'removeFavoris','Retirer des favoris','Etes-vous sûr de retirer ce livre de vos favoris?')"
                class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="bottom"
                title="Retirer des favoris"><i class="fa fa-heart"></i> </a>
            @else
            <a href="" onclick="event.preventDefault();addFavoris({{$livreId}},'GET', 'addFavories')"
                class="btn btn-danger btn-circle btn-outline" data-toggle="tooltip" data-placement="left"
                title="Ajouter aux favoris"><i class="fa fa-heart"></i> </a>

            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="text-left">
            @php
            $livreId = favorisVIsible("mesPrets")?$l->livre->id:$l->id;
            $conditionsRespectees = $userFavorie->consulter->pluck('statu', 'livre_id')->filter(function ($statu,
            $livre_id) use ($livreId) {
            return $statu == '1' && $livre_id == $livreId;
            })->isNotEmpty();
            @endphp
            @if ($conditionsRespectees)
            <a href=""
                onclick="event.preventDefault();removeFavoris({{$l->id }},'GET', 'removePret','Remettre le prêt','Vous êtes sur le point de mettre fin au prêt du livre')"
                class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="left"
                title="Remettre le livre emprunté"><i class="fa fa-bookmark"></i> </a>
            @else
            <a href="" onclick="event.preventDefault();addFavoris({{ $l->id }},'GET', 'addPret')"
                class="btn btn-success btn-circle btn-outline" data-toggle="tooltip" data-placement="left"
                title="Initier un prêt pour le livre"><i class="fa fa-bookmark"></i> </a>
            @endif

        </div>
    </div>
    <div class="col-md-4">
        <div class="text-left">
            @php
            $livreId = favorisVIsible("mesReservations")?$l->livre->id:$l->id;
            $conditionsRespectees = $userFavorie->reserver->pluck('statu', 'livre_id')->filter(function ($statu,
            $livre_id) use ($livreId) {
            return $statu == '1' && $livre_id == $livreId;
            })->isNotEmpty();
            // dd($l->livre);
            @endphp
            @if ($conditionsRespectees)
            <a href=""
                onclick="event.preventDefault();removeFavoris({{$livreId}},'GET', 'removeReservation','Finir la reservation','Vous êtes sur le point de finaliser la reservation, vous-les vous continuer?')"
                class="btn btn-info btn-circle "><i class="fa fa-check-square-o"></i> </a>

            @else
            <a href="" onclick="event.preventDefault();addFavoris({{ $livreId }},'GET', 'addReservation')"
                class="btn btn-info btn-circle btn-outline"><i class="fa fa-check-square-o"></i> </a>
            @endif
        </div>
    </div>
</div>



@push('scripts')


@endpush
