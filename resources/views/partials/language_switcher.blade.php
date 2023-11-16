<div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
    @foreach($available_locales as $locale => $language)
        @if($locale === $current_locale)
            <div class="lang_item ml-2 mr-2">
                <img src="{{ asset("images/icon_$locale.svg") }}" alt="Language {{$language}}" class="inline-block">
                <a href="{{ route(name: 'lang.switch', parameters: ['lang' => $locale]) }}" class="text-gray-700 text-sm" style="color:red;">
                    {{ __($language) }}
                </a>
            </div>
        @else
            <div class="lang_item ml-2 mr-2">
                <img src="{{ asset("images/icon_$locale.svg") }}" alt="Language {{$language}}" class="inline-block">
                <a href="{{ route(name: 'lang.switch', parameters: ['lang' => $locale]) }}" class="text-sm">
                    {{ __($language) }}
                </a>
            </div>
        @endif
    @endforeach

{{--    <select name="locale">--}}
{{--        @foreach($available_locales as $language => $locale)--}}
{{--            <option value="{{ $locale }}">--}}
{{--                <a href="language/{{ $locale }}">--}}
{{--                    {{ $language }}--}}
{{--                </a>--}}
{{--            </option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
</div>

{{--<script>--}}
{{--    $( document ).ready(function() {--}}
{{--        $('select[name="locale"]').change(function(e) {--}}
{{--            var value = $(this).val();--}}

{{--            window.location.href = "/language/" + value;--}}
{{--            {{ route(name: 'change-locale', parameters: ['locale' => 'ru']) }}--}}
{{--        })--}}
{{--    });--}}
{{--</script>--}}
