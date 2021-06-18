<div>
    <form wire:submit.prevent="save">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Institutes</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (session()->has('message'))
                <div id="alert" class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>{{ session('message') }}</p>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                             <label for="name">Name</label>
                             <input type="text" wire:model="name" name="name" id="name" class="form-control">
                             @error('name') <span class="text-danger">*{{ $message }}</span> @enderror
                         </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                             <label for="location">Location</label>
                             <input type="text" wire:model="location" name="location" id="location" class="form-control">
                             @error('location') <span class="text-danger">*{{ $message }}</span> @enderror
                         </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                             <label for="address">Address</label>
                             <textarea  wire:model="address" class="form-control" id="address" name="address" rows="2"></textarea>
                             @error('address') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                             <label for="contact_person">Contact Person</label>
                             <input type="text" wire:model="contact_person" name="contact_person" id="contact_person" class="form-control">
                             @error('contact_person') <span class="text-danger">*{{ $message }}</span> @enderror
                         </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                             <label for="phone">Contact Number</label>
                             <input type="text" wire:model="phone" name="phone" id="phone" class="form-control">
                             @error('phone') <span class="text-danger">*{{ $message }}</span> @enderror
                         </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                             <label for="email">Email Address</label>
                             <input type="text" wire:model="email" name="email" id="email" class="form-control">
                             @error('email') <span class="text-danger">*{{ $message }}</span> @enderror
                         </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                             <label for="is_registerd">is Registered in TVEC ?</label>
                             <select wire:model="is_registerd" class="form-control" name="is_registerd" id="is_registerd">
                                 <option value="">Select Option</option>
                                 <option value="Yes">Yes</option>
                                 <option value="No">No</option>
                             </select>
                             @error('is_registerd') <span class="text-danger">*{{ $message }}</span> @enderror
                         </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"  id="reg" style="display: none">
                             <label for="reg_no">TVEC Registration No</label>
                             <input type="text" wire:model="reg_no" name="reg_no" id="reg_no" class="form-control">
                             @error('reg_no') <span class="text-danger">*{{ $message }}</span> @enderror
                         </div>
                    </div>
                   <div class="col-md-6">
                       <div class="form-group">
                           <label for="reg_no">Institute Type</label>
                           <select wire:model="type" class="form-control" name="type" id="type">
                               <option value="">Select Option</option>
                               <option value="Government">Government</option>
                               <option value="Non Government">Non Government</option>
                               <option value="Private">Private</option>
                           </select>
                           @error('type') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                   </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="text-white bg-gray-700 hover:bg-gray-600 py-2 px-4 rounded inline-flex items-center" data-dismiss="modal">Close</button>
                <button type="submit" class="text-white bg-green-700 hover:bg-green-600 py-2 px-4 rounded inline-flex items-center">
                    <svg wire:loading wire:target="save" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span wire:loading wire:target="save">Saving</span>
                    <span wire:loading.remove wire:target="save"><i class="fa fa-save"></i> Save</span>
                </button>
            </div>
        </div>
    </div>
    </form>
    @push('page_scripts')
    <script>
        $("document").ready(function(){
            setTimeout(function(){
                document.getElementById('alert').style.display = 'none';
              },5000)
        });
    </script>
    @endpush
</div>

