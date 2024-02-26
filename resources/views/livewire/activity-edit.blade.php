<div>
    @if(session()->has('message'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" id="alert" class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
        <p>{{ session('message') }}</p>
    </div>
    @endif
    <div class="bg-white p-4">
        <h4>{{$activity->causer->name}} has {{$activity->description}} data in "{{$activity->subject_type}}"</h4>
    </div>
    <div class="grid grid-cols-2 gap-4">
        <div class="bg-white p-4">
            <h5 class="text-center bg-yellow-200 p-2 text-yellow-800 w-full rounded-md">Old Data</h5>
            @php
            $properties = json_decode($changes);
            @endphp
            <div class="ml-3">
                @if(isset($properties->old))
                @foreach($properties->old as $key => $value)
                    {{str_replace('_',' ',$key)}} : {{$value}} <br>
                @endforeach
                @endif
            </div>

        </div>
        <div class="bg-white p-4">
            <h5 class="text-center bg-green-200 p-2 text-green-800 w-full rounded-md">New Data / Attributes</h5>
            <div class="ml-3">
                @if(isset($properties->old))
                @foreach($properties->attributes as $key => $attributes)
                        {{str_replace('_',' ',$key)}} : {{$attributes}} <br>
                    @endforeach
                @else
                @foreach($properties->attributes as $key => $attributes)
                    {{str_replace('_',' ',$key)}} : {{$attributes}} <br>
                    @endforeach
                @endif
            </div>

        </div>
    </div>
    @if($activity->description!=='deleted')
    <div class="mx-auto mt-3">
        <div class="flex ">
            <div class="text-right ">
                <button wire:click.prevent="approve" class="text-white bg-green-700 hover:bg-green-600 font-bold py-2 px-4 rounded inline-flex items-center">
                    <svg wire:loading wire:target="approve" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span wire:loading wire:target="approve">Proccessing</span>
                    <span wire:loading.remove wire:target="approve"><i class="fa fa-save"></i> Approve</span>
                </button>
            </div>
        </div>
    </div>
    <div class="mx-auto mt-10 mb-3">
        <div class="mb-2">
            <input placeholder="Enter reject reason" wire:model="reason" id="reason" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('reason') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div class="flex ">
            <div class="text-right ">
                <button wire:click.prevent="reject" class="text-white bg-red-700 hover:bg-red-600 font-bold py-2 px-4 rounded inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span wire:loading wire:target="reject"> Proccessing</span>
                    <span wire:loading.remove wire:target="reject"> Reject</span>
                </button>
            </div>
        </div>
    </div>
    @endif
</div>
