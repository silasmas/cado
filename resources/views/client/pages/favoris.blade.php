@extends('client.templates.main_template',['titre'=>"Favoris"])


@section('content')
@include("client.pages.sousMenu")

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
            @forelse ($userForm->favorie->load('session') as $fav)
   
                <div class="col-lg-3">
                <div class="course-box-wrap">
                    <div class="course-box">
                        <div class="course-image">
                            <a href="{{ route('detailFormation', ['id' => $fav->session->id]) }}">
                                <img src="{{ asset('assets/images/form/'.$fav->session->cover) }}" alt="" class="img-fluid" />
                            </a>
                           
                            <div class="wishlist-add wishlisted">
                                <button type="button" data-bs-toggle="tooltip" 
                                onclick="handleWishList(this)" id="{{  $fav->session->id }}"
                                data-bs-placement="left" title="" style="cursor: auto;">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="course-details">
                            <a href="{{ route('detailFormation', ['id' => $fav->session->id]) }}">
                                <h5 class="title">{{ $fav->session->titre }}</h5>
                            </a>
                            <p class="instructors">
                                @foreach ($fav->session->formation as $for)
                                @foreach ($for->session->formateur as $f)                                                        
                        <span>{{ $f->prenom.' '.$f->nom }}</span>; 
                        @endforeach
                            @endforeach
                            </p>

                            <p class="price text-right">
                                @if ($fav->session->type == 'payant')
                                @if ($fav->session->id==$userForm->session_id && $userForm->etat=='Payer')
                           
                                        @lang('general.autre.achatFait')
                                    @else
                                        {{ $fav->session->monaie=="USD"?'$':'FC'. $fav->session->prix }}
                                    @endif
                                @else
                                        {{ $fav->session->type }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                
            @endforelse
            
           
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
    
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
