@if(session('success') || session('error'))
    <x-alert></x-alert>
@endif
