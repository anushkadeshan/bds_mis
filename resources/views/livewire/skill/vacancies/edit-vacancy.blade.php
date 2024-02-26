<div>
    <form wire:submit.prevent="save">
        @if (session()->has('message'))
            <div id="alert" class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                <p>{{ session('message') }}</p>
            </div>
        @endif
        <div class="row mt-3">

        <div class="col-md-12">
            <div class="card card-absolute">
                <div class="card-header bg-primary">
                    <h5 class="card-title">Edit Vacancy Details</h5>
                  </div>
                  <div class="card-body">
                          <div class="form-group">
                            <label for="title">Job Title</label>
                            <input type="text" wire:model="title" class="form-control" name="title" id="title" placeholder="Enter Job Title">
                            @error('title') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                          <div class="form-group">
                              <label for="description">Job Description</label>
                              <textarea wire:model="description" name="description" id="description" class="form-control" rows="3" placeholder="Enter Job Description"></textarea>
                              @error('description') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="job_type">Job Type</label>
                                    <select wire:model="job_type" id="job_type" name="job_type" class="form-control">
                                        <option value="">Select Option</option>
                                        <option>Full Time</option>
                                        <option>Part Time</option>
                                        <option>Contractual</option>
                                        <option>Internship</option>
                                        <option>Temporary</option>
                                        <option>Work from Home</option>
                                    </select>
                                    @error('job_type') <span class="text-danger">*{{ $message }}</span> @enderror
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group"	>
                                      <label for="business_function">Business Function</label>
                                      <select wire:model="business_function" class="form-control" name="business_function">
                                          <option value="">Select Option</option>
                                          <option>Administration</option>
                                          <option>Accounting &amp; Finance</option>
                                          <option>Customer Support</option>
                                          <option>Data Entry &amp; Analysis</option>
                                          <option>Creative, Design &amp; Architecture</option>
                                          <option>Education &amp; Training</option>
                                          <option>Hospitality</option>
                                          <option>Human Resources</option>
                                          <option>IT &amp; Telecom</option>
                                          <option>Legal</option>
                                          <option>Logistics</option>
                                          <option>Management</option>
                                          <option>Manufacturing</option>
                                          <option>Marketing &amp; PR</option>
                                          <option>Operations</option>
                                          <option>Quality Assurance</option>
                                          <option>Research &amp; Technical</option>
                                          <option>Sales &amp; Distribution</option>
                                          <option>Security</option>
                                          <option>Others</option>
                                      </select>
                                      @error('business_function') <span class="text-danger">*{{ $message }}</span> @enderror
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="location">Location</label>
                                      <div id="locationList"></div>
                                      <input wire:model="location" class="form-control" type="text" id="location" name="location" placeholder="Enter Location">
                                      @error('location') <span class="text-danger">*{{ $message }}</span> @enderror
                                    </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group"	>
                                      <label for="salary">Salary</label>
                                      <input wire:model="salary" class="form-control" step="any" type="number" id="salary" name="salary" placeholder="Optional">
                                      @error('salary') <span class="text-danger">*{{ $message }}</span> @enderror
                                    </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="location">Total Vacancies</label>
                                      <div id="total_vacancies"></div>
                                      <input wire:model="total_vacancies" class="form-control" step="1" type="number" id="total_vacancies" name="total_vacancies" placeholder="Optional">
                                      @error('total_vacancies') <span class="text-danger">*{{ $message }}</span> @enderror
                                     </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Closing Date</label>
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <input wire:model="dedline" type="date" id="dedline" name="dedline" class="form-control" >
                                        @error('dedline') <span class="text-danger">*{{ $message }}</span> @enderror
                                    </div>

                                </div>
                            </div>
                              </div>
                          </div>
                  </div>
            </div>

        <div class="col-md-6">
            <div class="card card-absolute">
                <div class="card-header bg-primary">
                    <h5 class="card-title">Candidate Profile</h5>
                  </div>
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                              <label for="min_qualification">Minimum qualification</label>
                              <select wire:model="min_qualification" name="min_qualification" id="min_qualification" class="form-control">
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
                                  <label for="specializaion">Educational Specialization</label>
                                  <select wire:model="specializaion" name="specializaion" id="specializaion" class="form-control">
                                      <option value="">Select Option</option>
                                      <option>Art &amp; Humanities</option>
                                      <option>Business &amp; Management</option>
                                      <option>Accounting</option>
                                      <option>Design &amp; Fashion</option>
                                      <option>Engineering</option>
                                      <option>Events &amp; Hospitality</option>
                                      <option>Finance &amp; Commerce</option>
                                      <option>Human Resources</option>
                                      <option>Information Technology</option>
                                      <option>Law</option>
                                      <option>Marketing &amp; Sales</option>
                                      <option>Media &amp; Journalism</option>
                                      <option>Medicine</option>
                                      <option>Sciences</option>
                                      <option>Vocational &amp; Technical</option>
                                      <option>Others</option>
                                  </select>
                                  @error('specializaion') <span class="text-danger">*{{ $message }}</span> @enderror
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="skills">Required Skills</label>
                          <textarea wire:model="skills" name="skills" id="skills" placeholder="Optional" class="form-control"></textarea>
                          @error('skills') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                      <div class="form-group">
                          <label for="gender">Gender Preferance</label>
                          <select wire:model="gender" name="gender" id="gender" class="form-control">
                              <option value="">Select Option</option>
                              <option>Male</option>
                              <option>Female</option>
                              <option>Any</option>
                          </select>
                          @error('gender') <span class="text-danger">*{{ $message }}</span> @enderror
                      </div>

                      <div class="form-group">
                          <label for="gender">Employer</label>
                          <select wire:model="employer_id" name="employer_id" id="employer_id" class="form-control">
                              <option value="">Select Option</option>
                              @foreach($employers as $employer)
                                <option value="{{$employer->id}}">{{$employer->name}}</option>
                              @endforeach
                          </select>
                          @error('employer_id') <span class="text-danger">*{{ $message }}</span> @enderror
                      </div>
                      <br>
                      <div class="form-group">
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
