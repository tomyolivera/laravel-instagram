<a href="{{ route('profile', $publication->user->username) }}" class="flex align-center text-decoration-none text-gray-700 hover:text-black">
    @include('user.photo', ["photo" => $publication->user->photo, "size" => "10"])
    <span class="my-2 mx-3">
        {{ $publication->user->username }}
        @include('user.verified', ['v' => $publication->user->verified])
    </span>
</a>