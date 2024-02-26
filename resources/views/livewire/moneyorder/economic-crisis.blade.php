<div>
    @if(session()->has('message'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" id="alert" class="flex items-center px-4 py-3 text-sm font-bold text-white bg-green-500" role="alert">
        <svg class="w-4 h-4 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
        <p>{{ session('message') }}</p>
    </div>
    @endif
    <div class="p-6 bg-white border rounded shadow">
        <div class="relative">
            <div class="flex">
                <div class="w-4/6 felx-1">
                    <input wire:model="query" wire:keydown.escape="reset" placeholder="Search house hold by name" wire:keydown.tab="reset" wire:keydown.ArrowUp="decrementHighlight" wire:keydown.ArrowDown="incrementHighlight" wire:keydown.enter="selectStudent" id="query" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"/>
                </div>
                <span wire:loading wire:target="query" class="pl-2 mt-1 felx-1 fa-2x">
                    <i class="fas fa-circle-notch fa-spin"></i>
                </span>
            </div>

            <div wire:loading  wire:target="query" class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
                <div class="list-item">Searching...</div>
            </div>
            @error('family_id') <span class="text-danger">*{{ $message }}</span> @enderror
            @if(!empty($families))
            <ul class="w-full mt-2 bg-white border border-gray-100 ">
                <li wire:click.prevent="clear" class="relative py-1 pl-8 pr-2 border-b-2 border-gray-100 cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                    <b>Clear List</b>
                </li>
                @foreach($families as $i => $family)
                <li wire:click.prevent="selectFamily({{$family['id']}})" class="relative py-1 pl-8 pr-2 border-b-2 border-gray-100 cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                    <b>{{$family['serial_number']}} | {{$family['hh_name']}}</b>
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
    <div>
        <div class="w-full p-6 mt-10 bg-white border rounded shadow">
            <h5 class="mt-0 mb-4 text-3xl font-bold">Upload below files @if($hh_name) for {{$hh_name}} @endif</h5>
            <div class="text-sm text-gray-700">
                <div class="grid justify-between grid-cols-2 gap-4">

                    <div class="border-gray-500 border-dotted bg-grey-lighter">
                        <label class="flex flex-col items-center px-4 py-6 m-3 tracking-wide bg-white border rounded-lg shadow-lg cursor-pointer text-blue border-blue hover:bg-blue hover:text-white">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <span class="mt-2 text-base leading-normal uppercase">Money Order Scanned copy</span>
                            <span class="mt-2 text-xs leading-normal text-red">*allow only pdf</span>
                            <input type='file' wire:model="money" class="hidden" />
                        </label>
                        <br>
                        <div class="px-4">
                            @error('money') <span class="text-danger">*{{ $message }}</span> @enderror
                            <div class="text-black" wire:loading wire:target="money">Uploading...</div>
                            @if($filename2)
                                <div class="text-black">{{$filename2}}</div>
                            @endif

                            <button wire:click.prevent="saveMoneyOrderPhoto" class="inline-flex items-center px-4 py-2 font-bold text-white bg-green-700 rounded hover:bg-green-600">
                                <svg wire:loading wire:target="saveMoneyOrderPhoto" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span wire:loading wire:target="saveMoneyOrderPhoto">Saving</span>
                                <span wire:loading.remove wire:target="saveMoneyOrderPhoto"><i class="fa fa-save"></i> Upload</span>
                            </button>
                        </div>

                    </div>
                    <div class="border-gray-500 border-dotted bg-grey-lighter">
                        <label class="flex flex-col items-center px-4 py-6 m-3 tracking-wide bg-white border rounded-lg shadow-lg cursor-pointer text-blue border-blue hover:bg-blue hover:text-white">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <span class="mt-2 text-base leading-normal uppercase">Issuing the money order</span>
                            <span class="mt-2 text-sm leading-normal text-red">*photo not should be greater than 1MB</span>
                            <input type='file' wire:model="photo" class="hidden" />
                        </label>
                        <br>
                        <div class="px-4">
                            @error('photo') <span class="text-danger">*{{ $message }}</span> @enderror
                            <div class="text-black" wire:loading wire:target="photo">Uploading...</div>
                            @if ($photo)
                                <img class="w-40" src="{{ $photo->temporaryUrl() }}">
                            @endif
                            <button wire:click.prevent="saveMoneyOrderGivingPhoto" class="inline-flex items-center px-4 py-2 font-bold text-white bg-green-700 rounded hover:bg-green-600">
                                <svg wire:loading wire:target="saveMoneyOrderGivingPhoto" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span wire:loading wire:target="saveMoneyOrderGivingPhoto">Saving</span>
                                <span wire:loading.remove wire:target="saveMoneyOrderGivingPhoto"><i class="fa fa-save"></i> Upload</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </div>
</div>
