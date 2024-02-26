<div>
    <div x-data="app()" x-cloak>
        <div class="mx-auto px-4 py-4">
            @if (session()->has('message'))
            <div id="alert" class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                </svg>
                <p>{{ session('message') }}</p>
            </div>
            @endif
            <div x-show.transition="step != 'complete'">
                <!-- Top Navigation -->
                <div class="border-b-2 py-2">
                    <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight"
                        x-text="`Step: ${step} of 5`"></div>
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex-1">
                            <div x-show="step === 1">
                                <div class="text-lg font-bold text-gray-700 leading-tight">Persoanl Information</div>
                            </div>

                            <div x-show="step === 2">
                                <div class="text-lg font-bold text-gray-700 leading-tight">Education Information</div>
                            </div>

                            <div x-show="step === 3">
                                <div class="text-lg font-bold text-gray-700 leading-tight">Language Proficiency</div>
                            </div>

                            <div x-show="step === 4">
                                <div class="text-lg font-bold text-gray-700 leading-tight">Followed Courses Details
                                </div>
                            </div>

                            <div x-show="step === 5">
                                <div class="text-lg font-bold text-gray-700 leading-tight">Current Status and Other
                                    Details</div>
                            </div>
                        </div>

                        <div class="flex items-center md:w-64">
                            <div class="w-full bg-white rounded-full mr-2">
                                <div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white"
                                    :style="'width: '+ parseInt(step / 5 * 100) +'%'"></div>
                            </div>
                            <div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 5 * 100) +'%'"></div>
                        </div>
                    </div>
                </div>
                <!-- /Top Navigation -->

                <!-- Step Content -->
                <div class="py-4">
                    <div x-show.transition.in="step === 1">
                        <div class="row">
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="name">Name with initials: &nbsp;&nbsp;</label>
                                    <input wire:model="name" type="text" id="name" name="name" class="form-control">
                                    @error('name') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nic">NIC: &nbsp;&nbsp;</label>
                                    <input wire:model="nic" type="text" id="nic" name="nic" class="form-control">
                                    @error('nic') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <ul class="list-group" id="result"></ul>
                                <div class="form-group">
                                    <label for="nic">Phone Numbers: &nbsp;&nbsp; <small>(seperete with
                                            comma)</small></label>
                                    <input wire:model="phone" type="text" id="phone" name="phone" class="form-control">
                                    @error('phone') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="maritial_status">Marital Status &nbsp;&nbsp;</label>
                                    <select wire:model="maritial_status" name="maritial_status" id="maritial_status"
                                        class="form-control">
                                        <option value="">Select Option</option>
                                        <option>Single</option>
                                        <option>Married</option>
                                        <option>Divorced</option>
                                        <option>Seperated</option>
                                        <option>Dependent</option>
                                        <option>Widow</option>
                                    </select>
                                    @error('maritial_status') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nic">is Youth a BSS beneficiary ? &nbsp;&nbsp;</label>
                                    <select wire:model="bss" name="bss" id="bss" class="form-control">
                                        <option value="">Select Option</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    @error('bss') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                @if($disability)
                                <div class="form-group">
                                    <label for="reason">if Yes Explian</label>
                                    <textarea wire:model="reason" class="form-control" wire:model="schol_type"
                                        id="reason" placeholder="optional" name="reason"></textarea>
                                    @error('reason') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="full_name">Full Name: &nbsp; &nbsp;</label>
                                    <input wire:model="full_name" type="text" name="full_name" id="full_name"
                                        class="form-control">
                                    @error('full_name') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="birth_date">Birth Date: &nbsp; &nbsp;</label>
                                    <input wire:model="birth_date" type="date" name="birth_date" id="birth_date"
                                        class="form-control">
                                    @error('birth_date') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="birth_date">Email Address: &nbsp; &nbsp;</label>
                                    <input wire:model="email" type="email" name="email" id="email" class="form-control">
                                    @error('email') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nationality">Race: &nbsp;&nbsp;</label>
                                    <select wire:model="nationality" name="nationality" id="nationality"
                                        class="form-control">
                                        <option value="">Select Option</option>
                                        <option>Sinhala</option>
                                        <option>Tamil</option>
                                        <option>Muslim</option>
                                        <option>Burger</option>
                                        <option>Other</option>
                                    </select>
                                    @error('nationality') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <label for="bss_id">If Yes Select BSS Student</label>
                                    <input data-toggle="tooltip" data-placement="top" title="Search by name" type="text"
                                        id="bss_name" name="bss_name" class="form-control" placeholder="Search by name">

                                    @error('bss_id') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                    <div id="bssList"></div>
                                    <input wire:model="bss_id" type="hidden" id="bss_id" name="bss_id" value="">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gender">Gender: &nbsp;&nbsp;</label>
                                    <select wire:model="gender" name="gender" id="gender" class="form-control">
                                        <option value="">Select Option</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    @error('gender') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gender">Driving Licence &nbsp;&nbsp;</label>
                                    <select wire:model="driving_licence" name="driving_licence" id="driving_licence"
                                        class="form-control">
                                        <option value="">Select Option</option>
                                        <option>No Licence</option>
                                        <option>A1,A,D</option>
                                        <option>B1,E,F</option>
                                        <option>B,C,C1</option>
                                        <option>C1,B1</option>
                                        <option>C,B</option>
                                        <option>CE,B</option>
                                        <option>D1,A1</option>
                                        <option>D,A</option>
                                        <option>DE</option>
                                        <option>G1</option>
                                        <option>G</option>
                                        <option>J</option>
                                    </select>
                                    @error('driving_licence') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="highest_qualification">Highest Educational Qualification:</label>
                                    <select wire:model="highest_qualification" name="highest_qualification"
                                        id="highest_qualification" class="form-control">
                                        <option value="">Select Option</option>
                                        <option>Ordinary Level</option>
                                        <option>Advanced Level</option>
                                        <option>Certificate</option>
                                        <option>Diploma</option>
                                        <option>Higher Diploma</option>
                                        <option>Degree</option>
                                        <option>Masters</option>
                                        <option>Doctorate</option>
                                        <option>Skilled Apprentice</option>
                                    </select>
                                    @error('highest_qualification') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <label for="family_id">Select Family</label>

                                    <div class="input-group">

                                        <input data-toggle="tooltip" data-placement="top"
                                            title="Add family details before search and select. Click on add button"
                                            type="text" id="fam_id" name="fam_id" class="form-control"
                                            placeholder="Enter Name of Household">
                                        <div style="cursor: pointer"
                                            onclick="window.open('{{Route('families.create')}}', '_blank');"
                                            class="input-group-prepend">
                                            <span data-toggle="tooltip" data-placement="top" title="Add family to list"
                                                class="input-group-text"><i style="color: blue;"
                                                    class="fa fa-plus"></i></span>
                                        </div>
                                    </div>

                                    @error('family_id') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                    <div id="familyList"></div>
                                    <input wire:model="family_id" type="hidden" id="family_id" name="family_id"
                                        value="">
                                </div>
                                <div class="form-group">
                                    <label for="disability">Are you differtnly abled? &nbsp;&nbsp;</label>
                                    <select wire:model="disability" name="disability" id="disability"
                                        class="form-control">
                                        <option value="">Select Option</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                    @error('disability') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class=" mx-auto " x-show="step != 'complete'">
                            <div class="mx-auto">
                                <div class="flex justify-between">
                                    <div class="w-1/2">

                                    </div>
                                    <div class="w-1/2 text-right">
                                        @if(!$step1)
                                        <button x-show="step === 1" wire:click.prevent="savePersonal"
                                            class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                            <svg wire:loading wire:target="savePersonal"
                                                class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                    stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                </path>
                                            </svg>
                                            <span wire:loading wire:target="savePersonal">Saving</span>
                                            <span wire:loading.remove wire:target="savePersonal"><i
                                                    class="fa fa-save"></i>
                                                Save</span>
                                        </button>
                                        @endif
                                        @if($step1)
                                        <button x-show="step < 5" @click="step++"
                                            class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Next
                                            <i class="fas fa-step-forward"></i></button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-show.transition.in="step === 2">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">O\L Information</h3>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="ol_year">O\L Year</label>
                                            <input wire:model="ol_year" class="form-control" maxlength="4" type="number"
                                                name="ol_year" id="ol_year">
                                            @error('ol_year') <span class="text-danger">*{{ $message }}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="ol_attempt">O\L Attempt</label>
                                            <input wire:model="ol_attempt" class="form-control" maxlength="2" step="1"
                                                type="number" name="ol_attempt" id="ol_attempt">
                                            @error('ol_attempt') <span class="text-danger">*{{ $message
                                                }}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="ol_pass_or_fail">O\L pass or fail ?</label>
                                            <select wire:model="ol_pass_or_fail" class="form-control"
                                                name="ol_pass_or_fail">
                                                <option value="">Select Option</option>
                                                <option>Pass</option>
                                                <option>Fail</option>
                                            </select>
                                            @error('ol_pass_or_fail') <span class="text-danger">*{{ $message
                                                }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">A\L Information</h3>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="al_year">A\L Year</label>
                                                <input wire:model="al_year" class="form-control" maxlength="4"
                                                    type="number" name="al_year" id="al_year">
                                                @error('al_year') <span class="text-danger">*{{ $message
                                                    }}</span>@enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="al_attempt">A\L Attempt</label>
                                                <input wire:model="al_attempt" class="form-control" maxlength="2"
                                                    step="1" type="number" name="al_attempt" id="al_attempt">
                                                @error('al_attempt') <span class="text-danger">*{{ $message
                                                    }}</span>@enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="al_pass_or_fail">A\L pass or fail ?</label>
                                                        <select wire:model="al_pass_or_fail" class="form-control"
                                                            name="al_pass_or_fail" id="al_pass_or_fail">
                                                            <option value="">Select Option</option>
                                                            <option>Pass</option>
                                                            <option>Fail</option>
                                                        </select>
                                                        @error('al_pass_or_fail') <span class="text-danger">*{{ $message
                                                            }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="stream">Stream</label>
                                                        <select wire:model="stream" class="form-control" name="stream"
                                                            id="stream">
                                                            <option value="">Select Option</option>
                                                            <option>Commerce</option>
                                                            <option>Art</option>
                                                            <option>Maths</option>
                                                            <option>Science</option>
                                                            <option>Technology</option>
                                                        </select>
                                                        @error('stream') <span class="text-danger">*{{ $message
                                                            }}</span>@enderror
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-warning">
                                    <div class="card-header">
                                        <h3 class="card-title">University Information</h3>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="degree">Degree Name</label>
                                            <input wire:model="degree" type="text" name="degree" id="degree"
                                                class="form-control">
                                            @error('degree') <span class="text-danger">*{{ $message }}</span>@enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="pass_out_year">Pass out Year</label>
                                                    <input wire:model="pass_out_year" type="number" name="pass_out_year"
                                                        id="pass_out_year" class="form-control">
                                                    @error('pass_out_year') <span class="text-danger">*{{ $message
                                                        }}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">

                                                <div class="form-group">
                                                    <label for="medium">Medium</label>
                                                    <input wire:model="medium" type="text" name="medium" id="medium"
                                                        class="form-control">
                                                    @error('medium') <span class="text-danger">*{{ $message
                                                        }}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="grade">Grade</label>
                                            <input wire:model="grade" type="text" name="grade" id="grade"
                                                class="form-control">
                                            @error('grade') <span class="text-danger">*{{ $message }}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="university">University</label>
                                            <input wire:model="university" type="text" name="university" id="university"
                                                class="form-control">
                                            @error('university') <span class="text-danger">*{{ $message
                                                }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Other Professional Qualifications</h3>
                                    </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <textarea wire:model="other_professional_qualifications"
                                                class="form-control" id="other_professional_qualifications"
                                                name="other_professional_qualifications"></textarea>
                                            @error('other_professional_qualifications') <span class="text-danger">*{{
                                                $message }}</span>@enderror
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class=" mx-auto " x-show="step != 'complete'">
                            <div class="mx-auto">
                                <div class="flex justify-between">
                                    <div class="w-1/2">

                                    </div>
                                    <div class="w-1/2 text-right">
                                        @if(!$step2)
                                        <button x-show="step === 2" wire:click.prevent="saveEducation"
                                            class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                            <svg wire:loading wire:target="saveEducation"
                                                class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                    stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                </path>
                                            </svg>
                                            <span wire:loading wire:target="saveEducation">Saving</span>
                                            <span wire:loading.remove wire:target="saveEducation"><i
                                                    class="fa fa-save"></i>
                                                Save</span>
                                        </button>
                                        @endif
                                        @if($step2)
                                        <button x-show="step < 5" @click="step++"
                                            class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Next
                                            <i class="fas fa-step-forward"></i></button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-show.transition.in="step === 3">
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-4">
                            <div class="flex flex-col">
                                <label class="inline-flex items-center mt-1">
                                    <span class="ml-2 text-gray-700">Language</span>
                                </label>
                            </div>
                            <div class="flex flex-col">
                                <label class="inline-flex items-center mt-1">
                                    <span class="ml-2 text-gray-700">Reading</span>
                                </label>
                            </div>
                            <div class="flex flex-col">
                                <label class="inline-flex items-center mt-1">
                                    <span class="ml-2 text-gray-700">Speaking</span>
                                </label>
                            </div>
                            <div class="flex flex-col">
                                <label class="inline-flex items-center mt-1">
                                    <span class="ml-2 text-gray-700">Writing</span>
                                </label>
                            </div>

                            {{-- Tamil --}}
                            <div class="flex flex-col">
                                <label class="inline-flex items-center mt-1">
                                    <span class="ml-2 text-gray-700">Tamil</span>
                                </label>
                            </div>
                            <div class="flex flex-col">
                                <label class="inline-flex items-center mt-1">
                                    <input type="checkbox" wire:model="reading_tamil"
                                        class="form-checkbox h-5 w-5 ml-4 text-gray-600"><span
                                        class="ml-2 text-gray-700"></span>
                                </label>
                            </div>
                            <div class="flex flex-col">
                                <label class="inline-flex items-center mt-1">
                                    <input type="checkbox" wire:model="speaking_tamil"
                                        class="form-checkbox h-5 w-5 ml-4 text-gray-600"><span
                                        class="ml-2 text-gray-700"></span>
                                </label>
                            </div>

                            <div class="flex flex-col">
                                <label class="inline-flex items-center mt-1">
                                    <input type="checkbox" wire:model="writing_tamil"
                                        class="form-checkbox h-5 w-5 ml-4 text-gray-600"><span
                                        class="ml-2 text-gray-700"></span>
                                </label>
                            </div>

                            {{-- Sinahala --}}
                            <div class="flex flex-col">
                                <label class="inline-flex items-center mt-1">
                                    <span class="ml-2 text-gray-700">Sinhala</span>
                                </label>
                            </div>
                            <div class="flex flex-col">
                                <label class="inline-flex items-center mt-1">
                                    <input type="checkbox" wire:model="speaking_sinhala"
                                        class="form-checkbox h-5 w-5 ml-4 text-gray-600"><span
                                        class="ml-2 text-gray-700"></span>
                                </label>
                            </div>
                            <div class="flex flex-col">
                                <label class="inline-flex items-center mt-1">
                                    <input type="checkbox" wire:model="reading_sinhala"
                                        class="form-checkbox h-5 w-5 ml-4 text-gray-900"><span
                                        class="ml-2 text-gray-700"></span>
                                </label>
                            </div>
                            <div class="flex flex-col">
                                <label class="inline-flex items-center mt-1">
                                    <input type="checkbox" wire:model="writing_sinhala"
                                        class="form-checkbox h-5 w-5 ml-4 text-gray-600"><span
                                        class="ml-2 text-gray-700"></span>
                                </label>
                            </div>

                            {{-- English --}}
                            <div class="flex flex-col">
                                <label class="inline-flex items-center mt-1">
                                    <span class="ml-2 text-gray-700">English</span>
                                </label>
                            </div>
                            <div class="flex flex-col">
                                <label class="inline-flex items-center mt-1">
                                    <input type="checkbox" wire:model="reading_english"
                                        class="form-checkbox h-5 w-5 ml-4 text-gray-600  items-center"><span
                                        class="ml-2 text-gray-700"></span>
                                </label>
                            </div>
                            <div class="flex flex-col">
                                <label class="inline-flex items-center mt-1">
                                    <input type="checkbox" wire:model="speaking_english"
                                        class="form-checkbox h-5 w-5 ml-4 text-gray-600"><span
                                        class="ml-2 text-gray-700"></span>
                                </label>
                            </div>
                            <div class="flex flex-col">
                                <label class="inline-flex items-center mt-1">
                                    <input type="checkbox" wire:model="writing_english"
                                        class="form-checkbox h-5 w-5 ml-4 text-gray-600"><span
                                        class="ml-2 text-gray-700"></span>
                                </label>
                            </div>
                        </div>
                        <div class=" mx-auto mt-10" x-show="step != 'complete'">
                            <div class="mx-auto">
                                <div class="flex justify-between">
                                    <div class="w-1/2">

                                    </div>
                                    <div class="w-1/2 text-right">
                                        @if(!$step3)
                                        <button x-show="step === 3" wire:click.prevent="saveLanguage"
                                            class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                            <svg wire:loading wire:target="saveLanguage"
                                                class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                    stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                </path>
                                            </svg>
                                            <span wire:loading wire:target="saveLanguage">Saving</span>
                                            <span wire:loading.remove wire:target="saveLanguage"><i
                                                    class="fa fa-save"></i>
                                                Save</span>
                                        </button>
                                        @endif
                                        @if($step3)
                                        <button x-show="step < 5" @click="step++"
                                            class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Next
                                            <i class="fas fa-step-forward"></i></button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-show.transition.in="step === 4">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Followed Courses Detials</h3>
                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ol_year">Course</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="course_name"
                                                    id="course_name" placeholder="Search Course">
                                                <div style="cursor: pointer"
                                                    onclick="window.open('{{Route('courses.index')}}', '_blank');"
                                                    class="input-group-prepend">
                                                    <span data-toggle="tooltip" data-placement="top"
                                                        title="Add a course to list" class="input-group-text"><i
                                                            style="color: blue;" class="fa fa-plus"></i></span>
                                                </div>
                                            </div>
                                            <div id="courseList"></div>
                                            <input class="form-control" type="hidden" name="course_id" id="course_id">
                                        </div>
                                    </div>
                                    <input type="hidden" name="status" id="status" value="Followed">
                                    <div class="col-md-4 form-group">
                                        <label>is supported by Berendina ?</label>

                                        <select wire:model="provided_by_bec" name="provided_by_bec"
                                            class="form-control">
                                            <option value="">Select Option</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>

                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="completed_at">Completed Date <small
                                                    class="text-muted">(Approximate)</small></label>
                                            <input wire:model="completed_at" type="date" name="completed_at"
                                                id="completed_at" class="form-control">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class=" mx-auto mt-10" x-show="step != 'complete'">
                            <div class="mx-auto">
                                <div class="flex justify-between">
                                    <div class="w-1/2">

                                    </div>
                                    <div class="w-1/2 text-right">
                                        @if(!$step4)
                                        <button x-show="step === 4" wire:click.prevent="saveCourse"
                                            class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                            <svg wire:loading wire:target="saveCourse"
                                                class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                    stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                </path>
                                            </svg>
                                            <span wire:loading wire:target="saveCourse">Saving</span>
                                            <span wire:loading.remove wire:target="saveCourse"><i
                                                    class="fa fa-save"></i>
                                                Save</span>
                                        </button>
                                        <button x-show="step < 5" @click="step++"
                                            class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">or
                                            Skip to Next
                                            <i class="fas fa-step-forward"></i></button>
                                        @endif
                                        @if($step4)
                                        <button x-show="step < 5" @click="step++"
                                            class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Next
                                            <i class="fas fa-step-forward"></i></button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-show.transition.in="step === 5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Current Status</h3>
                                    </div>

                                    <div class="card-body">
                                        <select wire:model="current_status" name="current_status" id="current_status"
                                            class="form-control">
                                            <option value="">Select Option</option>
                                            <option>Permanent Job After Vocational/Prof Training</option>
                                            <option>Permanent Job without Vocational/Prof Training</option>
                                            <option>Temporary Job After Vocational/Prof Training</option>
                                            <option>Temporary Job without Vocational/Prof Training</option>
                                            <option>Following a course</option>
                                            <option>Self Employed</option>
                                            <option>No Job</option>d
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @if($current_status)
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Additional Details</h3>
                            </div>
                            <div class="card-body">

                                @switch($current_status)
                                @case('Permanent Job After Vocational/Prof Training')
                                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-3">
                                    <div class="form-group flex flex-col">
                                        <label for="title">Job Title</label>
                                        <input wire:model="title" type="text" name="title" id="title"
                                            class="form-control">
                                    </div>
                                    <div class="form-group flex flex-col">
                                        <label for="employer_name">Employer Name</label>
                                        <input wire:model="employer_name" type="text" name="employer_name"
                                            id="employer_name" class="form-control">
                                    </div>
                                    <div class="form-group flex flex-col">
                                        <label for="need_help">Do you have a proper career plan ?</label>
                                        <select wire:model="career_plan" name="career_plan" id="career_plan"
                                            class="form-control">
                                            <option value="">Select Option</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group flex flex-col">
                                        <label for="need_help">Have you taken any step on it ?</label>
                                        <select wire:model="step_forward" name="step_forward" id="step_forward"
                                            class="form-control">
                                            <option value="">Select Option</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group flex flex-col">
                                        <label>What are the steps you have taken ?</label>
                                        <textarea wire:model="description" class="form-control" id="description"
                                            name="description" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class=" mx-auto mt-10" x-show="step != 'complete'">
                                    <div class="mx-auto">
                                        <div class="flex justify-between">
                                            <div class="w-1/2">

                                            </div>
                                            <div class="w-1/2 text-right">

                                                <button x-show="step === 5" wire:click.prevent="saveFinalJob"
                                                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                                    <svg wire:loading wire:target="saveFinalJob"
                                                        class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                                            stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor"
                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                        </path>
                                                    </svg>
                                                    <span wire:loading wire:target="saveFinalJob">Saving</span>
                                                    <span wire:loading.remove wire:target="saveFinalJob"><i
                                                            class="fa fa-save"></i>
                                                        Save and Finish</span>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @case('Permanent Job without Vocational/Prof Training')
                                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-3">
                                    <div class="form-group flex flex-col">
                                        <label for="title">Job Title</label>
                                        <input wire:model="title" type="text" name="title" id="title"
                                            class="form-control">
                                    </div>
                                    <div class="form-group flex flex-col">
                                        <label for="employer_name">Employer Name</label>
                                        <input wire:model="employer_name" type="text" name="employer_name"
                                            id="employer_name" class="form-control">
                                    </div>
                                    <div class="form-group flex flex-col">
                                        <label for="need_help">Do you have a proper career plan ?</label>
                                        <select wire:model="career_plan" name="career_plan" id="career_plan"
                                            class="form-control">
                                            <option value="">Select Option</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group flex flex-col">
                                        <label for="need_help">Have you taken any step on it ?</label>
                                        <select wire:model="step_forward" name="step_forward" id="step_forward"
                                            class="form-control">
                                            <option value="">Select Option</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group flex flex-col">
                                        <label>What are the steps you have taken ?</label>
                                        <textarea wire:model="description" class="form-control" id="description"
                                            name="description" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class=" mx-auto mt-10" x-show="step != 'complete'">
                                    <div class="mx-auto">
                                        <div class="flex justify-between">
                                            <div class="w-1/2">

                                            </div>
                                            <div class="w-1/2 text-right">

                                                <button x-show="step === 5" wire:click.prevent="saveFinalJob"
                                                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                                    <svg wire:loading wire:target="saveFinalJob"
                                                        class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                                            stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor"
                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                        </path>
                                                    </svg>
                                                    <span wire:loading wire:target="saveFinalJob">Saving</span>
                                                    <span wire:loading.remove wire:target="saveFinalJob"><i
                                                            class="fa fa-save"></i>
                                                        Save and Finish</span>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @case('Temporary Job After Vocational/Prof Training')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="industry">Preferable Industry</label>
                                            <select wire:model="industry" id="industry" name="industry[]"
                                                class="form-control" multiple>
                                                <option value="">Not Mentioned</option>
                                                <option>Agriculture &amp; Food Processing</option>
                                                <option>Automobiles</option>
                                                <option>Banking &amp; Financial Services</option>
                                                <option>BPO or KPO </option>
                                                <option>Civil &amp; Construction</option>
                                                <option>Consumer Goods &amp; Durables</option>
                                                <option>Consulting</option>
                                                <option>Education</option>
                                                <option>Engineering</option>
                                                <option>Ecommerce &amp; Internet</option>
                                                <option>Events &amp; Entertainment</option>
                                                <option>Export &amp; Import</option>
                                                <option>Government &amp; Public Sector</option>
                                                <option>Healthcare</option>
                                                <option>Hotel, Travel &amp; Leisure</option>
                                                <option>Insurance</option>
                                                <option>IT &amp; Telecom</option>
                                                <option>Logistics &amp; Transportation</option>
                                                <option>Manufacturing</option>
                                                <option>Manpower &amp; Security</option>
                                                <option>News &amp; Media</option>
                                                <option>NGO &amp; Non profit</option>
                                                <option>Pharmaceutical</option>
                                                <option>Real Estate</option>
                                                <option>Wholesale &amp; Retail</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location">Preferable Location</label>
                                            <select wire:model="location" name="location[]" id="location" multiple
                                                class="form-control">
                                                <option value="">Not Mentioned</option>
                                                <option>Home District</option>
                                                <option>Home Province</option>
                                                <option>Other City</option>
                                                <option>Colombo</option>
                                                <option>Industrial Zone</option>
                                                <option>Abroad</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="experience">Your Expierinces</label>
                                    <textarea wire:model="experience" class="form-control" name="experience"
                                        id="experience"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="min_salary">Min. Salary Expectation</label>
                                            <input wire:model="min_salary" type="number" step="10000" name="min_salary"
                                                id="min_salary" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="intresting_courses">Preferable Courses (if You like to
                                                follow)</label>
                                            <select wire:model="intresting_courses" name="intresting_courses[]"
                                                id="intresting_courses" class="form-control" multiple>
                                                <option value="">Not Mentioned</option>
                                                @foreach($course_categories as $key => $cc)
                                                <option value="{{$cc['id']}}">{{$cc['course_category']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    style="width: 100%; height: 20px; border-bottom: 1px solid blue; text-align: center;padding-bottom: 10px">
                                    <span class="badge badge-info" style="font-size: 20px; padding: 0 10px; ">
                                        Preferable Business
                                    </span>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="intresting_business">Nature of business</label>
                                    <input wire:model="intresting_business" type="text" name="intresting_business"
                                        id="intresting_business" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="need_help">Do you expect a support ?</label>
                                            <select wire:model="need_help" name="need_help" id="need_help"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type_of_help">What type of Support</label>
                                            <select wire:model="type_of_help" name="type_of_help" id="type_of_help"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Finacial</option>
                                                <option>Material</option>
                                                <option>Guidance</option>
                                                <option>Tempory Training</option>
                                                <option>Vocational Training</option>
                                                <option>Other</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    style="width: 100%; height: 20px; border-bottom: 1px solid blue; text-align: center;padding-bottom: 10px">
                                    <span class="badge badge-info" style="font-size: 20px; padding: 0 10px; ">
                                        Common Questions
                                    </span>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bank_account">Do you have an account created by a reputed bank
                                                ?</label>
                                            <select wire:model="bank_account" name="bank_account" id="bank_account"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="smart_phone">Do You have a Smart Phone ?</label>
                                            <select wire:model="smart_phone" name="smart_phone" id="smart_phone"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="training">Do You like to participate to a Smart Phone training
                                                ?</label>
                                            <select wire:model="training" name="training" id="training"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="when">Then When ?</label>
                                            <select wire:model="when" name="when" id="when" class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Week Days</option>
                                                <option>Weekends</option>
                                                <option>Holiday</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mx-auto mt-10" x-show="step != 'complete'">
                                    <div class="mx-auto">
                                        <div class="flex justify-between">
                                            <div class="w-1/2">

                                            </div>
                                            <div class="w-1/2 text-right">

                                                <button x-show="step === 5" wire:click.prevent="saveTemporyJob"
                                                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                                    <svg wire:loading wire:target="saveTemporyJob"
                                                        class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                                            stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor"
                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                        </path>
                                                    </svg>
                                                    <span wire:loading wire:target="saveTemporyJob">Saving</span>
                                                    <span wire:loading.remove wire:target="saveTemporyJob"><i
                                                            class="fa fa-save"></i>
                                                        Save and Finish</span>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @case('Temporary Job without Vocational/Prof Training')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="industry">Preferable Industry</label>
                                            <select wire:model="industry" id="industry" name="industry[]"
                                                class="form-control" multiple>
                                                <option value="">Not Mentioned</option>
                                                <option>Agriculture &amp; Food Processing</option>
                                                <option>Automobiles</option>
                                                <option>Banking &amp; Financial Services</option>
                                                <option>BPO or KPO </option>
                                                <option>Civil &amp; Construction</option>
                                                <option>Consumer Goods &amp; Durables</option>
                                                <option>Consulting</option>
                                                <option>Education</option>
                                                <option>Engineering</option>
                                                <option>Ecommerce &amp; Internet</option>
                                                <option>Events &amp; Entertainment</option>
                                                <option>Export &amp; Import</option>
                                                <option>Government &amp; Public Sector</option>
                                                <option>Healthcare</option>
                                                <option>Hotel, Travel &amp; Leisure</option>
                                                <option>Insurance</option>
                                                <option>IT &amp; Telecom</option>
                                                <option>Logistics &amp; Transportation</option>
                                                <option>Manufacturing</option>
                                                <option>Manpower &amp; Security</option>
                                                <option>News &amp; Media</option>
                                                <option>NGO &amp; Non profit</option>
                                                <option>Pharmaceutical</option>
                                                <option>Real Estate</option>
                                                <option>Wholesale &amp; Retail</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location">Preferable Location</label>
                                            <select wire:model="location" name="location[]" id="location" multiple
                                                class="form-control">
                                                <option value="">Not Mentioned</option>
                                                <option>Home District</option>
                                                <option>Home Province</option>
                                                <option>Other City</option>
                                                <option>Colombo</option>
                                                <option>Industrial Zone</option>
                                                <option>Abroad</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="experience">Your Expierinces</label>
                                    <textarea wire:model="experience" class="form-control" name="experience"
                                        id="experience"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="min_salary">Min. Salary Expectation</label>
                                            <input wire:model="min_salary" type="number" step="10000" name="min_salary"
                                                id="min_salary" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="intresting_courses">Preferable Courses (if You like to
                                                follow)</label>
                                            <select wire:model="intresting_courses" name="intresting_courses[]"
                                                id="intresting_courses" class="form-control" multiple>
                                                <option value="">Not Mentioned</option>
                                                @foreach($course_categories as $key => $cc)
                                                <option value="{{$cc['id']}}">{{$cc['course_category']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    style="width: 100%; height: 20px; border-bottom: 1px solid blue; text-align: center;padding-bottom: 10px">
                                    <span class="badge badge-info" style="font-size: 20px; padding: 0 10px; ">
                                        Preferable Business
                                    </span>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="intresting_business">Nature of business</label>
                                    <input wire:model="intresting_business" type="text" name="intresting_business"
                                        id="intresting_business" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="need_help">Do you expect a support ?</label>
                                            <select wire:model="need_help" name="need_help" id="need_help"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type_of_help">What type of Support</label>
                                            <select wire:model="type_of_help" name="type_of_help" id="type_of_help"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Finacial</option>
                                                <option>Material</option>
                                                <option>Guidance</option>
                                                <option>Tempory Training</option>
                                                <option>Vocational Training</option>
                                                <option>Other</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    style="width: 100%; height: 20px; border-bottom: 1px solid blue; text-align: center;padding-bottom: 10px">
                                    <span class="badge badge-info" style="font-size: 20px; padding: 0 10px; ">
                                        Common Questions
                                    </span>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bank_account">Do you have an account created by a reputed bank
                                                ?</label>
                                            <select wire:model="bank_account" name="bank_account" id="bank_account"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="smart_phone">Do You have a Smart Phone ?</label>
                                            <select wire:model="smart_phone" name="smart_phone" id="smart_phone"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="training">Do You like to participate to a Smart Phone training
                                                ?</label>
                                            <select wire:model="training" name="training" id="training"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="when">Then When ?</label>
                                            <select wire:model="when" name="when" id="when" class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Week Days</option>
                                                <option>Weekends</option>
                                                <option>Holiday</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mx-auto mt-10" x-show="step != 'complete'">
                                    <div class="mx-auto">
                                        <div class="flex justify-between">
                                            <div class="w-1/2">

                                            </div>
                                            <div class="w-1/2 text-right">

                                                <button x-show="step === 5" wire:click.prevent="saveTemporyJob"
                                                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                                    <svg wire:loading wire:target="saveTemporyJob"
                                                        class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                                            stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor"
                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                        </path>
                                                    </svg>
                                                    <span wire:loading wire:target="saveTemporyJob">Saving</span>
                                                    <span wire:loading.remove wire:target="saveTemporyJob"><i
                                                            class="fa fa-save"></i>
                                                        Save and Finish</span>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @case('Following a course')
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="ol_year">Course</label>
                                        <select wire:model="following_course_id" id="following_course_id"
                                            class="form-control">
                                            <option value="">Select a Course</option>
                                            @foreach($courses as $course)
                                            <option value="{{$course['id']}}">{{$course['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>is This course provied by Berendina ?</label>

                                        <select wire:model="following_provided_by_bec" name="following_provided_by_bec"
                                            class="form-control" id="provided_by_bec">
                                            <option value="">Select Option</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="following_completed_at">Completed date</label>
                                            <input wire:model="following_completed_at" type="date" name="completed_at"
                                                id="completed_at" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="industry">Preferable Industry</label>
                                            <select wire:model="industry" id="industry" name="industry[]"
                                                class="form-control" multiple>
                                                <option value="">Not Mentioned</option>
                                                <option>Agriculture &amp; Food Processing</option>
                                                <option>Automobiles</option>
                                                <option>Banking &amp; Financial Services</option>
                                                <option>BPO or KPO </option>
                                                <option>Civil &amp; Construction</option>
                                                <option>Consumer Goods &amp; Durables</option>
                                                <option>Consulting</option>
                                                <option>Education</option>
                                                <option>Engineering</option>
                                                <option>Ecommerce &amp; Internet</option>
                                                <option>Events &amp; Entertainment</option>
                                                <option>Export &amp; Import</option>
                                                <option>Government &amp; Public Sector</option>
                                                <option>Healthcare</option>
                                                <option>Hotel, Travel &amp; Leisure</option>
                                                <option>Insurance</option>
                                                <option>IT &amp; Telecom</option>
                                                <option>Logistics &amp; Transportation</option>
                                                <option>Manufacturing</option>
                                                <option>Manpower &amp; Security</option>
                                                <option>News &amp; Media</option>
                                                <option>NGO &amp; Non profit</option>
                                                <option>Pharmaceutical</option>
                                                <option>Real Estate</option>
                                                <option>Wholesale &amp; Retail</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location">Preferable Location</label>
                                            <select wire:model="location" name="location[]" id="location" multiple
                                                class="form-control">
                                                <option value="">Not Mentioned</option>
                                                <option>Home District</option>
                                                <option>Home Province</option>
                                                <option>Other City</option>
                                                <option>Colombo</option>
                                                <option>Industrial Zone</option>
                                                <option>Abroad</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="profession_adequate">Is the course you are currently pursuing in
                                            such a profession adequate ?</label>
                                        <select wire:model="profession_adequate" name="profession_adequate"
                                            id="profession_adequate" class="form-control">
                                            <option value="">Select Option</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                            <option>No Idea</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="plan_to_meet_qualifications">If No, Do you have any plan to meet
                                            the qualifications?</label>
                                        <select wire:model="plan_to_meet_qualifications"
                                            name="plan_to_meet_qualifications" id="plan_to_meet_qualifications"
                                            class="form-control">
                                            <option value="">Select Option</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="details">If yes, Explain in detail</label>
                                    <textarea wire:model="details" class="form-control" name="details"
                                        id="details"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="experience">Your Expierinces</label>
                                    <textarea wire:model="experience" class="form-control" name="experience"
                                        id="experience"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="min_salary">Min. Salary Expectation</label>
                                            <input wire:model="min_salary" type="number" step="10000" name="min_salary"
                                                id="min_salary" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="intresting_courses">Preferable Courses (if You like to
                                                follow)</label>
                                            <select wire:model="intresting_courses" name="intresting_courses[]"
                                                id="intresting_courses" class="form-control" multiple>
                                                <option value="">Not Mentioned</option>
                                                @foreach($course_categories as $key => $cc)
                                                <option value="{{$cc['id']}}">{{$cc['course_category']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    style="width: 100%; height: 20px; border-bottom: 1px solid blue; text-align: center;padding-bottom: 10px">
                                    <span class="badge badge-info" style="font-size: 20px; padding: 0 10px; ">
                                        Preferable Business
                                    </span>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="intresting_business">Nature of business</label>
                                    <input wire:model="intresting_business" type="text" name="intresting_business"
                                        id="intresting_business" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="need_help">Do you expect a support ?</label>
                                            <select wire:model="need_help" name="need_help" id="need_help"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type_of_help">What type of Support</label>
                                            <select wire:model="type_of_help" name="type_of_help" id="type_of_help"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Finacial</option>
                                                <option>Material</option>
                                                <option>Guidance</option>
                                                <option>Tempory Training</option>
                                                <option>Vocational Training</option>
                                                <option>Other</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    style="width: 100%; height: 20px; border-bottom: 1px solid blue; text-align: center;padding-bottom: 10px">
                                    <span class="badge badge-info" style="font-size: 20px; padding: 0 10px; ">
                                        Common Questions
                                    </span>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bank_account">Do you have an account created by a reputed bank
                                                ?</label>
                                            <select wire:model="bank_account" name="bank_account" id="bank_account"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="smart_phone">Do You have a Smart Phone ?</label>
                                            <select wire:model="smart_phone" name="smart_phone" id="smart_phone"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="training">Do You like to participate to a Smart Phone training
                                                ?</label>
                                            <select wire:model="training" name="training" id="training"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="when">Then When ?</label>
                                            <select wire:model="when" name="when" id="when" class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Week Days</option>
                                                <option>Weekends</option>
                                                <option>Holiday</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mx-auto mt-10" x-show="step != 'complete'">
                                    <div class="mx-auto">
                                        <div class="flex justify-between">
                                            <div class="w-1/2">

                                            </div>
                                            <div class="w-1/2 text-right">

                                                <button x-show="step === 5" wire:click.prevent="saveCourseFollowing"
                                                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                                    <svg wire:loading wire:target="saveCourseFollowing"
                                                        class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                                            stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor"
                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                        </path>
                                                    </svg>
                                                    <span wire:loading wire:target="saveCourseFollowing">Saving</span>
                                                    <span wire:loading.remove wire:target="saveCourseFollowing"><i
                                                            class="fa fa-save"></i>
                                                        Save and Finish</span>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @case('Self Employed')
                                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-1">
                                    <div class="form-group flex flex-col">
                                        <label for="title">Nature of Business</label>
                                        <input wire:model="business_title" type="text" name="title" id="title"
                                            class="form-control">
                                    </div>

                                </div>
                                <div
                                    style="width: 100%; height: 20px; border-bottom: 1px solid blue; text-align: center;padding-bottom: 10px">
                                    <span class="badge badge-info" style="font-size: 20px; padding: 0 10px; ">
                                        Common Questions
                                    </span>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bank_account">Do you have an account created by a reputed
                                                bank
                                                ?</label>
                                            <select wire:model="bank_account" name="bank_account" id="bank_account"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="smart_phone">Do You have a Smart Phone ?</label>
                                            <select wire:model="smart_phone" name="smart_phone" id="smart_phone"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="training">Do You like to participate to a Smart Phone
                                                training
                                                ?</label>
                                            <select wire:model="training" name="training" id="training"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="when">Then When ?</label>
                                            <select wire:model="when" name="when" id="when" class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Week Days</option>
                                                <option>Weekends</option>
                                                <option>Holiday</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mx-auto mt-10" x-show="step != 'complete'">
                                    <div class="mx-auto">
                                        <div class="flex justify-between">
                                            <div class="w-1/2">

                                            </div>
                                            <div class="w-1/2 text-right">

                                                <button x-show="step === 5" wire:click.prevent="saveSelfJob"
                                                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                                    <svg wire:loading wire:target="saveSelfJob"
                                                        class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                                            stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor"
                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                        </path>
                                                    </svg>
                                                    <span wire:loading wire:target="saveSelfJob">Saving</span>
                                                    <span wire:loading.remove wire:target="saveSelfJob"><i
                                                            class="fa fa-save"></i>
                                                        Save and Finish</span>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @case('No Job')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="industry">Preferable Industry</label>
                                            <select wire:model="industry" id="industry" name="industry[]"
                                                class="form-control" multiple>
                                                <option value="">Not Mentioned</option>
                                                <option>Agriculture &amp; Food Processing</option>
                                                <option>Automobiles</option>
                                                <option>Banking &amp; Financial Services</option>
                                                <option>BPO or KPO </option>
                                                <option>Civil &amp; Construction</option>
                                                <option>Consumer Goods &amp; Durables</option>
                                                <option>Consulting</option>
                                                <option>Education</option>
                                                <option>Engineering</option>
                                                <option>Ecommerce &amp; Internet</option>
                                                <option>Events &amp; Entertainment</option>
                                                <option>Export &amp; Import</option>
                                                <option>Government &amp; Public Sector</option>
                                                <option>Healthcare</option>
                                                <option>Hotel, Travel &amp; Leisure</option>
                                                <option>Insurance</option>
                                                <option>IT &amp; Telecom</option>
                                                <option>Logistics &amp; Transportation</option>
                                                <option>Manufacturing</option>
                                                <option>Manpower &amp; Security</option>
                                                <option>News &amp; Media</option>
                                                <option>NGO &amp; Non profit</option>
                                                <option>Pharmaceutical</option>
                                                <option>Real Estate</option>
                                                <option>Wholesale &amp; Retail</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location">Preferable Location</label>
                                            <select wire:model="location" name="location[]" id="location" multiple
                                                class="form-control">
                                                <option value="">Not Mentioned</option>
                                                <option>Home District</option>
                                                <option>Home Province</option>
                                                <option>Other City</option>
                                                <option>Colombo</option>
                                                <option>Industrial Zone</option>
                                                <option>Abroad</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="experience">Your Expierinces</label>
                                    <textarea wire:model="experience" class="form-control" name="experience"
                                        id="experience"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="min_salary">Min. Salary Expectation</label>
                                            <input wire:model="min_salary" type="number" step="10000" name="min_salary"
                                                id="min_salary" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="intresting_courses">Preferable Courses (if You like to
                                                follow)</label>
                                            <select wire:model="intresting_courses" name="intresting_courses[]"
                                                id="intresting_courses" class="form-control" multiple>
                                                <option value="">Not Mentioned</option>
                                                @foreach($course_categories as $key => $cc)
                                                <option value="{{$cc['id']}}">{{$cc['course_category']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    style="width: 100%; height: 20px; border-bottom: 1px solid blue; text-align: center;padding-bottom: 10px">
                                    <span class="badge badge-info" style="font-size: 20px; padding: 0 10px; ">
                                        Preferable Business
                                    </span>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="intresting_business">Nature of business</label>
                                    <input wire:model="intresting_business" type="text" name="intresting_business"
                                        id="intresting_business" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="need_help">Do you expect a support ?</label>
                                            <select wire:model="need_help" name="need_help" id="need_help"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type_of_help">What type of Support</label>
                                            <select wire:model="type_of_help" name="type_of_help" id="type_of_help"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Finacial</option>
                                                <option>Material</option>
                                                <option>Guidance</option>
                                                <option>Tempory Training</option>
                                                <option>Vocational Training</option>
                                                <option>Other</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    style="width: 100%; height: 20px; border-bottom: 1px solid blue; text-align: center;padding-bottom: 10px">
                                    <span class="badge badge-info" style="font-size: 20px; padding: 0 10px; ">
                                        Common Questions
                                    </span>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bank_account">Do you have an account created by a reputed bank
                                                ?</label>
                                            <select wire:model="bank_account" name="bank_account" id="bank_account"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="smart_phone">Do You have a Smart Phone ?</label>
                                            <select wire:model="smart_phone" name="smart_phone" id="smart_phone"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="training">Do You like to participate to a Smart Phone training
                                                ?</label>
                                            <select wire:model="training" name="training" id="training"
                                                class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Yes</option>
                                                <option>No</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="when">Then When ?</label>
                                            <select wire:model="when" name="when" id="when" class="form-control">
                                                <option value="">Select Option</option>
                                                <option>Week Days</option>
                                                <option>Weekends</option>
                                                <option>Holiday</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mx-auto mt-10" x-show="step != 'complete'">
                                    <div class="mx-auto">
                                        <div class="flex justify-between">
                                            <div class="w-1/2">

                                            </div>
                                            <div class="w-1/2 text-right">

                                                <button x-show="step === 5" wire:click.prevent="saveTemporyJob"
                                                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                                    <svg wire:loading wire:target="saveTemporyJob"
                                                        class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                                            stroke="currentColor" stroke-width="4"></circle>
                                                        <path class="opacity-75" fill="currentColor"
                                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                        </path>
                                                    </svg>
                                                    <span wire:loading wire:target="saveTemporyJob">Saving</span>
                                                    <span wire:loading.remove wire:target="saveTemporyJob"><i
                                                            class="fa fa-save"></i>
                                                        Save and Finish</span>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @break
                            </div>
                        </div>
                    </div>
                    @endswitch

                </div>
            </div>
            @endif

        </div>

    </div>
</div>
<!-- / Step Content -->
</div>
</div>
</div>
@push('page_scripts')

<script>
    var SITE_URL = "{{URL::to('/')}}";
    $(document).ready(function () {
        //serahc family id
        $('#fam_id').keyup(function () {
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: SITE_URL + '/familyList',
                    method: "POST",
                    data: { query: query, _token: _token },
                    success: function (data) {
                        $('#familyList').fadeIn();
                        $('#familyList').html(data);
                    }
                });
            }
        });

        $(document).on('click', '#family li', function () {
            $('#familyList').fadeOut();
            $('#fam_id').val($(this).text());
            var family_id = $(this).attr('id');
            @this.set('family_id', family_id);

        });

        $('#bss_name').keyup(function () {
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: SITE_URL + '/bssList',
                    method: "POST",
                    data: { query: query, _token: _token },
                    success: function (data) {
                        $('#bssList').fadeIn();
                        $('#bssList').html(data);
                    }
                });
            }
        });

        $(document).on('click', '#student li', function () {
            $('#bssList').fadeOut();
            $('#bss_name').val($(this).text());
            var bss_id = $(this).attr('id');
            @this.set('bss_id', bss_id);

        });

        $('#course_name').keyup(function () {
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: SITE_URL + '/courseList',
                    method: "POST",
                    data: { query: query, _token: _token },
                    success: function (data) {
                        $('#courseList').fadeIn();
                        $('#courseList').html(data);
                    }
                });
            }
        });

        $(document).on('click', '#followed li', function () {
            $('#courseList').fadeOut();
            $('#course_name').val($(this).text());
            var course_id = $(this).attr('id');
            @this.set('course_id', course_id);


        });


    });

</script>

@endpush

</div>
