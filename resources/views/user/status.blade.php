<div>
    @if (Auth::user()->status == 0)
        <div class="flex align-center text-gray-500">
            <i class="fas fa-circle"></i>
            <span>Offline</span>
        </div>
        
    @elseif(Auth::user()->status == 1)
        <div class="flex align-center text-green-500">
            <i class="fas fa-circle"></i>
            <span>Online</span>
        </div>
    @else
        <div class="flex align-center text-orange-500">
            <i class="fas fa-circle"></i>
            <span>Busy</span>
        </div>
    @endif
</div>