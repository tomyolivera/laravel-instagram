@extends('adminlte::auth.passwords.email')

@section('title')
    {{ __('Reset password') }}
@endsection

@section('content')
    <div class="container bg-gray-900 text-gray-200 p-3 rounded shadow-xl">

        <p class="h3">{{ __('Reset password') }}</p>
        <p class="text-green-500 my-3">{{ __('Complete with your data') }}</p>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

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

            <div class="form-group">
                <button class="btn btn-outline-warning btn-block">{{ __('Send Password Reset Link') }}</button>
            </div>
        </form>
    </div>
@endsection