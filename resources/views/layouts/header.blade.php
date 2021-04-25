<nav class="navbar navbar-expand-md navbar-dark shadow-md bg-gray-900">
    <div class="container">
        <a class="h2 text-decoration-none text-white hover:text-white" href="{{ url('/') }}">FACER</a>

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
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="h5 text-gray-400 mr-3 text-decoration-none hover:text-gray-200" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="h5 text-gray-400 mr-3 text-decoration-none hover:text-gray-200" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <?php $aclass = "dropdown-item text-gray-300 bg-gray-900 hover:text-gray-300 hover:bg-gray-700 flex align-center" ?>

                    <li class="nav-item dropdown"> 
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span id="user-data-header" class="flex align-center">
                                @include('user.photo')
                                <div class="mx-2 text-white">
                                    {{ Auth::user()->name }}
                                    @include('user.status')
                                </div>
                                <div class="dropdown-toggle text-white"></div>
                            </span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right bg-gray-900 shadow-xl rounded p-2">
                            <a class="{{ $aclass }}" href="{{ route('tasks.index') }}"> <i class="fas fa-tasks text-blue-500"></i> <span>{{ __('My Tasks') }}</span></a>

                            <a class="{{ $aclass }}" href="{{ route('publications') }}"> <i class="fas fa-images text-purple-500"></i> <span>{{ __('Publications') }}</span></a>

                            <a class="{{ $aclass }}" href="{{ route('user') }}"> <i class="far fa-user text-green-500"></i> <span>{{ __('My Profile') }}</span></a>

                            <hr class="bg-white" />

                            <a class="{{ $aclass }}" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fas fa-long-arrow-alt-left text-red-500"></i> <span>{{ __('Logout') }}</span></a>

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