@unless ($breadcrumbs->isEmpty())
    <nav class="breadcrumbs" aria-label="breadcrumb">
        <ol class="breadcrumbs__list flex flex-wrap	list-none text-sm text-silver-500 font-open_sans" itemscope itemtype="https://schema.org/BreadcrumbList">
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!is_null($breadcrumb->url) && !$loop->last)
                    <li class="breadcrumbs__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="{{ $breadcrumb->url }}">
                            <span itemprop="name">{{ $breadcrumb->title }}</span>
                            <meta itemprop="position" content="{{ $loop->index }}" />
                        </a>
                    </li>
                @else
                    <li class="breadcrumbs__item breadcrumbs__item_active font-open_sans_sb" aria-current="page" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <span itemprop="item">
                            <span itemprop="name">{{ $breadcrumb->title }}</span>
                            <meta itemprop="position" content="{{ $loop->index }}" />
                        </span>
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
@endunless
