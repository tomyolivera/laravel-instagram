@extends('layouts.app')

@section('title')
    {{ __('My Profile') }}
@endsection

@section('content')
    <?php $divclass = "col col-md-3 bg-gray-900 text-gray-200 p-3 rounded shadow-xl mr-4" ?>

    <div class="container">
        <div class="row">
            <div class="{{ $divclass }}">
                <p class="h3">{{ __('My profile') }}</p>
                <p class="text-blue-500 my-3">{{ __('Your data:') }}</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- Name --}}
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input  type="text" 
                                id="name"
                                name="name"
                                value="{{ $profile->name }}"
                                class="form-control @error('name') is-invalid @enderror"
                                autocomplete="off"
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
                                value="{{ $profile->username }}"
                                class="form-control @error('username') is-invalid @enderror"
                                autocomplete="off"
                                minlength="6"
                                maxlength="35"
                                required autofocus />

                        @error('username')
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
                                value="{{ $profile->nickname }}"
                                class="form-control @error('nickname') is-invalid @enderror"
                                autocomplete="off"
                                maxlength="25"
                                autofocus />

                        @error('nickname')
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
                                value="{{ $profile->email }}" 
                                class="form-control @error('email') is-invalid @enderror"
                                autocomplete="off"
                                required />

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Extras --}}
                    <div class="form-group">
                        <button class="btn bg-red-500 btn-block my-3">{{ __('Save changes') }}</button>
                    </div>
                </form>
            </div>

            <div class="{{ $divclass }}">
                <p class="h3">{{ __('More about me') }}</p>
                <p class="text-blue-500 my-3">{{ __('Complete with your data:') }}</p>

                <form method="post" action="">
                    @csrf

                    {{-- Birthday --}}
                    <div class="form-group">
                        <label for="birthday">{{ __('Birthday') }}</label>
                        <input  type="date" 
                                id="birthday"
                                name="birthday"
                                value=""
                                class="form-control @error('birthday') is-invalid @enderror"
                                required autofocus />

                        @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </form>

            </div>

            {{-- Change password --}}
            <div class="{{ $divclass }}">
                <p class="h3">{{ __('Change password') }}</p>
                <p class="text-blue-500 my-3">{{ __('Complete with your data:') }}</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- Old password --}}
                    <div class="form-group">
                        <label for="oldpassword">{{ __('Old password') }}</label>
                        <input  type="password"
                                name="oldpassword"
                                id="oldpassword"
                                class="form-control @error('password') is-invalid @enderror"
                                autocomplete="off"
                                required />

                        @error('oldpassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- New password --}}
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input  type="password"
                                name="password"
                                id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                autocomplete="off"
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
                                autocomplete="off"
                                required />
                    </div>

                    {{-- Extras --}}
                    <div class="form-group">
                        <button class="btn btn-block my-3 text-gray-300 bg-green-600 hover:bg-green-800 hover:text-gray-300 border-4 border-red-600 ">{{ __('Save changes') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection