<script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.webui-popover.min.js') }}"></script>

<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/jquery.form.min.js') }}"></script>
<script src="{{ asset('js/sweetalert/sweetalert.min.js') }}"></script>ript>


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
    $(document).ready(function() {
        $("#addFavorie").on("click", function(e) {
            e.preventDefault();


            // add("#formFidel", '#tab-fidel', 'debutCvc');
        });
    });

    function handleWishList(id) {
        // alert(id.id);
        add(id.id, "", "addFavori");
    }

    function add(form, idLoad, url) {
        swal({
            title: 'Merci de patienter...',
            icon: 'info'
        })
        $.ajax({
            url: url + '/' + form,
            method: "GET",
            data: {
                idform: form
            },
            success: function(data) {
                // console.log(data);
                if (!data.reponse) {
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
                            deleteFavorie(form)
                        } else {
                            
                        }
                    });
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

    function deleteFavorie(form) {

        $.ajax({
            url:  'deleteFavorie/' + form,
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

    }

    function actualiser() {
        location.reload();
    }
</script>

@yield("autres_script")
</body>

</html>
