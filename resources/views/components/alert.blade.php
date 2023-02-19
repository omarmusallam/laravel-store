@if (Session::has($type))
    <div class="alert alert-{{ $type }}">
        {{ Session::get($type) }}
    </div>
@endif
