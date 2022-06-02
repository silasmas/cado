@if (session()->has('message'))
<div class="col-md-12 col-md-offset-3">
    <div class="alert alert-{{ session()->get('message')['type'] }} alert-dismissable">
        {{ session()->get('message')['msg'] }}
    </div>
</div><br>
@endif
<div class="col-md-12  text-danger mb-1">
@foreach ($errors->all() as $err)
    {{ $err }}<br>
@endforeach
</div>