<script src="{{ asset('assets/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<script src="{{asset('assets/js/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('assets/js/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script  src="{{ asset('assets/custom/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
<!-- Custom and plugin javascript -->
<script src="{{asset('assets/js/inspinia.js')}}"></script>
<script src="{{asset('assets/js/pace/pace.min.js')}}"></script>
<script src="{{asset('assets/js/pace/pace.min.js')}}"></script>

<script src="{{asset('assets/js/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/summernote/summernote.min.js')}}"></script>
{{-- @livewireScripts();
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script> --}}

@yield("autres-script")


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

                function supprimerPopup(id) {
                    var popup = document.getElementById(id); // Identifier l'élément du pop-up
                    if (popup) {
                        popup.remove(); // Supprimer l'élément du DOM
                    }
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
</script>
</body>

</html>
