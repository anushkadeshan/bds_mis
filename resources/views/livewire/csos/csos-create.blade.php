<div>
    @if(session()->has('message'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" id="alert" class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
        <p>{{ session('message') }}</p>
    </div>
    @endif
    <div class="p-4 bg-white">
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-3">
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="Medium">Name</label>
                <input wire:model="name" id="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('name') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="Medium">Registration No</label>
                <input wire:model="reg_no" id="reg_no" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('reg_no') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="Medium">District</label>
                <select wire:model="selectedDistrict" id="district" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
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
                @error('school') <span class="text-danger">*{{ $message }}</span> @enderror
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
                <label class="text-gray-700 dark:text-gray-200" for="Medium">Category</label>
                <select wire:model="category" id="category" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    <option  value="">Select Option</option>
                    <option  value="Elders">Elders</option>
                    <option  value="Youths">Youths</option>
                </select> @error('category') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="p-6 bg-white mt-4 my-4">
        <h4>CSO Members</h4>
        <div class="grid justify-items-end">

            <button wire:click.prevent="add({{$i}})" wire:loading.attr="disabled" class=" bg-blue-600 float-right  text-white p-2 w-28 rounded-10 hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">
                Add New
                <div wire:loading wire:target="add">
                    <i class="fas fa-cog fa-spin"></i>
                </div>

            </button>
        </div>

        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-3">
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="Medium">Member Name</label>
                <input wire:model="member_name.0" id="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('name') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="Medium">Member NIC</label>
                <input wire:model="nic.0" id="nic" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('nic') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="Medium">HHID </label>
                <input wire:model="hh_id.0" id="hh_id" type="text" placeholder="If Member is already in our target group" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('hh_id') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
        </div>
        @foreach($inputs as $key => $value)
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-3">

            <div>
                <label class="text-gray-700 dark:text-gray-200" for="Medium">Name</label>
                <input wire:model="member_name.{{ $value }}" id="name" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('member_name.'.$value) <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="Medium">NIC</label>
                <input wire:model="nic.{{ $value }}" id="nic" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('nic.'.$value) <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="Medium">HHID </label>
                <input wire:model="hh_id.{{ $value }}" id="hh_id" type="text" placeholder="If Member is already in our target group" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                /> @error('hh_id.'.$value) <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-1 justify-items-end">
        <button wire:click.prevent="remove({{$key}})" class="mt-2 bg-red-600 float-right  text-white p-2 w-28 rounded-10 hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">
            Remove
            <div wire:loading wire:target="remove">
                <i class="fas fa-cog fa-spin"></i>
            </div>
        </button>
        </div>
        @endforeach
    </div>

    <button x-show="step === 5" wire:click.prevent="saveData" class="text-white bg-green-700 hover:bg-green-600 font-bold py-2 px-4 rounded inline-flex items-center">
        <svg wire:loading wire:target="saveData" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <span wire:loading wire:target="saveData">Saving</span>
        <span wire:loading.remove wire:target="saveData"><i class="fa fa-save"></i> Save</span>
    </button>
</div>
