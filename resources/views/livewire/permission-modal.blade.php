<div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Add New Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="flex">
                    <span class="text-sm border border-2 w-26 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Permission Name:</span>
                    <input wire:model="name" class="border border-2 rounded-r px-4 py-2 w-full" type="text" name="name" spellcheck="false" data-ms-editor="true">
                </div>
                <br/>
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Guard Name:</span>
                    <input wire:model="guard_name" class="border border-2 rounded-r px-4 py-2 w-full" type="text" name="guard_name"  spellcheck="false" data-ms-editor="true">
                </div>
                <br/>
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Only Super Admin:</span>
                    <select wire:model="only_super_admin" class="border border-2 rounded-r px-4 py-2 w-full" name="" id="">
                        <option value="">Select Option</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click="store()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
