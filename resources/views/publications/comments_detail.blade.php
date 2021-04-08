@if ($publication->description)
    <div class="flex align-center my-2" style="font-size: 14px">
        <div>
            <a href="{{ route('user', $publication->user->username) }}" class="text-black font-weight-bold text-decoration-none flex align-center">
                <img class="w-8 h-8 rounded-full" src="{{ route('user.photo', ['filename' => $publication->user->photo]) }}" />
                <span class="ml-2 mt-1">{{ __('@') }}{{ $publication->user->username }}:</span>
            </a>
        </div>
        <span class="text-black ml-2 mt-1">{{ $publication->description }}</span>
    </div>
    <hr>
@endif

<div style="overflow:auto;">
    @foreach ($publication->comments as $comment)
        <div class="flex align-center my-2" style="font-size: 14px">
            <div>
                <a href="{{ route('user', $comment->user->username) }}" class="text-black font-weight-bold text-decoration-none flex align-center">
                    <img class="w-8 h-8 rounded-full" src="{{ route('user.photo', ['filename' => $comment->user->photo]) }}" />
                    <span class="ml-2 mt-1">{{ __('@') }}{{ $comment->user->username }}:</span>
                </a>
            </div>
            <div>
                <div class="text-black ml-2 mt-1">
                    <p>{{ $comment->description }}</p>
                    <p class="text-gray-600">{{ \FormatTime::LongTimeFilter($comment->created_at) }}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>