@if ($paginationEnabled && $showPerPage)
<div class="w-full ml-0 mb-7 md:w-auto md:ml-2">
    <select wire:model="perPage" id="perPage"
        class="block w-full p-2 transition ease-in-out border-gray-300 rounded-md shadow-sm durat ion-150 sm:text-sm sm:leading-5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
        @foreach ($perPageAccepted as $item)
        <option value="{{ $item }}">{{ $item === -1 ? __('All') : $item }}</option>
        @endforeach
    </select>
</div>
@endif
