<div class="bg-white rounded-lg shadow-xl p-3 mb-3">
    <div>
        <h5>Profile</h5>
        <p>Your personal information</p>
    </div>

    <table class="my-3 table">
        <tbody>
            <tr></tr>
            <tr>
                <td>Avatar:</td>
                <td class="h6">@include('user.photo')</td>
            </tr>

            <tr>
                <td>Name:</td>
                <td class="h6">{{ Auth::user()->name }}</td>
            </tr>
            
            <tr>
                <td>Username:</td>
                <td class="h6">{{ Auth::user()->username }}</td>
            </tr>

            <tr>
                <td>Email:</td>
                <td class="h6">{{ Auth::user()->email }}</td>
            </tr>

            <tr>
                <td>Password:</td>
                <td class="h6">********</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="bg-white rounded-lg shadow-xl p-3 mb-3">
    <div class="mb-3">
        <h5>Dark Mode</h5>
        <p>Choose between Dark Mode and Light Mode</p>
    </div>

    <form method="POST">
        <div class="form-group">
            <input type="radio" name="mode" id="dark" @if(Auth::user()->dark) checked @endif />
            <label for="dark">Dark</label><br>
            
            <input type="radio" name="mode" id="light" @if(!Auth::user()->dark) checked @endif />
            <label for="light">Light</label>
        </div>

        <div class="form-group">
            <button class="button button-green">{{ __('Save') }}</button>
        </div>
    </form>
</div>