@extends('client.templates.main_template',['titre'=>"Mes formation"])


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
        <div class="row no-gutters" id="my_courses_area">*
 @if (is_array($userForm->session) || is_object($userForm->session))
      @forelse ($userForm->session as $fr)
                <div class="col-lg-3">
                <div class="course-box-wrap">
                    <div class="course-box">
                        <a href="{{ route('formationBy',['id'=>$fr->id]) }}">
                            <div class="course-image">
                                <img src="{{ asset('assets/images/form/'.$fr->cover) }}" alt="" class="img-fluid" />
                                <span class="play-btn"></span>
                            </div>
                        </a>

                        <div class="" id="course_info_view_1">
                            <div class="course-details">
                                <a href="{{route('detailFormation',['id'=>$fr->id])}}"><h5 class="title">
                                   {{ $fr->titre }}
                                </h5></a>
                                @if ($fr->pivot->niveau=='commencer')
                                <small class="btn btn-plus">Pas encore commencer</small><br>
                                @else
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar"
                                     style="width: 50%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>50% Terminée</small>  
                                <span class="btn btn-plus">{{ $fr->pivot->niveau }}</span>                                       
                                @endif
                                {{-- <div class="rating your-rating-box" style="position: unset; margin-top: -18px;">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>                                                                   
                                    <p class="your-rating-text">
                                        <a href="javascript::" id="edit_rating_btn_1" onclick="toggleRatingView('1')" style="color: #2a303b;">Edit rating</a>
                                        <a href="javascript::" class="hidden" id="cancel_rating_btn_1" onclick="toggleRatingView('1')" style="color: #2a303b;">Cancel rating</a>
                                    </p>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-md-12 px-4 py-2">
                                    <a href="{{ route('detailFormation',['id'=>$fr->id]) }}" class="btn red radius-10 w-100">Voir en detail</a>
                                </div>
                                <div class="col-md-12 px-4 py-2">
                                    <a href="{{ route('formationBy',['id'=>$fr->id]) }}" class="btn red radius-10 w-100">Commencer</a>
                                </div>
                            </div>
                        </div>

                        <div class="course-details" style="display: none; padding-bottom: 10px;" id="course_rating_view_1">
                            <a href="{{ route('detailFormation',['id'=>$fr->id]) }}"><h5 class="title">Wordpress for Beginners - Mast...</h5></a>
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
           
            @empty
                
            @endforelse
@else
<h3>Erreur des données</h3>

 @endif
           
          

           
        </div>
    </div>
</section>

@endsection

