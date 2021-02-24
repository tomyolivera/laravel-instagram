@extends('layouts.app')

@section('title')
    {{ __('Register') }}
@endsection

@section('content')
    <div class="container bg-gray-900 text-gray-200 p-3 rounded shadow-xl">

        <p class="h3">{{ __('Register') }}</p>
        <p class="text-blue-500 my-3">{{ __('Complete with your data') }}</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Name --}}
            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input  type="text" 
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror"
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
            <div class="form-group">
                <label for="username">{{ __('Username') }}</label>
                <input  type="text" 
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        class="form-control @error('username') is-invalid @enderror"
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

            {{-- Nickname --}}
            <div class="form-group">
                <label for="nickname">{{ __('Nickname') }}</label>
                <input  type="text" 
                        id="nickname"
                        name="nickname"
                        value="{{ old('nickname') }}"
                        class="form-control @error('nickname') is-invalid @enderror"
                        autocomplete="nickname"
                        maxlength="25"
                        autofocus />

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Email --}}
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input  type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}" 
                        class="form-control @error('email') is-invalid @enderror"
                        autocomplete="email"
                        required />

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input  type="password"
                        name="password"
                        id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        autocomplete="new-password"
                        required />

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Repeat password --}}
            <div class="form-group">
                <label for="password_confirm">{{ __('Repeat password') }}</label>
                <input  type="password"
                        name="password_confirmation"
                        id="password_confirm"
                        class="form-control @error('password') is-invalid @enderror"
                        autocomplete="new-password"
                        required />
            </div>

            {{-- Extras --}}
            <div class="form-group">
                <button class="btn btn-outline-primary btn-block">{{ __('Register') }}</button>
            </div>
        </form>
    </div>
@endsection