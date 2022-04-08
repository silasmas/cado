@extends('client.templates.main_template',['titre'=>"Favoris"])


@section('content')

<section class="my-courses-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="my-course-search-bar">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control py-2" placeholder="Search my courses" onkeyup="getMyWishListsBySearchString(this.value)" />
                            <div class="input-group-append">
                                <button class="btn py-2" type="button"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row no-gutters" id="my_wishlists_area">
            <div class="col-lg-3">
                <div class="course-box-wrap">
                    <div class="course-box">
                        <div class="course-image">
                            <a href="">
                                <img src="assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_4.jpg" alt="" class="img-fluid" />
                            </a>
                            <div class="instructor-img-hover">
                                <a href="instructor.html"><img src="assets/images/uploads/user_image/48a153e87c587ffe79d6e8609e59124b.jpg" alt="" /></a>
                                <span> 12 Lessons </span>
                                <span> 03:38:55 Hours </span>
                            </div>
                            <div class="wishlist-add wishlisted">
                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" style="cursor: auto;" onclick="handleWishList(this)" id="4">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="course-details">
                            <a href="">
                                <h5 class="title">Character Art School: Complete Character Drawing Course</h5>
                            </a>
                            <p class="instructors">
                                John David , Olivia Emily
                            </p>

                            <p class="price text-right">$70</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="course-box-wrap">
                    <div class="course-box">
                        <div class="course-image">
                            <a href="">
                                <img src="assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_5.jpg" alt="" class="img-fluid" />
                            </a>
                            <div class="instructor-img-hover">
                                <a href="instructor.html"><img src="assets/images/uploads/user_image/48a153e87c587ffe79d6e8609e59124b.jpg" alt="" /></a>
                                <span> 13 Lessons </span>
                                <span> 00:49:57 Hours </span>
                            </div>
                            <div class="wishlist-add wishlisted">
                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" style="cursor: auto;" onclick="handleWishList(this)" id="5">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="course-details">
                            <a href="">
                                <h5 class="title">The Complete Sketch 5 Course - Design Apps & Websites 2021</h5>
                            </a>
                            <p class="instructors">
                                John David
                            </p>

                            <p class="price text-right">$90</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="course-box-wrap">
                    <div class="course-box">
                        <div class="course-image">
                            <a href="">
                                <img src="assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_7.jpg" alt="" class="img-fluid" />
                            </a>
                            <div class="instructor-img-hover">
                                <a href="instructor.html"><img src="assets/images/uploads/user_image/48a153e87c587ffe79d6e8609e59124b.jpg" alt="" /></a>
                                <span> 10 Lessons </span>
                                <span> 01:17:08 Hours </span>
                            </div>
                            <div class="wishlist-add wishlisted">
                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" style="cursor: auto;" onclick="handleWishList(this)" id="7">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="course-details">
                            <a href="">
                                <h5 class="title">UI/UX design with Adobe XD: Design & Prototype a Mobile App</h5>
                            </a>
                            <p class="instructors">
                                John David
                            </p>

                            <p class="price text-right">$199</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>

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
        function () {
            setTimeout(function () {
                $(".animated-loader").hide();
                $(".shown-after-loading").show();
            });
        },
        false
    );

    function check_action(e, url) {
        var tag = $(e).prop("tagName").toLowerCase();
        if (tag == "a") {
            return true;
        } else if (tag != "a" && url) {
            $(location).attr("href", url);
            return false;
        } else {
            return true;
        }
    }
</script>
@endsection
