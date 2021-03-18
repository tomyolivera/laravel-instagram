<div class="row text-gray-300">
    <div class="col col-md-4">
        <img style="width:200px; height:200px; border-radius:100%;" src="{{ route('photo', ['filename' => Auth::user()->photo]) }}" />
    </div>

    <div class="col col-md-8">
        <div class="flex align-center">
            <h3 class="d-inline">{{ Auth::user()->username }}</h3>
            <button class="mx-3 btn btn-primary d-inline">{{ __('Edit profile') }}</button>
        </div>

        <div class="my-3 row">
            <div class="col col-md-2">
                <h6>5 publicaciones</h6>
            </div>

            <div class="col col-md-2">
                <h6>172 seguidores</h6>
            </div>

            <div class="col col-md-2">
                <h6>125 siguiendo</h6>
            </div>
        </div>
        
        <div class="my-5">
            <h4>{{ Auth::user()->name }}</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam id doloremque ex magni similique eius quam? Qui numquam, consequatur quod dolores rerum quis nisi atque nostrum sequi dolor a ipsum!</p>
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