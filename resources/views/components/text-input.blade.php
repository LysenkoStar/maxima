@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-[1px] border-darkblue-500 bg-transparent focus:border-accent-500 focus:border-accent-500 rounded shadow-sm outline-none autofill:bg-transparent']) !!}>
