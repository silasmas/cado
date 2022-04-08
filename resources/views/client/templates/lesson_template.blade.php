<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} | {{ isset($titre) ? $titre : '' }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="media-coder" />
        <meta name="description" content="" />

        <link rel="shortcut icon" type="image/rdp-icon" href="{{ asset('assets/logos/LOGOTYPE-17.png') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/jquery.webui-popover.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}" />
        <!-- font awesome 5 -->
        <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/lessons/css/custom.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/lessons/css/mystyle.css') }}" />
        <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>

        <!-- Lesson page specific styles are here -->
        <style type="text/css">
            body {
                background-color: #fff !important;
            }
            .card {
                border-radius: 0px !important;
                background-color: #f7f8fa !important;
                border: 0px !important;
            }
            .course_card {
                padding: 0px;
                background-color: #f7f8fa;
            }
            .course_container {
                background-color: #fff !important;
            }
            .course_col {
                padding: 0px;
            }
            .course_header_col {
                background-color: #29303b;
                color: #fff;
                padding: 15px 10px 10px;
            }
            .course_header_col img {
                padding: 0px 0px;
            }
            .course_btn {
                color: #95979a;
                border: 1px solid #95979a;
                padding: 7px 10px;
            }
            .course_btn:hover {
                color: #fff;
                border: 1px solid #fff;
            }
            .lesson_duration {
                border-radius: 5px;
                padding-top: 8px;
                color: #5c5d61;
                font-size: 13px;
                font-weight: 100;
            }
            .quiz-card {
                border: 1px solid #dcdddf !important;
            }
            .bg-quiz-result-info {
                background-color: #007791 !important;
                padding: 13px !important;
            }
            a {
                text-decoration: none;
            }
        </style>
    </head>
    <body class="gray-bg">

@yield('content')

        <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/vendor/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.webui-popover.min.js') }}"></script>
        <script src="{{ asset('https://content.jwplatform.com/libraries/O7BMTay5.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        <script src="{{ asset('assets/lessons/js/custom.js') }}"></script>
        <script>
            function toggle_lesson_view() {
                $("#lesson-container").toggleClass("justify-content-center");
                $("#video_player_area").toggleClass("order-md-1");
                $("#lesson_list_area").toggleClass("col-lg-5 order-md-1");
            }
        </script>



    </body>
</html>
