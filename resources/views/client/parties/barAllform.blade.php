<div class="row category-filter-box mx-0">
    <div class="col-md-6">
        <a href="{{ route('allform') }}">
            <button class="btn py-1 px-2 mx-2 {{ $titre=="verticale"?"btn-danger":"btn-light" }} ">
                <i class="fas fa-th-large"></i></button>
        </a>
        <a href="{{ route('horizontale') }}">
            <button class="btn py-1 px-2 mx-2 {{ $titre=="verticale"?"btn-light":"btn-danger" }}">
                <i class="fas fa-list"></i></button>
        </a>
        <span class="text-12px fw-700 text-muted">{{  session()->has('formBy')?session()->get('formBy')['f']->count():$allforms->count() }} Conférence(s) trouvées</span>
    </div>
   
</div>