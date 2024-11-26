<style>
    :root{
    /* Colors */
    --bg-color: #401F71;
    --primary: #6635B1;
    --secondary: #FFFFFF;
    --dark: #121212;
    --primary-content: #F78F4B;
    --secondary-content: #ffe682;
    --first-accent: #DAD9D9;
    --second-accent: #A1A1A1;
    --fill-second: #870680;
    --fill: #daa3ff;
    }
    .pagination-custom .page-item .page-link {
        background-color: var(--secondary-content); /* Primary Fill */
        color: var(--secondary); /* White text */
        border: 1px solid var(--fill-second); /* Secondary Fill Border */
        transition: all 0.3s ease-in-out;
    }

    .pagination-custom .page-item.active .page-link {
        background-color: var(--primary-content); /* Primary Color for Active */
        border-color: var(--dark); /* Dark Border */
        color: var(--dark); /* Highlighted Text Color */
        font-weight: bold;
    }

    .pagination-custom .page-item.disabled .page-link {
        background-color: var(--first-accent); /* Light Gray for Disabled */
        color: var(--second-accent); /* Muted Gray Text */
        border-color: var(--second-accent); /* Subtle Gray Border */
    }

    .pagination-custom .page-item:hover .page-link {
        background-color: var(--secondary-content); /* Background Color on Hover */
        border-color: var(--primary); /* Primary Border on Hover */
        color: var(--dark); /* Lighter Text on Hover */
    }

    .text-warning {
        color: var(--primary-content) !important; /* Use Primary Content for Text */
    }

    .pagination-custom {
        display: flex;
        justify-content: center;
        margin: 20px 0;
    }

    .pagination-custom .page-link {
        padding: 10px 15px;
        font-size: 14px; /* Standard Font Size */
        text-decoration: none;
    }

    .pagination-custom .page-link:focus {
        outline: none; /* Remove Default Focus */
        box-shadow: 0 0 5px var(--fill-second); /* Subtle Glow on Focus */
    }


</style>



@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between my-3">
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination pagination-custom">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.previous')</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.next')</span>
                    </li>
                @endif
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p class="small text-warning">
                    {!! __('Showing') !!}
                    <span class="fw-bold">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="fw-bold">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="fw-bold">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <ul class="pagination pagination-custom">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
