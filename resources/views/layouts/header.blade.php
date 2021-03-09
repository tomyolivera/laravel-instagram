<nav class="navbar navbar-expand-md navbar-dark bg-gray-900 shadow-2xl sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>

                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <?php $aclass = "dropdown-item text-gray-300 hover:text-gray-300 hover:bg-gray-800 flex align-center" ?>

                    <li class="nav-item dropdown"> 
                            <a id="navbarDropdown" class="nav-link flex align-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @include('user.photo')
                                <div class="m-2">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="dropdown-toggle mt-2"></div>
                            </a>
                        <div class="dropdown-menu dropdown-menu-right bg-gray-800 shadow-xl rounded p-2">
                            <a class="{{ $aclass }}" href="{{ route('tasks') }}"> {{ __('My Tasks') }} <i class="text-blue-500">tasks</i></a>

                            <a class="{{ $aclass }}" href="{{ route('user') }}"> {{ __('My Profile') }} <i class="text-green-500">account_circle</i></a>

                            <a class="{{ $aclass }}" href="#"> {{ __('Settings') }} <i class="text-gray-500">settings</i></a>

                            <hr class="bg-white" />

                            <a class="{{ $aclass }}" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }} <i class="text-red-500">logout</i></a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>