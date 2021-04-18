<div class="flex justify-between align-center py-2" style="font-size: 16px">
    <div>
        <i class="far fa-heart">@if (count($publication->likes) > 0) {{ count($publication->likes) }} @endif</i>
        <i class="far fa-comment"> {{ count($publication->comments) }}</i>
    </div>
    <div>
        <i class="far fa-clock">
            <span class="ml-2 text-gray-600" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                {{ \FormatTime::LongTimeFilter($publication->created_at) }}
            </span>
        </i>
    </div>
</div>