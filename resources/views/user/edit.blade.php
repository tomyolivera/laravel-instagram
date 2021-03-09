<div class="shadow-2xl p-3 mb-3">
    <p class="h3">{{ __('My profile') }}</p>
    <p class="text-blue-500 my-3">{{ __('Your data:') }}</p>

    {{-- Photo --}}
    <div class="d-flex justify-center my-3">
        <img class="w-20 h-20 rounded-full" src="{{ route('photo', ['filename' => Auth::user()->photo]) }}" />
    </div>

    {{-- Status --}}
    @include('user.status')
</div>
<hr>
<form method="POST" action="{{ route('update') }}" enctype="multipart/form-data" class="p-3">
    @csrf  
    
    <div class="form-group">
        <label for="photo">{{ __('Photo') }}</label>
        <input  type="file" 
                id="photo"
                name="photo"
                class="input @error('name') is-invalid @enderror" />
    </div>

    {{-- Name --}}
    <div class="form-group">
        <label for="name">{{ __('Name') }}</label>
        <input  type="text" 
                id="name"
                name="name"
                value="{{ Auth::user()->name }}"
                class="input @error('name') is-invalid @enderror"
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
                class="input @error('username') is-invalid @enderror"
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
                class="input @error('email') is-invalid @enderror"
                autocomplete="off"
                required />

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    {{-- Status --}}
    <div class="form-group">
        <label for="status">{{ __('Status') }}</label>
        <select name="status"
                id="status"
                class="input @error('status') is-invalid @enderror"
                autocomplete="off"
                required>
            <option value="0" @if (Auth::user()->status == 0) selected @endif>{{ __('Offline') }}</option>
            <option value="1" @if (Auth::user()->status == 1) selected @endif>{{ __('Online') }}</option>
            <option value="2" @if (Auth::user()->status == 2) selected @endif>{{ __('Busy') }}</option>
        </select>

        @error('status')
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
