<div class="shadow-2xl p-3 mb-3">
    <p class="h3">{{ __('Change password') }}</p>
    <p class="text-blue-500 my-3">{{ __('Complete with your data:') }}</p>
</div>
<hr>
<form method="POST" action="{{ route('register') }}" class="p-3">
    @csrf

    {{-- Old password --}}
    <div class="form-group">
        <label for="oldpassword">{{ __('Old password') }}</label>
        <input  type="password"
                name="oldpassword"
                id="oldpassword"
                class="input @error('password') is-invalid @enderror"
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
                class="input @error('password') is-invalid @enderror"
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
                class="input @error('password') is-invalid @enderror"
                required />
    </div>

    {{-- Extras --}}
    <div class="form-group">
        <button class="btn btn-outline-primary btn-block my-3">{{ __('Save changes') }}</button>
    </div>
</form>