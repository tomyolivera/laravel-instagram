@extends('adminlte::auth.login')

@section('title', 'Login')

@section('content')
    <div class="pic">
        <div class="p-3 mb-0 text-center">
            <p class="h2">{{ __('Login') }}</p>
            <p class="text-green-500 my-3">{{ __('Complete with your data') }}</p>
            <hr class="mt-4" />
        </div>
        
        <div class="text-center">
            <strong class="text-red-700">{{ $error }}</strong>
        </div>

        <form method="POST" action="{{ route('login') }}" class="p-3">
            @csrf

            {{-- Username --}}
            <div class="form-group mb-4">
                <label for="username">{{ __('Username') }}</label>
                <input type="username" name="username" id="username" class="input" required />

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            {{-- Password --}}
            <div class="form-group my-4">
                <label for="password">{{ __('Password') }}</label>
                <input type="password" name="password" id="password" class="input @error('password') is-invalid @enderror" required autocomplete="current-password" />

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Extras --}} 
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }} />

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            @if (Route::has('password.request'))
                <a class="text-black hover:text-black" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif

            <div class="form-group">
                <button class="button button-green d-block w-full my-3">{{ __('Login') }}</button>
                
                <p class="text-center text-gray-600 h6">{{ __('Or') }}</p>
                
                {{-- Login with social media --}}
                @include('auth.social_buttons')
                
                <a href="{{ route('register') }}" class="text-decoration-none hover:text-black text-center button button-blue d-block w-full my-3">{{ __('Create an account') }}</a>
            </div>
        </form>
    </div>
@endsection