
    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
        <div>
            <label class="text-gray-700 dark:text-gray-200" for="schol_given_on">Scholarship given on</label>
            <input wire:model="schol_given_on" id="schol_given_on" type="date" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('schol_given_on') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="text-gray-700 dark:text-gray-200" for="ref_no">Ref No</label>
            <input wire:model="ref_no" id="ref_no" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('ref_no') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="text-gray-700 dark:text-gray-200" for="emailAddress">Scholarship Type</label>
            <select name="schol_type" wire:model="schol_type" id="schol_type" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                <option value="">Select a Option</option>
                <option value="Grade 05">Grade 05</option>
                <option value="Ordinery Level">Ordinery Level</option>
                <option value="Advanced Level">Advanced Level</option>
                <option value="University">University</option>
            </select> @error('schol_type') <span class="text-danger">*{{ $message }}</span> @enderror

        </div>
        <div class=" mx-auto " x-show="step != 'complete'">
            <div class="mx-auto">
                <div class="flex justify-between">
                    <div class="w-1/2">
                        <button x-show="step > 1" @click="step--" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-gray-600"><i class="fas fa-step-backward"></i> Previous</button>
                    </div>
                    <div class="w-1/2 text-right">
                        <button x-show="step === 1" wire:click.prevent="save" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save <i class="fas fa-step-forward"></i></button>
                        @if($step1)
                        1dfdfdf
                        @endif
                        @if($step1)
                       button
                        @endif
                        <button x-show="step === 5" wire:click.prevent="saveData" class="text-white bg-green-700 hover:bg-green-600 font-bold py-2 px-4 rounded inline-flex items-center">
                            <svg wire:loading wire:target="saveData" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span wire:loading wire:target="saveData">Saving</span>
                            <span wire:loading.remove wire:target="saveData"><i class="fa fa-save"></i> Save</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
