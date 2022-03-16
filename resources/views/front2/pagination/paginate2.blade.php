@if ($paginator->hasPages())
    <div class="pagination-center">
        <ul class="pagination">
            @if (!$paginator->onFirstPage())
                <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link">Trang trước</a>
                </li>
            @endif
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a href="javascript:void(0)" class="page-link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach


            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link">Trang sau</a></li>
            @endif
        </ul>


    </div>

@endif
