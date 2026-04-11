@if ($paginator->hasPages())
    <nav class="admin-pagination" role="navigation" aria-label="Pagination Navigation">
        <div class="admin-pagination__list">

            @if ($paginator->onFirstPage())
                <span class="admin-pagination__item admin-pagination__item--arrow admin-pagination__item--disabled">‹</span>
            @else
                <a class="admin-pagination__item admin-pagination__item--arrow" href="{{ $paginator->previousPageUrl() }}" rel="prev">‹</a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="admin-pagination__item admin-pagination__item--disabled">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="admin-pagination__item admin-pagination__item--current">{{ $page }}</span>
                        @else
                            <a class="admin-pagination__item" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a class="admin-pagination__item admin-pagination__item--arrow" href="{{ $paginator->nextPageUrl() }}" rel="next">›</a>
            @else
                <span class="admin-pagination__item admin-pagination__item--arrow admin-pagination__item--disabled">›</span>
            @endif

        </div>
    </nav>
@endif