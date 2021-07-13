<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a wire:ignore class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">General</a>
        </li>
        <li class="nav-item">
            <a wire:ignore class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">House Hold</a>
        </li>
        <li class="nav-item">
            <a wire:ignore class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Spouse</a>
        </li>
        <li class="nav-item">
            <a wire:ignore class="nav-link" id="pills-settings-tab" data-toggle="pill" href="#pills-settings" role="tab" aria-controls="pills-settings" aria-selected="false">Family Members</a>
        </li>
        <li class="nav-item">
            <a wire:ignore class="nav-link" id="pills-finish-tab" data-toggle="pill" href="#pills-finish" role="tab" aria-controls="pills-finish" aria-selected="false">Finish</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div wire:ignore.self class="tab-pane fademember_contact show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="flex flex-col text-black-500 bg-gray-200 p-3 rounded-lg mb-3">
                    <h1 class="font-medium text-2xl mb-3 ml-1">General Data</h1>
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex flex-col w-3/12 px-2">
                            <label for="username" class="block text-black">District</label>
                            <select wire:model="selectedDistrict" name="district" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" wire:select="updatedSelectedDistrict">
                                <option value="">Select option</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Kandy" >Kandy</option>
                                <option value="Galle" >Galle</option>
                                <option value="Ampara" >Ampara</option>
                                <option value="Anuradhapura" >Anuradhapura</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Batticaloa" >Batticaloa</option>
                                <option value="Gampaha" >Gampaha</option>
                                <option value="Hambantota" >Hambantota</option>
                                <option value="Jaffna" >Jaffna</option>
                                <option value="Kalutara" >Kalutara</option>
                                <option value="Kegalle" >Kegalle</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Kurunegala" ">Kurunegala</option>
                                <option value="Mannar" >Mannar</option>
                                <option value="Matale" >Matale</option>
                                <option value="Matara" ">Matara</option>
                                <option value="Moneragala" >Moneragala</option>
                                <option value="Mullativu" >Mullativu</option>
                                <option value="Nuwara Eliya" >Nuwara Eliya</option>
                                <option value="Polonnaruwa" >Polonnaruwa</option>
                                <option value="Puttalam" >Puttalam</option>
                                <option value="Ratnapura" >Ratnapura</option>
                                <option value="Trincomalee" ">Trincomalee</option>
                                <option value="Vavuniya" >Vavuniya</option>
                            </select>
                            @error('selectedDistrict') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>


                        <div class="flex flex-col w-3/12 px-2">
                            <label for="username" class="block text-black">DS Division</label>
                            <select wire:model="selectedDsd" name="dsd_id" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" wire:select="updatedSelectedDsd">
                                <option value="">Select option</option>
                                @foreach($dsds as $dsd)
                                    <option value="{{$dsd->id}}" >{{$dsd->name}}</option>
                                @endforeach
                            </select>
                        @error('selectedDsd') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>

                        <div class="flex flex-col w-3/12 px-2">
                            <label for="username" class="block text-black">GN Division</label>
                            <select wire:model="selectedGnd" name="gn_id" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" wire:select="updatedSelectedDsd">
                                <option value="">Select option</option>
                                @foreach($gnds as $gnd)
                                    <option value="{{$gnd->id}}" >{{$gnd->name}}</option>
                                @endforeach
                            </select>
                        @error('selectedGnd') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>

                        <div class="flex flex-col w-3/12 px-2">
                            <label for="username" class="block text-black">Village</label>
                            <input type="text" autofocus wire:model="village" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Village Name" />
                        @error('village') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex flex-col w-3/12 px-2">
                            <label for="username" class="block text-black">Date of Interview</label>
                            <input type="date" autofocus wire:model="date_of_interviewed" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"  />
                         @error('date_of_interviewed') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>

                        <div class="flex flex-col w-3/12 px-2">
                            <label for="username" class="block text-black">Interviewer</label>
                            <input type="text" autofocus wire:model="interviewer" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Interviewer" />
                        @error('interviewer') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>

                        <div class="flex flex-col w-3/12 px-2">
                            <label for="username" class="block text-black">Respondent</label>
                            <input type="text" autofocus wire:model="respondent" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Respondent Name" />
                        @error('respondent') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>

                        <div class="flex flex-col w-3/12 px-2">
                            <label for="username" class="block text-black">Respondent's Relationship to HHH</label>
                            <select wire:model="res_rela_to_HHH" name="res_rela_to_HHH" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                                <option value="">Select option</option>
                                    <option value="Wife">Wife</option>
                                    <option value="Husband">Husband</option>
                            </select>
                        @error('res_rela_to_HHH') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex flex-col w-3/12 px-2">
                            <label for="serial_number" class="block text-black">Serial Number</label>
                            <input type="text" autofocus wire:model="serial_number" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="EX: ANU/KAH/MAH/GAL/06" />
                        @error('serial_number') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>
                        <div class="flex flex-col w-9/12 px-2">
                            <label for="username" class="block text-black">House Hold Address</label>
                            <input type="text" autofocus wire:model="hh_address" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Address" />
                        @error('hh_address') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex flex-col w-3/12 px-2">
                            <label for="username" class="block text-black">Family Type</label>
                            <select wire:model="family_type" name="family_type" class="rounded-sm focus:outline-none bg-gray-100 w-full" multiple>
                                    <option value="1">Male headed</option>
                                    <option value="2">Female headed</option>
                                    <option value="3">Family with PWD Member/s</option>
                                    <option value="4">Suffering chronic illness</option>
                                    <option value="5">Single parent</option>
                                    <option value="6">Alcholic/drug addicted HHH</option>
                                    <option value="7">Lazy HHH</option>
                            </select>
                        @error('family_type') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
        </div>
        <div wire:ignore.self class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="flex flex-col text-black-500 bg-gray-200 p-3 rounded-lg">
                <h1 class="font-medium text-2xl mb-3 ml-1">Head of House Hold Data</h1>
                <div class="flex items-center justify-between mb-5">
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Name</label>
                        <input  wire:model="hh_name" type="text" autofocus id="hh_name" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Name" />
                     @error('hh_name') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>


                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">NIC Number</label>
                        <input wire:model="hh_nic" type="text" autofocus id="hh_nic" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="NIC" />
                    @error('hh_nic') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Contact Number</label>
                        <input wire:model="hh_contact" type="text" autofocus id="hh_contact" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Mobile Number" />
                    @error('hh_contact') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between mb-5">
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Smart Phone Number</label>
                        <input  wire:model="hh_sp_contact" type="text" autofocus id="hh_sp_contact" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Smart Phone Number" />
                    @error('hh_sp_contact') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Ethnicity</label>
                        <select wire:model="hh_ethnicity" name="hh_ethnicity" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                                <option value="Sinhala">Sinhala</option>
                                <option value="Tamil">Tamil</option>
                                <option value="Muslim">Muslim</option>
                                <option value="Other">Other</option>
                        </select>
                    @error('hh_ethnicity') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Religion</label>
                        <select wire:model.lazy="hh_religion" name="hh_religion" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                                <option value="Buddhist">Buddhist</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Islam">Islam</option>
                                <option value="Christian/Catholic">Christian/Catholic</option>
                                <option value="Other">Other</option>
                        </select>
                    @error('hh_religion') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                </div>
                <div class="flex items-center justify-between mb-5">
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Age</label>
                        <input  wire:model="hh_age" type="text" autofocus id="hh_age" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Age to Data Collected date" />
                    @error('hh_age') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Gender</label>
                        <select wire:model="hh_gender" name="family_type" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                            <option value="Male">Male</option>
                                <option value="Female">Female</option>
                        </select>
                    @error('hh_gender') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Civil Status</label>
                        <select wire:model="hh_civil_status" name="hh_civil_status" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                                <option value="Unmarried">Unmarried</option>
                                <option value="Married">Married</option>
                                <option value="Widow/ Widower">Widow/ Widower</option>
                                <option value="Separated">Separated</option>
                                <option value="Divorced">Divorced</option>
                        </select>
                    @error('hh_civil_status') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                </div>

                <div class="flex items-center justify-between mb-5">
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Highest level of education (Age 18-35)</label>
                        <select wire:model="hh_education" name="hh_education" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                                <option value="No schooling">No schooling</option>
                                <option value="Grade 1 to 5">Grade 1 to 5</option>
                                <option value="Grade 6 to 11">Grade 6 to 11</option>
                                <option value="Up to O/L">Up to O/L</option>
                                <option value="Up to A/L">Up to A/L</option>
                                <option value="Above A/L">Above A/L</option>
                        </select>
                    @error('hh_education') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Employment status</label>
                        <select wire:model="hh_employment" name="hh_employment" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                                <option value="Employed">Employed</option>
                                <option value="Unemployed">Unemployed</option>
                                <option value="Under employed ">Under employed </option>
                                <option value="Seasonal employment">Seasonal employment</option>
                                <option value="Part time employment">Part time employment</option>
                            </select>
                    @error('hh_employment') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Physical/ health condition</label>
                        <select wire:model="hh_health" name="hh_health" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                                <option value="Normal">Normal</option>
                                <option value="Physically disabled">Physically disabled</option>
                                <option value="Mentally disabled">Mentally disabled</option>
                                <option value="Suffer from chronic illness">Suffer from chronic illness</option>
                        </select>
                    @error('hh_health') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                </div>
            </div>
        </div>
        <div wire:ignore.self class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class="flex flex-col text-black-500 bg-gray-200 p-3 rounded-lg">
                <h1 class="font-medium text-2xl mb-3 ml-1">Spouse Data</h1>
                <div class="flex items-center justify-between mb-5">
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">NIC Number</label>
                        <input wire:model="spouse_nic" type="text" autofocus id="spouse_nic" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="NIC" />
                    @error('spouse_nic') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Contact Number</label>
                        <input wire:model="spouse_contact" type="text" autofocus id="spouse_contact" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Mobile Number" />
                    @error('spouse_contact') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Smart Phone Number</label>
                        <input  wire:model="spouse_sp_contact" type="text" autofocus id="spouse_sp_contact" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Smart Phone Number" />
                    @error('spouse_sp_contact') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="flex items-center justify-between mb-5">
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Age</label>
                        <input  wire:model="spouse_age" type="text" autofocus id="spouse_age" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Age to Data Collected date" />
                    @error('spouse_age') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Gender</label>
                        <select wire:model="spouse_gender" name="spouse_gender" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    @error('spouse_gender') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Highest level of education (Age 18-35)</label>
                        <select wire:model="spouse_education" name="spouse_education" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                                <option value="No schooling">No schooling</option>
                                <option value="Grade 1 to 5">Grade 1 to 5</option>
                                <option value="Grade 6 to 11">Grade 6 to 11</option>
                                <option value="Up to O/L">Up to O/L</option>
                                <option value="Up to A/L">Up to A/L</option>
                                <option value="Above A/L">Above A/L</option>
                        </select>
                    @error('spouse_education') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex items-center  mb-5">

                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Employment status</label>
                        <select wire:model="spouse_employment" name="spouse_employment" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                                <option value="Employed">Employed</option>
                                <option value="Unemployed">Unemployed</option>
                                <option value="Under employed ">Under employed </option>
                                <option value="Seasonal employment">Seasonal employment</option>
                                <option value="Part time employment">Part time employment</option>
                            </select>
                    @error('spouse_employment') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Physical/ health condition</label>
                        <select wire:model="spouse_health" name="spouse_health" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                                <option value="Normal">Normal</option>
                                <option value="Physically disabled">Physically disabled</option>
                                <option value="Mentally disabled">Mentally disabled</option>
                                <option value="Suffer from chronic illness">Suffer from chronic illness</option>
                        </select>
                    @error('spouse_health') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
        <div wire:ignore.self class="tab-pane fade" id="pills-settings" role="tabpanel" aria-labelledby="pills-settings-tab">
            <div class="flex flex-col text-black-500 bg-gray-200 p-3 rounded-lg">
                <h1 class="font-medium text-2xl mb-3 ml-1">Family Members Data</h1>
                <div class="flex items-center justify-between mb-5">
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Relationship to HHH</label>
                        <input wire:model="relationship_to_hhh.0" type="text" autofocus id="relationship_to_hhh" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Ex: Son, Daughter" />
                    @error('relationship_to_hhh') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Contact Number</label>
                        <input wire:model="member_contact.0" type="text" autofocus id="member_contact" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Mobile Number" />
                    @error('member_contact') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Smart Phone Number</label>
                        <input  wire:model="member_sp_contact.0" type="text" autofocus id="member_sp_contact" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Smart Phone Number" />
                    @error('member_sp_contact') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between mb-5">
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Age</label>
                        <input  wire:model="age.0" type="text" autofocus id="age" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Age to Data Collected date" />
                    @error('age') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Gender</label>
                        <select wire:model="gender.0" name="gender" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    @error('gender') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Civil Status</label>
                        <select wire:model="civil_status.0" name="civil_status" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                                <option value="Unmarried">Unmarried</option>
                                <option value="Married">Married</option>
                                <option value="Widow/ Widower">Widow/ Widower</option>
                                <option value="Separated">Separated</option>
                                <option value="Divorced">Divorced</option>
                        </select>
                    @error('civil_status') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex items-center  mb-5">
                    <div class="flex flex-col w-3/12 px-2">
                        <label for="username" class="block text-black">Highest level of education</label>
                        <select wire:model="education.0" name="education" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                                <option value="No schooling">No schooling</option>
                                <option value="Grade 1 to 5">Grade 1 to 5</option>
                                <option value="Grade 6 to 11">Grade 6 to 11</option>
                                <option value="Up to O/L">Up to O/L</option>
                                <option value="Up to A/L">Up to A/L</option>
                                <option value="Above A/L">Above A/L</option>
                        </select>
                    @error('education') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-3/12 px-2">
                        <label for="username" class="block text-black">If schooling, present grade</label>
                        <input  wire:model="school_grade.0" type="text" autofocus id="school_grade" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Age to Data Collected date" />
                    @error('school_grade') <span class="text-danger">*{{ $message }}</span> @enderror

                    </div>
                    <div class="flex flex-col w-3/12 px-2">
                        <label for="username" class="block text-black">Employment status</label>
                        <select wire:model="employment.0" name="employment" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                                <option value="Employed">Employed</option>
                                <option value="Unemployed">Unemployed</option>
                                <option value="Under employed ">Under employed </option>
                                <option value="Seasonal employment">Seasonal employment</option>
                                <option value="Part time employment">Part time employment</option>
                            </select>
                    @error('employment') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-3/12 px-2">
                        <label for="username" class="block text-black">Physical/ health condition</label>
                        <select wire:model="health.0" name="health" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                                <option value="Normal">Normal</option>
                                <option value="Physically disabled">Physically disabled</option>
                                <option value="Mentally disabled">Mentally disabled</option>
                                <option value="Suffer from chronic illness">Suffer from chronic illness</option>
                        </select>
                    @error('health') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                </div>
                <button wire:click.prevent="add({{$i}})" wire:loading.attr="disabled" class="bg-blue-600 float-right  text-white p-2 w-28 rounded-10 hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">
                    Add New
                    <div wire:loading wire:target="add">
                        <i class="fas fa-cog fa-spin"></i>
                    </div>

                </button>
            </div>
            <br/>
            @foreach($inputs as $key => $value)
            <div class="flex flex-col text-black-500 bg-gray-200 p-3 rounded-lg" >
                <h1 class="font-medium text-2xl mb-3 ml-1">Family Members Data</h1>
                <div class="flex items-center justify-between mb-5">
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Relationship to HHH</label>
                        <input wire:model="relationship_to_hhh.{{ $value }}" type="text" autofocus id="relationship_to_hhh" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Ex: Son, Daughter" />
                    @error('relationship_to_hhh.'.$value) <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Contact Number</label>
                        <input wire:model="member_contact.{{ $value }}" type="text" autofocus id="member_contact" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Mobile Number" />
                    @error('member_contact.'.$value) <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Smart Phone Number</label>
                        <input  wire:model="member_sp_contact.{{ $value }}" type="text" autofocus id="member_sp_contact" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Smart Phone Number" />
                    @error('member_sp_contact.'.$value) <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="flex items-center justify-between mb-5">
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Age</label>
                        <input  wire:model="age.{{ $value }}" type="text" autofocus id="age" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Age to Data Collected date" />
                    @error('age.'.$value) <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Gender</label>
                        <select wire:model="gender.{{ $value }}" name="gender" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    @error('gender.'.$value) <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Civil Status</label>
                        <select wire:model="civil_status.{{ $value }}" name="civil_status" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                                <option value="Unmarried">Unmarried</option>
                                <option value="Married">Married</option>
                                <option value="Widow/ Widower">Widow/ Widower</option>
                                <option value="Separated">Separated</option>
                                <option value="Divorced">Divorced</option>
                        </select>
                    @error('civil_status.'.$value) <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="flex items-center  mb-5">
                    <div class="flex flex-col w-3/12 px-2">
                        <label for="username" class="block text-black">Highest level of education</label>
                        <select wire:model="education.{{ $value }}" name="education" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                                <option value="No schooling">No schooling</option>
                                <option value="Grade 1 to 5">Grade 1 to 5</option>
                                <option value="Grade 6 to 11">Grade 6 to 11</option>
                                <option value="Up to O/L">Up to O/L</option>
                                <option value="Up to A/L">Up to A/L</option>
                                <option value="Above A/L">Above A/L</option>
                        </select>
                    @error('education.'.$value) <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-3/12 px-2">
                        <label for="username" class="block text-black">If schooling, present grade</label>
                        <input  wire:model="school_grade.{{ $value }}" type="text" autofocus id="school_grade" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="School Grade" />
                    @error('school_grade.'.$value) <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-3/12 px-2">
                        <label for="username" class="block text-black">Employment status</label>
                        <select wire:model="employment.{{ $value }}" name="employment" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                            <option value="Employed">Employed</option>
                            <option value="Unemployed">Unemployed</option>
                            <option value="Under employed ">Under employed </option>
                            <option value="Seasonal employment">Seasonal employment</option>
                            <option value="Part time employment">Part time employment</option>
                        </select>
                    @error('employment.'.$value) <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-3/12 px-2">
                        <label for="username" class="block text-black">Physical/ health condition</label>
                        <select wire:model="health.{{ $value }}" name="health" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                                <option value="Normal">Normal</option>
                                <option value="Physically disabled">Physically disabled</option>
                                <option value="Mentally disabled">Mentally disabled</option>
                                <option value="Suffer from chronic illness">Suffer from chronic illness</option>
                        </select>
                    @error('health.'.$value) <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                </div>

                <button wire:click.prevent="remove({{$key}})" class="bg-red-600 float-right  text-white p-2 w-28 rounded-10 hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">
                    Remove
                    <div wire:loading wire:target="remove">
                        <i class="fas fa-cog fa-spin"></i>
                    </div>
                </button>
            </div>
            <br/>
            @endforeach
        </div>
        <div wire:ignore.self class="tab-pane fade" id="pills-finish" role="tabpanel" aria-labelledby="pills-finish-tab">
            <div class="flex-auto flex justify-center content-center mt-5 mb-5">
                <p>Confirm Every required data are filled before save the data.</p>
            </div>
            <div class="flex-auto flex justify-center content-center mt-5 mb-2">

                <button wire:click.prevent="saveData" class="bg-green-600 float-right  text-white p-2 w-28 rounded-10 hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">
                    Save Data
                    <div wire:loading wire:target="saveData">
                        <i class="fas fa-cog fa-spin"></i>
                    </div>
                </button>
            </div>

            <div class="flex-auto flex justify-center content-center mt-5 mb-2">
                <div wire:loading wire:target="saveData">
                    <p class="text-blue-600">Please Wait. Data is Saving to the database</p>
                </div>
            </div>


        </div>
        @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Sorry!</strong> invalid input.<br><br>
                        <ul style="list-style-type:none;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    </div>
</div>
