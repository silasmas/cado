<div class="col-lg-9">
    @include('client.parties.barAllform')
    <div class="category-course-list">
        <ul>
            @forelse (session()->has('formBy')>0?session()->get('formBy')['f']:$allforms as $f)
            <li>
                <div class="course-box-2">
                    <div class="course-image">
                        <a href="{{ route('detailFormation', ['id' => $f->id]) }}">
                            <img src="{{ asset('assets/images/form/' .$f->cover) }}"
                                alt="" class="img-fluid" />
                        </a>
                    </div>
                    <div class="course-details">
                        <a href="{{ route('detailFormation', ['id' => $f->id]) }}" class="course-title">{{$f->titre}}</a>

                        <div class="course-subtitle d-none d-md-block">
                        {{ Str::limit($f->description) }}
                        </div>

                        <div class="course-meta">
                            <div class="row">
                                <div class="col-md-12">
                                    <span class=""><i class="fas fa-play-circle"></i>{{ $f->live==true && $f->isform==false?"LIVE":$f->formation->count()." Chapitres(s)" }}</span>
                                    <span class=""><i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($f->date_fin)->isoFormat('LLL') }} </span>
                                    <span class=""><i class="fas fa-closed-captioning"></i>Français</span>
                                    {{-- <button class="brn-compare-sm"
                                        onclick="event.stopPropagation(); $(location).attr('href', 'compare.html');">
                                        <i class="fas fa-balance-scale"></i> Compare
                                    </button> --}}
                                    <br>
                                    <span class="badge badge-sub-warning text-11px">
                                        {{ $f->live==true && $f->isform==false?"LIVE":"FORMATION" }}
                                    </span>
                                        <span class="brn-compare-sm">
                                            {{ $f->context }}
                                        </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="floating-user d-inline-block">
                                        @forelse ($f->formateur as $fr)
                                        <img style="margin-left: 0px;" class="position-absolute"
                                            src="{{ asset('assets/images/form/' . $fr->photo) }}"
                                            width="30px" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="{{ $fr->prenom." ".$fr->nom }}"
                                            onclick="event.stopPropagation(); $(location).attr('href', 'instructor.html');" />
                                            @empty
                                            
                                            @endforelse
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="course-price-rating">
                        <div class="course-price">
                            <span class="current-price">
                                @if ($f->type == 'payant')
                                @if ($userForm != null)
                                    @if ($f->id == $userForm->session_id && $userForm->etat == 'Payer')
                                        @lang('general.autre.achatFait')
                                    @else
                                        {{ $f->monaie == 'USD' ? '$' : 'FC' }}{{ $f->prix }}
                                    @endif
                                @else
                                    {{ $f->monaie == 'USD' ? '$' : 'FC' }}{{ $f->monaie == 'USD' ? '$' : 'FC' . $f->prix }}
                                @endif
                            @else
                                {{ $f->type }}
                            @endif
                            </span>
                        </div>
                        <div class="rating">
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <span class="d-inline-block average-rating">5</span>
                        </div>
                        <div class="rating-number">
                           {{-- @foreach ($allforms->load('user') as $u)
                                {{ dd($u->pivot) }}
                            @endforeach
                            1 Ratings --}}
                        </div>
                    </div>
                </div>
            </li>
                
            @empty
                
            @endforelse
        </ul>
    </div>
    {{-- <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item active disabled"><span class="page-link">1</span></li>
            <li class="page-item"><a href="course-list.html" data-ci-pagination-page="2">2</a></li>
            <li class="page-item"><a href="course-list.html" data-ci-pagination-page="3">3</a></li>
            <li class="page-item">
                <a href="course-list.html" data-ci-pagination-page="2" rel="next"><i
                        class="fas fa-chevron-right"></i></a>
            </li>
        </ul>
    </nav> --}}
</div>
