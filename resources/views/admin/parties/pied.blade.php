<script src="{{ asset('assets/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<script src="{{asset('assets/js/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('assets/js/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{ asset('assets/custom/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
@yield("autres-script")
<!-- Custom and plugin javascript -->
<script src="{{asset('assets/js/inspinia.js')}}"></script>
<script src="{{asset('assets/js/pace/pace.min.js')}}"></script>

<script src="{{asset('assets/js/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/summernote/summernote.min.js')}}"></script>
{{-- @livewireScripts();
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script> --}}
@stack('scripts')


<script>
    function addAll(form, methode, url,idf) {
                    Swal.fire({
                        title: 'Merci de patienter...',
                        icon: 'info'
                    })
                        //  console.log($(form).serialize())
                    $.ajax({
                        url: url,
                        method: methode,
                        data: {'id':form},
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        success: function (data) {
                            if (!data.reponse) {
                                var errorMessage = '';
                            $.each(data.errors, function(key, value){
                                errorMessage += value + '<br>';
                            });
                                Swal.fire({
                                    title: data.msg+" : "+errorMessage,
                                    icon: 'error'
                                })
                            } else {
                                Swal.fire({
                                    title: data.msg,
                                    icon: 'success'
                                })
                                actualiser();
                            }

                        },
                        error: function(xhr, status, error){
                            // alerte("ok")
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = '';
                            $.each(errors, function(key, value){
                                errorMessage += value + '<br>';
                            });
                             // Afficher les erreurs de validation à l'utilisateur
                                Swal.fire({
                                    title: xhr.msg,
                                    html: errorMessage,
                                        icon: 'error'
                                    })
                            }
                    });
                }
                function addFavoris(idf,methode, url) {
                    Swal.fire({
                        title: 'Merci de patienter...',
                        icon: 'info'
                    })
                    $.ajax({
                        url: url+"/"+idf,
                        method: methode,
                        data: {'id':idf},
                        success: function (data) {
                            if (!data.reponse) {
                                var errorMessage = '';
                                Swal.fire({
                                    title: data.msg,
                                    icon: 'error'
                                })
                            } else {
                                Swal.fire({
                                    title: data.msg,
                                    icon: 'success'
                                })
                                actualiser();
                            }

                        },
                        error: function(xhr, status, error){
                            console.log(xhr)
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = '';
                            $.each(errors, function(key, value){
                                errorMessage += value + '<br>';
                            });
                             // Afficher les erreurs de validation à l'utilisateur
                                Swal.fire({
                                    title: xhr.msg,
                                    html: errorMessage,
                                        icon: 'error'
                                    })
                            }
                    });
                }
                function removeFavoris(idf,methode, url,titre,msg) {
                    Swal.fire({
                        title: titre,
                        text: msg,
                        icon: 'warning',
                        inputAttributes: {
                            autocapitalize: "off"
                        },
                        showCancelButton: true,
                        confirmButtonText: "OUI",
                        cancelButtonText: "NON",
                        showLoaderOnConfirm: true,
                        preConfirm: async (login) => {
                            // alert('alert')
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: 'Merci de patienter...',
                                icon: 'info'
                            })
                            $.ajax({
                                url: url + '/' + idf,
                                method: methode,
                                success: function (data) {
                                    if (!data.reponse) {
                                        Swal.fire({
                                            title: data.msg,
                                            icon: 'error'
                                        })
                                    } else {
                                        Swal.fire({
                                            title: data.msg,
                                            icon: 'success'
                                        })
                                        actualiser();
                                    }
                                },
                        error: function(xhr, status, error){
                            // alrte("ok")
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = '';
                            $.each(errors, function(key, value){
                                errorMessage += value + '<br>';
                            });
                             // Afficher les erreurs de validation à l'utilisateur
                                Swal.fire({
                                    title: xhr.msg,
                                    html: errorMessage,
                                        icon: 'error'
                                    })
                            }
                            });
                        }
                    });
                }

                function add(form, mothode, url,idf) {
                    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    var f = form;
                    var u = url;
                    var idform = idf;
                    Swal.fire({
                        title: 'Merci de patienter...',
                        icon: 'info'
                    })
                        console.log(form)
                    $.ajax({
                        url: u,
                        method: mothode,
                        data: form,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        success: function (data) {

                            if (!data.reponse) {
                                Swal.fire({
                                    title: data.msg,
                                    icon: 'error'
                                })
                            } else {
                                Swal.fire({
                                    title: data.msg,
                                    icon: 'success'
                                })

                                $(idform)[0].reset();
                                actualiser();
                            }

                        },
                        error: function(xhr, status, error){
                            // alrte("ok")
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = '';
                            $.each(errors, function(key, value){
                                errorMessage += value + '<br>';
                            });
                             // Afficher les erreurs de validation à l'utilisateur
                                Swal.fire({
                                    title: xhr.msg,
                                    html: errorMessage,
                                        icon: 'error'
                                    })
                            }
                    });
                }
                //
                function actualiser() {
                    location.reload();
                }

           
                function deleted(id, url) {
                    Swal.fire({
                        title: "Attention Suppression",
                        text: "Êtes-vous sûr de vouloir supprimer cette information?",
                        icon: 'warning',
                        inputAttributes: {
                            autocapitalize: "off"
                        },
                        showCancelButton: true,
                        confirmButtonText: "OUI",
                        cancelButtonText: "NON",
                        showLoaderOnConfirm: true,
                        preConfirm: async (login) => {
                            // alert('alert')
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: 'Merci de patienter...',
                                icon: 'info'
                            })
                            $.ajax({
                                url: url + '/' + id,
                                method: "GET",
                                success: function (data) {
                                    if (!data.reponse) {
                                        Swal.fire({
                                            title: data.msg,
                                            icon: 'error'
                                        })
                                    } else {
                                        Swal.fire({
                                            title: data.msg,
                                            icon: 'success'
                                        })
                                        actualiser();
                                    }
                                },
                            });
                        }
                    });
                }             

                function recherche(url,methode,input){
                    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    $.ajax({
                        url: url,
                        method: "POST",
                        data: $("#"+input).serialize(),
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        success: function (data) {
                            console.log(Object.entries(data.data)[0][1])
                            const elt=document.getElementById('rowdata');
                             elt.innerHTML="";

                        //     let productBoxes = Object.entries(data.data).forEach(l => {
                        //         elt.innerHTML += 
                        //                 `<div class="col-md-3">
                        //                     <div class="ibox">
                        //                         <div class="ibox-content product-box">
                        //                             <div class="product-imitation" style="background-image: url('assets/img/livre/${l.couverture}'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
                        //                             <div class="product-desc">
                                                        
                        //                                 <small class="text-muted">${l.auteur}</small>
                        //                                 <a href="" class="product-name">${l.titre.substr(0, 20)}...</a>
                        //                                 <div class="small m-t-xs">${l.description.substr(0, 80)}...</div>
                        //                                 <div class="m-t text-right">
                        //                                     <a href="" class="btn btn-xs btn-outline btn-primary">Detail <i class="fa fa-long-arrow-right"></i></a>
                        //                                 </div>
                        //                                 <hr>
                        //                                 ${includeAdminPartiesFavorie()}
                        //                             </div>
                        //                         </div>
                        //                     </div>
                        //                 </div>;`
                        // });

                        let productBoxes = Object.entries(data.data).map(([key, value]) => {
                            elt.innerHTML+=  `<div class="col-md-3">
                                <div class="ibox">
                                    <div class="ibox-content product-box">
                                        <div class="product-imitation" style="background-image: url('assets/img/livre/${value.couverture}'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
                                        <div class="product-desc">
                                            <small class="text-muted">${value.auteur}</small>
                                            <a href="" class="product-name">${value.titre.substr(0, 20)}...</a>
                                            <div class="small m-t-xs">${value.description.substr(0, 80)}...</div>
                                            <div class="m-t text-right">
                                                <a href="" class="btn btn-xs btn-outline btn-primary">Detail <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                            <hr>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>;`
                        });
                        
                        // elt.innerHTML = productBoxes.join('');


                        },
                        error: function(xhr, status, error){
                            // alrte("ok")
                            var errors = xhr.responseJSON.errors;
                            var errorMessage = '';
                            $.each(errors, function(key, value){
                                errorMessage += value + '<br>';
                            });
                             // Afficher les erreurs de validation à l'utilisateur
                                Swal.fire({
                                    title: xhr.msg,
                                    html: errorMessage,
                                        icon: 'error'
                                    })
                            }
                    });
                }
                
                // function generateProductBox(data) {
                //     let html = '';
                //     data.forEach(l => {
                //         html += 
                //             `<div class="col-md-3">
                //                 <div class="ibox">
                //                     <div class="ibox-content product-box">
                //                         <div class="product-imitation" style="background-image: url('assets/img/livre/${l.couverture}'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
                //                         <div class="product-desc">
                //                             ${l.categories.map(c => <span class="product-price">${c.nom}</span>).join('')}
                //                             <small class="text-muted">${l.auteur}</small>
                //                             <a href="${route('detail', { id: l.isbn })}" class="product-name">${l.titre.substr(0, 20)}...</a>
                //                             <div class="small m-t-xs">${l.description.substr(0, 80)}...</div>
                //                             <div class="m-t text-right">
                //                                 <a href="${route('detail', { id: l.isbn })}" class="btn btn-xs btn-outline btn-primary">Detail <i class="fa fa-long-arrow-right"></i></a>
                //                             </div>
                //                             <hr>
                //                             ${includeAdminPartiesFavorie()}
                //                         </div>
                //                     </div>
                //                 </div>
                //             </div>;`
                //         });
                //     return html;
                // }
</script>

</body>

</html>