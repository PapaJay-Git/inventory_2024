@if (Auth::user()->role != 'admin')
    <a href="{{ route("$data_name.create") }}" class="btn btn-primary btn-sm fw-bold">
        CREATE DATA
    </a>
@else
    <a href="{{ "/forms/$data_name" }}" class="btn btn-primary btn-sm fw-bold">
        BACK
    </a>
@endif
