@extends('adminlte::auth.login')

@section('title', 'Register')

@section('content')
    <div class="pic">
        <div class="p-3 mb-0 text-center">
            <p class="h2">{{ __('Register') }}</p>
            <p class="text-green-500 my-3">{{ __('Complete with your data') }}</p>
            <hr class="mt-4" />
        </div>

        <form method="POST" action="{{ route('register') }}" class="p-3">
            @csrf

            {{-- Name --}}
            <div class="form-group mb-4">
                <label for="name">{{ __('Name') }}</label>
                <input  type="text" 
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="input @error('name') is-invalid @enderror"
                        autocomplete="name"
                        minlength="3"
                        maxlength="60"
                        required autofocus />

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Username --}}
            <div class="form-group my-4">
                <label for="username">{{ __('Username') }}</label>
                <input  type="text" 
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        class="input @error('username') is-invalid @enderror"
                        autocomplete="username"
                        minlength="6"
                        maxlength="35"
                        required autofocus />

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Email --}}
            <div class="form-group my-4">
                <label for="email">{{ __('Email') }}</label>
                <input  type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}" 
                        class="input @error('email') is-invalid @enderror"
                        autocomplete="email"
                        required />

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="form-group my-4">
                <label for="password">{{ __('Password') }}</label>
                <input  type="password"
                        name="password"
                        id="password"
                        class="input @error('password') is-invalid @enderror"
                        autocomplete="new-password"
                        required />

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Repeat password --}}
            <div class="form-group my-4">
                <label for="password_confirm">{{ __('Repeat password') }}</label>
                <input  type="password"
                        name="password_confirmation"
                        id="password_confirm"
                        class="input @error('password') is-invalid @enderror"
                        autocomplete="new-password"
                        required />
            </div>

            {{-- Re Captcha --}}
            <div classs="form-group my-4">
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
                @error('g-recaptcha-response')
                    <span class="alert alert-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Extras --}}
            <div class="form-group my-4">
                <button id="btn_submit" type="submit" class="button button-blue d-block w-full my-3">{{ __('Register') }}</button>

                <p class="text-center text-gray-600 h6">{{ __('Or') }}</p>

                @include('auth.social_buttons')

                <a href="{{ route('login') }}" class="text-decoration-none hover:text-black text-center button button-green d-block w-full my-3">{{ __('I have an account') }}</a>
            </div>
        </form>
    </div>
@endsection

@section('javascript')
    <script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer></script>
@endsection