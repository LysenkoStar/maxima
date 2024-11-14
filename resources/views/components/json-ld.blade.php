@if(is_iterable($micromarkup) || is_array($micromarkup) || is_a($micromarkup, \Illuminate\Support\Collection::class))
    @foreach($micromarkup as $micro_data)
        <script type="application/ld+json">
            {!! $micro_data !!}
        </script>
    @endforeach
@else
    <script type="application/ld+json">
        {!! $micromarkup !!}
    </script>
@endif
