<div>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
             
                <h5 class="modal-title" id="exampleModalLabel">Add New Resourse Person</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Name:</span>
                    <input wire:model="name" class="border border-2 rounded-r px-4 py-2 w-full" placeholder="Resourse Person's Name" type="text" name="name" spellcheck="false" data-ms-editor="true">
                </div>
                <br/>
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Profession:</span>
                    <input wire:model="proffesion" class="border border-2 rounded-r px-4 py-2 w-full" type="text" name="guard_name"  spellcheck="false" data-ms-editor="true">
                </div>
                <br/>
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Institute:</span>
                    <input wire:model="institute" class="border border-2 rounded-r px-4 py-2 w-full" type="text" name="guard_name"  spellcheck="false" data-ms-editor="true">
                </div>
                <br/>
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">CV:</span>
                    <div class="border border-2 rounded-r px-4 py-2 w-full"
                        x-data="{ isUploading: false, progress: 0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        <!-- File Input -->
                        <input wire:model="cv" class="px-4 py-2 w-full" type="file" name="guard_name"  spellcheck="false" data-ms-editor="true">

                        <!-- Progress Bar -->
                        <div x-show="isUploading" class="px-4 py-2 w-9/12">
                            <progress max="100" x-bind:value="progress"></progress>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click="store()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

