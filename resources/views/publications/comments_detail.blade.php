<div style="overflow:auto;max-height: 400px">
    @if ($publication->description)
        <div class="flex align-center my-2">
            <a href="{{ route('user', $publication->user->username) }}" class="text-black font-weight-bold text-decoration-none flex align-center">
                @include('user.photo', ["photo" => $publication->user->photo, "size" => "8"])
                <span class="ml-2 mt-1">{{ __('@') }}{{ $publication->user->username }}:</span>
            </a>

            <div class="ml-2 mt-1">
                <p class="break-all">{{ $publication->description }}</p>
            </div>
        </div>

        <p class="text-gray-600" style="font-size: 12px">{{ \FormatTime::LongTimeFilter($publication->created_at) }}</p>
    @endif

    @foreach ($publication->comments as $comment)
        <hr class="my-2">
        <div class="flex align-center mt-3">
            <a href="{{ route('user', $comment->user->username) }}" class="text-black font-weight-bold text-decoration-none flex align-center">
                @include('user.photo', ["photo" => $comment->user->photo, "size" => "8"])
                <span class="ml-2 mt-1">{{ __('@') }}{{ $comment->user->username }}:</span>
            </a>

            <div class="@if(strlen($comment->description) < 50) ml-2 @else ml-10 @endif mt-1">
                <p class="break-all">{{ $comment->description }}</p>
            </div>
        </div>

        <div class="flex justify-between">
            <p class="text-gray-600" style="font-size: 12px">{{ \FormatTime::LongTimeFilter($comment->created_at) }}</p>

            @if ($comment->user_id == Auth::user()->id || $publication->user->id == Auth::user()->id)
                <div class="flex align-center">
                    <a  href="{{ route('comment.delete', $comment->id, $publication->id) }}"
                        class="text-decoration-none p-2 text-red-500 hover:text-red-700"
                        onclick="return confirm('Do you really want to delete it?')"
                    >
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            @endif
        </div>
    @endforeach
</div>