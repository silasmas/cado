<div class="menu-area bg-white">
    <div class="container-xl">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="mobile-header-buttons">
                @if (!Auth::guest())
                    <li>
                        <a class="mobile-nav-trigger"
                            href="#mobile-primary-nav">@lang('general.menu.titreMenu')<span></span></a>
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
                    <a href="{{ route('couple') }}"
                        style="border: 1px solid transparent; margin: 0px; padding: 0px 10px; font-size: 14px; width: max-content; border-radius: 5px; height: 40px; line-height: 40px;">
                        @lang('general.menu.formation')
                    </a>
                </div>
            </div> --}}
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
                                                        <a href="{{ route('detailFormation', ['id' => $fav->session->id]) }}">
                                                            <div class="course-name">
                                                                {{ $fav->session->titre }}
                                                            </div>

                                                            <div class="item-price">

                                                                @if ($fav->session->type == 'payant')
                                                                @if ($fav->session->id==$userForm->session_id && $userForm->etat=='Payer')
                                                           
                                                                    <span class="current-price">
                                                                        @lang('general.autre.achatFait')
                                                                    </span>
                                                                    @else
                                                                    <span class="current-price">
                                                                        {{ '$' . $fav->session->prix }}
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

                                                            @if ($fav->session->id==$userForm->session_id && $userForm->etat=='Payer')
                                                            <a href="{{ route('detailFormation', ['id' => $fav->session->id]) }}">
                                                                <button
                                                                    onclick="handleCartItems(this)"
                                                                    class="addedToCart">
                                                                    @lang('general.autre.free')
                                                                </button>
                                                            </a>
                                                                
                                                        @else
                                                        <a href="{{ route('panier', ['id' => $fav->session->id]) }}">
                                                            <button onclick="handleCartItems(this)"
                                                                class="addedToCart">
                                                                @lang('general.autre.achat')
                                                            </button>
                                                            </a>
                                                        @endif 
                                                        @else 
                                                            <a href="{{ route('detailFormation', ['id' => $fav->session->id]) }}">
                                                                <button
                                                                    onclick="handleCartItems(this)"
                                                                    class="addedToCart">
                                                                    @lang('general.autre.free')
                                                                </button>
                                                            </a>
                                                        @endif

                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                                <div class="dropdown-footer">
                                    <a href="{{ route('favorie') }}">@lang('general.menu.btnFavoris')</a>
                                </div>
                            </div>
                            <div class="empty-box text-center d-none">
                                <p>Your wishlist is empty.</p>
                                <a href="">Explore courses</a>
                            </div>
                        </div>
                    </div>


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
                                    <a href="{{ route('panier', ['id' => 2]) }}"><i
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
