<div class="col-lg-9">
    @include('client.parties.barAllform')
    <div class="category-course-list">
        <div class="row">
            @forelse (session()->has("formBy")?session()->get('formBy')['f']:$allforms as $f)
                <div class="col-md-6 col-xl-4">
                <div class="course-box-wrap">
                    <a href="{{ route('detailFormation', ['id' => $f->id]) }}" class="has-popover">
                        <div class="course-box">
                            <div class="course-image">
                                <img src="{{ asset('assets/images/form/' .$f->cover) }}"
                                    alt="" class="img-fluid" />
                            </div>
                            <div class="course-details">
                                <h5 class="title">{{ $f->titre }}</h5>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <div class="d-inline-block">
                                        <span class="text-dark ms-1 text-15px">(5)</span>
                                        <span class="text-dark text-12px text-muted ms-2">(1 Reviews)</span>
                                    </div>
                                </div>
                                <div class="d-flex text-dark">
                                    <div class="">
                                        <i class="far fa-clock text-14px"></i>
                                        <span class="text-muted text-12px">{{ \Carbon\Carbon::parse($f->date_fin)->isoFormat('LLL') }}</span>
                                    </div>
                                    <div class="ms-3">
                                        <i class="far fa-list-alt text-14px"></i>
                                        <span class="text-muted text-12px">{{ $f->live==true && $f->isform==false?"LIVE":$f->formation->count()." Chap." }}</span>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <span class="badge badge-sub-warning text-11px">
                                            {{ $f->live==true && $f->isform==false?"LIVE":"FORMATION" }}
                                        </span>
                                    </div>
                                    <div class="col-6 text-end">
                                        <span class="brn-compare-sm">
                                            {{ $f->context }}
                                        </span>
                                    </div>
                                </div>

                                <hr class="divider-1" />

                                <div class="d-block">
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
                                  

                                    <p class="price text-right d-inline-block float-end">
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
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @empty
                
            @endforelse
            
        </div>
    </div>
    {{-- <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item active disabled"><span class="page-link">1</span></li>
            <li class="page-item"><a href="course-grid.html" data-ci-pagination-page="2">2</a></li>
            <li class="page-item"><a href="course-grid.html" data-ci-pagination-page="3">3</a></li>
            <li class="page-item">
                <a href="course-grid.html" data-ci-pagination-page="2" rel="next"><i
                        class="fas fa-chevron-right"></i></a>
            </li>
        </ul>
    </nav> --}}
</div>
