{{--@if ($paginator->hasPages())--}}

{{--    <ul class="pagination" role="navigation">--}}
{{--        Previous Page Link--}}
{{--        @if ($paginator->onFirstPage())--}}
{{--            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">--}}
{{--                <span aria-hidden="true">&lsaquo;</span>--}}
{{--            </li>--}}
{{--        @else--}}
{{--            <li>--}}
{{--                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>--}}
{{--            </li>--}}
{{--        @endif--}}

{{--        Pagination Elements--}}
{{--        @foreach ($elements as $element)--}}
{{--            "Three Dots" Separator--}}
{{--            @if (is_string($element))--}}
{{--                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>--}}
{{--            @endif--}}

{{--            Array Of Links--}}
{{--            @if (is_array($element))--}}
{{--                @foreach ($element as $page => $url)--}}
{{--                    @if ($page == $paginator->currentPage())--}}
{{--                        <li class="active" aria-current="page"><span>{{ $page }}</span></li>--}}
{{--                    @else--}}
{{--                        <li><a href="{{ $url }}">{{ $page }}</a></li>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            @endif--}}
{{--        @endforeach--}}

{{--        Next Page Link--}}
{{--        @if ($paginator->hasMorePages())--}}
{{--            <li>--}}
{{--                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>--}}
{{--            </li>--}}
{{--        @else--}}
{{--            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">--}}
{{--                <span aria-hidden="true">&rsaquo;</span>--}}
{{--            </li>--}}
{{--        @endif--}}
{{--    </ul>--}}
{{--@endif--}}

{{--@if ($paginator->hasPages())--}}
{{--<div class="c-pagination">--}}

{{--    <ul class="c-pagination__list" role="navigation">--}}
{{--        @if ($paginator->onFirstPage())--}}
{{--            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">--}}
{{--                <span aria-hidden="true"></span>--}}
{{--            </li>--}}
{{--        @else--}}
{{--            <li class="c-pagination__list-item">--}}
{{--                <a class="c-pagination__link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lt;</a>--}}
{{--            </li>--}}
{{--        @endif--}}

{{--        @foreach ($elements as $element)--}}
{{--            @if (is_string($element))--}}
{{--                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>--}}
{{--            @endif--}}

{{--            @if (is_array($element))--}}
{{--                @foreach ($element as $page => $url)--}}
{{--                    @if ($page == $paginator->currentPage())--}}
{{--                        <li class="c-pagination__list-item c-pagination__list-item--now active" aria-current="page"><span class="c-pagination__link c-pagination__link--now">{{ $page }}</span></li>--}}
{{--                    @else--}}
{{--                        <li class="c-pagination__list-item"><a class="c-pagination__link" href="{{ $url }}">{{ $page }}</a></li>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            @endif--}}
{{--        @endforeach--}}

{{--        @if ($paginator->hasMorePages())--}}
{{--            <li class="c-pagination__list-item">--}}
{{--                <a class="c-pagination__link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&gt;</a>--}}
{{--            </li>--}}
{{--        @else--}}
{{--            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">--}}
{{--                <span aria-hidden="true"></span>--}}
{{--            </li>--}}
{{--        @endif--}}
{{--    </ul>--}}
{{--</div>--}}
{{--@endif--}}