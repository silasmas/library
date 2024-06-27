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
                        Ici vous trouverez tout les livres et avez la possibilité de le chercher.
                    </p>

                    {{-- <form id='formsearch' action="{{route('search') }}" method="post" onsubmit="event.preventDefault();recherche('search','POST','formsearch')"> --}}
                    <form id='formsearch' action="{{route('search') }}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" placeholder="Trouvez un livre par son nom, son auteur, son ISBN"
                                class="input form-control" name="search"
                                value="{{ session()->has('id')?session()->get('id'):""}}">
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
                                    <button aria-hidden="true" data-dismiss="alert" class="close"
                                        type="button">×</button>
                                    {{ session()->get('msg') }}
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="full-height-scroll">
                                    <div class="table-responsive">
                                        @include("admin.pages.parties.livre ")
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
