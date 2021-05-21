<div>
    <div x-data="app()" x-cloak>
        <div class="mx-auto px-4 py-4">

            <div x-show.transition="step === 'complete'">
                <div class="bg-white rounded-lg p-10 flex items-center shadow justify-between">
                    <div>
                        <svg class="mb-4 h-20 w-20 text-green-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>

                        <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Data Entered Success</h2>

                        <button wire.click.prevent="saveData" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save Data</button>
                        <button @click="step = 1" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Back to home</button>
                    </div>
                </div>
            </div>

            <div x-show.transition="step != 'complete'">
                <!-- Top Navigation -->
                <div class="border-b-2 py-2">
                    <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight" x-text="`Step: ${step} of 4`"></div>
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex-1">
                            <div x-show="step === 1">
                                <div class="text-lg font-bold text-gray-700 leading-tight">Scholarship Details</div>
                            </div>

                            <div x-show="step === 2">
                                <div class="text-lg font-bold text-gray-700 leading-tight">Personal Information</div>
                            </div>

                            <div x-show="step === 3">
                                <div class="text-lg font-bold text-gray-700 leading-tight">Selection Criteria</div>
                            </div>

                            <div x-show="step === 4">
                                <div class="text-lg font-bold text-gray-700 leading-tight">Payment and Other Required Data</div>
                            </div>
                        </div>

                        <div class="flex items-center md:w-64">
                            <div class="w-full bg-white rounded-full mr-2">
                                <div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white" :style="'width: '+ parseInt(step / 4 * 100) +'%'"></div>
                            </div>
                            <div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 4 * 100) +'%'"></div>
                        </div>
                    </div>
                </div>
                <!-- /Top Navigation -->

                <!-- Step Content -->
                <div class="py-4">
                    <div x-show.transition.in="step === 1">
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="schol_given_on">schol_given_on</label>
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
                            @if($schol_type=="Grade 05")
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="password">Grade 05 Year</label>
                                <input wire:model="grade_05_year" id="password" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('grade_05_year') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            @endif @if($schol_type=="Ordinery Level")
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="password">Ordinery Level Year</label>
                                <input wire:model="ol_year" id="password" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('ol_year') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            @endif @if($schol_type=="Advanced Level")
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="password">Advanced Level Year</label>
                                <input wire:model="al_year" id="password" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('al_year') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="stream">Advanced Level Stream</label>
                                <input wire:model="stream" id="stream" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('stream') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            @endif @if($schol_type=="University")
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="password">Univerity Started Year</label>
                                <input wire:model="uni_year" id="password" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('uni_year') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            @endif
                        </div>
                    </div>
                    <div x-show.transition.in="step === 2">
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="name">Name</label>
                                <input wire:model="name" id="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('name') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="ref_no">Gender</label>
                                <select wire:model="gender" id="ref_no" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    <option value="">Select a Option</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select> @error('gender') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="ref_no">NIC</label>
                                <input wire:model="nic" id="ref_no" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('nic') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="ref_no">Ethnicity</label>
                                <select wire:model="ethnicity" id="ref_no" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                <option value="">Select a Option</option>
                                <option value="Sinhala">Sinhala</option>
                                <option value="Tamil">Tamil</option>
                                <option value="Muslim">Muslim</option>
                                <option value="Burger">Burger</option>
                                <option value="Other">Other</option>
                            </select> @error('ethnicity') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="ref_no">Date of Birth</label>
                                <input wire:model="date_of_birth" id="date_of_birth" type="date" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('date_of_birth') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="address">Address</label>
                                <input wire:model="address" id="address" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('address') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="ref_no">Divisional Secretriate Division</label>
                                <select wire:model="selectedDsd" id="ref_no" wire:select="updatedSelectedDsd" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    <option value="">Select a Option</option>
                                    @foreach($dsds as $dsd)
                                    <option value="{{$dsd['id']}}" >{{$dsd['name']}}</option>
                                @endforeach
                            </select> @error('selectedDsd') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="ref_no">GN Division</label>
                                <select wire:model="gn_id" id="ref_no" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                <option value="">Select a Option</option>
                                @foreach($gnds as $gnd)
                                    <option value="{{$gnd->id}}" >{{$gnd->name}}</option>
                                @endforeach
                            </select> @error('gn_id') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="contact">Contact Numbers</label>
                                <input wire:model="contact" id="contact" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('contact') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="guardian_name">Guardian Name</label>
                                <input wire:model="guardian_name" id="guardian_name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('guardian_name') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="relationship">Relationship to Guardian</label>
                                <input wire:model="relationship" id="relationship" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('relationship') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="school">School</label>
                                <input wire:model="school" id="school" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('school') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div x-show.transition.in="step === 3">
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="sector">Sector</label>
                                <select wire:model="sector" id="sector" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                <option value="">Select a Option</option>
                                <option value="Rural">Rural</option>
                                <option value="Plantation">Plantation</option>
                            </select> @error('sector') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="samurdi">is Samurdi Beneficiary ?</label>
                                <select wire:model="samurdi" id="samurdi" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                <option value="">Select a Option</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select> @error('samurdi') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="low_income">is Low Income ?</label>
                                <select wire:model="low_income" id="low_income" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                <option value="">Select a Option</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select> @error('low_income') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="direct_by_bmic">Direct By Bmic</label>
                                <select wire:model="direct_by_bmic" id="direct_by_bmic" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                <option value="">Select a Option</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select> @error('direct_by_bmic') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>

                            @if($direct_by_bmic=="1")
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="client_code">BMIC Client Code</label>
                                <input wire:model="client_code" id="client_code" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('client_code') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="bmic_pci">BMIC PCI</label>
                                <input wire:model="bmic_pci" id="bmic_pci" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('bmic_pci') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            @endif @if($direct_by_bmic=="0")
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="non_bmic_pci">Non BMIC PCI</label>
                                <input wire:model="non_bmic_pci" id="non_bmic_pci" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">                                @error('non_bmic_pci') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            @endif
                        </div>
                    </div>
                    <div x-show.transition.in="step === 4">
                        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="ref_no">Scholar Amount</label>
                                <input wire:model="scholar_amount" id="scholar_amount" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                /> @error('scholar_amount') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="payment_start_year">Payment Start Year</label>
                                <input wire:model="payment_start_year" id="payment_start_year" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                /> @error('payment_start_year') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="payment_start_month">Payment Start Month</label>
                                <select wire:model="payment_start_month" id="payment_start_month" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    <option value="">Select a Option</option>
                                    <option value="1">January</option>
                                    <option value="2">Febuary</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select> @error('payment_start_month') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="renewal_document">is Renewel Document Submitted ?</label>
                                <select wire:model="renewal_document" id="renewal_document" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                <option value="">Select a Option</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select> @error('renewal_document') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="p_status">Payment Status</label>
                                <select wire:model="p_status" id="p_status" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                <option value="">Select a Option</option>
                                <option value="1">Ongoing</option>
                                <option value="2">Finished</option>
                                <option value="3">Hold</option>
                                <option value="4">Drop Out</option>
                            </select> @error('p_status') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="finished_year">Payment Finished Year</label>
                                <input wire:model="finished_year" id="finished_year" type="number" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                                /> @error('finished_year') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="text-gray-700 dark:text-gray-200" for="p_status">Current Status</label>
                                <select wire:model="status_id" id="p_status" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                                    <option value="">Select a Option</option>
                                    @foreach($status as $st)
                                        <option value="{{$st['id']}}">{{$st['status']}}</option>
                                    @endforeach
                                </select> @error('status_id') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Step Content -->
            </div>
        </div>
        <!-- Bottom Navigation -->
        <div class=" mx-auto px-4 py-4" x-show="step != 'complete'">
            <div class="mx-auto px-4">
                <div class="flex justify-between">
                    <div class="w-1/2">
                        <button x-show="step > 1" @click="step--" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-gray-600">Previous</button>
                    </div>

                    <div class="w-1/2 text-right">
                        <button x-show="step < 4" @click="step++" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Next</button>

                        <button x-show="step === 4" wire:click.prevent="saveData" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-green-700 rounded-md hover:bg-green-600 focus:outline-none focus:bg-gray-600">Complete</button>
                    </div>
                </div>
            </div>
        </div>

        <livewire:ol-results/>
        <livewire:al-results/>

        <!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->
    </div>
</div>
