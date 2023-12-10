<div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
    <div class="nav__language">
        <select name="locale" id="change_language">
            @foreach($available_locales as $locale => $language)
                <option value="{{ $locale }}"
                        data-image="{{ asset("images/icon_$locale.svg") }}"
                        data-url="{{ route(name: 'lang.switch', parameters: ['lang' => $locale]) }}"
                        @if($locale === $current_locale) selected @endif>
                    {{ __($language) }}
                </option>
            @endforeach
        </select>
    </div>
</div>
