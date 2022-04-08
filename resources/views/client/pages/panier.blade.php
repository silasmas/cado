@extends('client.templates.main_template',['titre'=>"Panier"])


@section('content')
     
<section class="category-header-area" style="background-image: url('assets/images/system/shopping_cart.png'); background-size: contain; background-repeat: no-repeat; background-position-x: right; background-color: #ec5252;">
    <div class="image-placeholder-1"></div>
    <div class="container-lg breadcrumb-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item display-6 fw-bold">
                    <a href="index.html"> Home </a>
                </li>
                <li class="breadcrumb-item active text-light display-6 fw-bold">
                    Shopping cart
                </li>
            </ol>
        </nav>
    </div>
</section>

<section class="cart-list-area">
    <div class="container">
        <div class="row" id="cart_items_details">
            <div class="col-lg-9">
                <div class="in-cart-box">
                    <div class="title">3 Courses in cart</div>
                    <div class="">
                        <ul class="cart-course-list">
                            <li>
                                <div class="cart-course-wrapper">
                                    <div class="image d-none d-md-block">
                                        <a href="course-details.html">
                                            <img src="assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_4.jpg" alt="" class="img-fluid" />
                                        </a>
                                    </div>
                                    <div class="details">
                                        <a href="{{ route('detailFormation', ['id'=>1]) }}">
                                            <div class="name">Character Art School: Complete Character Drawing Course</div>
                                        </a>

                                        <div class="course-subtitle text-13px mt-2">
                                            Learn How to Draw People and Character Designs Professionally, Drawing for Anima...
                                        </div>

                                        <div class="floating-user d-inline-block mt-2">
                                            <img
                                                style="margin-left: 0px;"
                                                class="position-absolute"
                                                src="assets/images/uploads/user_image/48a153e87c587ffe79d6e8609e59124b.jpg"
                                                width="30px"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="John David"
                                                onclick="event.stopPropagation(); $(location).attr('href', 'instructor.html');"
                                            />
                                            <img
                                                style="margin-left: 17px;"
                                                class="position-absolute"
                                                src="assets/images/uploads/user_image/b28a0687a23de21f2b2c34b2d160f48f.jpg"
                                                width="30px"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Olivia Emily"
                                                onclick="event.stopPropagation(); $(location).attr('href', 'instructor.html2');"
                                            />
                                        </div>
                                    </div>
                                    <div class="move-remove text-center">
                                        <div id="4" onclick="removeFromCartList(this)"><i class="fas fa-times-circle"></i> Remove</div>
                                         <div>Move to Wishlist</div> 
                                    </div>
                                    <div class="price">
                                        <div class="current-price">
                                            $70
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="cart-course-wrapper">
                                    <div class="image d-none d-md-block">
                                        <a href="course-details.html">
                                            <img src="assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_5.jpg" alt="" class="img-fluid" />
                                        </a>
                                    </div>
                                    <div class="details">
                                        <a href="{{ route('detailFormation', ['id'=>1]) }}">
                                            <div class="name">The Complete Sketch 5 Course - Design Apps & Websites 2021</div>
                                        </a>

                                        <div class="course-subtitle text-13px mt-2">
                                            Master Sketch software and learn a modern approach to designing mobile apps, web...
                                        </div>

                                        <div class="floating-user d-inline-block mt-2">
                                            <img
                                                src="assets/images/uploads/user_image/48a153e87c587ffe79d6e8609e59124b.jpg"
                                                width="30px"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="John David"
                                                onclick="event.stopPropagation(); $(location).attr('href', 'instructor.html');"
                                            />
                                        </div>
                                    </div>
                                    <div class="move-remove text-center">
                                        <div id="5" onclick="removeFromCartList(this)"><i class="fas fa-times-circle"></i> Remove</div>
                                        <!-- <div>Move to Wishlist</div> -->
                                    </div>
                                    <div class="price">
                                        <div class="current-price">
                                            $90
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="cart-course-wrapper">
                                    <div class="image d-none d-md-block">
                                        <a href="course-details.html">
                                            <img src="assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_11.jpg" alt="" class="img-fluid" />
                                        </a>
                                    </div>
                                    <div class="details">
                                        <a href="{{ route('detailFormation', ['id'=>1]) }}">
                                            <div class="name">Adobe After Effects CC: Complete Course - Novice to Expert</div>
                                        </a>

                                        <div class="course-subtitle text-13px mt-2">
                                            Adobe After Effects CC Create stunning Motion Graphics, VFX Visual Effects &amp;...
                                        </div>

                                        <div class="floating-user d-inline-block mt-2">
                                            <img
                                                src="assets/images/uploads/user_image/48a153e87c587ffe79d6e8609e59124b.jpg"
                                                width="30px"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="John David"
                                                onclick="event.stopPropagation(); $(location).attr('href', 'instructor.html');"
                                            />
                                        </div>
                                    </div>
                                    <div class="move-remove text-center">
                                        <div id="11" onclick="removeFromCartList(this)"><i class="fas fa-times-circle"></i> Remove</div>
                                        <!-- <div>Move to Wishlist</div> -->
                                    </div>
                                    <div class="price">
                                        <div class="current-price">
                                            $30
                                        </div>
                                        <div class="original-price">
                                            $130
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 pt-1">
                <h5 class="fw-700">Total:</h5>
                <div class="cart-sidebar bg-white radius-10 py-4 px-3">
                    <span id="total_price_of_checking_out" hidden> 190 </span>
                    <div class="total-price">$190</div>
                    <div class="total-original-price">
                        <span class="original-price">$290</span>
                        <!-- <span class="discount-rate">95% off</span> -->
                    </div>

                    <div class="input-group marge-input-box mb-3">
                        <input type="text" class="form-control" placeholder="Apply coupon code" id="coupon-code" />
                        <div class="input-group-append">
                            <button class="btn" type="button" onclick="applyCoupon()">
                                <i class="fas fa-spinner fa-pulse hidden" id="spinner"></i>
                                Apply
                            </button>
                        </div>
                    </div>
                    <button type="button" class="btn red w-100 radius-10 mb-3" onclick="handleCheckOut()">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

