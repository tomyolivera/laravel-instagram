@if ($publication->description)
    <div class="flex align-center my-2">
        <a href="{{ route('user', $publication->user->username) }}" class="text-gray-900 font-weight-bold text-decoration-none">{{ __('@') }}{{ $publication->user->username }}: </a>
        <span class="text-black ml-2 truncate">{{ $publication->description }}</span>
    </div>
@endif

{{-- @foreach ($latest as $item)
    @if ($publication->comments[0]->id == $item->id)
        <div class="flex align-center mb-2">
            <a href="{{ route('user', $item->user->username) }}" class="text-gray-700 font-weight-bold text-decoration-none">{{ __('@') }}{{ $item->user->username }}: </a>
            <a href="{{ route('publications.publication', $publication->id) }}" class="text-gray-800 hover:text-black text-decoration-none ml-2 truncate">{{ $item->description }}</a>
        </div>
    @endif
@endforeach --}}


{{-- @if (count($publication->comments) > 0)
    <hr class="my-2">

    @foreach ($publication->comments as $comment)
        <div class="flex align-center mb-2">
            <a href="{{ route('user', $comment->user->username) }}" class="text-gray-700 font-weight-bold text-decoration-none">{{ __('@') }}{{ $comment->user->username }}: </a>
            <span class="text-black ml-2 truncate">{{ $comment->description }}</span>
        </div>
    @endforeach
@endif --}}