<div>
    @if ($status == 0)
        <div class="flex align-center text-secondary">
            <i class="fas fa-circle"></i>
            <span>Offline</span>
        </div>
        
    @elseif($status == 1)
        <div class="flex align-center text-success">
            <i class="fas fa-circle"></i>
            <span>Online</span>
        </div>
    @else
        <div class="flex align-center text-info">
            <i class="fas fa-circle"></i>
            <span>Busy</span>
        </div>
    @endif
</div>