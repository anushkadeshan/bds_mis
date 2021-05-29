<div>
    @if (session()->has('message'))
    <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
        <p>{{ session('message') }}</p>
    </div>
    @endif
    <form wire:submit.prevent="save">
    <div class="row mt-1">
        <div class="col-md-6">
            <div class="form-group">
                 <label for="name">Course Name</label>
                 <input type="text" wire:model="name" name="name" id="name" class="form-control">
             </div>
             @error('name') <span class="text-danger">*{{ $message }}</span> @enderror
        </div>
        <div class="col-md-6">
            <div class="form-group">
               <label>Duration</label>

               <div class="input-group">
                 <input type="number" wire:model="duration" id="duraion" name="duration" class="form-control">
                   <div class="input-group-append">
                       <span class="input-group-text">Months</span>
                    </div>
                </div>
                @error('duration') <span class="text-danger">*{{ $message }}</span> @enderror

         </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                 <label for="contact_person">Course Type</label>
                <select name="course_type" wire:model="course_type" id="course_type" class="form-control">
                    <option value="">Select Option</option>
                    <option value="Vocational Training">Vocational Training</option>
                    <option value="Proffessional Training">Proffessional Training</option>
                    <option value="Soft Skills">Soft Skills</option>
                </select>
                @error('course_type') <span class="text-danger">*{{ $message }}</span> @enderror
             </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                 <label>Standard/ Level</label>
                 <input type="text" wire:model="standard" name="standard" id="standard" class="form-control">
                 @error('standard') <span class="text-danger">*{{ $message }}</span> @enderror
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                 <label for="course_fee">Course Fee</label>
                 <div class="input-group">
                     <div class="input-group-append">
                       <span class="input-group-text">LKR</span>
                     </div>
                 <input type="number" wire:model="course_fee" step="500" name="course_fee" id="course_fee" class="form-control">
                 <div class="input-group-append">
                       <span class="input-group-text">.00</span>
                     </div>
                 </div>
                 @error('course_fee') <span class="text-danger">*{{ $message }}</span> @enderror
             </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                 <label for="course_time">Full/ Part Time</label>
                <select name="course_time" wire:model="course_time" id="course_time" class="form-control">
                    <option value="">Select Option</option>
                    <option>Full Time</option>
                    <option>Part Time</option>
                    <option>Both</option>
                </select>
                @error('course_time') <span class="text-danger">*{{ $message }}</span> @enderror
             </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                 <label for="medium">Medium</label>
                 <select class="form-control" wire:model="medium" name="medium[]" id="medium" multiple>
                     <option>Sinhala</option>
                     <option>English</option>
                     <option>Tamil</option>
                 </select>
                 @error('medium') <span class="text-danger">*{{ $message }}</span> @enderror
             </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                 <label for="min_qualification">Minimum Qualification</label>
                 <select name="min_qualification" wire:model="min_qualification" id="min_qualification" class="form-control">
                     <option value="">Select Option</option>
                     <option>Ordinary Level</option>
                     <option>Advanced Level</option>
                     <option>Certificate</option>
                     <option>Diploma</option>
                     <option>Higher Diploma</option>
                     <option>Degree</option>
                     <option>Masters</option>
                     <option>Doctorate</option>
                     <option>Skilled Apprentice</option>
                 </select>
                 @error('min_qualification') <span class="text-danger">*{{ $message }}</span> @enderror
             </div>
        </div>
       <div class="col-md-6">
           <div class="form-group">
               <label for="course_catogery">Course Category</label>
               <select name="course_catogery" wire:model="course_catogery" id="course_catogery" class="form-control">
                   <option value="">Select Option</option>
                    @foreach($course_categories as $key => $cc)
                       <option value="{{$cc->id}}">{{$cc->course_category}}</option>
                    @endforeach
               </select>
               @error('course_catogery') <span class="text-danger">*{{ $message }}</span> @enderror
           </div>
       </div>
       <div class="col-md-6">
           <div class="form-group">
               <label for="embeded_softs_skills" id="em_label">Is this course embedded with softskilles?</label>
               <select name="embeded_softs_skills" wire:model="embeded_softs_skills" id="embeded_softs_skills" class="form-control">
                   <option value="">Select Option</option>
                   <option value="Yes">Yes</option>
                   <option value="No">No</option>
               </select>
               @error('embeded_softs_skills') <span class="text-danger">*{{ $message }}</span> @enderror
           </div>
       </div>
       <div class="modal-footer">
            <button type="submit" class="text-white bg-green-700 hover:bg-green-600 py-2 px-4 rounded inline-flex items-center">
                <svg wire:loading wire:target="saveData" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span wire:loading wire:target="save">Saving</span>
                <span wire:loading.remove wire:target="save"><i class="fa fa-save"></i> Save</span>
            </button>
        </div>
    </div>
</form>
</div>
