@extends('client.templates.main_template', ['titre' => 'Mes formation'])


@section('content')
    @include('client.pages.sousMenu')

    <section class="purchase-history-list-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="purchase-history-list">
                        <li class="purchase-history-list-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="purchase-history-list-title">Conférence</h4>
                                </div>
                                <div class="col-sm-6 hidden-xxs hidden-xs">
                                    <div class="row">
                                        <div class="col-sm-3">Date</div>
                                        <div class="col-sm-1">Total</div>
                                        <div class="col-sm-3">Type de paiement</div>
                                        <div class="col-sm-3">Etat</div>
                                        <div class="col-sm-2">Actions</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @forelse ($historique as $p)
                            <li class="purchase-history-items mb-2">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="purchase-history-course-img">
                                            <img src="{{ asset('assets/images/form/' . $p->cover) }}"
                                                class="img-fluid" />
                                        </div>
                                        <a class="purchase-history-course-title"
                                            href="{{ route('detailFormation', ['id' => $p->id]) }}">
                                            {{ $p->titre }}
                                        </a>
                                    </div>
                                    <div class="col-sm-6 purchase-history-detail">
                                        <div class="row">
                                            <div class="col-sm-3 date">
                                                {{ \Carbon\Carbon::parse($p->date)->isoFormat('LLL') }}
                                            </div>
                                            <div class="col-sm-1 price"><b>
                                                    {{-- {{ $p->monaie=='USD'?"$":"FC" }} --}}
                                                    {{ $p->montant }}
                                                </b></div>
                                            <div class="col-sm-3 payment-type text-center">
                                                {{ $p->operateur=="MOBILE_MONEY"?"Mobile":"Carte" }}
                                            </div>
                                            <div class="col-sm-3 payment-type {{ $p->status == 'ACCEPTED' ? 'brn-compare-sm text-center' : 'badge badge-sub-warning' }}">
                                                {{ $p->status }}
                                            </div>
                                            <div class="col-sm-2">
                                                <a href="javascript:;" target="_blank" class="btn btn-receipt">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="purchase-history-items mb-2">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="empty-box text-center">
                                            <p class="text-danger">Votre historique est vide.

                                            </p>
                                            <a href="{{ route('dashboard') }}">Voir les formations</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforelse


                    </ul>
                </div>
            </div>
        </div>
    </section>
    <nav></nav>
@endsection
