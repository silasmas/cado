@extends('client.templates.main_template',['titre'=>"Panier"])


@section('content')
    <section class="category-header-area"
        style="background-image: url('assets/images/system/shopping_cart.png'); background-size: contain; background-repeat: no-repeat; background-position-x: right; background-color: #ec5252;">
        <div class="image-placeholder-1"></div>
        <div class="container-lg breadcrumb-container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item display-6 fw-bold">
                        <a href="{{ route('homes') }}"> Accueil </a>
                    </li>
                    <li class="breadcrumb-item active text-light display-6 fw-bold">
                        Pages d'achat
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="cart-list-area">
        <div class="container">
            <div class="row" id="cart_items_details">
                <div class="col-lg-8">
                    <div class="in-cart-box">
                        <div class="title">{{ $session->count() }} Formation</div>
                        <div class="">
                            <ul class="cart-course-list">
                                <li>
                                    <div class="cart-course-wrapper">
                                        <div class="image d-none d-md-block">
                                            <a href="course-details.html">
                                                <img src="{{ asset('assets/images/form/' . $session->cover) }}" alt=""
                                                    class="img-fluid" />
                                            </a>
                                        </div>
                                        <div class="details">
                                            <a href="{{ route('detailFormation', ['id' => $session->id]) }}">
                                                <div class="name">{{ $session->titre }}</div>
                                            </a>

                                            <div class="course-subtitle text-13px mt-2">
                                                {{ $session->description }}
                                            </div>

                                            <div class="floating-user d-inline-block mt-2">
                                                @foreach ($session->formateur as $f)
                                                    <img style="margin-left: 0px;" class="position-absolute"
                                                        src="{{ asset('assets/images/form/' . $f->photo) }}" width="30px"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="{{ $f->prenom . ' ' . $f->nom }}"
                                                        onclick="event.stopPropagation(); $(location).attr('href', '');" />
                                                @endforeach

                                                {{-- <img
                                                style="margin-left: 17px;"
                                                class="position-absolute"
                                                src="{{ asset('assets/images/uploads/user_image/b28a0687a23de21f2b2c34b2d160f48f.jpg') }}"
                                                width="30px"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Olivia Emily"
                                                onclick="event.stopPropagation(); $(location).attr('href', 'instructor.html2');"
                                            /> --}}
                                            </div>
                                        </div>
                                        <div class="move-remove text-center">
                                            <div id="4" onclick="removeFromCartList(this)"><i
                                                    class="fas fa-times-circle"></i> Remove</div>
                                            <div>Move to Wishlist</div>
                                        </div>
                                        <div class="price">
                                            <div class="current-price">
                                                {{ "$" . $session->prix }}
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 pt-1">
                    <h5 class="fw-700">Total:</h5>
                    <div class="cart-sidebar bg-white radius-10 py-4 px-3">
                        <span id="total_price_of_checking_out" hidden> 190 </span>
                        <div class="total-price"> {{ "$" . $session->prix }}</div>
                        <div class="total-original-price">
                            {{-- <span class="original-price">$290</span> --}}
                            <!-- <span class="discount-rate">95% off</span> -->
                        </div>

                        {{-- <div class="input-group marge-input-box mb-3">
                        <input type="text" class="form-control" placeholder="Apply coupon code" id="coupon-code" />
                        <div class="input-group-append">
                            <button class="btn" type="button" onclick="applyCoupon()">
                                <i class="fas fa-spinner fa-pulse hidden" id="spinner"></i>
                                Apply
                            </button>
                        </div>
                    </div> --}}
                        <div class="col-6 col-sm-6 col-md-3 input-group  mb-3 text-center text-md-start">
                            <form>
                                <div class="form-group mb-3" >
                                    <label for="login-email">Moyen de paiement</label>
                                    <div class="input-group">
                                        <select class="form-select" onchange="switch_modepaie(this.value)">
                                            <option value="">Selectionnez le moyen de paiement</option>
                                            <option value="MOBILE_MONEY">Mobile money</option>
                                            <option value="CREDIT_CARD">Carte bancaire</option>
                                            <option value="ALL">Les deux</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="" id="carte" style="display: none">
                                    
                                    <div class="form-group mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Selectionnez votre pays
                                        </label>
                                        <div class="input-group">
                                            @include('client.pages.listepays')
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">
                                            Code postal (pour la cartebancaire) :</label>
                                        <input type="text" name="customer_zip_code" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">votre Etat (obligatoire si
                                            vous êtes au canada ou aux USA)</label>
                                        <input type="text" name="customer_state" value="californi" class="form-control"
                                            required>
                                    </div>
                                    <div class="form-group mb-3 ">
                                        <label for="login-email">Etat</label>
                                        <div class="input-group">
                                            <input type="text" name="email" class="form-control" placeholder="Etat"
                                                aria-label="Email" aria-describedby="Email" id="login-email" required />
                                        </div>
                                    </div>
                                    <div class="form-group mb-3 ">
                                        <label for="login-email">Adresse</label>
                                        <div class="input-group">
                                            <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Adresse"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn red w-100 radius-10 mb-3"
                                    onclick="handleCheckOut()">Payer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('autres_script')
    <script type="text/javascript">
        function switch_modepaie(val) {
            switch (val) {
                case "MOBILE_MONEY":
                // document.getElementById('carte').setAttribute('hidden');
                document.getElementById('carte').style.display = "none";
                    break;
                case "CREDIT_CARD":
                document.getElementById('carte').style.display = "block";
                // document.getElementById('carte').removeAttribute('hidden');
                    break;
                case "ALL":
                    alert("tout");
                    break;
            }
        }

        function deleteFavorie(form, url) {
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

        }
    </script>
@endsection
