<div class="d-block">
    <img class="w-12 h-12 rounded-full" 
    src="{{ 
        strlen(Auth::user()->photo) <= 25
        ? route('user.photo', ['filename' => Auth::user()->photo]) 
        : Auth::user()->photo
    }}" />
</div>