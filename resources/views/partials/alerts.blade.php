@if((session('alert-type') && session('alert-message')))
    <x-alert type="{{ session('alert-type') }}" message="{{ session('alert-message') }}"></x-alert>
@endif
