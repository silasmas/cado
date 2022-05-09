<script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.webui-popover.min.js') }}"></script>

<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/jquery.form.min.js') }}"></script>
<script src="{{ asset('js/sweetalert/sweetalert.min.js') }}"></script>
<script>
    function isTouchDevice() {
        return "ontouchstart" in window || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
    }

    //Event call after loading page
    document.addEventListener(
        "DOMContentLoaded",
        function() {
            setTimeout(function() {
                $(".animated-loader").hide();
                $(".shown-after-loading").show();
            });
        },
        false
    );


    function handleWishList2(id) {
        deleteFavorie(id.id, "../deleteFavorie/");
    }

    function handleWishList3(id) {
        add(id.id, 'autre', "addFavori");
    }

    function handleWishList(id) {
        add(id.id, "", "addFavori");
    }

    function addToCard(id) {
        //alert(id.id);
        addCard(id.id, "", "addCard");
    }

    function removeFromCartList(id) {
        swal({
            title: "Supprimer du panier",
            text: "êtes-vous sûre de supprimer cette formation du panier?",
            icon: 'warning',
            dangerMode: true,
            buttons: {
                cancel: 'Non',
                delete: 'OUI'
            }
        }).then(function(willDelete) {
            if (willDelete) {
                addCard(id.id, "", "removeCard");
            } else {

            }

        });
    }

    function addCard(form, idLoad, url) {
        var autre = idLoad == '' ? '' : '../';
        swal({
            title: 'Merci de patienter panier...',
            icon: 'info'
        })
        $.ajax({
            url: '../' + url + '/' + form,
            method: "GET",
            data: {
                idform: form
            },
            success: function(data) {
                if (!data.reponse) {
                    swal({
                        title: data.msg,
                        icon: 'error'
                    })
                } else {
                    swal({
                        title: data.msg,
                        icon: 'success'
                    })
                    actualiser();
                }
            },
        });

    }

    function add(form, idLoad, url) {
        var autre = idLoad == '' ? '' : '../';
        swal({
            title: 'Merci de patienter...',
            icon: 'info'
        })
        $.ajax({
            url: autre + url + '/' + form,
            method: "GET",
            data: {
                idform: form
            },
            success: function(data) {
                //alert(data);
                console.log(data);
                if (!data.reponse) {
                    deleteFavorie(form, autre + 'deleteFavorie/');

                } else {
                    swal({
                        title: data.msg,
                        icon: 'success'
                    })
                    actualiser();
                }
            },
        });

    }

    function deleteFavorie(form, url) {
        swal({
            title: "Supprimer de vos favories",
            text: "Cette formation est parmie vos favories, voulez-vous la supprimée?",
            icon: 'warning',
            dangerMode: true,
            buttons: {
                cancel: 'Non',
                delete: 'OUI'
            }
        }).then(function(willDelete) {
            if (willDelete) {
                $.ajax({
                    url: url + form,
                    method: "GET",
                    data: {
                        idform: form
                    },
                    success: function(data) {
                        // console.log(data);
                        if (!data.reponse) {
                            swal({
                                title: data.msg,
                                icon: 'warning'
                            })
                        } else {
                            swal({
                                title: data.msg,
                                icon: 'success'
                            })
                            actualiser();
                        }
                    },
                });
            } else {

            }
        });


    }

    function actualiser() {
        location.reload();
    }
</script>

@yield("autres_script")
</body>

</html>
