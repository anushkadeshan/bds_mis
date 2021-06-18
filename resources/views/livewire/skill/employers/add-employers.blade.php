<div>
    <form wire:submit.prevent="save">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Course</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (session()->has('message'))
                    <div id="alert" class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                        <p>{{ session('message') }}</p>
                    </div>
                    @endif
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="class col-md-6">
                            <div class="form-group">
                                <label for="name">Employer Name</label>
                                <input wire:model="name" type="text" class="form-control" id="name" name="name" placeholder="Enter Employer Name">
                                <span class="help-block"><strong>
                                    @error('name') <span class="text-danger">*{{ $message}}</span> @enderror
                                </strong></span>
                            </div>
                        </div>
                        <div class="class col-md-6">
                            <div class="form-group">
                                <label for="name">Telephone</label>
                                <input wire:model="phone" type="integer" class="form-control" id="phone" name="phone" placeholder="Enter Employer Phone Number">
                                <span class="help-block"><strong>
                                    @error('phone') <span class="text-danger">*{{ $message }}</span> @enderror
                                </strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="class col-md-6">
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input wire:model="email" type="email" class="form-control" id="email" name="email" placeholder="Enter Employer Email Address">
                                <span class="help-block"><strong>
                                    @error('email') <span class="text-danger">*{{ $message }}</span> @enderror
                                </strong></span>
                            </div>
                        </div>
                        <div class="class col-md-6">
                            <div class="form-group">
                                <label for="address">Employer Address</label>
                                <textarea wire:model="address" class="form-control" id="address" name="address" placeholder="Enter Employer Address" rows="4"></textarea>
                                <span class="help-block"><strong>
                                    @error('address') <span class="text-danger">*{{ $message }}</span> @enderror
                                </strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="class col-md-6">
                            <div class="form-group">
                                <label for="company_type">Company Type</label>
                                <select wire:model="company_type" id="company_type" name="company_type" class="form-control">
                                <option value="">Select Option</option>
                                <option>Sole Trader</option>
                                <option>Partnerships</option>
                                <option>Private Company</option>
                                <option>Public Company</option>
                                <option>Non-Profit Organization</option>
                                <option>Trust</option>
                                </select>
                                <span class="help-block"><strong>
                                    @error('company_type') <span class="text-danger">*{{ $message }}</span> @enderror
                                </strong></span>
                            </div>
                        </div>
                        <div class="class col-md-6">
                            <div class="form-group">
                                <label for="industry">Industry</label>
                                <select wire:model="industry" id="industry" name="industry" class="form-control">
                                    <option value="">Select Option  </option>
                                    <option>Agriculture &amp; Food Processing</option>
                                    <option>Automobiles</option>
                                    <option>Banking &amp; Financial Services</option>
                                    <option>BPO / KPO</option>
                                    <option>Civil &amp; Construction</option>
                                    <option>Consumer Goods &amp; Durables</option>
                                    <option>Consulting</option>
                                    <option>Education</option>
                                    <option>Engineering</option>
                                    <option>Ecommerce &amp; Internet</option>
                                    <option>Events &amp; Entertainment</option>
                                    <option>Export &amp; Import</option>
                                    <option>Government &amp; Public Sector</option>
                                    <option>Healthcare</option>
                                    <option>Hotel, Travel &amp; Leisure</option>
                                    <option>Insurance</option>
                                    <option>IT &amp; Telecom</option>
                                    <option>Logistics &amp; Transportation</option>
                                    <option>Manufacturing</option>
                                    <option>Manpower &amp; Security</option>
                                    <option>News &amp; Media</option>
                                    <option>NGO &amp; Non profit</option>
                                    <option>Pharmaceutical</option>
                                    <option>Real Estate</option>
                                    <option>Wholesale &amp; Retail</option>
                                    <option>Others</option>
                                </select>
                                <span class="help-block"><strong>
                                    @error('industry') <span class="text-danger">*{{ $message }}</span> @enderror
                                </strong></span>
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
