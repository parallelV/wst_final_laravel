@if ($paginator->hasPages())
    <nav class="pagination" role="navigation" aria-label="Pagination Navigation">
        <p class="pagination-summary">
            Showing {{ $paginator->firstItem() ?? 0 }} to {{ $paginator->lastItem() ?? 0 }} of {{ $paginator->total() }} results
        </p>

        <div class="pagination-controls">
            @if ($paginator->onFirstPage())
                <span aria-disabled="true">&laquo; Previous</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span>{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="active" aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $paginator->url($page) }}" aria-label="Go to page {{ $page }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">Next &raquo;</a>
            @else
                <span aria-disabled="true">Next &raquo;</span>
            @endif
        </div>
    </nav>
@endif
