<div>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="card">
                <div class="card-header">
                    <div class="header-top">
                        <h5>Add Progress <i class="fa fa-question-circle" data-bs-toggle="tooltip"
                                data-bs-placement="right" title=""
                                data-bs-original-title="Project, Pre-Condition, Outcome, Output, Activity, District, DS Division, GN Division, Completion Report and Fiancial Year cannot be changed again">
                            </i></h5>
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
                            @if(session()->has('completion_report'))
                            <span class="text-success">*{{session('completion_report')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex flex-col w-full px-2">
                            <label for="title" class="block text-black">Title of Activity</label>
                            <input type="text" wire:model="title"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                            @error('title') <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-5">


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
                            <select wire:model="selectedGnd" name="gn_id"
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
                        <div class="flex flex-col w-6/12 px-2">
                            <label for="no_of_units" class="block text-black">No of Units Completed</label>
                            <input type="number" wire:model="no_of_units"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                            @error('no_of_units') <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col w-6/12 px-2">
                            <label for="cost_per_unit" class="block text-black">Total Cost</label>
                            <input type="number" wire:model="total_cost"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                            @error('total_cost') <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex flex-col w-6/12 px-2">
                            <label for="no_of_units" class="block text-black">Activity Completed Date </label>
                            <input type="date" wire:model="completed_date"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                            @error('completed_date') <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col w-6/12 px-2">
                            <label for="username" class="block text-black">Completion Report</label>
                            <select wire:model="completion_report_id" name="gn_id"
                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
                                <option value="">Select option</option>
                                @foreach($completion_reports as $cr)
                                <option value="{{$cr->id}}">{{$cr->activity_code}} | {{$cr->date_of_start}} to
                                    {{$cr->date_of_end}}</option>
                                @endforeach
                            </select>
                            @error('completion_report_id') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    @if($updateMode)
                    <button type="button" wire:click="update()" class="btn btn-primary">Update changes</button>
                    @else
                    <button type="button" wire:click="store()" class="btn btn-primary">Save changes</button>
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
