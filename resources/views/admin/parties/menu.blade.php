
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span>
                            <img alt="image" class="img-circle" src="{{asset('img/default.png')}}" width="100" />
                            </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->prenom.'-'.Auth::user()->name }}</strong>
                            </span> <span class="text-muted text-xs block">{{ Auth::user()->fonction }} <b class="caret"></b></span> </span> </a>
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
                       PLA
                    </div>
                </li>
                <li class="{{ Route::current()->getName()===0 ?"active":"" }}">
                    <a href="#"><i class="fa fa-home"></i> <span class="nav-label">Pages </span>
                    <span class="pull-right label label-primary">Gestion</span></a>
                    <ul class="nav nav-second-level collapse">
                        <li class="{{ Route::current()->getName()=="G_Home"?"active":"" }}">
                            <a href="{{ route('dashboard')}}">
                                 <span class="nav-label">Teams</span></a>
                            </li>
                            <li  class="{{ Route::current()->getName()=="G_Publication"?"active":"" }}"> <a href="">
                                 <span class="nav-label">Publications</span></a>
                            </li>
                        <li class="{{ Route::current()->getName()=="Slide"?"active":"" }}"><a href="">Slides</a></li>
                        <li class="{{ Route::current()->getName()=="G_accueil"?"active":"" }}"><a href="">Accueil</a></li>
                        <li class="{{ Route::current()->getName()=="G_about"?"active":"" }}"><a href="">About</a></li>
                        <li class="{{ Route::current()->getName()=="G_Bureau"?"active":"" }}"><a href="">Bureaux</a></li>
                        <li class="{{ Route::current()->getName()=="G_expertise"?"active":"" }}"><a href="">Expertises</a></li>
                    </ul>
                </li>

                <li  class="{{ Route::current()->getName()=="news_letter"?"active":"" }}"> <a href=""><i class="fa fa-envelope-open"></i>
                     <span class="nav-label">News letter</span></a>
                </li>

                <li  class="{{ Route::current()->getName()===0?"active":"" }}">
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
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom" >
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="search_results.html">
                        {{-- <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div> --}}
                    </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Bienvenue dans l'espace Admin PLA.</span>
                        </li>

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
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>{{Route::current()->getName()}}</h2>
            </div>
        </div>
