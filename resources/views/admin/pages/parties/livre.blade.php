<div class="row" id="rowdata">
    @if (session()->has('search'))
    @forelse (session()->get('search') as $l)
    <div class="col-md-3">
        <div class="ibox">
            <div class="ibox-content product-box">
                <div class="product-imitation" style="background-image: url('assets/img/livre/{{ $l->couverture }}'); background-size: cover;
                     background-position: center; background-repeat: no-repeat;">
                    {{-- [ INFO ] --}}
                </div>
                <div class="product-desc">
                    <span class="product-price">
                        {{ $l->nbrpage.' pages' }}
                    </span>
                    @forelse ($l->categories as $c)
                    <small class="text-muted">{{ $c->nom }}</small>
                    @empty

                    @endforelse
                    <a href="{{ route('detail',['id'=>$l->isbn]) }}" class="product-name"> {{ Str::limit($l->titre, 10,
                        '...') }}</a>
                    <div class="small m-t-xs">
                        {{ Str::limit($l->description, 100, '...') }}
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
    @empty

    @endforelse
    @else
    @forelse ($livres as $l)
    <div class="col-md-4">
        <div class="ibox">
            <div class="ibox-content product-box">
                <div class="product-imitation"
                    style="background-image: url('assets/img/livre/{{ $l->couverture }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

                </div>

                <div class="product-desc">

                    @forelse ($l->categories as $c)
                    {{-- <small class="text-muted">{{ $c->nom }}</small> --}}
                    <span class="product-price">
                        {{ $c->nom }}
                    </span>
                    @empty

                    @endforelse
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
    @empty

    @endforelse

    @endif
</div>