@if ($publication->description)
    <div class="flex align-center my-2">
        <a href="#" class="text-gray-900 font-weight-bold text-decoration-none">@ {{ $publication->user->username }}: </a>
        <span class="text-black ml-2 truncate">{{ $publication->description }}</span>
    </div>
@endif

@if (count($publication->comments) > 0)
    <hr class="bg-black my-2">
    @foreach ($publication->comments as $comment)
        <div class="flex align-center mb-2">
            <a href="#" class="text-gray-700 font-weight-bold text-decoration-none">{{ $comment->user->username }}: </a>
            <span class="text-black ml-2 truncate">{{ $comment->description }}</span>
        </div>
    @endforeach
@endif