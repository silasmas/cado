@extends('client.templates.lesson_template',['titre'=>"Detail formation"])


@section('autres_style')
@endsection
@section('content')
    <div class="container-fluid course_container">
        <!-- Top bar -->
        <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-8 course_header_col">
                <h5><img src="{{ asset('assets/logo/logoan.png') }}" height="25" /> {{ $chapitre->session->titre }}
                </h5>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4 course_header_col text-right">
                <a href="javascript::" class="course_btn" onclick="toggle_lesson_view()"><i
                        class="fa fa-arrows-alt-h"></i></a>
                <a href="{{ route('mesCours') }}" class="course_btn"> <i class="fa fa-chevron-left"></i> Mes
                    formations</a>
                <a href="{{ route('detailFormation', ['id' => $chapitre->session_id]) }}" class="course_btn">Detail du
                    cours <i class="fa fa-chevron-right"></i></a>
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
                        <iframe height="500" src="{{ $chapitre->video }}" allowfullscreen allowtransparency
                            allow="autoplay"></iframe>
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
                            <h5 class="card-title">Description :</h5>
                            <p class="card-text">
                                {{ $chapitre->description }}
                            </p>
                            <div class=" border-top " style="margin-right: 50px; margin-top:50px">
                                <p class="card-text">
                                    A la fin de votre lecture, cliquez sur terminer afin d'enregistrer la fin de ce chapitre
                                </p>
                                <button type="submit" id='{{ $chapitre->id }}' onclick="finiChapitre(this)"
                                    class="btn btn-danger text-center mt-3">Terminer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Course content, video, quizes, files ends-->

            <!-- Course sections and lesson selector sidebar starts-->
            <div class="col-lg-3 order-md-2 course_col" id="lesson_list_area">
                <div class="text-center" style="margin: 12px 10px;">
                    <h5>Table des matières</h5>
                </div>
                <div class="row" style="margin: 12px -1px;">
                    <div class="col-12">
                        <ul class="nav nav-tabs" id="lessonTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="section_and_lessons-tab" data-bs-toggle="tab"
                                    href="#section_and_lessons" role="tab" aria-controls="section_and_lessons"
                                    aria-selected="true">Chapitres</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="lessonTabContent">
                            <div class="tab-pane fade show active" id="section_and_lessons" role="tabpanel"
                                aria-labelledby="section_and_lessons-tab">
                                <!-- Lesson Content starts from here -->
                                <div class="accordion" id="accordionExample">
                                    <div class="card" style="margin: 0px 0px;">
                                        <div class="card-header course_card" id="heading-2">
                                            <button class="btn btn-link w-100 text-start d-grid" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="true"
                                                aria-controls="collapse-2"
                                                style="color: #535a66; background: none; border: none; white-space: normal;"
                                                onclick="toggleAccordionIcon(this, '2')">
                                                <p class="w-100" style="color: #959aa2; font-size: 13px;">
                                                    <span class="d-block-inline float-start"></span>
                                                    <span style="float: right; font-weight: 100;" class="accordion_icon"
                                                        id="accordion_icon_2">
                                                        <i class="fa fa-minus"></i>
                                                    </span>
                                                </p>
                                                <p class="d-inline-block float-start text-start text-13px fw-500">Plan</p>
                                            </button>
                                        </div>

                                        <div id="collapse-2" class="collapse show" aria-labelledby="heading-2"
                                            data-parent="#accordionExample">
                                            <div class="card-body" style="padding: 0px;">
                                                <table style="width: 100%;">
                                                    @forelse ($chapitres->sortBy('titre') as $ch)
                                                        <tr style="width: 100%; padding: 5px 0px; background-color: #fff;">
                                                            <td style="text-align: left; padding: 7px 10px;">
                                                                <div class="form-group">
                                                                    @if ($ch->sous_titre == 'fini')
                                                                <span class="text-danger">
                                                                    <i class="far fa-check-circle"></i>
                                                                </span>
                                                                    @else
                                                                    <input disabled type="checkbox"
                                                                        {{ $ch->sous_titre == 'active' ? 'checked ' : '' }}
                                                                        onchange="" />
                                                                    <label for="2"></label>
                                                                    
                                                                    @endif
                                                                </div>

                                                                <a href="{{ route('viewChapitre', ['id' => $ch->id]) }}"
                                                                    style="color: #444549; font-size: 14px; font-weight: 400;">
                                                                    {{ $ch->titre }}
                                                                </a>

                                                                <div class="lesson_duration">
                                                                    <i class="far fa-play-circle"></i>
                                                                    {{ $ch->nbrHeure }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    @endforelse

                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- Lesson Content ends from here -->
                            </div>

                            <!-- ZOOM LIVE CLASS TAB STARTS-->

                            <div class="tab-pane fade" id="liveclass" role="tabpanel" aria-labelledby="liveclass-tab"
                                style="text-align: center;"></div>
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
        $(function() {
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
            function() {
                setTimeout(function() {
                    $(".animated-loader").hide();
                    $(".shown-after-loading").show();
                });
            },
            false
        );

        function finiChapitre(id) {
            add(id.id, "../finiChapitre");
        }

        function add(form, url) {
            swal({
                title: 'Merci de patienter...',
                icon: 'info'
            })
            $.ajax({
                url: url + '/' + form,
                method: "GET",
                data: {
                    idform: form
                },
                success: function(data) {
                    //alert(data);
                    if (!data.reponse) {
                        swal({
                            title: data.msg,
                            icon: 'error'
                        })
                    } else {
                        swal({
                            title: data.msg,
                            icon: 'success'
                        })
                        actualiser();
                    }
                },
            });
            function actualiser() {
        location.reload();
    }
        }
    </script>
@endsection
