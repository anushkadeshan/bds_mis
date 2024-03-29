<div>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/date-picker.css')}}">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
                <button type="button" class="btn-bsclose" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(session()->has('message'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" id="alert" class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>{{ session('message') }}</p>
                </div>
                @endif
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Project Title :</span>
                    <input wire:model="name" class="border border-2 rounded-r px-4 py-2 w-full" type="text" name="name" spellcheck="false" data-ms-editor="true">

                </div>
                @error('name') <span class="text-danger">*{{ $message }}</span> @enderror
                <br/>
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Project Goal :</span>
                    <input wire:model="goal" class="border border-2 rounded-r px-4 py-2 w-full" type="text" name="name" spellcheck="false" data-ms-editor="true">

                </div>
                @error('goal') <span class="text-danger">*{{ $message }}</span> @enderror
                <br/>
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Project Start At :</span>
                    <div class="input-group">
                        <input wire:model="started_at" class="datepicker-here form-control digits" type="date" >
                      </div>
                </div>
                @error('started_at') <span class="text-danger">*{{ $message }}</span> @enderror
                <br/>
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Project End At :</span>
                    <div class="input-group">
                        <input wire:model="end_at" class="datepicker-here form-control digits" type="date" >
                      </div>
                </div>
                @error('end_at') <span class="text-danger">*{{ $message }}</span> @enderror
                <br/>
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Budget :</span>
                    <div class="input-group">
                        <input wire:model="budget" class="datepicker-here form-control digits" type="number" >
                      </div>
                </div>
                @error('budget') <span class="text-danger">*{{ $message }}</span> @enderror
                <br/>

                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Type :</span>
                    <select wire:model="type" class="border border-2 rounded-r px-4 py-2 w-full">
                        <option value="">Select option</option>
                        <option value="Livilyhood">Livilyhood</option>
                        <option value="Education" >Education</option>
                        <option value="Other" >Other</option>
                    </select>
                </div>
                @error('type') <span class="text-danger">*{{ $message }}</span> @enderror
                <br/>

                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">District :</span>
                    <select wire:model="districts" class="border border-2 rounded-r px-4 py-2 w-full" multiple>
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
                @error('districts') <span class="text-danger">*{{ $message }}</span> @enderror

                <br/>

                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">DSDs :</span>
                    <select wire:model="selectedDsd" class="border border-2 rounded-r px-4 py-2 w-full" multiple>

                        @foreach($dsds as $dsd)
                                    <option value="{{$dsd->id}}" >{{$dsd->name}}</option>
                                @endforeach
                            </select> @error('selectedDsd') <span class="text-danger">*{{ $message }}</span> @enderror
                </div>
                @error('selectedDsd') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click="store()" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>

</div>
