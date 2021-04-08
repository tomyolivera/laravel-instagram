@switch($user->status)
    @case(0)
        <div class='text-gray-500'><i class='far fa-circle font-weight-bold'></i> <span>{{ __('Offline') }}</span></div>
    @break

    @case(1)
        <div class='text-green-500'><i class='far fa-circle font-weight-bold'></i> <span>{{ __('Online') }}</span></div>
    @break
    
    @case(2)
        <div class='text-yellow-500'><i class='far fa-circle font-weight-bold'></i> <span>{{ __('Busy') }}</span></div>
    @break
@endswitch