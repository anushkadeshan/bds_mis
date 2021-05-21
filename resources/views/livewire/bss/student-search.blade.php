<div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2 teal-100 p-2">
    <div class="relative">
        <label class="text-gray-700 dark:text-gray-200" for="query">Search Student</label>
        <input wire:model="query" wire:keydown.escape="reset" wire:keydown.tab="reset" wire:keydown.ArrowUp="decrementHighlight" wire:keydown.ArrowDown="incrementHighlight" wire:keydown.enter="selectStudent" id="query" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
        />
        <div wire:loading class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg">
            <div class="list-item">Searching...</div>
        </div>
        @if(!empty($students))

        <ul class="bg-white border border-gray-100 w-full mt-2 ">
            @foreach($students as $i => $student)
            <li wire:click.prevent="selectStudent({{$student['id']}})" class="pl-8 pr-2 py-1 border-b-2 border-gray-100 relative cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                <b>{{$student['name']}}</b>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
