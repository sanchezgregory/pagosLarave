@if (session('alert'))

    <p class="alert alert-success ">
        {{ session('alert') }}
    </p>

@endif