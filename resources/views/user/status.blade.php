//@if (Auth::user()->status == 0)
//    <div class='flex align-center justify-center'><i class='text-gray-500'>fiber_manual_record</i> <span>{{ __('Offline') }}</span></div>
//@elseif (Auth::user()->status == 1)
//    <div class='flex align-center justify-center'><i class='text-green-500'>fiber_manual_record</i> <span>{{ __('Online') }}</span></div>
//@elseif (Auth::user()->status == 2)
//    <div class='flex align-center justify-center'><i class='text-yellow-500'>fiber_manual_record</i> <span>{{ __('Busy') }}</span></div>
//@endif

@switch(Auth::user()->status)
    @case(0)
        <div class='flex align-center justify-center'><i class='text-gray-500'>fiber_manual_record</i> <span>{{ __('Offline') }}</span></div>
    @break

    @case(1)
        <div class='flex align-center justify-center'><i class='text-green-500'>fiber_manual_record</i> <span>{{ __('Online') }}</span></div>
    @break
    
    @case(2)
        <div class='flex align-center justify-center'><i class='text-yellow-500'>fiber_manual_record</i> <span>{{ __('Busy') }}</span></div>
    @break
  @endswitch
