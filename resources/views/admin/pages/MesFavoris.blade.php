@extends("admin.parties.template")

@section("autres_style")
<link rel="stylesheet" href="{{ asset('assets/css/dataTables/datatables.min.css') }}">
{{--
<link href="https://cdn.datatables.net/v/dt/dt-2.0.8/datatables.min.css" rel="stylesheet"> --}}
@endsection
@section("content")
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <div class="row">
                            @forelse (Auth::user()->favories->load('livre') as $l)
                            {{-- <div class="col-md-4">
                                <td>
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
                                </td>
                            </div> --}}
                            @include("admin.pages.parties.favorie")
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
@section("autres-script")
<script src="{{asset('assets/js/dataTables/datatables.min.js')}}"></script>
{{-- <script src="https://cdn.datatables.net/v/dt/dt-2.0.8/datatables.min.js"></script> --}}
<script>
    $(document).ready(function () {
        $('.dataTables-example').DataTable({
            language: {
                processing: "Traitement en cours...",
                search: "Rechercher&nbsp;:",
                lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix: "",
                loadingRecords: "Chargement en cours...",
                zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable: "Aucune donnée disponible dans le tableau",
                "paging": true, // Désactive la pagination
                "searching": true, // Désactive la recherche
                "info": true, // Désactive les informations sur le nombre d'éléments affichés
                "lengthChange": true, // Désactive le changement du nombre d'éléments affichés par page
                "ordering": true, // Désactive le tri des colonnes
                "bFilter": true, // Désactive le filtre de recherche
                "bInfo": true, // Désactive les informations en bas de la table
                "bPaginate": true, // Désactive la pagination
                "bSort": true, // Désactive le tri des colonnes
                "bAutoWidth": true // Désactive l'ajustement automatique de la largeur des colonnes
            },
                pageLength:5,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

    });
</script>
@endsection
@push('scripts')
<script>
    //     $(document).ready(function () {
    //     // $('.dataTables-example').DataTable({
    //     //     language: {
    //     //         processing: "Traitement en cours...",
    //     //         search: "Rechercher&nbsp;:",
    //     //         lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
    //     //         info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
    //     //         infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
    //     //         infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
    //     //         infoPostFix: "",
    //     //         loadingRecords: "Chargement en cours...",
    //     //         zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
    //     //         emptyTable: "Aucune donnée disponible dans le tableau",
    //     //         "paging": true, // Désactive la pagination
    //     //         "searching": true, // Désactive la recherche
    //     //         "info": true, // Désactive les informations sur le nombre d'éléments affichés
    //     //         "lengthChange": true, // Désactive le changement du nombre d'éléments affichés par page
    //     //         "ordering": true, // Désactive le tri des colonnes
    //     //         "bFilter": true, // Désactive le filtre de recherche
    //     //         "bInfo": true, // Désactive les informations en bas de la table
    //     //         "bPaginate": true, // Désactive la pagination
    //     //         "bSort": true, // Désactive le tri des colonnes
    //     //         "bAutoWidth": true // Désactive l'ajustement automatique de la largeur des colonnes
    //     //         paginate: {
    //     //             first: "Premier",
    //     //             pagingType: "full_numbers", // Afficher tous les boutons de pagination
    //     //             previous: "Pr&eacute;c&eacute;dent",
    //     //             next: "Suivant",
    //     //             last: "Dernier"
    //     //         },
    //     //         aria: {
    //     //             sortAscending: ": activer pour trier la colonne par ordre croissant",
    //     //             sortDescending: ": activer pour trier la colonne par ordre décroissant"
    //     //         }
    //     //     },
    //     //     pageLength: 10,
    //     //     responsive: true,
    //     //     dom: '<"html5buttons"B>lTfgitp',
    //     //     buttons: [{
    //     //             extend: 'copy'
    //     //         },
    //     //         {
    //     //             extend: 'csv'
    //     //         },
    //     //         {
    //     //             extend: 'excel',
    //     //             title: 'NewsLetter'
    //     //         },
    //     //         {
    //     //             extend: 'pdf',
    //     //             title: 'NewsLetter'
    //     //         },

    //     //         {
    //     //             extend: 'print',
    //     //             customize: function (win) {
    //     //                 $(win.document.body).addClass('white-bg');
    //     //                 $(win.document.body).css('font-size', '10px');

    //     //                 $(win.document.body).find('table')
    //     //                     .addClass('compact')
    //     //                     .css('font-size', 'inherit');
    //     //             }
    //     //         }
    //     //     ]
    //     // });
    //     $('.dataTables-example').DataTable({
    // "paging": false, // Désactive la pagination
    // "searching": false, // Désactive la recherche
    // "info": false, // Désactive les informations sur le nombre d'éléments affichés
    // "lengthChange": false, // Désactive le changement du nombre d'éléments affichés par page
    // "ordering": false, // Désactive le tri des colonnes
    // "bFilter": false, // Désactive le filtre de recherche
    // "bInfo": false, // Désactive les informations en bas de la table
    // "bPaginate": false, // Désactive la pagination
    // "bSort": false, // Désactive le tri des colonnes
    // "bAutoWidth": false // Désactive l'ajustement automatique de la largeur des colonnes
// });
//     });
</script>

@endpush
