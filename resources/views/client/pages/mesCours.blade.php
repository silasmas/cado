@extends('templates.main_template',['titre'=>"Mes formation"])


@section('content')
<section class="my-courses-area">
    <div class="container">
        <div class="row align-items-baseline">
            <div class="col-lg-6">
                <div class="my-course-filter-bar filter-box">
                    <span>Filter by</span>
                    <div class="btn-group">
                        <a class="btn btn-outline-secondary dropdown-toggle all-btn" href="#" data-bs-toggle="dropdown"> Categories </a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" id="2" onclick="getCoursesByCategoryId(this.id)"></a>
                            <a class="dropdown-item" href="#" id="39" onclick="getCoursesByCategoryId(this.id)">Frontend Development</a>
                            <a class="dropdown-item" href="#" id="34" onclick="getCoursesByCategoryId(this.id)">Fashion</a>
                        </div>
                    </div>

                    <div class="btn-group">
                        <a href="my_courses.html" class="btn reset-btn" disabled>Reset</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="my-course-search-bar">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control py-2" placeholder="Search my courses" onkeyup="getCoursesBySearchString(this.value)" />
                            <div class="input-group-append">
                                <button class="btn py-2" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row no-gutters" id="my_courses_area">
            <div class="col-lg-3">
                <div class="course-box-wrap">
                    <div class="course-box">
                        <a href="{{ route('formationBy', ['id'=>1]) }}">
                            <div class="course-image">
                                <img src="assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_1.jpg" alt="" class="img-fluid" />
                                <span class="play-btn"></span>
                            </div>
                        </a>

                        <div class="" id="course_info_view_1">
                            <div class="course-details">
                                <a href="{{ route('formationBy', ['id'=>1]) }}"><h5 class="title">Wordpress for Beginners - Mast...</h5></a>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>0% Completed</small>
                                <div class="rating your-rating-box" style="position: unset; margin-top: -18px;">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <!-- <p class="your-rating-text" id = "1" onclick="getCourseDetailsForRatingModal(this.id)">
                                      <span class="your">Your</span>
                                      <span class="edit">Edit</span>
                                      Rating                                          </p> -->
                                    <p class="your-rating-text">
                                        <a href="javascript::" id="edit_rating_btn_1" onclick="toggleRatingView('1')" style="color: #2a303b;">Edit rating</a>
                                        <a href="javascript::" class="hidden" id="cancel_rating_btn_1" onclick="toggleRatingView('1')" style="color: #2a303b;">Cancel rating</a>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 px-4 py-2">
                                    <a href="{{ route('detailFormation', ['id'=>1]) }}" class="btn red radius-10 w-100">Course detail</a>
                                </div>
                                <div class="col-md-12 px-4 py-2">
                                    <a href="{{ route('formationBy', ['id'=>1]) }}" class="btn red radius-10 w-100">Start lesson</a>
                                </div>
                            </div>
                        </div>

                        <div class="course-details" style="display: none; padding-bottom: 10px;" id="course_rating_view_1">
                            <a href="{{ route('detailFormation', ['id'=>1]) }}"><h5 class="title">Wordpress for Beginners - Mast...</h5></a>
                            <form class="javascript:;" action="" method="post">
                                <div class="form-group select">
                                    <div class="styled-select">
                                        <select class="form-control" name="star_rating" id="star_rating_of_course_1">
                                            <option value="1">1 Out of 5</option>
                                            <option value="2">2 Out of 5</option>
                                            <option value="3">3 Out of 5</option>
                                            <option value="4">4 Out of 5</option>
                                            <option value="5" selected="">5 Out of 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group add_top_30">
                                    <textarea name="review" id="review_of_a_course_1" class="form-control" style="height: 120px;" placeholder="Write your review here">Thats an awesome course to learn</textarea>
                                </div>
                                <button type="" class="btn red w-100 radius-10 mt-2" onclick="publishRating('1')" name="button">Publish rating</button>
                                <a href="javascript::" class="btn red w-100 radius-10 mt-2" onclick="toggleRatingView('1')" name="button">Cancel rating</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="course-box-wrap">
                    <div class="course-box">
                        <a href="{{ route('formationBy', ['id'=>1]) }}">
                            <div class="course-image">
                                <img src="assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_13.jpg" alt="" class="img-fluid" />
                                <span class="play-btn"></span>
                            </div>
                        </a>

                        <div class="" id="course_info_view_13">
                            <div class="course-details">
                                <a href="{{ route('detailFormation', ['id'=>1]) }}"><h5 class="title">Front End Web Development Ulti...</h5></a>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>0% Completed</small>
                                <div class="rating your-rating-box" style="position: unset; margin-top: -18px;">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <!-- <p class="your-rating-text" id = "13" onclick="getCourseDetailsForRatingModal(this.id)">
                                      <span class="your">Your</span>
                                      <span class="edit">Edit</span>
                                      Rating                                          </p> -->
                                    <p class="your-rating-text">
                                        <a href="javascript::" id="edit_rating_btn_13" onclick="toggleRatingView('13')" style="color: #2a303b;">Edit rating</a>
                                        <a href="javascript::" class="hidden" id="cancel_rating_btn_13" onclick="toggleRatingView('13')" style="color: #2a303b;">Cancel rating</a>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 px-4 py-2">
                                    <a href="{{ route('detailFormation', ['id'=>1]) }}" class="btn red radius-10 w-100">Course detail</a>
                                </div>
                                <div class="col-md-12 px-4 py-2">
                                    <a href="{{ route('formationBy', ['id'=>1]) }}" class="btn red radius-10 w-100">Start lesson</a>
                                </div>
                            </div>
                        </div>

                        <div class="course-details" style="display: none; padding-bottom: 10px;" id="course_rating_view_13">
                            <a href="{{ route('detailFormation', ['id'=>1]) }}"><h5 class="title">Front End Web Development Ulti...</h5></a>
                            <form class="javascript:;" action="" method="post">
                                <div class="form-group select">
                                    <div class="styled-select">
                                        <select class="form-control" name="star_rating" id="star_rating_of_course_13">
                                            <option value="1">1 Out of 5</option>
                                            <option value="2">2 Out of 5</option>
                                            <option value="3" selected="">3 Out of 5</option>
                                            <option value="4">4 Out of 5</option>
                                            <option value="5">5 Out of 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group add_top_30">
                                    <textarea name="review" id="review_of_a_course_13" class="form-control" style="height: 120px;" placeholder="Write your review here">Thanks man for this awesome course</textarea>
                                </div>
                                <button type="" class="btn red w-100 radius-10 mt-2" onclick="publishRating('13')" name="button">Publish rating</button>
                                <a href="javascript::" class="btn red w-100 radius-10 mt-2" onclick="toggleRatingView('13')" name="button">Cancel rating</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="course-box-wrap">
                    <div class="course-box">
                        <a href="{{ route('formationBy', ['id'=>1]) }}">
                            <div class="course-image">
                                <img src="assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_14.jpg" alt="" class="img-fluid" />
                                <span class="play-btn"></span>
                            </div>
                        </a>

                        <div class="" id="course_info_view_14">
                            <div class="course-details">
                                <a href="{{ route('detailFormation', ['id'=>1]) }}"><h5 class="title">React and Typescript: Build a ...</h5></a>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 12.5%;" aria-valuenow="12.5" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>13% Completed</small>
                                <div class="rating your-rating-box" style="position: unset; margin-top: -18px;">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <!-- <p class="your-rating-text" id = "14" onclick="getCourseDetailsForRatingModal(this.id)">
                                      <span class="your">Your</span>
                                      <span class="edit">Edit</span>
                                      Rating                                          </p> -->
                                    <p class="your-rating-text">
                                        <a href="javascript::" id="edit_rating_btn_14" onclick="toggleRatingView('14')" style="color: #2a303b;">Edit rating</a>
                                        <a href="javascript::" class="hidden" id="cancel_rating_btn_14" onclick="toggleRatingView('14')" style="color: #2a303b;">Cancel rating</a>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 px-4 py-2">
                                    <a href="{{ route('detailFormation', ['id'=>1]) }}" class="btn red radius-10 w-100">Course detail</a>
                                </div>
                                <div class="col-md-12 px-4 py-2">
                                    <a href="{{ route('formationBy', ['id'=>1]) }}" class="btn red radius-10 w-100">Start lesson</a>
                                </div>
                            </div>
                        </div>

                        <div class="course-details" style="display: none; padding-bottom: 10px;" id="course_rating_view_14">
                            <a href="{{ route('detailFormation', ['id'=>1]) }}"><h5 class="title">React and Typescript: Build a ...</h5></a>
                            <form class="javascript:;" action="" method="post">
                                <div class="form-group select">
                                    <div class="styled-select">
                                        <select class="form-control" name="star_rating" id="star_rating_of_course_14">
                                            <option value="1">1 Out of 5</option>
                                            <option value="2" selected="">2 Out of 5</option>
                                            <option value="3">3 Out of 5</option>
                                            <option value="4">4 Out of 5</option>
                                            <option value="5">5 Out of 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group add_top_30">
                                    <textarea name="review" id="review_of_a_course_14" class="form-control" style="height: 120px;" placeholder="Write your review here">You could make it better.</textarea>
                                </div>
                                <button type="" class="btn red w-100 radius-10 mt-2" onclick="publishRating('14')" name="button">Publish rating</button>
                                <a href="javascript::" class="btn red w-100 radius-10 mt-2" onclick="toggleRatingView('14')" name="button">Cancel rating</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="course-box-wrap">
                    <div class="course-box">
                        <a href="{{ route('formationBy', ['id'=>1]) }}">
                            <div class="course-image">
                                <img src="assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_12.jpg" alt="" class="img-fluid" />
                                <span class="play-btn"></span>
                            </div>
                        </a>

                        <div class="" id="course_info_view_12">
                            <div class="course-details">
                                <a href="{{ route('detailFormation', ['id'=>1]) }}"><h5 class="title">Learn to draw fashion with Ado...</h5></a>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>0% Completed</small>
                                <div class="rating your-rating-box" style="position: unset; margin-top: -18px;">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <!-- <p class="your-rating-text" id = "12" onclick="getCourseDetailsForRatingModal(this.id)">
                                      <span class="your">Your</span>
                                      <span class="edit">Edit</span>
                                      Rating                                          </p> -->
                                    <p class="your-rating-text">
                                        <a href="javascript::" id="edit_rating_btn_12" onclick="toggleRatingView('12')" style="color: #2a303b;">Edit rating</a>
                                        <a href="javascript::" class="hidden" id="cancel_rating_btn_12" onclick="toggleRatingView('12')" style="color: #2a303b;">Cancel rating</a>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 px-4 py-2">
                                    <a href="{{ route('detailFormation', ['id'=>1]) }}" class="btn red radius-10 w-100">Course detail</a>
                                </div>
                                <div class="col-md-12 px-4 py-2">
                                    <a href="{{ route('formationBy', ['id'=>1]) }}" class="btn red radius-10 w-100">Start lesson</a>
                                </div>
                            </div>
                        </div>

                        <div class="course-details" style="display: none; padding-bottom: 10px;" id="course_rating_view_12">
                            <a href="{{ route('detailFormation', ['id'=>1]) }}"><h5 class="title">Learn to draw fashion with Ado...</h5></a>
                            <form class="javascript:;" action="" method="post">
                                <div class="form-group select">
                                    <div class="styled-select">
                                        <select class="form-control" name="star_rating" id="star_rating_of_course_12">
                                            <option value="1">1 Out of 5</option>
                                            <option value="2">2 Out of 5</option>
                                            <option value="3">3 Out of 5</option>
                                            <option value="4" selected="">4 Out of 5</option>
                                            <option value="5">5 Out of 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group add_top_30">
                                    <textarea name="review" id="review_of_a_course_12" class="form-control" style="height: 120px;" placeholder="Write your review here">Future updates will make this course better.</textarea>
                                </div>
                                <button type="" class="btn red w-100 radius-10 mt-2" onclick="publishRating('12')" name="button">Publish rating</button>
                                <a href="javascript::" class="btn red w-100 radius-10 mt-2" onclick="toggleRatingView('12')" name="button">Cancel rating</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

