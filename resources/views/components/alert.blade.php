<div x-data="{ open: true }"
     x-show="open"
     @class([
        'alert-success' => session('success'),
        'alert-error' => session('error'),
        'alert',
        'font-open_sans',
     ])
>
    <p>{{ session('success') ?? session('error') }}</p>
    <button type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close"
            @click="open = false">
        <span aria-hidden="true">×</span>
    </button>
</div>
