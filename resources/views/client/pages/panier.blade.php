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
    <div class="container">
        <div class="row">

            {{-- <div class="col-md-12  text-danger mb-5">
                @if (session()->has('message'))
                    {{ session()->get('message') }}
                @endif
                @foreach ($errors->all() as $err)
                    {{ $err }}
                @endforeach
            </div> --}}
        </div>
    </div>
    <section class="cart-list-area">
        <div class="container">
            <div class="row" id="cart_items_details">

                <div class="col-lg-8">
                    @if (session()->has('message'))
                        <div class="col-md-12 col-md-offset-3">
                            <div class="alert alert-danger alert-dismissable">
                                {{ session()->get('message') }}
                            </div>
                        </div><br>
                    @endif
                    @if ($errors->all())
                        <div class="col-md-12 col-md-offset-3">
                            <div class="alert alert-danger alert-dismissable">
                                Merci de remplire touts les champs obligatoire SVP!
                            </div>
                        </div><br>
                    @endif
{{-- 
                    <div class="col-md-12  text-danger mb-1">
                        @foreach ($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach 
                    </div>--}}
                    <div class="in-cart-box">
                        <div class="title">{{ $panier->count() }} Formation{{ $panier->count() > 1 ? 's' : '' }}
                        </div>
                        <div class="">
                            <ul class="cart-course-list">
                                @forelse ($panier as $session)
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
                                                    {{-- @foreach ($session->formateur as $f)
                                                    <img style="margin-left: 0px;" class="position-absolute"
                                                        src="{{ asset('assets/images/form/' . $f->photo) }}" width="30px"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="{{ $f->prenom . ' ' . $f->nom }}"
                                                        onclick="event.stopPropagation(); $(location).attr('href', '');" />
                                                @endforeach --}}
                                                    {{ $session->context }}
                                                </div>
                                            </div>
                                            <div class="move-remove text-center">
                                                <div id="{{ $session->id }}" onclick="removeFromCartList(this)"><i
                                                        class="fas fa-times-circle"></i> supprimer</div>

                                            </div>
                                            <div class="price">
                                                <div class="current-price">
                                                    {{ "$" . $session->prix }}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <div class="empty-box text-center ">
                                        <p class="text-danger">Votre panier est vide.</p>
                                        <a class="btn red radius-10" href="{{ route('dashboard') }}">Voir les
                                            formations</a>
                                    </div>
                                    {{-- <div class="title">{{ $panier->count() }} formation trouver Votre panier est vide</div> --}}
                                @endforelse

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 pt-1" {{ $panier->pluck('prix')->sum() == 0 ? 'hidden' : '' }}>
                    <h5 class="fw-700">Total:</h5>
                    <div class="cart-sidebar bg-white radius-10 py-4 px-3">
                        <span id="total_price_of_checking_out" hidden> 190 </span>
                        <div class="total-price"> {{ "$" . $panier->pluck('prix')->sum() }}</div>
                        <div class="total-original-price">
                        </div>

                        <div class="col-6 col-sm-6 col-md-3 input-group  mb-3 text-center text-md-start">
                            <form id="form_paie" method="POST" action="{{ url('payerForm') }}">
                                @csrf
                                <div class="mb-3" hidden>
                                    <label for="exampleInputEmail1" class="form-label">
                                        formation id :</label>
                                    <input type="text" name="formation_id" class="form-control"
                                        value="{{ isset($session->id) ? $panier->pluck('id')->join(',') : '' }}">
                                    <input type="text" name="prix" class="form-control"
                                        value="{{ $panier->pluck('prix')->sum() }}">
                                    <input type="text" name="monaie" class="form-control" value="USD">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="login-email">Moyen de paiement</label>
                                    <div class="input-group">
                                        <select class="form-select" name="channels"
                                            onchange="switch_modepaie(this.value)" required>
                                            <option disabled value="" selected> Selectionnez le moyen de paiement</option>
                                            <option value="MOBILE_MONEY">Mobile money</option>
                                            <option value="CREDIT_CARD">Carte bancaire</option>
                                            {{-- <option value="ALL">Les deux</option> --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="" id="carte" style="display: none">

                                    <div class="form-group mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Selectionnez votre pays
                                            (obligatoire)
                                        </label>
                                        <div class="input-group">
                                            @include('client.pages.listepays')
                                            @if ($errors->has('customer_country'))
                                                <small class="invalid-feedback  text-danger" role="alert">
                                                    <strong>{{ $errors->first('customer_country') }}</strong>
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group mb-3 ">
                                        <label for="login-email">Ville (obligatoire)</label>
                                        <div class="input-group">
                                            <input type="text" name="customer_city" class="form-control"
                                                placeholder="Ville"  value="{{ old('customer_city') }}"/>
                                                @if ($errors->has('customer_city'))
                                                <small class="invalid-feedback  text-danger" role="alert">
                                                    <strong>{{ $errors->first('customer_city') }}</strong>
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">
                                            Code postal (obligatoire) :</label>
                                        <input type="text" name="customer_zip_code" value="{{ old('name') }}"
                                         class="form-control" value="{{ old('customer_zip_code') }}">
                                        @if ($errors->has('customer_zip_code'))
                                        <small class="invalid-feedback  text-danger" role="alert">
                                            <strong>{{ $errors->first('customer_zip_code') }}</strong>
                                        </small>
                                    @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">votre Etat (obligatoire si
                                            vous êtes au canada ou aux USA)</label>
                                        <input type="text" name="customer_state" class="form-control"
                                        value="{{ old('customer_state') }}">
                                        @if ($errors->has('customer_state'))
                                        <small class="invalid-feedback  text-danger" role="alert">
                                            <strong>{{ $errors->first('customer_state') }}</strong>
                                        </small>
                                    @endif
                                    </div>
                                    <div class="form-group mb-3 ">
                                        <label for="login-email">Adresse (obligatoire)</label>
                                        <div class="input-group">
                                            <textarea name="customer_address" id="" cols="30" rows="5" class="form-control" placeholder="Adresse">
                                                {{ old('customer_address') }}
                                            </textarea>
                                            @if ($errors->has('customer_address'))
                                            <small class="invalid-feedback  text-danger" role="alert">
                                                <strong>{{ $errors->first('customer_address') }}</strong>
                                            </small>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn red w-100 radius-10 mb-3">Payer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('autres_script')
    {{-- <script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script> --}}
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

        // $(document).ready(function() {
        //     $("#form_paie").on("submit", function(e) {
        //         e.preventDefault();
        //         payer("#form_paie", '/paie');
        //     });
        // });

        function payer(form, url) {
            var u = url;
            $.ajax({
                url: u,
                method: "post",
                data: $(form).serialize(),
                success: function(data) {
                    // console.log(data.msg);
                    if (!data.reponse) {
                        if (data.bank) {
                            swal({
                                title: data.msg,
                                icon: 'error'
                            })
                        }
                        if (data.form) {
                            swal({
                                title: "Veuillez remplir touts les champs obligatoire svp!",
                                icon: 'error'
                            })
                        } else {
                            swal({
                                title: data.msg,
                                icon: 'error'
                            })
                        }

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
