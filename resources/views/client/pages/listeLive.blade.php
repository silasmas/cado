@extends('client.templates.main_template', ['titre' => 'Liste des lives'])


@section('content')
    <section class="category-header-area" style="background-image: url('assets/images/system/course_page_banner.png');">
        <div class="image-placeholder-1"></div>
        <div class="container-lg breadcrumb-container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item display-6 fw-bold">
                        <a href="{{ route('dashboard') }}"> Accueil</a>
                    </li>
                    <li class="breadcrumb-item active text-light display-6 fw-bold">
                        Liste des lives
                    </li>
                </ol>
            </nav>
        </div>
    </section>


    <section class="category-course-list-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row category-filter-box mx-0">
                        <div class="col-md-6">
                            <a href="course-grid.html">
                                <button class="btn py-1 px-2 mx-2 btn-danger"><i class="fas fa-th-large"></i></button>
                            </a>
                            <span
                                class="text-12px fw-700 text-muted">{{ $live->count() . ' Conférence(s) trouvée' }}</span>
                        </div>
                        <div class="col-md-6 text-end filter-sort-by">
                            <span>Afficher par : </span>
                            <div class="dropdown d-inline-block">
                                <button class="btn bg-background dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    catégorie
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item text-12px fw-500" href="#">CADO</a></li>
                                    <li><a class="dropdown-item text-12px fw-500" href="#">COUPLE</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="category-course-list">
                        <div class="row">
                            @forelse ($live as $l)
                                <div class="col-md-3 col-xl-4">
                                    <div class="course-box-wrap">
                                        <a href="{{ route('viewLive', ['id' => $l->id]) }}" class="has-popover">
                                            <div class="course-box">
                                                <div class="course-image">
                                                    <img src="{{ asset('assets/images/form/' . $l->cover) }}" alt=""
                                                        class="img-fluid" />
                                                </div>
                                                <div class="course-details">
                                                    <h5 class="title">{{ $l->titre }}</h5>
                                                    
                                                    <div class="rating">
                                                        <div class="d-inline-block">
                                                            {{-- <span class="text-dark ms-1 text-15px">(5)</span> --}}
                                                            <span class="text-dark text-12px text-muted">
                                                                {{ Str::limit($l->description, 80, '...') }}    
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex text-dark">
                                                        <div class="">
                                                            <i class="far fa-clock text-14px"></i>
                                                            <span class="text-muted text-12px">
                                                                {{ \Carbon\Carbon::parse($l->date_debut)->isoFormat('LLL') }}</span>
                                                        </div>
                                                        <div class="ms-3">
                                                            <i class="far fa-list-alt text-14px"></i>
                                                            <span class="text-muted text-12px">
                                                                {{ $l->context }}
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3">
                                                        @if ($l->type == 'payant')
                                                            @if ($livep->pluck('id')->contains($l->id))
                                                                <div class="col-6">
                                                                    <a href="{{ route('viewLive', ['id' => $l->id]) }}">
                                                                        <span onclick="handleCartItems(this)"
                                                                            class="">
                                                                            <span
                                                                                class="badge badge-sub-warning text-11px">@lang('general.autre.payer')</span>
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                            @else
                                                                @if ($panier != null)
                                                                    @if ($panier->pluck('id')->contains($l->id))
                                                                        <div class="col-6" style="cursor: pointer;"
                                                                            onclick="event.preventDefault(); event.stopPropagation(); $(location).attr('href', '{{ route('panier') }}');">
                                                                            <span class="badge badge-sub-warning text-11px">
                                                                                @lang('general.autre.seePanier')
                                                                                <i class="fas fa-shopping-cart"></i>
                                                                            </span>
                                                                        </div>
                                                                    @else
                                                                    @if ($panier->pluck('etat')->contains("Payer"))
                                                                    
                                                                    @else
                                                                    <div class="col-4"></div>
                                                                        <div class="col-8 text-end">
                                                                            <button class="brn-compare-sm"
                                                                                onclick="addToCard(this)"
                                                                                id="{{ $l->id }}">
                                                                                @lang('general.autre.addPanier')
                                                                                <i class="fas fa-shopping-cart"></i>
                                                                            </button>
                                                                        </div>
                                                                    @endif
                                                                        
                                                                    @endif
                                                                @else
                                                                    <div class="col-4"></div>
                                                                    <div class="col-8 text-end">
                                                                        <span class="brn-compare-sm"
                                                                            style="cursor: pointer;"
                                                                            onclick="addToCard(this)"
                                                                            id="{{ $l->id }}">
                                                                            @lang('general.autre.addPanier')
                                                                            <i class="fas fa-shopping-cart"></i>
                                                                        </span>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @else
                                                            @if ($livep != null)
                                                                @if ($livep->pluck('id')->contains($l->id))
                                                                    <div class="col-6">
                                                                        <span onclick="annulReservation(this)"
                                                                            style="cursor: pointer;"
                                                                            id="{{ $l->id }}"
                                                                            class="badge badge-sub-warning text-11px">
                                                                            @lang('general.autre.payer')
                                                                        </span>
                                                                    </div>
                                                                @else
                                                                    <div class="col-2"></div>
                                                                    <div class="col-10 text-end">
                                                                        <button onclick="confirmPlace(this)"
                                                                            id="{{ $l->id }}"
                                                                            class="brn-compare-sm">
                                                                            @lang('general.autre.livefree')
                                                                        </button>
                                                                    </div>
                                                                @endif
                                                            @else
                                                                <div class="col-2"></div>
                                                                <div class="col-10 text-end">
                                                                    <button onclick="confirmPlace(this)"
                                                                        id="{{ $l->id }}" class="brn-compare-sm">
                                                                        @lang('general.autre.livefree')
                                                                    </button>
                                                                </div>
                                                            @endif
                                                        @endif
                                                    </div>
                                                    <hr class="divider-1" />
                                                    <div class="d-block">
                                                        <div class="floating-user d-inline-block">
                                                            @forelse ($l->formateur as $f)
                                                                @if ($loop->first)
                                                                    <img style="margin-left: 0px;" class="position-absolute"
                                                                        src="{{ asset('assets/images/form/' . $f->photo) }}"
                                                                        width="30px" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="{{ $f->prenom . ' ' . $f->nom }}"
                                                                        onclick="event.preventDefault(); $(location).attr('href', '{{ route('formateur', ['id' => $f->id]) }}');" />
                                                                @else
                                                                    <img style="margin-left: 17px;"
                                                                        class="position-absolute"
                                                                        src="{{ asset('assets/images/form/' . $f->photo) }}"
                                                                        width="30px" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="{{ $f->prenom . ' ' . $f->nom }}"
                                                                        onclick="event.preventDefault(); $(location).attr('href', '{{ route('formateur', ['id' => $f->id]) }}');" />
                                                                @endif

                                                            @empty
                                                            @endforelse
                                                        </div>
                                                        <p class="price text-right d-inline-block float-end">
                                                            @if ($l->type == 'payant')
                                                                @if ($userForm != null)
                                                                    @if ($l->id == $userForm->session_id && $userForm->etat == 'Payer')
                                                                        @lang('general.autre.achatFait')
                                                                    @else
                                                                        {{ $l->monaie == 'USD' ? '$' : 'FC' }}{{ $l->prix }}
                                                                    @endif
                                                                @else
                                                                    {{ $l->monaie == 'USD' ? '$' : 'FC' }}{{ $l->monaie == 'USD' ? '$' : 'FC' . $l->prix }}
                                                                @endif
                                                            @else
                                                                {{ $l->type }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item active disabled"><span class="page-link">1</span></li>
                            <li class="page-item"><a href="course-grid.html" data-ci-pagination-page="2">2</a></li>
                            <li class="page-item"><a href="course-grid.html" data-ci-pagination-page="3">3</a></li>
                            <li class="page-item">
                                <a href="course-grid.html" data-ci-pagination-page="2" rel="next"><i
                                        class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

@endsection
