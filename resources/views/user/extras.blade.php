<div class="shadow-2xl p-3 mb-3">
    <p class="h3">{{ __('More about me') }}</p>
    <p class="text-blue-500 my-3">{{ __('Complete with your data:') }}</p>
</div>
<hr>
<form method="post" action="" class="p-3">
    @csrf

    {{-- Birthday --}}
    <div class="form-group">
        <label for="birthday">{{ __('Birthday') }}</label>
        <input  type="date" 
                id="birthday"
                name="birthday"
                value=""
                class="input @error('birthday') is-invalid @enderror"
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