@extends('client.templates.main_template',['titre'=>"Mes formation"])


@section('content')
@include("client.pages.sousMenu")

<section class="purchase-history-list-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="purchase-history-list">
                    <li class="purchase-history-list-header">
                        <div class="row">
                            <div class="col-sm-6"><h4 class="purchase-history-list-title">Purchase history</h4></div>
                            <div class="col-sm-6 hidden-xxs hidden-xs">
                                <div class="row">
                                    <div class="col-sm-3">Date</div>
                                    <div class="col-sm-3">Total price</div>
                                    <div class="col-sm-4">Payment type</div>
                                    <div class="col-sm-2">Actions</div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="purchase-history-items mb-2">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="purchase-history-course-img">
                                    <img src="assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_12.jpg" class="img-fluid" />
                                </div>
                                <a class="purchase-history-course-title" href="course-details.html">
                                    Learn to draw fashion with Adobe Illustrator CC - Beginners
                                </a>
                            </div>
                            <div class="col-sm-6 purchase-history-detail">
                                <div class="row">
                                    <div class="col-sm-3 date">
                                        Tue, 01-Jun-2021
                                    </div>
                                    <div class="col-sm-3 price"><b> $20 </b></div>
                                    <div class="col-sm-4 payment-type">
                                        Stripe
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="javascript:;" target="_blank" class="btn btn-receipt">Facture</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="purchase-history-items mb-2">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="purchase-history-course-img">
                                    <img src="assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_13.jpg" class="img-fluid" />
                                </div>
                                <a class="purchase-history-course-title" href="course-details.html"> Front End Web Development Ultimate Course 2021 </a>
                            </div>
                            <div class="col-sm-6 purchase-history-detail">
                                <div class="row">
                                    <div class="col-sm-3 date">
                                        Tue, 01-Jun-2021
                                    </div>
                                    <div class="col-sm-3 price"><b> $45 </b></div>
                                    <div class="col-sm-4 payment-type">
                                        Stripe
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="javascript:;" target="_blank" class="btn btn-receipt">Facture</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="purchase-history-items mb-2">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="purchase-history-course-img">
                                    <img src="assets/images/uploads/thumbnails/course_thumbnails/course_thumbnail_default_14.jpg" class="img-fluid" />
                                </div>
                                <a class="purchase-history-course-title" href="course-details.html">
                                    React and Typescript: Build a Portfolio Project
                                </a>
                            </div>
                            <div class="col-sm-6 purchase-history-detail">
                                <div class="row">
                                    <div class="col-sm-3 date">
                                        Tue, 01-Jun-2021
                                    </div>
                                    <div class="col-sm-3 price"><b> $20 </b></div>
                                    <div class="col-sm-4 payment-type">
                                        Stripe
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="javascript:;" target="_blank" class="btn btn-receipt">Facture</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<nav></nav>

@endsection

