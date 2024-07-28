@if (Auth::user()->role != 'admin')
    <a href="{{ route("$data_name.edit", $data_id) }}" class="btn btn-primary btn-sm">
        <i class="bi bi-pencil me-1"></i>Edit
    </a>
    <a href="{{ route("$data_name.show", $data_id) }}" class="btn btn-primary btn-sm" target="_blank">
        <i class="bi bi-pencil me-1"></i>PDF
    </a>
    <form action="{{ route("$data_name.destroy", $data_id) }}" method="POST" style="display:inline;"
        onsubmit="return confirm('Are you sure you want to delete this record?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">
            <i class="bi bi-trash me-1"></i>Delete
        </button>
    </form>
@else
    <a href="{{ route("admin_$data_name.show", $data_id) }}" class="btn btn-primary btn-sm" target="_blank">
        <i class="bi bi-pencil me-1"></i>PDF
    </a>
@endif
