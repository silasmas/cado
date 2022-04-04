@extends('templates.lesson_template',['titre'=>"Detail formation"])


@section('autres_style')


@endsection
@section('content')
<div class="container-fluid course_container">
    <!-- Top bar -->
    <div class="row">
        <div class="col-md-12 col-lg-7 col-xl-9 course_header_col">
            <h5><img src="assets/images/system/logo-light-sm.png" height="25" /> | Wordpress for Beginners - Master Wordpress Quickly</h5>
        </div>
        <div class="col-md-12 col-lg-5 col-xl-3 course_header_col text-right">
            <a href="javascript::" class="course_btn" onclick="toggle_lesson_view()"><i class="fa fa-arrows-alt-h"></i></a>
            <a href="{{ route('mesCours') }}" class="course_btn"> <i class="fa fa-chevron-left"></i> Mes cours</a>
            <a href="{{ route('formationBy', ['id'=>1]) }}" class="course_btn">Detail du cours <i class="fa fa-chevron-right"></i></a>
        </div>
    </div>

    <div class="row" id="lesson-container">
        <!-- Course content, video, quizes, files starts-->
        <div class="col-lg-9 order-md-1 course_col" id="video_player_area">
            <!-- <div class="" style="background-color: #333;"> -->
            <div class="">
                <!-- If the video is youtube video -->
                <!------------- PLYR.IO ------------>
                <link rel="stylesheet" href="{{ asset('assets/global/plyr/plyr.css') }}" />
                <div class="plyr__video-embed" id="player">
                    <iframe
                        height="500"
                        src="https://player.vimeo.com/video/33304460?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
                        allowfullscreen
                        allowtransparency
                        allow="autoplay"
                    ></iframe>
                </div>

                <script src="{{ asset('assets/global/plyr/plyr.js') }}"></script>
                <script>
                    const player = new Plyr("#player");
                </script>
                <!------------- PLYR.IO ------------>

                <!-- If the video is Amazon S3 video -->
            </div>

            <div class="" style="margin: 20px 0;" id="lesson-summary">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Note:</h5>
                        <p class="card-text">
                            We created this great tutorial for our clients, and would like to share it with anyone who finds it useful. This tutorial will show you the basics of using a self-hosted WordPress installation.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Course content, video, quizes, files ends-->

        <!-- Course sections and lesson selector sidebar starts-->
        <div class="col-lg-3 order-md-2 course_col" id="lesson_list_area">
            <div class="text-center" style="margin: 12px 10px;">
                <h5>Course content</h5>
            </div>
            <div class="row" style="margin: 12px -1px;">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="lessonTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="section_and_lessons-tab" data-bs-toggle="tab" href="#section_and_lessons" role="tab" aria-controls="section_and_lessons" aria-selected="true">Lessons</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="lessonTabContent">
                        <div class="tab-pane fade show active" id="section_and_lessons" role="tabpanel" aria-labelledby="section_and_lessons-tab">
                            <!-- Lesson Content starts from here -->
                            <div class="accordion" id="accordionExample">
                                <div class="card" style="margin: 0px 0px;">
                                    <div class="card-header course_card" id="heading-2">
                                        <button
                                            class="btn btn-link w-100 text-start d-grid"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse-2"
                                            aria-expanded="true"
                                            aria-controls="collapse-2"
                                            style="color: #535a66; background: none; border: none; white-space: normal;"
                                            onclick="toggleAccordionIcon(this, '2')"
                                        >
                                            <p class="w-100" style="color: #959aa2; font-size: 13px;">
                                                <span class="d-block-inline float-start">Section 1</span>
                                                <span style="float: right; font-weight: 100;" class="accordion_icon" id="accordion_icon_2">
                                                    <i class="fa fa-minus"></i>
                                                </span>
                                            </p>
                                            <p class="d-inline-block float-start text-start text-13px fw-500">Introduction</p>
                                        </button>
                                    </div>

                                    <div id="collapse-2" class="collapse show" aria-labelledby="heading-2" data-parent="#accordionExample">
                                        <div class="card-body" style="padding: 0px;">
                                            <table style="width: 100%;">
                                                <tr style="width: 100%; padding: 5px 0px; background-color: #fff;">
                                                    <td style="text-align: left; padding: 7px 10px;">
                                                        <div class="form-group">
                                                            <input type="checkbox" id="2" onchange="" value="1" />
                                                            <label for="2"></label>
                                                        </div>

                                                        <a
                                                            href="javascript:;"
                                                            id="2"
                                                            style="color: #444549; font-size: 14px; font-weight: 400;"
                                                        >
                                                            1: Introduction Wordpress.
                                                        </a>

                                                        <div class="lesson_duration">
                                                            <i class="far fa-play-circle"></i>
                                                            10 Min
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr style="width: 100%; padding: 5px 0px; background-color: #fff;">
                                                    <td style="text-align: left; padding: 7px 10px;">
                                                        <div class="form-group">
                                                            <input type="checkbox" id="310" onchange="" value="1" />
                                                            <label for="310"></label>
                                                        </div>

                                                        <a
                                                            href="javascript:;"
                                                            id="310"
                                                            style="color: #444549; font-size: 14px; font-weight: 400;"
                                                        >
                                                            2: abc
                                                            <!-- <i class="fa fa-paperclip"></i> -->
                                                        </a>

                                                        <div class="lesson_duration"><i class="far fa-file-pdf"></i> Attachment</div>
                                                    </td>
                                                </tr>

                                                <tr style="width: 100%; padding: 5px 0px; background-color: #e6f2f5;">
                                                    <td style="text-align: left; padding: 7px 10px;">
                                                        <div class="form-group">
                                                            <input type="checkbox" id="189" onchange="" value="1" />
                                                            <label for="189"></label>
                                                        </div>

                                                        <a
                                                            href="javascript:;"
                                                            id="189"
                                                            style="color: #444549; font-size: 14px; font-weight: 400;"
                                                        >
                                                            3: Wordpress Basics Tutorial
                                                        </a>

                                                        <div class="lesson_duration">
                                                            <i class="far fa-play-circle"></i>
                                                            12 Min
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" style="margin: 0px 0px;">
                                    <div class="card-header course_card" id="heading-3">
                                        <button
                                            class="btn btn-link w-100 text-start d-grid"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse-3"
                                            aria-expanded="false"
                                            aria-controls="collapse-3"
                                            style="color: #535a66; background: none; border: none; white-space: normal;"
                                            onclick="toggleAccordionIcon(this, '3')"
                                        >
                                            <p class="w-100" style="color: #959aa2; font-size: 13px;">
                                                <span class="d-block-inline float-start">Section 2</span>
                                                <span style="float: right; font-weight: 100;" class="accordion_icon" id="accordion_icon_3">
                                                    <i class="fa fa-plus"></i>
                                                </span>
                                            </p>
                                            <p class="d-inline-block float-start text-start text-13px fw-500">Local Install - Install WordPress on your Computer</p>
                                        </button>
                                    </div>

                                    <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordionExample">
                                        <div class="card-body" style="padding: 0px;">
                                            <table style="width: 100%;">
                                                <tr style="width: 100%; padding: 5px 0px; background-color: #fff;">
                                                    <td style="text-align: left; padding: 7px 10px;">
                                                        <div class="form-group">
                                                            <input type="checkbox" id="196" onchange="" value="1" />
                                                            <label for="196"></label>
                                                        </div>

                                                        <a
                                                            href="javascript:;"
                                                            id="196"
                                                            style="color: #444549; font-size: 14px; font-weight: 400;"
                                                        >
                                                            1: Wordpress plugins install
                                                        </a>

                                                        <div class="lesson_duration">
                                                            <i class="far fa-play-circle"></i>
                                                            00:00
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr style="width: 100%; padding: 5px 0px; background-color: #fff;">
                                                    <td style="text-align: left; padding: 7px 10px;">
                                                        <div class="form-group">
                                                            <input type="checkbox" id="197" onchange="" value="1" />
                                                            <label for="197"></label>
                                                        </div>

                                                        <a
                                                            href="javascript:;"
                                                            id="197"
                                                            style="color: #444549; font-size: 14px; font-weight: 400;"
                                                        >
                                                            2: Install a New Theme
                                                            <!-- <i class="fa fa-paperclip"></i> -->
                                                        </a>

                                                        <div class="lesson_duration"><i class="far fa-file-word"></i> Attachment</div>
                                                    </td>
                                                </tr>

                                                <tr style="width: 100%; padding: 5px 0px; background-color: #fff;">
                                                    <td style="text-align: left; padding: 7px 10px;">
                                                        <div class="form-group">
                                                            <input type="checkbox" id="198" onchange="" value="1" />
                                                            <label for="198"></label>
                                                        </div>

                                                        <a
                                                            href="javascript:;"
                                                            id="198"
                                                            style="color: #444549; font-size: 14px; font-weight: 400;"
                                                        >
                                                            3: What is a Function WordPress
                                                            <!-- <i class="fa fa-paperclip"></i> -->
                                                        </a>

                                                        <div class="lesson_duration"><i class="fas fa-camera-retro"></i> Attachment</div>
                                                    </td>
                                                </tr>

                                                <tr style="width: 100%; padding: 5px 0px; background-color: #fff;">
                                                    <td style="text-align: left; padding: 7px 10px;">
                                                        <div class="form-group">
                                                            <input type="checkbox" id="199" onchange="" value="1" />
                                                            <label for="199"></label>
                                                        </div>

                                                        <a
                                                            href="javascript:;"
                                                            id="199"
                                                            style="color: #444549; font-size: 14px; font-weight: 400;"
                                                        >
                                                            4: Wordpress test quiz
                                                        </a>

                                                        <div class="lesson_duration"><i class="far fa-question-circle"></i> Quiz</div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Lesson Content ends from here -->
                        </div>

                        <!-- ZOOM LIVE CLASS TAB STARTS-->

                        <div class="tab-pane fade" id="liveclass" role="tabpanel" aria-labelledby="liveclass-tab" style="text-align: center;"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Course sections and lesson selector sidebar ends-->
    </div>
</div>
@endsection

@section('autres_script')
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
</script>

@endsection