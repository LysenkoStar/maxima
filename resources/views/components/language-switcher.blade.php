<select name="locale" id="change_language" class="bg-transparent text-darkblue-500">
    @foreach(config('app.available_locales') as $locale => $language)
        <option value="{{ $locale }}"
                data-image="{{ asset("images/icon_$locale.svg") }}"
                data-url="{{ route(name: 'lang.switch', parameters: ['lang' => $locale]) }}"
                @if($locale === app()->getLocale()) selected @endif>
            {{ __($language) }}
        </option>
    @endforeach
</select>
<script>

</script>
