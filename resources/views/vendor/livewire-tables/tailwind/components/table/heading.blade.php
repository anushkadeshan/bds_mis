@props([
'column',
'sortingEnabled' => true,
'sortable' => null,
'direction' => null,
'text' => null,
'customAttributes' => [],
])

<th {{ $attributes->merge(array_merge(['class' => 'px-3 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800'],
    $customAttributes)) }}
    >
    @unless ($sortingEnabled && $sortable)
    <span
        class="block py-6 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase dark:text-gray-400">
        {{ $text ?? $slot }}
    </span>
    @else
    <button wire:click="sortBy('{{ $column }}', '{{ $text ?? $column }}')" {{ $attributes->except('class') }}
        class="flex items-center space-x-1 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase group focus:outline-none focus:underline dark:text-gray-400"
        >
        <span>{{ $text ?? $slot }}</span>

        <span class="relative flex items-center">
            @if ($direction === 'asc')
            <svg class="w-3 h-3 group-hover:opacity-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
            </svg>
            <svg class="absolute w-3 h-3 opacity-0 group-hover:opacity-100" fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
            @elseif ($direction === 'desc')
            <div class="absolute opacity-0 group-hover:opacity-100">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                </svg>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
            <svg class="w-3 h-3 group-hover:opacity-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
            @else
            <svg class="w-3 h-3 transition-opacity duration-300 opacity-0 group-hover:opacity-100" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
            </svg>
            @endif
        </span>
    </button>
    @endif
</th>
