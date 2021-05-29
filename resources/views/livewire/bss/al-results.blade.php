<div>
    @if (session()->has('message'))
    <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
        <p>{{ session('message') }}</p>
    </div>
    @endif

    <div class="border-b-2 py-2 mt-3">
        <div class="flex-1">
            <div class="text-lg font-bold text-gray-700 leading-tight">
                @if($al_results_available) Edit A/L results of {{$student_name}} or search a new student @else @if($student_name!==null) Add AL results of {{$student_name}} or search a new student @endif @endif
            </div>
        </div>
    </div>
    <livewire:bss.student-search/>
    <div class="py-4">

        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-4">

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="Medium">Stream</label>
                <select wire:model="stream" id="stream" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <option  value="">Select Option</option>
                    <option  value="bio">Bio science</option>
                    <option  value="arts">Arts </option>
                    <option value="com">Commerce and Technology  </option>
                    <option  value="maths">Maththematics</option>
                    <option  value="tech">Technology</option>
                </select> @error('stream') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="Medium">School</label>
                <input wire:model="school" id="school" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('school') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="Exam_Year">Exam Year</label>
                <input wire:model="year" id="year" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('year') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="index_No">Index No</label>
                <input wire:model="index_no" id="index_no" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('index_no') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="AL_A">Number of "A" s</label>
                <input wire:model="AL_A" id="AL_A" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('AL_A') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="AL_B">Number of "B" s</label>
                <input wire:model="AL_B" id="AL_B" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('AL_B') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="AL_C">Number of "C" s</label>
                <input wire:model="AL_C" id="AL_C" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('AL_C') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="AL_S">Number of "S" s</label>
                <input wire:model="AL_S" id="AL_S" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('AL_S') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="AL_W">Number of "W" s</label>
                <input wire:model="AL_W" id="AL_W" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('AL_W') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="pass_fail">Pass or Fail</label>
                <select wire:model="pass_fail" id="pass_fail" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="">Select Option</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select> @error('pass_fail') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="attempt">Attempt</label>
                <select wire:model="attempt" id="attempt" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <option value="">Select Option</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                </select> @error('attempt') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="z_Score">Z Score</label>
                <input wire:model="z_score" id="z_Score" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('z_score') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="district_rank">District Rank</label>
                <input wire:model="district_rank" id="district_rank" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('district_rank') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="island_rank">Island Rank</label>
                <input wire:model="island_rank" id="island_rank" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('island_rank') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>

        </div>
        <div class="mx-auto mt-5">
            <div class="flex ">
                <div class="text-right ">
                    <button wire:click.prevent="saveData" class="text-white bg-green-700 hover:bg-green-600 font-bold py-2 px-4 rounded inline-flex items-center">
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
@push('page_scripts')

<script>
    $(document).ready(function() {
        $('#select2').select2();
        $('#select2').on('change', function(e) {
            var item = $('#select2').select2("val");
            @this.set('student_id', item);
        });
    });
</script>

@endpush
