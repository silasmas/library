
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span>
                            <img alt="image" class="img-circle" src="{{asset('assets/img/default.png')}}" width="100" />
                            </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs">
                                <strong class="font-bold">{{ Auth::user()->prenom.'-'.Auth::user()->name }}</strong>
                            </span> <span class="block text-xs text-muted">{{ Auth::user()->fonction }} <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="">Profile</a></li>
                            <li class="divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            Déconnexion
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                            </li>
                        </ul>
                    </div>
                    <div class="logo-element">
                       UPC
                    </div>
                </li>
                <li  class="{{ Route::current()->getName()=="dashboard"?"active":"" }}"> <a href=""><i class="fa fa-book"></i>
                    <span class="nav-label">Ma bibliotèque </span></a>
               </li>
                <li  class="{{ Route::current()->getName()=="dashboard"?"":"" }}"> <a href=""><i class="fa fa-heart"></i>
                    <span class="nav-label">Mes favoris </span></a>
               </li>
                <li  class="{{ Route::current()->getName()=="dashboard"?"":"" }}"> <a href=""><i class="fa fa-bookmark"></i>
                    <span class="nav-label">Mes Emprunts </span></a>
               </li>
                <li  class="{{ Route::current()->getName()=="dashboard"?"":"" }}"> <a href=""><i class="fa fa-check-square-o"></i>
                    <span class="nav-label">Mes reservations</span></a>
               </li>
                <li class="{{ Route::current()->getName()===0 ?"active":"" }} {{ Auth::user()->role->pluck('description')->contains("1")?"hidden":"" }}">
                    <a href="#"><i class="fa fa-home"></i> <span class="nav-label">Pages </span>
                    <span class="pull-right label label-primary">Gestion</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="{{ Route::current()->getName()=="gbooks"?"active":"" }}">
                            <a href="{{ route('gbooks')}}">
                                 <span class="nav-label">Livres</span></a>
                            </li>
                            <li  class="{{ Route::current()->getName()=="G_Publication"?"active":"" }}"> <a href="">
                                 <span class="nav-label">Abonnements</span></a>
                            </li>
                        <li class="{{ Route::current()->getName()=="Slide"?"active":"" }}"><a href="">Abonnés</a></li>
                        <li class="{{ Route::current()->getName()=="G_accueil"?"active":"" }}"><a href="">Accueil</a></li>
                        <li class="{{ Route::current()->getName()=="G_about"?"active":"" }}"><a href="">About</a></li>
                        <li class="{{ Route::current()->getName()=="G_Bureau"?"active":"" }}"><a href="">Bureaux</a></li>
                        <li class="{{ Route::current()->getName()=="G_expertise"?"active":"" }}"><a href="">Expertises</a></li>
                    </ul>
                </li>



                {{-- <li  class="{{ Route::current()->getName()===0?"active":"" }}">
                    <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Pages</span>
                    <span class="pull-right label label-primary">Publication</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="{{ Route::current()->getName()=="P_addPublication"?"active":"" }}">
                            <a href="">
                                <span class="nav-label">Publications</span></a>
                            </li>
                             <li class="{{ Route::current()->getName()=="P_addAvocat"?"active":"" }}">
                            <a href="">
                                <span class="nav-label">Equipe</span></a>
                            </li>
                        <li class="{{ Route::current()->getName()=="P_AddSlide"?"active":"" }}"><a href="">Slides</a></li>
                        <li class="{{ Route::current()->getName()=="P_AddHome"?"active":"" }}"><a href="">Accueil</a></li>
                        <li class='{{ Route::current()->getName()=="P_addAbout"?"active":"" }}'><a href="">About</a></li>
                        <li class='{{ Route::current()->getName()=="P_AddExpertise"?"active":"" }}'><a href="">Expertises</a></li>
                        <li class='{{ Route::current()->getName()=="P_addBureau"?"active":"" }}'><a href="">Bureaux</a></li>
                    </ul>
                </li>
                 <li class="{{ Route::current()->getName()=="user"?"active":"" }}">
                <a href=""><i class="fa fa-users"></i>
                     <span class="nav-label">Gestion user</span></a>
                </li> --}}
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom" >
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="Rechercher un livre par nom ou le nom de l'auteur..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Bienvenue à la library numerique.</span>
                        </li>
                        @include("admin.parties.menuNotif")
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                           <i class="fa fa-sign-out"></i> Déconnexion
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </li>
                    </ul>

                </nav>
        </div>

