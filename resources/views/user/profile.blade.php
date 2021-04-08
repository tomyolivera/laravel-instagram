<div class="card">
    <div class="card-header">
        <div class="flex align-center">
            <div>
                <img class="rounded-full w-full" src="{{ route('user.photo', ['filename' => $user->photo]) }}" />
            </div>
            <div class="ml-4">
                <h4>{{ $user->name }}</h4>
                <h5>{{ __('@') }}{{ $user->username }}</h5>
                @include('user.status')
            </div>
        </div>

    </div>
</div>













{{-- <div class="shadow-md p-3 mb-3">
    <p class="h3">{{ __('My profile') }}</p>
    <p class="text-blue-500 my-3">{{ __('Your data:') }}</p>

    <div class="my-3 flex justify-center">
        <div class="row">
            <div class="col-md-5">
                <img class="w-16 h-16 rounded-full" src="{{ route('photo', ['filename' => Auth::user()->photo]) }}" />
            </div>

            <div class="col-md-7">
                {{Auth::user()->name}}

                <div class="mr-4 my-3">
                    @include('user.status')
                </div>
            </div>
        </div>

    </div>

    <div class="mt-4">
        <h5>{{ __('Username') }}: <span class="text-gray-600">{{ Auth::user()->username}}</span></h5>
        <h5>{{ __('Email') }}: <span class="text-gray-600">{{ Auth::user()->email}}</span></h5>
    </div>
    
    <div class="mt-8">
        <cite class="text-gray-600">{{ __('Created at') }}: {{ Auth::user()->created_at }}</cite>
    </div>

    <button class="btn btn-outline-warning btn-block flex align-center justify-center mt-6"><i>edit</i></button>
    
</div>
<hr> --}}