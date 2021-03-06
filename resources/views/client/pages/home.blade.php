@extends('client.templates.main_template', ['titre' => 'Home dev'])

@section('content')
    {{-- {{ dd($allform[0]->formation) }} --}}
    <section class="home-banner-area" id="home-banner-area">
        {{-- <img src="{{ asset('assets/images/img-float.png') }}" alt="" class="img-float"> --}}
        {{-- <div class="cropped-home-banner"></div> --}}
        <div class="container-xl">
            <div class="block-card">
                @if ($live->isEmpty())
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 order-2 order-lg-1">
                                <div class="text-star text-white">
                                    <h2>Plateforme de formation</h2>

                                    <h3>Restez conntecté et profitez des formation qui vous enrichi d'ici-là</h3>
                                    <p>
                                        CADO / COUPLE
                                    </p>
                                    <a href="#about" class="btn btn-1 scrollTop">En savoir plus</a>

                                </div>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2">
                                <div class="box-img">
                                    <img src="{{ asset('assets/images/form/def.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @forelse ($live as $actuel)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <div class="container">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 order-2 order-lg-1">
                                                <div class="text-star text-white">
                                                    @if ($actuel->context == 'CADO')
                                                        <h2>Prochaine conférence d'adoration (CADO)</h2>
                                                    @else
                                                        <h2>Prochain coaching des couples</h2>
                                                    @endif

                                                    <h1>{{ $actuel->titre }}</h1>
                                                    <p><b>Date :</b> Du
                                                        {{ \Carbon\Carbon::parse($actuel->date_debut)->isoFormat('LL') }}</span>
                                                        au {{ \Carbon\Carbon::parse($actuel->date_fin)->isoFormat('LL') }}
                                                    </p>
                                                    </p>
                                                    @if ($actuel->type == 'payant')
                                                        @if ($livep->pluck('id')->contains($actuel->id))
                                                            <button id="{{ $actuel->id }}" onclick="addToCard(this)"
                                                                class="btn btn-1 scrollTop">Reéservation réussie
                                                                {{ " ($" . $actuel->prix . ')' }}</button>
                                                        @else
                                                            @if ($panier->pluck('id')->contains($actuel->id))
                                                                <a href="{{ route('panier') }}" id="{{ $actuel->id }}"
                                                                    class="">
                                                                    <button class="btn btn-1 scrollTop">
                                                                        @lang('general.autre.seePanier')
                                                                        <i class="fas fa-shopping-cart"></i>
                                                                    </button>
                                                                </a>
                                                            @else
                                                                <button id="{{ $actuel->id }}" onclick="addToCard(this)"
                                                                    class="btn btn-1 scrollTop">AJouter au panier
                                                                    <i class="fas fa-shopping-cart"></i>
                                                                    {{ " ($" . $actuel->prix . ')' }}</button>
                                                            @endif
                                                        @endif
                                                    @else
                                                        @if ($livep->pluck('id')->contains($actuel->id))
                                                            <button onclick="annulReservation(this)"
                                                                id="{{ $actuel->id }}" class="btn btn-1 scrollTop">
                                                                @lang('general.autre.payer')
                                                            </button>
                                                        @else
                                                            <button onclick="confirmPlace(this)" id="{{ $actuel->id }}"
                                                                class="btn btn-1 scrollTop">
                                                                @lang('general.autre.livefree')
                                                                {{ '(' . $actuel->type . ')' }}
                                                            </button>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 order-1 order-lg-2">
                                                <div class="box-img">
                                                    <img src="{{ asset('assets/images/form/' . $actuel->cover) }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @empty
                            @endforelse

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span><i class="fas fa-arrow-left"></i></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span><i class="fas fa-arrow-right"></i></span>
                        </button>
                    </div>
                @endif

            </div>
        </div>
        {{-- <script>
    var border_bottom = $(".home-banner-wrap").height() + 242;
    $(".cropped-home-banner").css("border-bottom", border_bottom + "px solid #f1f7f8");

    mRight = Number("1.5") * $(".home-banner-area").outerHeight();
    $(".cropped-home-banner").css("right", mRight - 65 + "px");
</script> --}}
    </section>


    <section class="course-carousel-area mb-5">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <h3 class="mb-4 course-carousel-title">Nos conférences CADO</h3>

                    <!-- page loader -->
                    <div class="animated-loader">
                        <div class="spinner-border text-secondary" role="status"></div>
                    </div>

                    <div class="course-carousel shown-after-loading" style="display: none;">
                        @forelse ($allform as $form)
                            <div class="course-box-wrap">
                                <a href="{{ route('detailFormation', ['id' => $form->id]) }}" class="has-popover">
                                    <div class="course-box">
                                        <div class="course-image">
                                            <img src="{{ asset('assets/images/form/' . $form->cover) }}" alt=""
                                                class="img-fluid" />
                                        </div>
                                        <div class="course-details">
                                            <h5 class="title">
                                                {{ $form->titre }}
                                            </h5>
                                            <div class="rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <div class="d-inline-block">
                                                    <span class="text-dark ms-1 text-15px">(5)</span>
                                                    <span class="text-dark text-12px text-muted ms-2">(1 Reviews)</span>
                                                </div>
                                            </div>
                                            <div class="d-flex text-dark">
                                                <div class="">
                                                    <i class="far fa-calendar text-14px"></i>
                                                    <span class="text-muted text-12px">
                                                        Du
                                                        {{ \Carbon\Carbon::parse($form->date_debut)->isoFormat('LL') }}
                                                        au {{ \Carbon\Carbon::parse($form->date_fin)->isoFormat('LL') }}
                                                    </span>
                                                </div>

                                            </div>

                                            <hr class="divider-1" />

                                            <div class="d-block">

                                                <div class="floating-user d-inline-block">
                                                    @foreach ($form->formateur as $fr)
                                                        @if ($loop->first)
                                                            <img style="margin-left: 0px; width: 30px; "
                                                                class="position-absolute"
                                                                src="{{ asset('assets/images/form/' . $fr->photo) }}"
                                                                alt="user_image" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="{{ $fr->prenom . ' ' . $fr->nom }}"
                                                                onclick="event.preventDefault(); $(location).attr('href', '{{ route('formateur', ['id' => $fr->id]) }}');" />
                                                        @else
                                                            <img style="margin-left: 17px; width: 30px;"
                                                                class="position-absolute"
                                                                src="{{ asset('assets/images/form/' . $fr->photo) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="{{ $fr->prenom . ' ' . $fr->nom }}"
                                                                onclick="event.preventDefault(); $(location).attr('href', '{{ route('formateur', ['id' => $fr->id]) }}');" />
                                                        @endif
                                                    @endforeach
                                                    {{-- @endif --}}

                                                </div>
                                                <p class="text-right price d-inline-block float-end">
                                                    @if ($form->type == 'payant')
                                                        @if ($userForm != null)
                                                            @if ($form->id == $userForm->session_id && $userForm->etat == 'Payer')
                                                                @lang('general.autre.achatFait')
                                                            @else
                                                                {{ $form->monaie == 'USD' ? '$' : 'FC' }}{{ $form->prix }}
                                                            @endif
                                                        @else
                                                            {{ $form->monaie == 'USD' ? '$' : 'FC' }}{{ $form->monaie == 'USD' ? '$' : 'FC' . $form->prix }}
                                                        @endif
                                                    @else
                                                        {{ $form->type }}
                                                    @endif

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <div class="webui-popover-content">
                                    <div class="course-popover-content">
                                        <div class="last-updated">
                                            A eu lieu Du
                                            {{ \Carbon\Carbon::parse($form->date_debut)->isoFormat('LL') }}
                                            au {{ \Carbon\Carbon::parse($form->date_fin)->isoFormat('LL') }}
                                        </div>

                                        <div class="course-title">
                                            <a class="text-decoration-none text-15px"
                                                href="{{ route('detailFormation', ['id' => $form->id]) }}">
                                                {{ $form->titre }}
                                            </a>
                                        </div>
                                        <div class="course-meta">
                                            <span class=""><i class="fas fa-play-circle"></i>
                                                {{ $form->formation->count() }} Lessons
                                            </span>
                                            {{-- <span class=""><i class="far fa-clock"></i> 01:10:09 Hours
                                                </span> --}}
                                            <span class=""><i
                                                    class="fas fa-closed-captioning"></i>Français</span>
                                        </div>
                                        <div class="course-subtitle">{{ $form->description }}</div>
                                        <div class="what-will-learn">
                                            <ul>
                                                @forelse ($form->formation->sortBy('titre') as $f)
                                                    <li>{{ $f->titre }}/li>
                                                    @empty
                                                @endforelse


                                            </ul>
                                        </div>
                                        <div class="popover-btns">
                                            @if ($form->type == 'payant')
                                                @if ($paie->pluck('id')->contains($form->id))
                                                    <a href="{{ route('detailFormation', ['id' => $form->id]) }}"
                                                        class="btn  green radius-10">
                                                        @if ($paie->find($form->id)->niveau == 'commencer')
                                                            @lang('general.autre.free')
                                                        @else
                                                            @lang('general.autre.suite')
                                                        @endif
                                                    </a>
                                                @else
                                                    @if ($panier != null)
                                                        @if ($panier->pluck('id')->contains($form->id))
                                                            <a href="{{ route('panier') }}" id="{{ $form->id }}"
                                                                class="btn red radius-10">
                                                                @lang('general.autre.seePanier')
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </a>
                                                        @else
                                                            <button type="button" id="{{ $form->id }}"
                                                                class="btn red radius-10" onclick="addToCard(this)">
                                                                @lang('general.autre.addPanier')
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </button>
                                                        @endif
                                                    @else
                                                        <button type="button" id="{{ $form->id }}"
                                                            title="Ajouter au panier" class="btn red radius-10"
                                                            onclick="addToCard(this)">
                                                            @lang('general.autre.addPanier')
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </button>
                                                    @endif
                                                @endif
                                            @else
                                                <a href="{{ route('detailFormation', ['id' => $form->id]) }}"
                                                    class="btn  green radius-10">
                                                    @lang('general.autre.free')
                                                </a>
                                            @endif
                                            <button type="button" class="wishlist-btn wishlist-add wishlisted"
                                                title="Ajouter aux favories" name="" onclick="handleWishList(this)"
                                                id="{{ $form->id }}">
                                                <i class="fas fa-heart"
                                                    @if ($userForm->favorie->pluck('session_id')->contains($form->id)) style="color: #ec5252" @endif></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h4 class="btn btn-plus">
                                Aucune conférence disponible pour le moment
                            </h4>
                        @endforelse
                    </div>
                </div>
            </div>
            @if ($allform->count() > 0)
                <a href="{{ route('allform') }}" class="btn btn-plus">Voir toutes les conférences <i
                        class="bi bi-arrow-right"></i></a>
            @endif
        </div>
    </section>

    <section class="course-carousel-area">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <h3 class="mb-4 course-carousel-title">Nos coaching pour les couples</h3>

                    <!-- page loader -->
                    <div class="animated-loader">
                        <div class="spinner-border text-secondary" role="status"></div>
                    </div>
                    <div class="course-carousel shown-after-loading" style="display: none;">
                        @forelse ($couples as $form)
                            <div class="course-box-wrap">
                                <a href="{{ route('detailFormation', ['id' => $form->id]) }}" class="has-popover">
                                    <div class="course-box">
                                        <div class="course-image">
                                            <img src="{{ asset('assets/images/form/' . $form->cover) }}" alt=""
                                                class="img-fluid" />
                                        </div>
                                        <div class="course-details">
                                            <h5 class="title">
                                                {{ $form->titre }}
                                            </h5>
                                            <div class="rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <div class="d-inline-block">
                                                    <span class="text-dark ms-1 text-15px">(5)</span>
                                                    <span class="text-dark text-12px text-muted ms-2">(1 Reviews)</span>
                                                </div>
                                            </div>
                                            <div class="d-flex text-dark">
                                                <div class="">
                                                    <i class="far fa-calendar text-14px"></i>
                                                    <span class="text-muted text-12px">
                                                        Du
                                                        {{ \Carbon\Carbon::parse($form->date_debut)->isoFormat('LL') }}
                                                        au {{ \Carbon\Carbon::parse($form->date_fin)->isoFormat('LL') }}
                                                    </span>
                                                </div>

                                            </div>

                                            <hr class="divider-1" />

                                            <div class="d-block">

                                                <div class="floating-user d-inline-block">
                                                    @foreach ($form->formateur as $fr)
                                                        @if ($loop->first)
                                                            <img style="margin-left: 0px; width: 30px; "
                                                                class="position-absolute"
                                                                src="{{ asset('assets/images/form/' . $fr->photo) }}"
                                                                alt="user_image" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="{{ $fr->prenom . ' ' . $fr->nom }}"
                                                                onclick="event.preventDefault(); $(location).attr('href', '{{ route('formateur', ['id' => $fr->id]) }}');" />
                                                        @else
                                                            <img style="margin-left: 17px; width: 30px;"
                                                                class="position-absolute"
                                                                src="{{ asset('assets/images/form/' . $fr->photo) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="{{ $fr->prenom . ' ' . $fr->nom }}"
                                                                onclick="event.preventDefault(); $(location).attr('href', '{{ route('formateur', ['id' => $fr->id]) }}');" />
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <p class="text-right price d-inline-block float-end">
                                                    @if ($form->type == 'payant')
                                                        @if ($userForm != null)
                                                            @if ($form->id == $userForm->session_id && $userForm->etat == 'Payer')
                                                                @lang('general.autre.achatFait')
                                                            @else
                                                                {{ $form->monaie == 'USD' ? '$' : 'FC' }}
                                                                {{ $form->prix }}
                                                            @endif
                                                        @else
                                                            {{ $form->monaie == 'USD' ? '$' : 'FC' }}
                                                            {{ $form->prix }}
                                                        @endif
                                                    @else
                                                        {{ $form->type }}
                                                    @endif

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <div class="webui-popover-content">
                                    <div class="course-popover-content">
                                        <div class="last-updated">
                                            A eu lieu Du
                                            {{ \Carbon\Carbon::parse($form->date_debut)->isoFormat('LL') }}
                                            au {{ \Carbon\Carbon::parse($form->date_fin)->isoFormat('LL') }}
                                        </div>

                                        <div class="course-title">
                                            <a class="text-decoration-none text-15px"
                                                href="{{ route('detailFormation', ['id' => $form->id]) }}">
                                                {{ $form->titre }}
                                            </a>
                                        </div>
                                        <div class="course-meta">
                                            <span class=""><i class="fas fa-play-circle"></i>
                                                {{ $form->formation->count() }} Lessons
                                            </span>
                                            {{-- <span class=""><i class="far fa-clock"></i> 01:10:09 Hours
                                        </span> --}}
                                            <span class=""><i
                                                    class="fas fa-closed-captioning"></i>Français</span>
                                        </div>
                                        <div class="course-subtitle">{{ $form->description }}</div>
                                        <div class="what-will-learn">
                                            <ul>
                                                @forelse ($form->formation->sortBy('titre') as $f)
                                                    <li>{{ $f->titre }}/li>
                                                    @empty
                                                @endforelse


                                            </ul>
                                        </div>
                                        <div class="popover-btns">
                                            @if ($form->type == 'payant')
                                                @if ($paie->pluck('id')->contains($form->id))
                                                    <a href="{{ route('detailFormation', ['id' => $form->id]) }}"
                                                        class="btn  green radius-10">
                                                        @lang('general.autre.free')
                                                    </a>
                                                @else
                                                    @if ($panier != null)
                                                        @if ($panier->pluck('id')->contains($form->id))
                                                            <a href="{{ route('panier') }}" id="{{ $form->id }}"
                                                                class="btn red radius-10">
                                                                @lang('general.autre.seePanier')
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </a>
                                                        @else
                                                            <button type="button" id="{{ $form->id }}"
                                                                class="btn red radius-10" onclick="addToCard(this)">
                                                                @lang('general.autre.addPanier')
                                                                <i class="fas fa-shopping-cart"></i>
                                                            </button>
                                                        @endif
                                                    @else
                                                        <button type="button" id="{{ $form->id }}"
                                                            title="Ajouter au panier" class="btn red radius-10"
                                                            onclick="addToCard(this)">
                                                            @lang('general.autre.addPanier')
                                                            <i class="fas fa-shopping-cart"></i>
                                                        </button>
                                                    @endif
                                                @endif
                                            @else
                                                <a href="{{ route('detailFormation', ['id' => $form->id]) }}"
                                                    class="btn  green radius-10">
                                                    @lang('general.autre.free')
                                                </a>
                                            @endif
                                            <button type="button" class="wishlist-btn wishlist-add wishlisted"
                                                title="Ajouter aux favories" name="" onclick="handleWishList(this)"
                                                id="{{ $form->id }}">
                                                <i class="fas fa-heart"
                                                    @if ($userForm->favorie->pluck('session_id')->contains($form->id)) style="color: #ec5252" @endif></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h4 class="btn btn-plus">
                                Aucune conférence disponible pour le moment
                            </h4>
                        @endforelse
                    </div>
                </div>
            </div>
            @if ($couples->count() > 0)
                <a href="{{ route('allform') }}" class="btn btn-plus">Voir toutes les conférences <i
                        class="bi bi-arrow-right"></i></a>
            @endif
        </div>
    </section>

    <section class="featured-instructor">
        <div class="container-lg">
            <div class="row">
                <div class="col">
                    <h3 class="text-center mb-5">Ce que dit les participants</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-7">
                    <div class="animated-loader">
                        <div class="spinner-border text-secondary" role="status"></div>
                    </div>
                    <div class="top-istructor-slick shown-after-loading" style="display: none;">
                        <div class="d-sm-flex text-center text-md-start">
                            <div class="top-instructor-img ms-auto me-auto">
                                <a href="instructor.html">
                                    <img src="assets/images/uploads/user_image/0269091217f95c25ac4f77c1bd69879a.jpg"
                                        alt="instructor" style="width: 100%;" />
                                </a>
                            </div>
                            <div class="top-instructor-details">
                                <a class="text-decoration-none" href="instructor.html">
                                    <h4 class="mb-1 fw-700">Dave Franco</h4>
                                    <span class="fw-500 text-muted text-14px"></span>
                                    <p class="text-12px fw-500 text-muted my-3">Hi, I'm Dave! I have been identified as one
                                        of the Edustar Top Instructors and all my premium co...</p>

                                    <!--                                                                           <span class="badge badge-sub-warning text-12px my-1 py-2"></span>
                                                                             -->
                                </a>

                                <p class="top-instructor-arrow my-3">
                                    <span class="cursor-pointer"
                                        onclick="$('.top-istructor-slick .slick-prev').click();"><i
                                            class="fas fa-angle-left"></i></span>
                                    <span class="cursor-pointer"
                                        onclick="$('.top-istructor-slick .slick-next').click();"><i
                                            class="fas fa-angle-right"></i></span>
                                </p>
                            </div>
                        </div>
                        <div class="d-sm-flex text-center text-md-start">
                            <div class="top-instructor-img ms-auto me-auto">
                                <a href="instructor.html">
                                    <img src="assets/images/uploads/user_image/48a153e87c587ffe79d6e8609e59124b.jpg"
                                        alt="user_image" style="width: 100%;" />
                                </a>
                            </div>
                            <div class="top-instructor-details">
                                <a class="text-decoration-none" href="instructor.html">
                                    <h4 class="mb-1 fw-700">John David</h4>
                                    <span class="fw-500 text-muted text-14px"></span>
                                    <p class="text-12px fw-500 text-muted my-3">Johns David has a BS and MS in Mechanical
                                        Engineering from Santa Clara University and years of exper...</p>

                                    <!--                                                                           <span class="badge badge-sub-warning text-12px my-1 py-2"></span>
                                                                             -->
                                </a>

                                <p class="top-instructor-arrow my-3">
                                    <span class="cursor-pointer"
                                        onclick="$('.top-istructor-slick .slick-prev').click();"><i
                                            class="fas fa-angle-left"></i></span>
                                    <span class="cursor-pointer"
                                        onclick="$('.top-istructor-slick .slick-next').click();"><i
                                            class="fas fa-angle-right"></i></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                if ($(window).width() >= 840) {
                    $("a.has-popover").webuiPopover({
                        trigger: "hover",
                        animation: "pop",
                        placement: "horizontal",
                        delay: {
                            show: 500,
                            hide: null,
                        },
                        width: 330,
                    });
                } else {
                    $("a.has-popover").webuiPopover({
                        trigger: "hover",
                        animation: "pop",
                        placement: "vertical",
                        delay: {
                            show: 100,
                            hide: null,
                        },
                        width: 335,
                    });
                }
            }

            if ($(".course-carousel")[0]) {
                $(".course-carousel").slick({
                    dots: false,
                    infinite: false,
                    speed: 300,
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    swipe: false,
                    touchMove: false,
                    responsive: [{
                            breakpoint: 840,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3
                            }
                        },
                        {
                            breakpoint: 620,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        },
                    ],
                });
            }

            if ($(".top-istructor-slick")[0]) {
                $(".top-istructor-slick").slick({
                    dots: false,
                });
            }
        });
    </script>
@endsection
