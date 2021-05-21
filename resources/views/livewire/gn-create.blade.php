<div>
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
             
                <h5 class="modal-title" id="exampleModalLabel">Add New Grama Niladhari Division</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">GN Name:</span>
                    <input wire:model="name" class="border border-2 rounded-r px-4 py-2 w-full" type="text" name="name" spellcheck="false" data-ms-editor="true">
                    
                </div>
                @error('name') <span class="text-danger">*{{ $message }}</span> @enderror
                <br/>
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">DS Division:</span>
                    <select wire:model="dsDivision" class="border border-2 rounded-r px-4 py-2 w-full">
                    <option>Select Option</option>
                    @foreach($dss as $ds)
                    <option value="{{$ds->id}}">{{$ds->name}}</option>
                    @endforeach
                    </select>
                </div>
                @error('dsDivision') <span class="text-danger">*{{ $message }}</span> @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click="store()" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
</div>
