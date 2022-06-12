@extends('client.templates.main_template', ['titre' => 'Detail formation'])


@section('content')

    <section class="course-header-area">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="course-header-wrap">
                        <h1 class="title">{{ $detail->session->titre }}</h1>
                        <p class="subtitle">{{ $detail->sous_titre }}</p>
                        <div class="rating-row">
                            <span class="course-badge best-seller">Beginner</span>
                            <i class="fas fa-star filled" style="color: #f5c85b;"></i>
                            <i class="fas fa-star filled" style="color: #f5c85b;"></i>
                            <i class="fas fa-star filled" style="color: #f5c85b;"></i>
                            <i class="fas fa-star filled" style="color: #f5c85b;"></i>
                            <i class="fas fa-star"></i>
                            <span class="d-inline-block average-rating">4</span>
                            <span class="enrolled-num"> 1 Students enrolled </span>
                            <span class="comment"><i class="fas fa-comment"></i>Français</span>
                        </div>
                        <div class="created-row">

                            <span class="last-updated-date d-inline-block mt-2">
                                A eu lieu Du
                                {{ \Carbon\Carbon::parse($detail->session->date_debut)->isoFormat('LL') }}
                                au {{ \Carbon\Carbon::parse($detail->session->date_fin)->isoFormat('LL') }}

                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </section>
    <section class="course-content-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-last order-lg-first radius-10 mt-4 bg-white p-30-40">
                    <div class="description-box view-more-parent">
                        <div class="view-more" onclick="viewMore(this,'hide')">+ Voir plus</div>
                        <div class="description-title">Aperçu du cours</div>
                        <div class="description-content-wrap">
                            <div class="description-content">
                                <div data-purpose="safely-set-inner-html:description:description" xss="removed">
                                    <p xss="removed">
                                        {{ $detail->description }}
                                    </p>
                                    <p xss="removed">{{ $detail->presentation }}</strong></p>
                                    <ul xss="removed">
                                        <li xss="removed">For beginners that have not used Adobe Illustrator before</li>
                                        <li xss="removed">Overview of Illustrator terminology</li>
                                        <li xss="removed">Overview of design and product development processes used in
                                            industry and how Illustrator fits into the design workflow</li>
                                        <li xss="removed">Familiarise yourself with the Illustrator interface</li>
                                        <li xss="removed">Learn the core tools and features needed to produce basic fashion
                                            drawings</li>
                                        <li xss="removed">Garment drawing workshops</li>
                                    </ul>
                                    <p xss="removed"></p>
                                    <p xss="removed"><strong xss="removed">Learn essential skills required by the fashion
                                            industry</strong></p>
                                    <p xss="removed">
                                        Having spent over a decade implementing and training software technologies into
                                        fashion brands and retailers across the globe, I spent a lot of time working with
                                        the designers. Over the years
                                        there seemed to be a common theme in the design room - lots of designers were using
                                        Illustrator well but many either couldn't use it at all or couldn't use it very
                                        well. They also didn't adhere to
                                        any drawing standards or best practises so had problems such as not being able to
                                        easily edit each other's drawings, create colourways quickly or create reusable
                                        components properly, making them
                                        inefficient.
                                    </p>
                                    <p xss="removed">
                                        Illustrator 4 Fashion training has been specifically tailored for fashion, with the
                                        needs of the industry in mind. The training can be taken by company design
                                        employees, freelance designers,
                                        fashion design students and anyone else looking to learn or improve their fashion
                                        drawing with Adobe Illustrator.
                                    </p>
                                    <p xss="removed"><strong xss="removed">Course Overview</strong></p>
                                    <p xss="removed">
                                        Most Adobe Illustrator manuals and online training courses are industry generic with
                                        many modules not relevant to fashion drawing. It can be hard to know which features
                                        to learn and how to develop
                                        techniques to draw professional fashion designs. Illustrator 4 Fashion only teaches
                                        you the features and techniques relevant to drawing fashion flats, illustrations and
                                        garment components.
                                    </p>
                                    <p xss="removed">
                                        The Illustrator 4 Fashion course is split into 3 levels; beginner, intermediate and
                                        advanced. In this level 1 beginners course, aimed at users with no previous
                                        Illustrator knowledge, we start off
                                        by introducing you to the Illustrator terminology and interface. You'll also gain an
                                        understanding of the fashion product development process used in industry and how
                                        Adobe Illustrator is used as
                                        part of this. Following this we will then go through in simple individual tutorials
                                        all the functional tools you need to know how to use to get you started with fashion
                                        drawing. The final part of
                                        the course features a series of garment drawing workshops where we will put together
                                        all the skills you have acquired into practise.
                                    </p>
                                    <p xss="removed">Every lecture includes supporting Illustrator work files so that
                                        students can follow the lecture exactly.</p>
                                </div>
                                <div class="styles--audience--2pZ0S" data-purpose="target-audience" xss="removed">
                                    <h2 class="udlite-heading-xl styles--audience__title--1Sob_" xss="removed">Who this
                                        course is for:</h2>
                                    <ul class="styles--audience__list--3NCqY" xss="removed">
                                        <li xss="removed">Suitable for fashion design students</li>
                                        <li xss="removed">Suitable for freelance fashion designers</li>
                                        <li xss="removed">Suitable for company fashion design employees</li>
                                        <li xss="removed">Suitable for anyone looking to learn how to draw fashion using
                                            Adobe Illustrator</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="about-instructor-box">
                        <div class="about-instructor-title">
                            Apropo du coach
                        </div> 
                        @forelse ($formateur as $fr)
                            @forelse ($fr->formateur as $f)
                                <div class="row justify-content-center">

                                    <div class="col-md-4 top-instructor-img w-sm-100">
                                        <a href="{{ route('formateur', ['id'=>$f->id]) }}">
                                            <img src="{{ asset('assets/images/form/' . $f->photo) }}" width="100%" />
                                        </a>
                                    </div>

                                    <div class="col-md-8 top-instructor-details text-center text-md-start">
                                        <h4 class="mb-1 fw-600 v"><a class="text-decoration-none" href="{{ route('formateur', ['id'=>$f->id]) }}">
                                                {{ $f->prenom . ' ' . $f->nom }}
                                            </a></h4>
                                        <p class="fw-500 text-14px w-100"></p>
                                        <div class="rating">
                                            <div class="d-inline-block">
                                                <span class="text-dark fw-800 text-muted ms-1 text-13px">4 Reviews</span>
                                                |
                                                <span class="text-dark fw-800 text-13px text-muted mx-1"> 1 Students </span>
                                                |
                                                <span class="text-dark fw-800 text-14px text-muted"> 6 Courses </span>
                                            </div>
                                        </div>
                                        <span class="badge badge-sub-warning text-12px my-1 py-2"></span>

                                        <div class="description">
                                            {{ $f->biographie }}
                                        </div>
                                    </div>
                                </div><br>
                            @empty
                                <h1>Aucun coach</h1>
                            @endforelse
                        @empty
                        @endforelse

                    </div>
                    <div class="compare-box view-more-parent">
                        <div class="view-more" onclick="viewMore(this)">+ Voir plus</div>
                        <div class="compare-title">Des formations similaire </div>
                        <div class="compare-courses-wrap"></div>
                    </div>

                </div>

                <div class="col-lg-4 order-first order-lg-last">
                    <div class="course-sidebar natural">
                        <div class="preview-video-box">
                            <a data-bs-toggle="modal" data-bs-target="#CoursePreviewModal">
                                <img src="{{ asset('assets/images/form/' . $detail->session->cover) }}" alt=""
                                    class="w-100" />
                                <span class="preview-text">Pésentation de la conérence</span>
                                <span class="play-btn"></span>
                            </a>
                        </div>
                        <div class="course-sidebar-text-box">
                            <div class="price text-center">
                                {{-- <span class="original-price">{{ $userForm->pivot->etat }}</span> --}}
                                @if ($detail->session->type == 'payant')
                                    <span class="current-price">
                                        <span class="current-price">
                                            {{ $detail->session->monaie == 'USD' ? '$' : 'FC' }}{{ $detail->session->prix }}
                                        </span>
                                    </span>
                                    <input type="hidden" id="total_price_of_checking_out"
                                        value="{{ $detail->session->prix }}" />
                                @else
                                    {{-- <span class="current-price">
                                        <span class="current-price">
                                            {{ $detail->session->type }}
                                        </span> --}}
                                    </span>
                                @endif
                            </div>

                            <!-- WISHLIST BUTTON -->

                            <label
                                class="d-none">{{ $fre = $userForm->session->where('id', $detail->session->id)->first() }}</label>
                            {{-- {{ dd($fre) }} --}}
                            @if ($detail->session->type == 'payant')
                                @if ($fre == '')
                                <div class="buy-btns">
                                    <button class="btn btn-buy-now" 
                                        id="{{ $detail->session->id }}" onclick="addToCard(this)">
                                        @lang('general.autre.addPanier')
                                    </button>
                                </div>
                                @else
                                    @if ($fre->pivot->etat == 'Payer')
                                        <div class="buy-btns">
                                            <span style="cursor: pointer" class="btn btn-buy-now">
                                                Réservation réussi
                                            </span>
                                        </div>
                                    @else
                                        <div class="buy-btns">
                                            <a class="btn btn-buy-now" href="{{ route('panier') }}">
                                                @lang('general.autre.seePanier')
                                            </a>
                                        </div>
                                    @endif
                                @endif
                            @else
                                @if ($fre != null)
                                    @if ($fre->pivot->etat == 'Payer')
                                        <div class="buy-btns">
                                            <a class="btn btn-buy-now"
                                                href="{{ route('formationBy', ['id' => $detail->session->id]) }}" id="12"
                                                onclick="handleCartItems(this)">
                                                Réservation réussi
                                            </a>
                                        </div>
                                    @else
                                        <div class="buy-btns">
                                            <a class="btn btn-buy-now" href="{{ route('panier') }}">
                                                @lang('general.autre.seePanier')
                                            </a>
                                        </div>
                                    @endif
                                @else
                                    <div class="buy-btns">
                                        <a class="btn btn-buy-now"
                                            href="{{ route('formationBy', ['id' => $detail->session->id]) }}" id="12"
                                            onclick="handleCartItems(this)">
                                            Confirmez votre réservation
                                        </a>
                                    </div>
                                @endif
                            @endif
                            <div class="buy-btns">
                                <button class="btn btn-add-wishlist" type="button" onclick="handleWishList3(this)"
                                    id="{{ $detail->session->id }}">

                                    @if ($detail->session->favorie->count() > 0)
                                        @foreach ($detail->session->favorie as $r)
                                            @if ($r->session_id == $detail->session->id)
                                                {{ 'Déjà dans vos favories' }}
                                            @else
                                                {{ 'Ajouter dans vos favories' }}
                                            @endif
                                        @endforeach
                                    @else
                                        {{ 'Ajouter dans vos favories' }}
                                    @endif
                                </button>
                            </div>



                            <div class="includes">
                                <div class="title"><b>Inclus :</b></div>
                                <ul>
                                    {{-- <li><i class="far fa-file-video"></i> 00:43:50 Hours On demand videos</li> --}}
                                    <li><i class="far fa-file"></i>{{ $detail->count() . ' Chapitre(s)' }}</li>
                                    <li><i class="fas fa-mobile-alt"></i>Adaptable sur mobile et TV</li>
                                    <li><i class="far fa-compass"></i>Accès illimité</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="CoursePreviewModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
        aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content course-preview-modal">
                <div class="modal-header">
                    <h5 class="modal-title"><span>Présentation :</span>{{ $detail->session->titre }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <!-- <button type="button" class="close" data-bs-dismiss="modal" onclick="pausePreview()">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                      </button> -->
                </div>
                <div class="modal-body">
                    <div class="course-preview-video-wrap">
                        <div class="embed-responsive embed-responsive-16by9">
                            <!------------- PLYR.IO ------------>
                            <link rel="stylesheet" href="{{ asset('assets/global/plyr/plyr.css') }}" />

                            <div class="plyr__video-embed" id="player">
                                <iframe height="500" src="{{ $detail->session->spote }}" allowfullscreen
                                    allowtransparency allow="autoplay"></iframe>
                            </div>

                            <script src="{{ asset('assets/global/plyr/plyr.js') }}"></script>
                            <script>
                                const player = new Plyr("#player");
                            </script>
                            <!------------- PLYR.IO ------------>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <style media="screen">
        .embed-responsive-16by9::before {
            padding-top: 0px;
        }

    </style>

@endsection

@section('autres_script')
    <script type="text/javascript">
        function isTouchDevice() {
            return "ontouchstart" in window || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;
        }

        function viewMore(element, visibility) {
            if (visibility == "hide") {
                $(element).parent(".view-more-parent").addClass("expanded");
                $(element).remove();
            } else if ($(element).hasClass("view-more")) {
                $(element).parent(".view-more-parent").addClass("expanded has-hide");
                $(element).removeClass("view-more").addClass("view-less").html("- View less");
            } else if ($(element).hasClass("view-less")) {
                $(element).parent(".view-more-parent").removeClass("expanded has-hide");
                $(element).removeClass("view-less").addClass("view-more").html("+ View more");
            }
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
    </script>
@endsection
