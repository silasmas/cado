<div class="menu-area bg-white">
    <div class="container-xl">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="mobile-header-buttons">
                @if (!Auth::guest())
                    <li>
                        <a class="mobile-nav-trigger" href="#mobile-primary-nav">@lang('general.menu.titreMenu')<span></span></a>
                    </li>
                @endif
                <li>
                    <a class="mobile-search-trigger" href="#mobile-search">Search<span></span></a>
                </li>
            </ul>

            <a href="{{ route('homes') }}" class="navbar-brand">
                <img src="{{ asset('assets/logo/logo-white.png') }}" alt="logo" />
            </a>

            <div class="main-nav-wrap">
                <div class="mobile-overlay"></div>

                <ul class="mobile-main-nav">
                    <li class="mobile-menu-helper-top"></li>
                    {{-- <li class="has-children text-nowrap fw-bold">
                        <a href="">
                            <i class="fas fa-th d-inline text-20px"></i>
                            <span class="fw-500">@lang('general.menu.titreMenu')</span>
                            <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
                        </a>

                       
                    </li> --}}

                    <li class="mobile-menu-helper-bottom"></li>
                </ul>
            </div>

            {{-- {{dd(Auth::guest())}} --}}

            <div class="ms-auto d-flex align-items-center">
                @if (!Auth::guest())
                    <div class="instructor-box menu-icon-box">
                        <div class="icon">
                            <a href="{{ route('homes') }}"
                                style="border: 1px solid transparent; margin: 0px; padding: 0px 10px; font-size: 14px; width: max-content; border-radius: 5px; height: 40px; line-height: 40px;">
                                @lang('general.menu.home')
                            </a>
                        </div>
                    </div>
                    {{-- <div class="instructor-box menu-icon-box">
                        <div class="icon">
                            <a href="{{ route('homes') }}"
                                style="border: 1px solid transparent; margin: 0px; padding: 0px 10px; font-size: 14px; width: max-content; border-radius: 5px; height: 40px; line-height: 40px;">
                              Lives
                            </a>
                        </div>
                    </div> --}}

                    {{-- debut menu live --}}
                    <div class="instructor-box  menu-icon-box" id="">
                        <div class="icon">
                            <a href="{{ $live->count() > 0 ? route('listelives') : route('hone') }}"><i
                                    class="fas fa-signal"></i>
                            </a>
                            <span class="number">{{ $live->count() }}</span>
                        </div>
                        <div class="dropdown course-list-dropdown corner-triangle top-right">
                            <div class="list-wrapper">
                                <div class="item-list">
                                    <ul>
                                        @forelse ($live as $fav)
                                            <li>
                                                <div class="item clearfix">
                                                    <div class="item-image">
                                                        <a href="">
                                                            <img src="{{ asset('assets/images/form/' . $fav->cover) }}"
                                                                alt="" class="img-fluid" />
                                                        </a>
                                                    </div>
                                                    <div class="item-details">
                                                        <a href="{{ route('viewLive', ['id' => $fav->id]) }}">
                                                            <div class="course-name">
                                                                {{ $fav->titre }}
                                                            </div>
                                                            <div class="instructor-name">
                                                                {{ $fav->context }}
                                                            </div>

                                                            <div class="item-price">
                                                                @if ($fav->type == 'payant')
                                                                    @if ($fav->id == $userForm->session_id && $userForm->etat == 'Payer')
                                                                        <span class="current-price">
                                                                            @lang('general.autre.achatFait')
                                                                        </span>
                                                                    @else
                                                                        <span class="current-price">
                                                                            {{ $fav->monaie == 'USD' ? "$" : 'CDF' }}
                                                                            {{ $fav->prix }}
                                                                        </span>
                                                                    @endif
                                                                @else
                                                                    <span class="current-price">
                                                                        {{ $fav->type }}
                                                                    </span>
                                                                @endif

                                                            </div>
                                                        </a>
                                                        @if ($fav->type == 'payant')
                                                            @if ($livep->pluck('id')->contains($fav->id))
                                                                <a href="{{ route('viewLive', ['id' => $fav->id]) }}">
                                                                    <button onclick="handleCartItems(this)"
                                                                        class="addedToCart">
                                                                        @lang('general.autre.payer')
                                                                    </button>
                                                                </a>
                                                            @else
                                                                @if ($panier != null)
                                                                    @if ($panier->pluck('id')->contains($fav->id))
                                                                        <a href="{{ route('panier') }}" id="{{ $fav->id }}"
                                                                            class="addedToCart">
                                                                            <button class="addedToCart">
                                                                                @lang('general.autre.seePanier')
                                                                                <i class="fas fa-shopping-cart"></i>
                                                                            </button>
                                                                        </a>
                                                                    @else
                                                                        <button type="button" id="{{ $fav->id }}"
                                                                            class="addedToCart"
                                                                            onclick="addToCard(this)">
                                                                            @lang('general.autre.addPanier')
                                                                            <i class="fas fa-shopping-cart"></i>
                                                                        </button>
                                                                    @endif
                                                                @else
                                                                    <button type="button" id="{{ $fav->id }}"
                                                                        title="Ajouter au panier" class="addedToCart"
                                                                        onclick="addToCard(this)">
                                                                        @lang('general.autre.addPanier')
                                                                        <i class="fas fa-shopping-cart"></i>
                                                                    </button>
                                                                @endif
                                                            @endif
                                                        @else
                                                            @if ($livep != null)
                                                                @if ($livep->pluck('id')->contains($fav->id))
                                                                    <button onclick="annulReservation(this)"
                                                                        id="{{ $fav->id }}"
                                                                        class="addedToCart">
                                                                        @lang('general.autre.payer')
                                                                    </button>
                                                                @else
                                                                    <button onclick="confirmPlace(this)"
                                                                        id="{{ $fav->id }}"
                                                                        class="addedToCart">
                                                                        @lang('general.autre.livefree')
                                                                    </button>
                                                                @endif
                                                            @else
                                                            <button onclick="confirmPlace(this)"
                                                                        id="{{ $fav->id }}"
                                                                        class="addedToCart">
                                                                        @lang('general.autre.livefree')
                                                                    </button>
                                                            @endif
                                                        @endif

                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            <li>
                                                <div class="empty-box text-center">
                                                    <p class="text-danger">
                                                        Pas des lives en vue pour l'instant
                                                    </p>
                                                    <a href="{{ route('dashboard') }}">Accueil</a>
                                                </div>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                                @if (count($live) > 0)
                                    <div class="dropdown-footer">
                                        <a href="{{ route('listelives') }}">@lang('general.autre.eventPage')</a>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    {{-- Fin menu live --}}


                    {{-- Debut menu favorie --}}
                    <div class="wishlist-box  menu-icon-box" id="wishlist_items">
                        <div class="icon">
                            <a href=""><i class="fas fa-heart"></i></a>
                            <span class="number">{{ $userForm->favorie->count() }}</span>
                        </div>
                        <div class="dropdown course-list-dropdown corner-triangle top-right">
                            <div class="list-wrapper">
                                <div class="item-list">
                                    <ul>
                                        @forelse ($userForm->favorie->load('session') as $fav)
                                            <li>
                                                <div class="item clearfix">
                                                    <div class="item-image">
                                                        <a href="">
                                                            <img src="{{ asset('assets/images/form/' . $fav->session->cover) }}"
                                                                alt="" class="img-fluid" />
                                                        </a>
                                                    </div>
                                                    <div class="item-details">
                                                        <a
                                                            href="{{ route('detailFormation', ['id' => $fav->session->id]) }}">
                                                            <div class="course-name">
                                                                {{ $fav->session->titre }}
                                                            </div>
                                                            <div class="instructor-name">
                                                                {{ $fav->session->context }}
                                                            </div>

                                                            <div class="item-price">

                                                                @if ($fav->session->type == 'payant')
                                                                    @if ($fav->session->id == $userForm->session_id && $userForm->etat == 'Payer')
                                                                        <span class="current-price">
                                                                            @lang('general.autre.achatFait')
                                                                        </span>
                                                                    @else
                                                                        <span class="current-price">
                                                                            {{ $fav->session->monaie == 'USD' ? "$" : 'CDF' }}
                                                                            {{ $fav->session->prix }}
                                                                        </span>
                                                                    @endif
                                                                @else
                                                                    <span class="current-price">
                                                                        {{ $fav->session->type }}
                                                                    </span>
                                                                @endif

                                                            </div>
                                                        </a>
                                                        @if ($fav->type == 'payant')
                                                            @if ($fav->session->id == $userForm->session_id && $userForm->etat == 'Payer')
                                                                <a
                                                                    href="{{ route('detailFormation', ['id' => $fav->session->id]) }}">
                                                                    <button onclick="handleCartItems(this)"
                                                                        class="addedToCart">
                                                                        @lang('general.autre.free')
                                                                    </button>
                                                                </a>
                                                            @else
                                                                <a href="{{ route('panier') }}">
                                                                    <button onclick="handleCartItems(this)"
                                                                        class="addedToCart">
                                                                        @lang('general.autre.achat')
                                                                    </button>
                                                                </a>
                                                            @endif
                                                        @else
                                                            <a
                                                                href="{{ route('detailFormation', ['id' => $fav->session->id]) }}">
                                                                <button onclick="handleCartItems(this)"
                                                                    class="addedToCart">
                                                                    @lang('general.autre.free')
                                                                </button>
                                                            </a>
                                                        @endif

                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            <li>
                                                <div class="empty-box text-center">
                                                    <p class="text-danger">Votre liste de favorie est vide.

                                                    </p>
                                                    <a href="{{ route('dashboard') }}">Voir les formations</a>
                                                </div>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                                @if (count($userForm->favorie->load('session')) > 0)
                                    <div class="dropdown-footer">
                                        <a href="{{ route('favorie') }}">@lang('general.menu.btnFavoris')</a>
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                    {{-- Fiin menu favorie --}}

                    {{-- Debut menu panier --}}
                    <div class="cart-box menu-icon-box" id="cart_items">
                        <div class="icon">
                            <a href="{{ $panier->count() > 0 ? route('panier') : '' }}"><i
                                    class="fas fa-shopping-cart"></i></a>
                            <span class="number">{{ $panier->count() }}</span>
                        </div>

                        <!-- Cart Dropdown goes here -->
                        <div class="dropdown course-list-dropdown corner-triangle top-right" style="display: ;">
                            <!-- Just remove the display none from the css to make it work -->
                            <div class="list-wrapper">
                                <div class="item-list">
                                    <ul>
                                        @forelse ($panier as $p)
                                            <li>
                                                <div class="item clearfix">
                                                    <div class="item-image">
                                                        <a href="">
                                                            <img src="{{ asset('assets/images/form/' . $p->cover) }}"
                                                                alt="" class="img-fluid" />
                                                        </a>
                                                    </div>
                                                    <div class="item-details">
                                                        <a href="{{ route('detailFormation', ['id' => $p->id]) }}">
                                                            <div class="course-name">
                                                                {{ $p->titre }}
                                                            </div>
                                                            <div class="instructor-name">{{ $p->context }}</div>
                                                            <div class="item-price">
                                                                <span class="current-price">
                                                                    {{ $p->monaie == 'USD' ? "$" : 'CDF' }}
                                                                    {{ $p->prix }}
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            <div class="empty-box text-center ">
                                                <p class="text-danger">Votre panier est vide.</p>
                                                <a href="{{ route('dashboard') }}">Voir les formations</a>
                                            </div>
                                        @endforelse


                                    </ul>
                                </div>
                                @if ($panier->count() > 0)
                                    <div class="dropdown-footer">
                                        <div class="cart-total-price clearfix">
                                            <span>Total:</span>
                                            <div class="float-end">
                                                <span class="current-price">
                                                    {{ $panier->pluck('monaie')->first() }}
                                                    {{ $panier->pluck('prix')->sum() }}
                                                </span>
                                                <!-- <span class="original-price">$94.99</span> -->
                                            </div>
                                        </div>
                                        <a href="{{ route('panier') }}">Voir votre panier</a>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    {{-- Fin menu panier --}}

                    {{-- Debut menu profil --}}
                    <div class="user-box menu-icon-box">
                        <div class="icon">
                            <a href="javascript::">
                                <img src="{{ asset('assets/images/uploads/user_image/placeholder.png') }}"
                                    alt="placeholder" class="img-fluid" />
                            </a>
                        </div>
                        <div class="dropdown user-dropdown corner-triangle top-right">
                            <ul class="user-dropdown-menu">
                                <li class="dropdown-user-info">
                                    <a href="">
                                        <div class="clearfix">
                                            <div class="user-image float-start">
                                                <img src="{{ asset('assets/images/uploads/user_image/placeholder.png') }}"
                                                    alt="user_image" />
                                            </div>
                                            <div class="user-details">
                                                <div class="user-name">
                                                    <span class="hi">Salut,</span>
                                                    {{ Auth::user()->prenom . ' ' . Auth::user()->name }}
                                                </div>
                                                <div class="user-email">
                                                    <span class="email">{{ Auth::user()->email }}</span>
                                                    <span class="welcome">Bienvenue</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li class="user-dropdown-menu-item">
                                    <a href="{{ route('mesCours') }}"><i
                                            class="fas fa-gem"></i>@lang('general.menu.mesCours')</a>
                                </li>
                                <li class="user-dropdown-menu-item">
                                    <a href="{{ route('favorie') }}"><i
                                            class="fas fa-heart"></i>@lang('general.menu.mesFavoris')</a>
                                </li>
                                <li class="user-dropdown-menu-item">
                                    <a href="{{ route('historique') }}"><i
                                            class="fas fa-shopping-cart"></i>@lang('general.menu.achatStorie')</a>
                                </li>
                                <li class="user-dropdown-menu-item">
                                    <a href="{{ route('profil') }}"><i
                                            class="fas fa-user"></i>@lang('general.menu.profil')</a>
                                </li>

                                <li class="dropdown-user-logout user-dropdown-menu-item">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                        @lang('general.menu.logout')
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- Fin menu profil --}}
            </div>

            <span class="signin-box-move-desktop-helper"></span>
            <div class="sign-in-box btn-group d-none">
                <button type="button" class="btn btn-sign-in" data-toggle="modal" data-target="#signInModal">Log
                    In</button>

                <button type="button" class="btn btn-sign-up" data-toggle="modal" data-target="#signUpModal">Sign
                    Up</button>
            </div>
            <!--  sign-in-box end -->
            @endif



        </nav>
    </div>
</div>
