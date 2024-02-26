<div>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card">
                <div class="p-4 card-header">
                    <div class="header-top">
                        <h5>Add Budget to
                            Activities
                            <i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                                data-bs-original-title="Project, Pre-Condition, Outcome, Output, Activity, District, DS Division, GN Division and Fiancial Year cannot be changed again">
                            </i>
                        </h5>
                        <div class="card-header-right-icon">
                            <label for="">Financial Year : </label>
                            <select wire:model="financial_year" name="financial_year" class="button btn btn-success"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
                                <option value="">Select a Year</option>
                                @foreach($yearArray as $year)
                                <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" id="alert"
                        class="flex items-center px-4 py-3 text-sm font-bold text-white bg-green-500" role="alert">
                        <svg class="w-4 h-4 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                        </svg>
                        <p>{{ session('message') }}</p>
                    </div>
                    @endif
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex flex-col w-6/12 px-2">
                            <label for="responsible_officer" class="block text-black">Project</label>
                            <select wire:model="project_id" name="dsd_id"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
                                <option value="">Select option</option>
                                @foreach($projects as $p)
                                <option value="{{$p->id}}"> {{$p->name}} </option>
                                @endforeach
                            </select>
                            @error('project_id') <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col w-6/12 px-2">
                            <label for="responsible_officer" class="block text-black">Pre Condition</label>
                            <select wire:model="pre_condition_id" name="dsd_id"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
                                <option value="">Select option</option>
                                @foreach($pre_conditions as $p)
                                <option value="{{$p->id}}"> {{$p->pre_condition}} </option>
                                @endforeach
                            </select>
                            @error('pre_condition_id') <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex flex-col w-6/12 px-2">
                            <label for="responsible_officer" class="block text-black">Outcome</label>
                            <select wire:model="outcome_id" name="dsd_id"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
                                <option value="">Select option</option>
                                @foreach($outcomes as $p)
                                <option value="{{$p->id}}"> {{$p->outcome}} </option>
                                @endforeach
                            </select>
                            @error('outcome_id') <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col w-6/12 px-2">
                            <label for="responsible_officer" class="block text-black">Output</label>
                            <select wire:model="output_id" name="dsd_id"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
                                <option value="">Select option</option>
                                @foreach($outputs as $p)
                                <option value="{{$p->id}}"> {{$p->output}} </option>
                                @endforeach
                            </select>
                            @error('output_id') <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="flex items-center justify-between mb-5">
                        <div class="flex flex-col w-full px-2">
                            <label for="responsible_officer" class="block text-black">Activity</label>
                            <select wire:model="activity_id" name="dsd_id"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
                                <option value="">Select option</option>
                                @foreach($activities as $a)
                                <option value="{{$a->id}}"> {{$a->name}} </option>
                                @endforeach
                            </select>
                            @error('activity_id') <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex flex-col w-4/12 px-2">
                            <label for="username" class="block text-black">District</label>
                            <select wire:model="selectedDistrict" name="district"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                wire:select="updatedSelectedDistrict">
                                <option value="">Select option</option>
                                <option value="Kandy">Kandy</option>
                                <option value="Anuradhapura">Anuradhapura</option>
                                <option value="Batticaloa">Batticaloa</option>
                                <option value="Jaffna">Jaffna</option>
                                <option value="Kegalle">Kegalle</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Mullativu">Mullativu</option>
                                <option value="Nuwara Eliya">Nuwara Eliya</option>
                                <option value="Trincomalee">Trincomalee</option>
                                <option value="Vavuniya">Vavuniya</option>
                            </select>
                            @error('selectedDistrict') <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col w-6/12 px-2">
                            <label for="username" class="block text-black">DS Division</label>
                            <select wire:model="selectedDsd" name="dsd_id"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                wire:select="updatedSelectedDsd">
                                <option value="">Select option</option>
                                @foreach($dsds as $dsd)
                                <option value="{{$dsd->id}}">{{$dsd->name}}</option>
                                @endforeach
                            </select>
                            @error('selectedDsd') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col w-6/12 px-2">
                            <label for="username" class="block text-black">GN Division</label>
                            <select wire:model="selectedGnd" name="gn_id" multiple
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                wire:select="updatedSelectedDsd">
                                <option value="">Select option</option>
                                @foreach($gnds as $gnd)
                                <option value="{{$gnd->id}}">{{$gnd->name}}</option>
                                @endforeach
                            </select>
                            @error('selectedGnd') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-5">

                        <div class="flex flex-col w-3/12 px-2">
                            <label for="no_of_units" class="block text-black">Total No of Units</label>
                            <input type="number" wire:model="no_of_units"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                            @error('no_of_units') <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col w-3/12 px-2">
                            <label for="year" class="block text-black">Cost per Unit</label>
                            <input type="number" wire:model="cost_per_unit"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                            @error('cost_per_unit') <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex flex-col w-3/12 px-2">
                            <label for="type_of_unit" class="block text-black">Type of Unit</label>
                            <select wire:model="type_of_unit" name="district"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
                                <option value="">Select option</option>
                                <option value="Action Plan">Action Plan</option>
                                <option value="Assessment">Assessment</option>
                                <option value="Booklet">Booklet</option>
                                <option value="Coordination">Coordination</option>
                                <option value="Development plan">Development plan</option>
                                <option value="Enterprise">Enterprise</option>
                                <option value="Follow-up Visit">Follow-up Visit</option>
                                <option value="follow-up visits">follow-up visits</option>
                                <option value="Forms">Forms</option>
                                <option value="Forum">Forum</option>
                                <option value="House Renovation">House Renovation</option>
                                <option value="Identification">Identification</option>
                                <option value="Libraray">Libraray</option>
                                <option value="Livelihood">Livelihood</option>
                                <option value="Lumpsum">Lumpsum</option>
                                <option value="Meeting">Meeting</option>
                                <option value="Meetings">Meetings</option>
                                <option value="Month">Month</option>
                                <option value="New House">New House</option>
                                <option value="No fo hours">No fo hours</option>
                                <option value="Person">Person</option>
                                <option value="Programs">Programs</option>
                                <option value="Project">Project</option>
                                <option value="School">School</option>
                                <option value="Student">Student</option>
                                <option value="Study Report">Study Report</option>
                                <option value="toilet">toilet</option>
                                <option value="Training">Training</option>
                                <option value="Trainings">Trainings</option>
                                <option value="Water Connection">Water Connection</option>
                                <option value="Workshop">Workshop</option>
                                <option value="Youth">Youth</option>
                                <option value="Youth Club">Youth Club</option>
                            </select>
                            @error('no_of_units') <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col w-3/12 px-2">
                            <label for="year" class="block text-black">Proposed broader activities</label>
                            <select wire:model="boarder_activity" name="boarder_activity"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
                                <option value="">Select option</option>
                                <option value="Admin Staff">Admin Staff</option>
                                <option value="Assess the capacity of CSOs related to BDS strategy">Assess the capacity
                                    of CSOs related to BDS strategy</option>
                                <option value="Capacity building of assessed CSOs">Capacity building of assessed CSOs
                                </option>
                                <option value="Capacity development of govt. institutes/officers">Capacity development
                                    of govt. institutes/officers</option>
                                <option value="Capacity development of youth societies">Capacity development of youth
                                    societies</option>
                                <option value="Community livelihoods">Community livelihoods</option>
                                <option
                                    value="Enhance the performance of secondary students in their subject knowledge and skills, common competencies, and their ability to envisage diverse career paths.">
                                    Enhance the performance of secondary students in their subject knowledge and skills,
                                    common competencies, and their ability to envisage diverse career paths.</option>
                                <option
                                    value="Enhancing the numeracy and literacy skills of the students from grade 3 to 5 in the selected schools.">
                                    Enhancing the numeracy and literacy skills of the students from grade 3 to 5 in the
                                    selected schools.</option>
                                <option value="Fix Assets">Fix Assets</option>
                                <option value="Housing">Housing</option>
                                <option value="Individual livelihoods">Individual livelihoods</option>
                                <option value="Job linking for youth">Job linking for youth</option>
                                <option value="MEAL periodical">MEAL periodical</option>
                                <option value="Monthly staff reflections">Monthly staff reflections</option>
                                <option value="NGO Tax">NGO Tax</option>
                                <option value="Overhead">Overhead</option>
                                <option value="Program Staff">Program Staff</option>
                                <option value="Quarterly community reflections">Quarterly community reflections</option>
                                <option value="Toilets in plantation">Toilets in plantation</option>
                                <option value="Tracer studies">Tracer studies</option>
                                <option value="Water projects in plantation">Water projects in plantation</option>
                                <option
                                    value="Work with School Development Societies (SDSs) in the selected schools to prepare and implement developments plans that leverage additional resources to the school.">
                                    Work with School Development Societies (SDSs) in the selected schools to prepare and
                                    implement developments plans that leverage additional resources to the school.
                                </option>
                                <option value="Youth self-enterprises">Youth self-enterprises</option>
                                <option value="Youth skill development">Youth skill development</option>
                            </select>
                            @error('boarder_activity') <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex flex-col w-6/12 px-2">
                            <label for="year" class="block text-black">Budget Valid From</label>
                            <input type="date" wire:model="budget_valid_from"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                            @error('budget_valid_from') <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col w-6/12 px-2">
                            <label for="no_of_units" class="block text-black">Budget Valid To</label>
                            <input type="date" wire:model="budget_valid_to"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                            @error('budget_valid_to') <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    @if($budget_valid_to == '' || $budget_valid_from == '')

                    @else
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-bordered checkbox-td-width">
                                <tbody>
                                    <tr class="table-info">
                                        <th scope="row">#</th>
                                        <th scope="row">Month</th>
                                        <td>Physical target</td>
                                    </tr>
                                    @foreach($months as $key => $value)
                                    <tr wire:key="{{$value}}">
                                        <td>{{$key+1}}</td>
                                        <td>{{$value}}
                                            <input class="form-control input-primary" wire:model.lazy="month.{{$key}}"
                                                id="exampleFormControlInput1" type="hidden"
                                                placeholder="Phisycal Target" data-bs-original-title="" title="">
                                        </td>
                                        <td class="w-50">
                                            <input class="form-control input-primary"
                                                wire:model.lazy="physical_target.{{$key}}" id="exampleFormControlInput1"
                                                type="number" placeholder="Phisycal Target" data-bs-original-title=""
                                                title="">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @endif

                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    @if($updateMode)
                    <button type="button" wire:click="update()" class="btn btn-primary">
                        <span wire:loading wire:target="update">
                            Please Wait...
                        </span>
                        <span wire:loading.remove>
                            Update changes
                        </span>

                    </button>
                    @else
                    <button type="button" wire:click="save_draft()" class="btn btn-success">Save As Draft</button>
                    <button type="button" wire:click="store()" class="btn btn-primary">
                        <span wire:loading wire:target="store">
                            Please Wait...
                        </span>
                        <span wire:loading.remove>
                            Send to Review
                        </span>

                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="loading-overlay" wire:loading.class="is-active" wire:target="project_id">
        <span class="fa fa-spinner fa-3x fa-spin"></span>
    </div>
    <div class="loading-overlay" wire:loading.class="is-active" wire:target="pre_condition_id">
        <span class="fa fa-spinner fa-3x fa-spin"></span>
    </div>
    <div class="loading-overlay" wire:loading.class="is-active" wire:target="outcome_id">
        <span class="fa fa-spinner fa-3x fa-spin"></span>
    </div>
    <div class="loading-overlay" wire:loading.class="is-active" wire:target="output_id">
        <span class="fa fa-spinner fa-3x fa-spin"></span>
    </div>
    <div class="loading-overlay" wire:loading.class="is-active" wire:target="activity_id">
        <span class="fa fa-spinner fa-3x fa-spin"></span>
    </div>

</div>
