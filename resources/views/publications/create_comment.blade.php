<form action="{{ route('comment.store') }}" method="POST">
    @csrf

    <input type="hidden" name="pid" value="{{ $publication->id }}">

    <div class="form-group flex align-center">
        <input type="text" class="input" id="description" name="description" placeholder="Add a comment">
        <button class="btn btn-success ml-2"><i class="fas fa-caret-right"></i></button>
    </div>
</form>