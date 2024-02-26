<div>
    <div class="flex items-center justify-between mb-5">
        <div class="flex flex-col w-4/12 px-2">
            <label for="title" class="block text-black">EPF</label>
            <input type="number" wire:model="epf"
                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
            @error('epf') <span class="text-danger">*{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col w-4/12 px-2">
            <label for="username" class="block text-black">Title</label>
            <select wire:model="title" name="title"
                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
                <option value="">Select Option</option>
                <option value="Mr.">Mr.</option>
                <option value="Ms.">Ms.</option>
            </select>
            @error('title') <span class="text-danger">*{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col w-4/12 px-2">
            <label for="title" class="block text-black">Calling Name</label>
            <input type="text" wire:model="calling_name"
                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
            @error('calling_name') <span class="text-danger">*{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="flex items-center justify-between mb-5">
        <div class="flex flex-col w-8/12 px-2">
            <label for="title" class="block text-black">Full Name</label>
            <input type="text" wire:model="full_name"
                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
            @error('full_name') <span class="text-danger">*{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col w-4/12 px-2">
            <label for="username" class="block text-black">Gender</label>
            <select wire:model="gender" name="title"
                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
                <option value="">Select Option</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
            @error('gender') <span class="text-danger">*{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="flex items-center justify-between mb-5">
        <div class="flex flex-col w-6/12 px-2">
            <label for="title" class="block text-black">Date of Birth</label>
            <input type="date" wire:model="date_of_birth"
                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
            @error('date_of_birth') <span class="text-danger">*{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col w-6/12 px-2">
            <label for="title" class="block text-black">Branch</label>
            <input type="text" wire:model="branch"
                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
            @error('branch') <span class="text-danger">*{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="flex items-center justify-between mb-5">
        <div class="flex flex-col w-6/12 px-2">
            <label for="title" class="block text-black">Mobile Number</label>
            <input type="number" wire:model="mobile_number"
                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
            @error('mobile_number') <span class="text-danger">*{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col w-6/12 px-2">
            <label for="username" class="block text-black">Company</label>
            <select wire:model="company" name="title"
                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
                <option value="">Select Option</option>
                <option value="BDS">BDS</option>
                <option value="BMIC">BMIC</option>
            </select>
            @error('company') <span class="text-danger">*{{ $message }}</span>
            @enderror
        </div>
    </div>

    <input type="button" class="btn btn-primary" value="Save" wire:click="save">
</div>
