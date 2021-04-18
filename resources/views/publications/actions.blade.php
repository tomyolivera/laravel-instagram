<div class="flex justify-between">
    <a href="{{ route('publications') }}" class="btn btn-danger">Back</a>

    @if (session('success'))
        <div class="alert alert-success d-flex justify-between">
            <strong> {{ session('success') }} </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (Auth::user()->id == $publication->user_id)
        <a href="{{ route('publications.delete', $publication->id) }}" class="btn btn-danger" onclick="return confirm('Do you really want to delete it?')"><i class="fas fa-trash"></i></a>
    @endif
</div>