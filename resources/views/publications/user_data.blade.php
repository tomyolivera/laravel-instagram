<a href="{{ route('user', $publication->user->username) }}" class="flex align-center text-decoration-none text-gray-700 hover:text-black">
    <img class="w-10 h-10 rounded-full" src="{{ route('user.photo', ['filename' => $publication->user->photo]) }}" />
    <span class="my-2 mx-3">
        {{$publication->user->username}}
        @include('user.verified', ['v' => $publication->user->verified])
    </span>
</a>