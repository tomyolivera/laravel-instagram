@extends('layouts.app')

@section('title')
    {{ __('Register') }}
@endsection

@section('content')
    <div class="container bg-black text-gray-200 p-0 rounded shadow-xl">

        <div class="shadow-2xl border-bottom p-3 mb-3 text-center">
            <p class="h3">{{ __('Register') }}</p>
            <p class="text-blue-500 my-3">{{ __('Complete with your data') }}</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="p-3">
            @csrf

            {{-- Name --}}
            <div class="form-group my-4">
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

            {{-- Extras --}}
            <div class="form-group">
                <button class="btn btn-outline-success btn-block my-3">{{ __('Register') }}</button>

                <a class="text-blue-500" href="{{ route('login') }}">
                    {{ __('Do you already have an account? Log In!') }}
                </a>
            </div>
        </form>
    </div>
@endsection