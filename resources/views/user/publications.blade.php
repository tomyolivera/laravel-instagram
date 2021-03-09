{{-- <div class="p-3 mb-3">
    <p class="h3">{{ __('My publications') }}</p>
</div>
<hr> --}}
{{-- Publications --}}
<div class="flex my-3" style="width:100%; height:50vh">
    <div class="row flex justify-center align-center">
        @for ($i = 0; $i < 10; $i++)
            <div class="col-md-3 mr-2 mb-2">
                <img class="w-100 rounded" src="{{ route('photo', ['filename' => Auth::user()->photo]) }}" />
            </div>
        @endfor
    </div>
</div>