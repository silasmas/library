@extends("admin.parties.template")

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <div class="row">
                            @forelse ($UserLivrePreter as $l)
                            <div class="col-md-4">
                                <div class="ibox">
                                    <div class="ibox-content product-box">
                                        <div class="product-imitation"
                                            style="background-image: url('assets/img/livre/{{ $l->livre->couverture }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                                        </div>
                                        <div class="product-desc">
                                            @forelse ($l->livre->categories as $c)
                                            <span class="product-price">
                                                {{ $c->nom }}
                                            </span>
                                            @empty

                                            @endforelse
                                            <small class="text-muted">{{ $l->livre->auteur }}</small>
                                            <a href="{{ route('detail',['id'=>$l->livre->isbn]) }}"
                                                class="product-name"> {{ Str::limit($l->livre->titre,
                                                20,
                                                '...') }}</a>
                                            <div class="small m-t-xs">
                                                {{ Str::limit($l->livre->description, 80, '...') }}
                                            </div>
                                            <div class="m-t text-righ">
                                                <a href="{{ route('detail',['id'=>$l->livre->isbn]) }}"
                                                    class="btn btn-xs btn-outline btn-primary">Detail <i
                                                        class="fa fa-long-arrow-right"></i> </a>
                                            </div>
                                            <hr>
                                            @include("admin.pages.parties.favorie")
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty

                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection