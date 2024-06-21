@extends("admin.parties.template")


@section("content")
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    {{-- <span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10
                        pm -
                        12.06.2014</span> --}}
                    <h2>Ma bibliothèque</h2>

                    <p>
                        All clients need to be verified before you can send email and set a project.
                    </p>

                    <form action="{{route('search') }}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" placeholder="Trouvez un livre par son nom, son auteur, son ISBN"
                                class="input form-control" name="search" value="{{ session()->has('id')?session()->get('id'):""}}">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn btn-primary"> <i class="fa fa-search"></i>
                                    Recherche</button>
                            </span>
                        </div>
                    </form>
                    <div class="clients-list">
                        <div class="row">
                            @if (session()->has("msg"))
                            <div class="col-md-6 col-md-offset-3">
                                <div class="alert alert-{{session()->get('type')}} alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    {{ session()->get('msg') }}
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="full-height-scroll">
                                    <div class="table-responsive">
                                        <div class="row">
                                            @if (session()->has('search'))
                                            @forelse (session()->get('search') as $l)
                                            <div class="col-md-3">
                                                <div class="ibox">
                                                    <div class="ibox-content product-box">

                                                        <div class="product-imitation"
                                                            style="background-image: url('assets/img/livre/{{ $l->couverture }}'); background-size: cover;
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
                                                            <a href="{{ route('detail',['id'=>$l->isbn]) }}" class="product-name"> {{ Str::limit($l->titre, 10, '...') }}</a>
                                                            <div class="small m-t-xs">
                                                                {{ Str::limit($l->description, 100, '...') }}
                                                            </div>
                                                            <div class="m-t text-righ">

                                                                <a href="{{ route('detail',['id'=>$l->isbn]) }}"
                                                                    class="btn btn-xs btn-outline btn-primary">Detail <i
                                                                        class="fa fa-long-arrow-right"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty

                                            @endforelse
                                            @else
                                            @forelse ($livres as $l)
                                            <div class="col-md-3">
                                                <div class="ibox">
                                                    <div class="ibox-content product-box">

                                                        <div class="product-imitation"
                                                            style="background-image: url('assets/img/livre/{{ $l->couverture }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                                                            {{-- [ INFO ] --}}
                                                        </div>
                                                        <div class="product-desc">
                                                            @forelse ($l->categories as $c)
                                                            {{-- <small class="text-muted">{{ $c->nom }}</small> --}}
                                                            <span class="product-price">
                                                                {{ $c->nom  }}
                                                            </span>
                                                            @empty

                                                            @endforelse
                                                            <small class="text-muted">{{ $l->auteur }}</small>
                                                            {{-- @forelse ($l->categories as $c)
                                                            @empty

                                                            @endforelse --}}
                                                            <a href="{{ route('detail',['id'=>$l->isbn]) }}" class="product-name"> {{ Str::limit($l->titre, 20, '...') }}</a>
                                                            <div class="small m-t-xs">
                                                                {{ Str::limit($l->description, 80, '...') }}
                                                            </div>
                                                            <div class="m-t text-righ">

                                                                <a href="{{ route('detail',['id'=>$l->isbn]) }}"
                                                                    class="btn btn-xs btn-outline btn-primary">Detail <i
                                                                        class="fa fa-long-arrow-right"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty

                                            @endforelse

                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
