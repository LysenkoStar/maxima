@unless ($breadcrumbs->isEmpty())
    <nav class="breadcrumbs" aria-label="breadcrumb">
        <ol class="breadcrumbs__list flex flex-wrap	list-none text-sm text-silver-500 font-open_sans">
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!is_null($breadcrumb->url) && !$loop->last)
                    <li class="breadcrumbs__item">
                        <a href="{{ $breadcrumb->url }}">
                            {{ $breadcrumb->title }}
                        </a>
                    </li>
                @else
                    <li class="breadcrumbs__item breadcrumbs__item_active font-open_sans_sb" aria-current="page">
                        {{ $breadcrumb->title }}
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
@endunless
