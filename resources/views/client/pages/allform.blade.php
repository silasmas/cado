@extends('client.templates.main_template', ['titre' => 'Toutes les conférence'])

@section('content')
    <section class="category-header-area" style="background-image: url('assets/images/system/course_page_banner.png');">
        <div class="image-placeholder-1"></div>
        <div class="container-lg breadcrumb-container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item display-6 fw-bold">
                        <a href="{{ route('dashboard') }}"> Accueil </a>
                    </li>
                    <li class="breadcrumb-item active text-light display-6 fw-bold">
                        Toutes les conférences
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="category-course-list-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 filter-area">
                    <div class="card border-0 radius-10">
                        <div id="collapseFilter" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordion">
                            <div class="card-body p-0">
                                <div class="filter_type px-4 pt-4">
                                    <h5 class="fw-700 mb-4">Categories</h5>
                                    <ul>
                                        <li class="">
                                            <div class="text-15px fw-700">
                                                <input type="radio" id="category_all" name="sub_category"
                                                    class="categories custom-radio" value="all" checked />
                                                <label for="category_all">Toutes les catégories</label>
                                                <span class="float-end">(14)</span>
                                            </div>
                                        </li>
                                        <li class="mt-3">
                                            <div class="text-15px fw-700">
                                                <input type="radio" id="category-2" name="sub_category"
                                                    class="categories custom-radio" value="web-design" />
                                                <label for="category-2">CADO</label>
                                                <span class="float-end">(3)</span>
                                            </div>
                                        </li>
                                        <li class="mt-3">
                                            <div class="text-15px fw-700">
                                                <input type="radio" id="category-2" name="sub_category"
                                                    class="categories custom-radio" value="web-design" />
                                                <label for="category-2">COUPLE</label>
                                                <span class="float-end">(3)</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <hr />
                                <div class="filter_type px-4">
                                    <div class="form-group">
                                        <h5 class="fw-700 mb-3">Prix</h5>
                                        <ul>
                                            <li>                                                
                                                <div class="">
                                                    <input type="radio" id="price_free" name="price"
                                                        class="prices custom-radio" value="free" />
                                                    <label for="price_free">Gratuit</label>
                                                    <span class="float-end">(3)</span>
                                                </div>
                                                <div class="">
                                                    <input type="radio" id="price_paid" name="price"
                                                        class="prices custom-radio" value="paid" />
                                                    <label for="price_paid">Payant</label>
                                                    <span class="float-end">(3)</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <hr />
                                <div class="filter_type px-4">
                                    <h5 class="fw-700 mb-3">Type</h5>
                                    <ul>
                                        <li>
                                            <div class="">
                                                <input type="radio" id="beginner" name="level" class="level custom-radio"
                                                    value="beginner" />
                                                <label for="beginner">Live</label>
                                                <span class="float-end">(3)</span>
                                            </div>
                                            <div class="">
                                                <input type="radio" id="advanced" name="level" class="level custom-radio"
                                                    value="advanced" />
                                                <label for="advanced">Formation</label>
                                                <span class="float-end">(3)</span>
                                            </div>                                            
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @switch($titre)
                    @case('verticale')
                        @include('client.pages.verticale')
                    @break

                    @case('horizontale')
                        @include('client.pages.horizontale')
                    @break

                    @default
                @endswitch
            </div>
        </div>
    </section>

    <script type="text/javascript">
        function showToggle(elem, selector) {
            $("." + selector).slideToggle(20);
            if ($(elem).text() === "Show more") {
                $(elem).text("Show less");
            } else {
                $(elem).text("Show more");
            }
        }
    </script>
@endsection
