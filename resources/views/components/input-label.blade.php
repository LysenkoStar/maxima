@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-darkblue-500']) }}>
    {{ $value ?? $slot }}
</label>
