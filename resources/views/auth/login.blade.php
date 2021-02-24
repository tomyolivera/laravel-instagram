@extends('layouts.app')

@section('title')
    {{ __('Login') }}
@endsection

@section('content')
    <div class="container bg-gray-900 text-gray-200 p-3 rounded shadow-xl">

        <p class="h3">{{ __('Login') }}</p>
        <p class="text-green-500 my-3">{{ __('Complete with your data') }}</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input type="email" name="email" id="email" class="form-control" required />
            </div>

            {{-- Password --}}
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" />

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


            <div class="form-group">
                <button class="btn btn-outline-success btn-block my-3">{{ __('Login') }}</button>

                @if (Route::has('password.request'))
                    <a class="text-blue-500" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                <br>
                <a class="text-blue-500" href="{{ route('register') }}">
                    {{ __('Or register here?') }}
                </a>
            </div>
        </form>
    </div>
@endsection