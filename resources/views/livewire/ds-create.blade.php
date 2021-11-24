<div>
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Add New DS Division</h5>
                <button type="button" class="btn-close" data-bs-ismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">DS Name:</span>
                    <input wire:model="name" class="border border-2 rounded-r px-4 py-2 w-full" type="text" name="name" spellcheck="false" data-ms-editor="true">

                </div>
                @error('name') <span class="text-danger">*{{ $message }}</span> @enderror
                <br/>
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">District:</span>
                    <select wire:model="district" class="border border-2 rounded-r px-4 py-2 w-full">
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
                </div>
                @error('district') <span class="text-danger">*{{ $message }}</span> @enderror
                <br/>
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Province:</span>
                    <select wire:model="province" class="border border-2 rounded-r px-4 py-2 w-full">
                        <option value="">Select option</option>
                        <option value="Northern">Northern</option>
                        <option value="North Central" >North Central</option>
                        <option value="Eastern" >Eastern</option>
                        <option value="North Western" >North Western</option>
                        <option value="Central" >Central</option>
                        <option value="Sabaragamuwa">Sabaragamuwa</option>
                        <option value="Southern" >Southern</option>
                        <option value="Western" >Western</option>
                        <option value="Uva" >Uva</option>
                    </select>
                </div>
                @error('province') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click="store()" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
</div>
