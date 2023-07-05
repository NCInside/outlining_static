@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">

        <div class="flex-1 flex items-center justify-between">
            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 cursor-default rounded-l-md leading-5" aria-hidden="true">
                                <svg class="w-10 h-10" viewBox="0 0 45 52" fill="none">
                                    <path d="M0 26L45 0.0192375V51.9808L0 26Z" fill="white"/>
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-10 h-10 hover:transform hover:scale-125 transition duration-300" viewBox="0 0 45 52" fill="none">
                                <path d="M0 26L45 0.0192375V51.9808L0 26Z" fill="white"/>
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span class="w-12 h-12 rounded-full border-4 border-gray-100 flex items-center justify-center mt-1 shadow-lg" aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-2xl font-bold text-white cursor-default leading-5 hebrew">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-2xl font-bold text-white leading-5 hover:transform hover:scale-125 transition duration-100 hebrew" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                            <svg class="w-10 h-10 hover:transform hover:scale-125 transition duration-300" viewBox="0 0 45 52" fill="none">
                                <path d="M45 26L0 51.9808L0 0.0192375L45 26Z" fill="white"/>
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 cursor-default rounded-r-md leading-5" aria-hidden="true">
                                <svg class="w-10 h-10" viewBox="0 0 45 52" fill="none">
                                    <path d="M45 26L0 51.9808L0 0.0192375L45 26Z" fill="white"/>
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
