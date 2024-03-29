<div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">{{$updateMode ? 'Update Budget Type' : 'Add Budget Type'}}</h5>
                <button type="button" class="btn-bsclose" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @if (session()->has('message'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" id="alert"
                    class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                    </svg>
                    <p>{{ session('message') }}</p>
                </div>
                @endif

                <div class="flex">
                    <span
                        class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Budget Type:</span>
                    <select wire:model="type" class="border border-2 rounded-r px-4 py-2 w-full">
                        <option>Select Option</option>
                        <option value="Monthly Budget">Monthly Budget</option>
                        <option value="Quarterly Budget">Quarterly  Budget</option>
                        <option value="Bi Annual Budget">Bi Annual Budget</option>
                        <option value="Annual Budget">Annual Budget</option>
                        <option value="Total Program Budget">Total Program Budget</option>
                    </select>
                </div>
                @error('type') <span class="text-danger">*{{ $message }}</span> @enderror
                <br />
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Year
                        :</span>
                    <input wire:model="year" class="border border-2 rounded-r px-4 py-2 w-full" type="number"
                        name="name" spellcheck="false" data-ms-editor="true">

                </div>
                @error('year') <span class="text-danger">*{{ $message }}</span> @enderror
                <br />
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Start Date :</span>
                    <input wire:model="start_date" class="border border-2 rounded-r px-4 py-2 w-full" type="date"
                        name="start_date" spellcheck="false" data-ms-editor="true">

                </div>
                @error('start_date') <span class="text-danger">*{{ $message }}</span> @enderror
                <br />
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">End Date :</span>
                    <input wire:model="end_date" class="border border-2 rounded-r px-4 py-2 w-full" type="date"
                        name="end_date" spellcheck="false" data-ms-editor="true">

                </div>
                @error('end_date') <span class="text-danger">*{{ $message }}</span> @enderror
                <br />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @if($updateMode)
                <button type="button" wire:click="update()" class="btn btn-primary">Update changes</button>
                @else
                <button type="button" wire:click="store()" class="btn btn-primary">Save changes</button>
                @endif
            </div>
        </div>
    </div>

</div>
