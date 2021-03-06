@extends('layouts.app')

@section('title')
    {{ __('My Profile') }}
@endsection

@section('content')
    <?php $divclass = "col col-md-3 bg-gray-800 text-gray-200 p-0 rounded mr-4 max-w-sm overflow-hidden shadow-xl text-center" ?>

    
    <div class="container">
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success d-flex justify-between">
                    <strong> {{ session('success') }} </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="{{ $divclass }}">
                <div class="shadow-2xl border-bottom p-3 mb-3">
                    <p class="h3">{{ __('My profile') }}</p>
                    <p class="text-blue-500 my-3">{{ __('Your data:') }}</p>

                    {{-- Photo --}}
                    <div class="d-flex justify-center my-3">
                        @if (Auth::user()->photo)
                            <img class="w-20 h-20 rounded-full" src="{{ route('photo', ['filename' => Auth::user()->photo]) }}" />
                        @endif
                    </div>
                </div>
                
                <form method="POST" action="{{ route('update') }}" enctype="multipart/form-data" class="p-3">
                    @csrf
                    
                    
                    {{-- <div class="form-group">
                        <label for="photo">{{ __('Photo') }}</label>
                        <input  type="file" 
                                id="photo"
                                name="photo"
                                class="form-control @error('name') is-invalid @enderror" />
                    </div> --}}

                    {{-- Name --}}
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input  type="text" 
                                id="name"
                                name="name"
                                value="{{ Auth::user()->name }}"
                                class="form-control @error('name') is-invalid @enderror"
                                autocomplete="off"
                                minlength="3"
                                maxlength="60"
                                required />

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
                                value="{{ Auth::user()->username }}"
                                class="form-control @error('username') is-invalid @enderror"
                                autocomplete="off"
                                minlength="6"
                                maxlength="35"
                                required />

                        @error('username')
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
                                value="{{ Auth::user()->email }}" 
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
                        <button class="btn btn-outline-primary btn-block my-3">{{ __('Save changes') }}</button>
                    </div>
                </form>
            </div>

            <div class="{{ $divclass }}">
                <div class="shadow-2xl border-bottom p-3 mb-3">
                    <p class="h3">{{ __('More about me') }}</p>
                    <p class="text-blue-500 my-3">{{ __('Complete with your data:') }}</p>
                </div>

                <form method="post" action="" class="p-3">
                    @csrf

                    {{-- Birthday --}}
                    <div class="form-group">
                        <label for="birthday">{{ __('Birthday') }}</label>
                        <input  type="date" 
                                id="birthday"
                                name="birthday"
                                value=""
                                class="form-control @error('birthday') is-invalid @enderror"
                                required />

                        @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Extras --}}
                    <div class="form-group">
                        <button class="btn btn-outline-primary btn-block my-3">{{ __('Save changes') }}</button>
                    </div>
                </form>

            </div>

            {{-- Change password --}}
            <div class="{{ $divclass }}">
                <div class="shadow-2xl border-bottom p-3 mb-3">
                    <p class="h3">{{ __('Change password') }}</p>
                    <p class="text-blue-500 my-3">{{ __('Complete with your data:') }}</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="p-3">
                    @csrf

                    {{-- Old password --}}
                    <div class="form-group">
                        <label for="oldpassword">{{ __('Old password') }}</label>
                        <input  type="password"
                                name="oldpassword"
                                id="oldpassword"
                                class="form-control @error('password') is-invalid @enderror"
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
                                required />
                    </div>

                    {{-- Extras --}}
                    <div class="form-group">
                        <button class="btn btn-outline-primary btn-block my-3">{{ __('Save changes') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <user-component />
@endsection