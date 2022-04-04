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
                <img src="{{ asset('assets/logo/logoan.png') }}" alt="logo" height="35" />
            </a>

            <div class="main-nav-wrap">
                <div class="mobile-overlay"></div>

                <ul class="mobile-main-nav">
                    <li class="mobile-menu-helper-top"></li>
                    <li class="has-children text-nowrap fw-bold">
                        <a href="">
                            <i class="fas fa-th d-inline text-20px"></i>
                            <span class="fw-500">@lang('general.menu.titreMenu')</span>
                            <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
                        </a>

                        <ul class="category corner-triangle top-left is-hidden pb-0">
                            <li class="go-back">
                                <a href=""><i class="fas fa-angle-left"></i>@lang('general.menu.titreMenuMobile')</a>
                            </li>

                            <li class="has-children">
                                <a href="course-grid.html" class="py-2">
                                    <span class="icon"><i class="fas fa-pencil-alt"></i></span>
                                    <span>Catégorie 1</span>
                                    <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
                                </a>
                                <ul class="sub-category is-hidden">
                                    <li class="go-back-menu">
                                        <a href=""><i
                                                class="fas fa-angle-left"></i>@lang('general.menu.titreMenuMobile')</a>
                                    </li>
                                    <li class="go-back">
                                        <a href="">
                                            <i class="fas fa-angle-left"></i>
                                            <span class="icon"><i class="fas fa-pencil-alt"></i></span>
                                            Catégorie 1 mobile
                                        </a>
                                    </li>
                                    <li><a href="course-grid.html">Photoshop</a></li>
                                    <li><a href="course-grid.html">Adobe Illustrator</a></li>
                                    <li><a href="course-grid.html">Drawing</a></li>
                                    <li><a href="course-grid.html">Logo Design</a></li>
                                    <li><a href="course-grid.html">Digital Art</a></li>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="course-grid.html" class="py-2">
                                    <span class="icon"><i class="fas fa-male"></i></span>
                                    <span>Catégorie 2</span>
                                    <span class="has-sub-category"><i class="fas fa-angle-right"></i></span>
                                </a>
                                <ul class="sub-category is-hidden">
                                    <li class="go-back-menu">
                                        <a href=""><i
                                                class="fas fa-angle-left"></i>@lang('general.menu.titreMenuMobile')</a>
                                    </li>
                                    <li class="go-back">
                                        <a href="">
                                            <i class="fas fa-angle-left"></i>
                                            <span class="icon"><i class="fas fa-male"></i></span>
                                            Catégorie 2 mobile
                                        </a>
                                    </li>
                                    <li><a href="course-grid.html">User Experience Design</a></li>
                                    <li><a href="course-grid.html">Mobile App Design</a></li>
                                    <li><a href="course-grid.html">User Interface</a></li>
                                    <li><a href="course-grid.html">Design Thinking</a></li>
                                    <li><a href="course-grid.html">Figma</a></li>
                                    <li><a href="course-grid.html">Prototyping</a></li>
                                </ul>
                            </li>
                            <li class="all-category-devided mb-0 p-0">
                                <a href="{{ route('allFormation') }}"
                                    class="py-2"><span>@lang('general.menu.formAll')</span></a>
                                    @if (Auth::guest())
                                <a href="{{ route('login') }}"
                                    class="py-2"><span>@lang('general.menu.login') </span></a>
                                <a href="{{ route('register') }}"
                                    class="py-2"><span>@lang('general.menu.inscription') </span>
                                </a>
                                @endif
                            </li>
                        </ul>
                    </li>

                    <li class="mobile-menu-helper-bottom"></li>
                </ul>
            </div>

            <form class="inline-form" action="#" method="get" style="width: 100%;">
                <div class="input-group search-box mobile-search">
                    <input type="text" name="query" class="form-control"
                        placeholder="@lang('general.menu.rechercheBar')" />
                    <div class="input-group-append">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            {{-- {{dd(Auth::guest())}} --}}
            
            @if (!Auth::guest())
            <div class="instructor-box menu-icon-box">
                <div class="icon">
                    <a href="{{ route('homes') }}"
                        style="border: 1px solid transparent; margin: 0px; padding: 0px 10px; font-size: 14px; width: max-content; border-radius: 5px; height: 40px; line-height: 40px;">
                        @lang('general.menu.home')
                    </a>
                </div>
            </div>

            <div class="instructor-box menu-icon-box">
                <div class="icon">
                    <a href="{{ route('couple') }}"
                        style="border: 1px solid transparent; margin: 0px; padding: 0px 10px; font-size: 14px; width: max-content; border-radius: 5px; height: 40px; line-height: 40px;">
                        @lang('general.menu.formation')
                    </a>
                </div>
            </div>
                <div class="wishlist-box  menu-icon-box" id="wishlist_items">
                    <div class="icon">
                        <a href=""><i class="far fa-heart"></i></a>
                        <span class="number">4</span>
                    </div>
                    <div class="dropdown course-list-dropdown corner-triangle top-right">
                        <div class="list-wrapper">
                            <div class="item-list">
                                <ul>
                                    <li>
                                        <div class="item clearfix">
                                            <div class="item-image">
                                                <a href="">
                                                    <img src="{{ asset('assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_4.jpg') }}"
                                                        alt="" class="img-fluid" />
                                                </a>
                                            </div>
                                            <div class="item-details">
                                                <a href="course-details.html">
                                                    <div class="course-name">Character Art School: Complete Character
                                                        Drawing Course</div>
                                                    <div class="instructor-name">
                                                        By John David , By Olivia Emily
                                                    </div>

                                                    <div class="item-price">
                                                        <span class="current-price">$70</span>
                                                    </div>
                                                </a>
                                                <button type="button" onclick="handleCartItems(this)"
                                                    class="addedToCart">
                                                    @lang('general.menu.btnAddPanier')
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item clearfix">
                                            <div class="item-image">
                                                <a href="">
                                                    <img src="{{ asset('assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_5.jpg') }}"
                                                        alt="" class="img-fluid" />
                                                </a>
                                            </div>
                                            <div class="item-details">
                                                <a href="course-details.html">
                                                    <div class="course-name">The Complete Sketch 5 Course - Design
                                                        Apps & Websites 2021</div>
                                                    <div class="instructor-name">
                                                        By John David
                                                    </div>

                                                    <div class="item-price">
                                                        <span class="current-price">$90</span>
                                                    </div>
                                                </a>
                                                <button type="button" onclick="handleCartItems(this)"
                                                    class="addedToCart">
                                                    Added to cart
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item clearfix">
                                            <div class="item-image">
                                                <a href="">
                                                    <img src="{{ asset('assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_7.jpg') }}"
                                                        alt="" class="img-fluid" />
                                                </a>
                                            </div>
                                            <div class="item-details">
                                                <a href="course-details.html">
                                                    <div class="course-name">UI/UX design with Adobe XD: Design &
                                                        Prototype a Mobile App</div>
                                                    <div class="instructor-name">
                                                        By John David
                                                    </div>

                                                    <div class="item-price">
                                                        <span class="current-price">$199</span>
                                                    </div>
                                                </a>
                                                <button type="button" onclick="handleCartItems(this)"
                                                    class="">
                                                    Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </li>
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

                <div class="cart-box menu-icon-box" id="cart_items">
                    <div class="icon">
                        <a href=""><i class="fas fa-shopping-cart"></i></a>
                        <span class="number">3</span>
                    </div>
                    <!-- Cart Dropdown goes here -->
                    <div class="dropdown course-list-dropdown corner-triangle top-right" style="display: ;">
                        <!-- Just remove the display none from the css to make it work -->
                        <div class="list-wrapper">
                            <div class="item-list">
                                <ul>
                                    <li>
                                        <div class="item clearfix">
                                            <div class="item-image">
                                                <a href="">
                                                    <img src="{{ asset('assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_4.jpg') }}"
                                                        alt="" class="img-fluid" />
                                                </a>
                                            </div>
                                            <div class="item-details">
                                                <a href="">
                                                    <div class="course-name">Character Art School: Complete
                                                        Character Drawing Course</div>
                                                    <div class="instructor-name">John David</div>
                                                    <div class="item-price">
                                                        <span class="current-price">$70</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item clearfix">
                                            <div class="item-image">
                                                <a href="">
                                                    <img src="{{ asset('assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_5.jpg') }}"
                                                        alt="" class="img-fluid" />
                                                </a>
                                            </div>
                                            <div class="item-details">
                                                <a href="">
                                                    <div class="course-name">The Complete Sketch 5 Course - Design
                                                        Apps & Websites 2021</div>
                                                    <div class="instructor-name">John David</div>
                                                    <div class="item-price">
                                                        <span class="current-price">$90</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item clearfix">
                                            <div class="item-image">
                                                <a href="">
                                                    <img src="{{ asset('assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_11.jpg') }}"
                                                        alt="" class="img-fluid" />
                                                </a>
                                            </div>
                                            <div class="item-details">
                                                <a href="">
                                                    <div class="course-name">Adobe After Effects CC: Complete Course
                                                        - Novice to Expert</div>
                                                    <div class="instructor-name">John David</div>
                                                    <div class="item-price">
                                                        <span class="current-price">$30</span>
                                                        <span class="original-price">$130</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="dropdown-footer">
                                <div class="cart-total-price clearfix">
                                    <span>Total:</span>
                                    <div class="float-end">
                                        <span class="current-price">$190</span>
                                        <!-- <span class="original-price">$94.99</span> -->
                                    </div>
                                </div>
                                <a href="{{ route('panier') }}">@lang('general.menu.btnPanier')</a>
                            </div>
                        </div>
                        <div class="empty-box text-center d-none">
                            <p>Your cart is empty.</p>
                            <a href="">Keep Shopping</a>
                        </div>
                    </div>
                </div>

                <div class="user-box menu-icon-box">
                    <div class="icon">
                        <a href="javascript::">
                            <img src="{{ asset('assets/images/uploads/user_image/placeholder.png') }}" alt="placeholder"
                                class="img-fluid" />
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
                                                {{Auth::user()->prenom.' '.Auth::user()->name }}
                                            </div>
                                            <div class="user-email">
                                                <span class="email">{{Auth::user()->email}}</span>
                                                <span class="welcome">Bienvenue</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="user-dropdown-menu-item">
                                <a href="{{ route('mesCours',['id'=>Auth::user()->id]) }}"><i
                                        class="far fa-gem"></i>@lang('general.menu.mesCours')</a>
                            </li>
                            <li class="user-dropdown-menu-item">
                                <a href="{{ route('favorie') }}"><i
                                        class="far fa-heart"></i>@lang('general.menu.mesFavoris')</a>
                            </li>
                            <li class="user-dropdown-menu-item">
                                <a href="{{ route('panier') }}"><i
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
