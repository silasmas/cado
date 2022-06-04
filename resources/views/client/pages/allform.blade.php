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
                                                <a href="">
                                                    <input type="radio" id="category_all" name="sub_category" class="categories custom-radio" value="all" 
                                                    {{ session()->has("formBy")?"":"checked" }} 
                                                    onclick="event.preventDefault(); $(location).attr('href', 'formBy/{{$titre}}&CADO');"/>
                                                    <label for="category_all">Toutes conférences</label>
                                                    <span class="float-end">({{$allforms->count() }})</span>
                                                
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <hr />
                                <div class="filter_type px-4">
                                    <div class="form-group">
                                        <h5 class="fw-700 mb-3">Contexte</h5>
                                        <ul>
                                            <li>                                                
                                                <div class="">
                                                        <input type="radio" id="category-2" name="sub_category"
                                                            class="categories custom-radio" value="CADO"
                                                             {{ session()->has("formBy")&& session()->get("formBy")["select"][0]=="context"&&session()->get("formBy")["select"][1]=="CADO"?"checked":"" }}
                                                            onclick="event.preventDefault(); $(location).attr('href', 'formBy/context&CADO');"/>
                                                        <label for="category-2">
                                                                CADO
                                                            </label>
                                                            <span class="float-end">({{ $count["CADO"] }})</span>                                                           
                                                        
                                                </div>
                                                <div class="">
                                                        <input type="radio" id="category-3" name="sub_category"
                                                        {{ session()->has("formBy")&& session()->get("formBy")["select"][0]=="context"&&session()->get("formBy")["select"][1]=="COUPLE"?"checked":"" }}
                                                            class="categories custom-radio" value="COUPLE" 
                                                            onclick="event.preventDefault(); $(location).attr('href', 'formBy/context&COUPLE');"/>
                                                            
                                                        <label for="category-3">COUPLE</label>
                                                        <span class="float-end">({{ $count["COUPLE"] }})</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <hr />
                                <div class="filter_type px-4">
                                    <div class="form-group">
                                        <h5 class="fw-700 mb-3">Prix</h5>
                                        <ul>
                                            <li>                                                
                                                <div class="">
                                                        <input type="radio" id="category-4" name="sub_category"
                                                            class="categories custom-radio" value="Gratuit" 
                                                            {{ session()->has("formBy")&& session()->get("formBy")["select"][0]=="type"&&session()->get("formBy")["select"][1]=="free"?"checked":"" }}
                                                            onclick="event.preventDefault(); $(location).attr('href', 'formBy/type&free');"/>
                                                        <label for="category-4">Gratuit</label>
                                                        <span class="float-end">({{ $count3["free"] }})</span>
                                                </div>
                                                <div class="">
                                                        <input type="radio" id="category-5" name="sub_category"
                                                            class="categories custom-radio" value="paid" 
                                                            {{ session()->has("formBy")&& session()->get("formBy")["select"][0]=="type"&&session()->get("formBy")["select"][1]=="Payant"?"checked":"" }}
                                                            onclick="event.preventDefault(); $(location).attr('href', 'formBy/type&Payant');"/>
                                                        <label for="category-5">Payant</label>
                                                        <span class="float-end">({{ $count3["payant"] }})</span>
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
                                                <input type="radio" id="beginner" name="sub_category" class="level custom-radio"
                                                    value="beginner" 
                                                    {{ session()->has("formBy")&& session()->get("formBy")["select"][0]=="live"&&session()->get("formBy")["select"][1]=="1"?"checked":"" }}
                                                    onclick="event.preventDefault(); $(location).attr('href', 'formBy/live&1');"/>
                                                <label for="beginner">Live</label>
                                                <span class="float-end">({{ $count2["1"] }})</span>
                                            </div>
                                            <div class="">
                                                <input type="radio" id="advanced" name="sub_category" class="level custom-radio"
                                                    value="advanced" 
                                                    {{ session()->has("formBy")&& session()->get("formBy")["select"][0]=="isform"&&session()->get("formBy")["select"][1]=="1"?"checked":"" }}
                                                    onclick="event.preventDefault(); $(location).attr('href', 'formBy/isform&1');"/>
                                                <label for="advanced">Formation</label>
                                                <span class="float-end">({{ $for["1"] }})</span>
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
