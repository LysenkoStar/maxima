<div x-data="{ open: true }"
     x-show="open"
     @class([
        'alert-success' => $type === 'success',
        'alert-error' => $type === 'error',
        'alert',
        'font-open_sans',
     ])
>
    <p>{{ $message }}</p>
    <button type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close"
            @click="open = false">
        <span aria-hidden="true">×</span>
    </button>
</div>
