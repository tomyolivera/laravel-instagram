@if (Auth::user()->photo)
    <div class="d-block">
        <img class="w-10 h-10 rounded-full" src="{{ route('photo', ['filename' => Auth::user()->photo]) }}" />
    </div>
@endif