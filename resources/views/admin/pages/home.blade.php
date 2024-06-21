@extends("admin.parties.template")


@section("content")
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Ma library</h2>
    </div>
</div>
<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

    <div class="wrapper wrapper-content  animated fadeInRight">
        <div class="row">
            <div class="col-sm-8">
                <div class="ibox">
                    <div class="ibox-content">
                        <span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span>
                        <h2>Ma bibliothèque</h2>

                        <p>
                            All clients need to be verified before you can send email and set a project.
                        </p>
                        @if (session()->has("message"))
                        <div class="col-md-6 col-md-offset-3">
                            <div class="alert alert-{{session()->get('type')}} alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                {{ session()->get('message') }}
                            </div>
                        </div>
                        @endif
                        <form  action="{{route('dashboard') }}" method="get">
                        <div class="input-group">
                                <input type="text" placeholder="Search client " class="input form-control"
                                name="search" value="{{ request()->search }}">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn btn-primary"> <i class="fa fa-search"></i> Recherche</button>
                                </span>
                            </div>
                        </form>
                        <div class="clients-list">
                        <ul class="nav nav-tabs">
                            <span class="pull-right small text-muted">{{ $livres->count()." Livre(s)"}}</span>
                            <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> Liste par nom</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase"></i> Companies</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="full-height-scroll">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                                @forelse ($livres as $l)
                                                <tr>
                                                    <td class="client-avatar"><img alt="image" src="{{ asset('assets/img/livre/'.$l->couverture) }}"> </td>
                                                    <td><a data-toggle="tab" href="#livre-{{ $l->isbn }}" class="client-link">{{ $l->auteur }}</a></td>
                                                    <td> {{ $l->titre }}</td>
                                                    <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                    <td> {{ $l->isbn }}</td>
                                                    <td class="client-status"><span class="label label-primary">Active</span></td>
                                                </tr>
                                                @empty

                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- <div id="tab-2" class="tab-pane">
                                <div class="full-height-scroll">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-1" class="client-link">Tellus Institute</a></td>
                                                <td>Rexton</td>
                                                <td><i class="fa fa-flag"></i> Angola</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-2" class="client-link">Velit Industries</a></td>
                                                <td>Maglie</td>
                                                <td><i class="fa fa-flag"></i> Luxembourg</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-3" class="client-link">Art Limited</a></td>
                                                <td>Sooke</td>
                                                <td><i class="fa fa-flag"></i> Philippines</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-1" class="client-link">Tempor Arcu Corp.</a></td>
                                                <td>Eisden</td>
                                                <td><i class="fa fa-flag"></i> Korea, North</td>
                                                <td class="client-status"><span class="label label-warning">Waiting</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-2" class="client-link">Penatibus Consulting</a></td>
                                                <td>Tribogna</td>
                                                <td><i class="fa fa-flag"></i> Montserrat</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-3" class="client-link"> Ultrices Incorporated</a></td>
                                                <td>Basingstoke</td>
                                                <td><i class="fa fa-flag"></i> Tunisia</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-2" class="client-link">Et Arcu Inc.</a></td>
                                                <td>Sioux City</td>
                                                <td><i class="fa fa-flag"></i> Burundi</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-1" class="client-link">Tellus Institute</a></td>
                                                <td>Rexton</td>
                                                <td><i class="fa fa-flag"></i> Angola</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-2" class="client-link">Velit Industries</a></td>
                                                <td>Maglie</td>
                                                <td><i class="fa fa-flag"></i> Luxembourg</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-3" class="client-link">Art Limited</a></td>
                                                <td>Sooke</td>
                                                <td><i class="fa fa-flag"></i> Philippines</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-1" class="client-link">Tempor Arcu Corp.</a></td>
                                                <td>Eisden</td>
                                                <td><i class="fa fa-flag"></i> Korea, North</td>
                                                <td class="client-status"><span class="label label-warning">Waiting</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-2" class="client-link">Penatibus Consulting</a></td>
                                                <td>Tribogna</td>
                                                <td><i class="fa fa-flag"></i> Montserrat</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-3" class="client-link"> Ultrices Incorporated</a></td>
                                                <td>Basingstoke</td>
                                                <td><i class="fa fa-flag"></i> Tunisia</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-2" class="client-link">Et Arcu Inc.</a></td>
                                                <td>Sioux City</td>
                                                <td><i class="fa fa-flag"></i> Burundi</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-1" class="client-link">Tellus Institute</a></td>
                                                <td>Rexton</td>
                                                <td><i class="fa fa-flag"></i> Angola</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-2" class="client-link">Velit Industries</a></td>
                                                <td>Maglie</td>
                                                <td><i class="fa fa-flag"></i> Luxembourg</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-3" class="client-link">Art Limited</a></td>
                                                <td>Sooke</td>
                                                <td><i class="fa fa-flag"></i> Philippines</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-1" class="client-link">Tempor Arcu Corp.</a></td>
                                                <td>Eisden</td>
                                                <td><i class="fa fa-flag"></i> Korea, North</td>
                                                <td class="client-status"><span class="label label-warning">Waiting</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-2" class="client-link">Penatibus Consulting</a></td>
                                                <td>Tribogna</td>
                                                <td><i class="fa fa-flag"></i> Montserrat</td>
                                                <td class="client-status"></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-3" class="client-link"> Ultrices Incorporated</a></td>
                                                <td>Basingstoke</td>
                                                <td><i class="fa fa-flag"></i> Tunisia</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td><a data-toggle="tab" href="#company-2" class="client-link">Et Arcu Inc.</a></td>
                                                <td>Sioux City</td>
                                                <td><i class="fa fa-flag"></i> Burundi</td>
                                                <td class="client-status"><span class="label label-primary">Active</span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ibox ">
                    <div class="ibox-content">
                        <div class="tab-content">
                            @forelse ($livres as $ls)
                            <div id="livre-{{$ls->isbn}}" class="tab-pane {{ $loop->first?'active':'' }}">
                                <div class="row m-b-lg">
                                    <strong>
                                      Detail du livre
                                    </strong>
                                    <div class="col-lg-12 text-center">
                                        <h2>{{$ls->titre}}</h2>
                                    </div>
                                </div>
                                <div class="row m-b-lg">
                                    <div class="col-lg-4 text-center">

                                        <div class="m-b-sm">
                                            <img alt="image" class="img-circlef" src="{{ asset('assets/img/livre/'.$ls->couverture) }}"
                                                 style="width: 100px; height: 100px;" >
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <strong>
                                            Auteur du livre
                                        </strong>

                                        <p>
                                            <h2>{{$ls->auteur}}</h2>
                                        </p>
                                        <button type="button" class="btn btn-primary btn-sm btn-block"><i
                                                class="fa fa-envelope"></i> Send Message
                                        </button>
                                    </div>
                                </div>
                                <div class="client-detail">
                                <div class="full-height-scroll">

                                    <strong>Couverture du livre</strong> <br>
                                    <div class="row m-b-lg">
                                        <div class="col-lg-6 text-center">
                                            <div class="m-b-sm">
                                                <img alt="image" class="img-circlef" src="{{ asset('assets/img/livre/'.$ls->couverture2) }}"
                                                     style="width: 100px; height: 100px;" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6 text-center">
                                            <div class="m-b-sm">
                                                <img alt="image" class="img-circlef" src="{{ asset('assets/img/livre/'.$ls->couverture3) }}"
                                                     style="width: 100px; height: 100px;" >
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-group clear-list">
                                        <li class="list-group-item fist-item">
                                            <span class="pull-right"> {{$ls->isbn}} </span>
                                           ISBN
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> {{ \Carbon\Carbon::parse($ls->datepublication)->isoFormat('LL') }}  </span>
                                            Date de publication
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> {{$ls->langue}} </span>
                                           Langue
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> {{$ls->nbrpage}} </span>
                                            Nombre de page
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> {{$ls->editeur}} </span>
                                           Editeur
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> {{$ls->qte_init}} </span>
                                          Stock initial
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> {{$ls->qte_init-$ls->qte_sortie}} </span>
                                          Stock disponible
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right">{{ \Carbon\Carbon::parse($ls->created_at)->isoFormat('LLLL') }} </span>
                                         Date de stockage
                                        </li>
                                    </ul>
                                    <strong>Description</strong>
                                    <p>
                                        {{$ls->description}}
                                    </p>
                                    <hr/>
                                    <strong>Video de guide</strong>
                                    <p>
                                        <div class="ibox-content">
                                            <figure>
                                                <iframe width="250" height="200" src="  {{$ls->guidevideo}}" frameborder="0" allowfullscreen></iframe>
                                            </figure>
                                        </div>
                                    </p>
                                    <hr/>
                                    <strong>Timeline activity</strong>
                                    <div id="vertical-timeline" class="vertical-container dark-timeline">
                                        <div class="vertical-timeline-block">
                                            <div class="vertical-timeline-icon gray-bg">
                                                <i class="fa fa-coffee"></i>
                                            </div>
                                            <div class="vertical-timeline-content">
                                                <p>Conference on the sales results for the previous year.
                                                </p>
                                                <span class="vertical-date small text-muted"> 2:10 pm - 12.06.2014 </span>
                                            </div>
                                        </div>
                                        <div class="vertical-timeline-block">
                                            <div class="vertical-timeline-icon gray-bg">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                            <div class="vertical-timeline-content">
                                                <p>Many desktop publishing packages and web page editors now use Lorem.
                                                </p>
                                                <span class="vertical-date small text-muted"> 4:20 pm - 10.05.2014 </span>
                                            </div>
                                        </div>
                                        <div class="vertical-timeline-block">
                                            <div class="vertical-timeline-icon gray-bg">
                                                <i class="fa fa-bolt"></i>
                                            </div>
                                            <div class="vertical-timeline-content">
                                                <p>There are many variations of passages of Lorem Ipsum available.
                                                </p>
                                                <span class="vertical-date small text-muted"> 06:10 pm - 11.03.2014 </span>
                                            </div>
                                        </div>
                                        <div class="vertical-timeline-block">
                                            <div class="vertical-timeline-icon navy-bg">
                                                <i class="fa fa-warning"></i>
                                            </div>
                                            <div class="vertical-timeline-content">
                                                <p>The generated Lorem Ipsum is therefore.
                                                </p>
                                                <span class="vertical-date small text-muted"> 02:50 pm - 03.10.2014 </span>
                                            </div>
                                        </div>
                                        <div class="vertical-timeline-block">
                                            <div class="vertical-timeline-icon gray-bg">
                                                <i class="fa fa-coffee"></i>
                                            </div>
                                            <div class="vertical-timeline-content">
                                                <p>Conference on the sales results for the previous year.
                                                </p>
                                                <span class="vertical-date small text-muted"> 2:10 pm - 12.06.2014 </span>
                                            </div>
                                        </div>
                                        <div class="vertical-timeline-block">
                                            <div class="vertical-timeline-icon gray-bg">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                            <div class="vertical-timeline-content">
                                                <p>Many desktop publishing packages and web page editors now use Lorem.
                                                </p>
                                                <span class="vertical-date small text-muted"> 4:20 pm - 10.05.2014 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @empty

                            @endforelse


                            {{-- <div id="company-1" class="tab-pane">
                                <div class="m-b-lg">
                                        <h2>Tellus Institute</h2>

                                        <p>
                                            Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero,written in 45 BC. This book is a treatise on.
                                        </p>
                                        <div>
                                            <small>Active project completion with: 48%</small>
                                            <div class="progress progress-mini">
                                                <div style="width: 48%;" class="progress-bar"></div>
                                            </div>
                                        </div>
                                </div>
                                <div class="client-detail">
                                    <div class="full-height-scroll">

                                        <strong>Last activity</strong>

                                        <ul class="list-group clear-list">
                                            <li class="list-group-item fist-item">
                                                <span class="pull-right"> <span class="label label-primary">NEW</span> </span>
                                                The point of using
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right"> <span class="label label-warning">WAITING</span></span>
                                                Lorem Ipsum is that it has
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right"> <span class="label label-danger">BLOCKED</span> </span>
                                                If you are going
                                            </li>
                                        </ul>
                                        <strong>Notes</strong>
                                        <p>
                                            Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                                        </p>
                                        <hr/>
                                        <strong>Timeline activity</strong>
                                        <div id="vertical-timeline" class="vertical-container dark-timeline">
                                            <div class="vertical-timeline-block">
                                                <div class="vertical-timeline-icon gray-bg">
                                                    <i class="fa fa-coffee"></i>
                                                </div>
                                                <div class="vertical-timeline-content">
                                                    <p>Conference on the sales results for the previous year.
                                                    </p>
                                                    <span class="vertical-date small text-muted"> 2:10 pm - 12.06.2014 </span>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-block">
                                                <div class="vertical-timeline-icon gray-bg">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                                <div class="vertical-timeline-content">
                                                    <p>Many desktop publishing packages and web page editors now use Lorem.
                                                    </p>
                                                    <span class="vertical-date small text-muted"> 4:20 pm - 10.05.2014 </span>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-block">
                                                <div class="vertical-timeline-icon gray-bg">
                                                    <i class="fa fa-bolt"></i>
                                                </div>
                                                <div class="vertical-timeline-content">
                                                    <p>There are many variations of passages of Lorem Ipsum available.
                                                    </p>
                                                    <span class="vertical-date small text-muted"> 06:10 pm - 11.03.2014 </span>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-block">
                                                <div class="vertical-timeline-icon navy-bg">
                                                    <i class="fa fa-warning"></i>
                                                </div>
                                                <div class="vertical-timeline-content">
                                                    <p>The generated Lorem Ipsum is therefore.
                                                    </p>
                                                    <span class="vertical-date small text-muted"> 02:50 pm - 03.10.2014 </span>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-block">
                                                <div class="vertical-timeline-icon gray-bg">
                                                    <i class="fa fa-coffee"></i>
                                                </div>
                                                <div class="vertical-timeline-content">
                                                    <p>Conference on the sales results for the previous year.
                                                    </p>
                                                    <span class="vertical-date small text-muted"> 2:10 pm - 12.06.2014 </span>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-block">
                                                <div class="vertical-timeline-icon gray-bg">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                                <div class="vertical-timeline-content">
                                                    <p>Many desktop publishing packages and web page editors now use Lorem.
                                                    </p>
                                                    <span class="vertical-date small text-muted"> 4:20 pm - 10.05.2014 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="company-2" class="tab-pane">
                                <div class="m-b-lg">
                                    <h2>Penatibus Consulting</h2>

                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some.
                                    </p>
                                    <div>
                                        <small>Active project completion with: 22%</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 22%;" class="progress-bar"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="client-detail">
                                    <div class="full-height-scroll">

                                        <strong>Last activity</strong>

                                        <ul class="list-group clear-list">
                                            <li class="list-group-item fist-item">
                                                <span class="pull-right"> <span class="label label-warning">WAITING</span> </span>
                                                Aldus PageMaker
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right"><span class="label label-primary">NEW</span> </span>
                                                Lorem Ipsum, you need to be sure
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right"> <span class="label label-danger">BLOCKED</span> </span>
                                                The generated Lorem Ipsum
                                            </li>
                                        </ul>
                                        <strong>Notes</strong>
                                        <p>
                                            Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                                        </p>
                                        <hr/>
                                        <strong>Timeline activity</strong>
                                        <div id="vertical-timeline" class="vertical-container dark-timeline">
                                            <div class="vertical-timeline-block">
                                                <div class="vertical-timeline-icon gray-bg">
                                                    <i class="fa fa-coffee"></i>
                                                </div>
                                                <div class="vertical-timeline-content">
                                                    <p>Conference on the sales results for the previous year.
                                                    </p>
                                                    <span class="vertical-date small text-muted"> 2:10 pm - 12.06.2014 </span>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-block">
                                                <div class="vertical-timeline-icon gray-bg">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                                <div class="vertical-timeline-content">
                                                    <p>Many desktop publishing packages and web page editors now use Lorem.
                                                    </p>
                                                    <span class="vertical-date small text-muted"> 4:20 pm - 10.05.2014 </span>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-block">
                                                <div class="vertical-timeline-icon gray-bg">
                                                    <i class="fa fa-bolt"></i>
                                                </div>
                                                <div class="vertical-timeline-content">
                                                    <p>There are many variations of passages of Lorem Ipsum available.
                                                    </p>
                                                    <span class="vertical-date small text-muted"> 06:10 pm - 11.03.2014 </span>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-block">
                                                <div class="vertical-timeline-icon navy-bg">
                                                    <i class="fa fa-warning"></i>
                                                </div>
                                                <div class="vertical-timeline-content">
                                                    <p>The generated Lorem Ipsum is therefore.
                                                    </p>
                                                    <span class="vertical-date small text-muted"> 02:50 pm - 03.10.2014 </span>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-block">
                                                <div class="vertical-timeline-icon gray-bg">
                                                    <i class="fa fa-coffee"></i>
                                                </div>
                                                <div class="vertical-timeline-content">
                                                    <p>Conference on the sales results for the previous year.
                                                    </p>
                                                    <span class="vertical-date small text-muted"> 2:10 pm - 12.06.2014 </span>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-block">
                                                <div class="vertical-timeline-icon gray-bg">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                                <div class="vertical-timeline-content">
                                                    <p>Many desktop publishing packages and web page editors now use Lorem.
                                                    </p>
                                                    <span class="vertical-date small text-muted"> 4:20 pm - 10.05.2014 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="company-3" class="tab-pane">
                                <div class="m-b-lg">
                                    <h2>Ultrices Incorporated</h2>

                                    <p>
                                        Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.
                                    </p>
                                    <div>
                                        <small>Active project completion with: 72%</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 72%;" class="progress-bar"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="client-detail">
                                    <div class="full-height-scroll">

                                        <strong>Last activity</strong>

                                        <ul class="list-group clear-list">
                                            <li class="list-group-item fist-item">
                                                <span class="pull-right"> <span class="label label-danger">BLOCKED</span> </span>
                                                Hidden in the middle of text
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right"><span class="label label-primary">NEW</span> </span>
                                                Non-characteristic words etc.
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right">  <span class="label label-warning">WAITING</span> </span>
                                                Bonorum et Malorum
                                            </li>
                                        </ul>
                                        <strong>Notes</strong>
                                        <p>
                                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.
                                        </p>
                                        <hr/>
                                        <strong>Timeline activity</strong>
                                        <div id="vertical-timeline" class="vertical-container dark-timeline">
                                            <div class="vertical-timeline-block">
                                                <div class="vertical-timeline-icon gray-bg">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                                <div class="vertical-timeline-content">
                                                    <p>Many desktop publishing packages and web page editors now use Lorem.
                                                    </p>
                                                    <span class="vertical-date small text-muted"> 4:20 pm - 10.05.2014 </span>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-block">
                                                <div class="vertical-timeline-icon gray-bg">
                                                    <i class="fa fa-bolt"></i>
                                                </div>
                                                <div class="vertical-timeline-content">
                                                    <p>There are many variations of passages of Lorem Ipsum available.
                                                    </p>
                                                    <span class="vertical-date small text-muted"> 06:10 pm - 11.03.2014 </span>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-block">
                                                <div class="vertical-timeline-icon navy-bg">
                                                    <i class="fa fa-warning"></i>
                                                </div>
                                                <div class="vertical-timeline-content">
                                                    <p>The generated Lorem Ipsum is therefore.
                                                    </p>
                                                    <span class="vertical-date small text-muted"> 02:50 pm - 03.10.2014 </span>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-block">
                                                <div class="vertical-timeline-icon gray-bg">
                                                    <i class="fa fa-coffee"></i>
                                                </div>
                                                <div class="vertical-timeline-content">
                                                    <p>Conference on the sales results for the previous year.
                                                    </p>
                                                    <span class="vertical-date small text-muted"> 2:10 pm - 12.06.2014 </span>
                                                </div>
                                            </div>
                                            <div class="vertical-timeline-block">
                                                <div class="vertical-timeline-icon gray-bg">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                                <div class="vertical-timeline-content">
                                                    <p>Many desktop publishing packages and web page editors now use Lorem.
                                                    </p>
                                                    <span class="vertical-date small text-muted"> 4:20 pm - 10.05.2014 </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
