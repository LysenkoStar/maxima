<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center px-4 py-2 bg-accent-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest outline-none hover:bg-accent-400 focus:bg-accent-500 active:bg-accent-500 focus:outline-none focus:ring-offset-2 transition ease-in-out duration-150'
    ]) }}>
    {{ $slot }}
</button>
