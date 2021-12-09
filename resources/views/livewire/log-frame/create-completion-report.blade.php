<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="header-top">
                            <h5>Create Completion Reports</h5>
                            <div class="card-header-right-icon">
                                <label for="">Financial Year : </label>
                                <select wire:model="financial_year" name="financial_year" class="button btn btn-success"
                                class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                                <option value="">Select a Year</option>
                                @foreach($yearArray  as $year)
                                <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-xs-12">
                            <div class="flex items-center justify-between mb-5">
                                <div class="flex flex-col w-6/12 px-2">
                                    <label for="responsible_officer" class="block text-black">Project</label>
                                    <select wire:model="project_id" name="dsd_id"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                                        <option value="">Select option</option>
                                        @foreach($projects as $p)
                                        <option value="{{$p->id}}">{{$p->name}} </option>
                                        @endforeach
                                    </select>
                                    @error('project_id') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-6/12 px-2">
                                    <label for="responsible_officer" class="block text-black">Pre Condition</label>
                                    <select wire:model="pre_condition_id" name="dsd_id"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                                        <option value="">Select option</option>
                                        @foreach($pre_conditions as $a)
                                        <option value="{{$a->id}}">{{$a->code}} | {{$a->pre_condition}}</option>
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
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" >
                                        <option value="">Select option</option>
                                        @foreach($outcomes as $a)
                                        <option value="{{$a->id}}">{{$a->code}} | {{$a->outcome}}</option>
                                        @endforeach
                                    </select>
                                    @error('outcome_id') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-6/12 px-2">
                                    <label for="responsible_officer" class="block text-black">Output</label>
                                    <select wire:model="output_id" name="dsd_id"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                                        <option value="">Select option</option>
                                        @foreach($outputs as $b)
                                        <option value="{{$b->id}}"> {{$b->code}} | {{$b->output}}</option>
                                        @endforeach
                                    </select>
                                    @error('output_id') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex items-center justify-between mb-5">
                                <div class="flex flex-col w-full px-2">
                                    <label for="log_activity_name" class="block text-black">Activity name as mentioned
                                        in the logframe </label>
                                    <select wire:model="activity_id" name="dsd_id"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                                        <option value="">Select option</option>
                                        @foreach($activities as $activity)
                                        <option value="{{$activity->id}}">{{$activity->code}} | {{$activity->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('log_activity_name') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12">

                            <div class="flex items-center justify-between mb-5">
                                <div class="flex flex-col w-6/12 px-2">
                                    <label for="responsible_officer" class="block text-black">Name of the responsible
                                        officer</label>
                                    <input type="text" autofocus wire:model="responsible_officer"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="Responsible Officer" />
                                    @error('responsible_officer') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="flex flex-col w-6/12 px-2">
                                    <label for="username" class="block text-black">District</label>
                                    <select wire:model="selectedDistrict" name="district"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        wire:select="updatedSelectedDistrict">
                                        <option value="">Select option</option>
                                        <option value="Colombo">Colombo</option>
                                        <option value="Kandy">Kandy</option>
                                        <option value="Galle">Galle</option>
                                        <option value="Ampara">Ampara</option>
                                        <option value="Anuradhapura">Anuradhapura</option>
                                        <option value="Badulla">Badulla</option>
                                        <option value="Batticaloa">Batticaloa</option>
                                        <option value="Gampaha">Gampaha</option>
                                        <option value="Hambantota">Hambantota</option>
                                        <option value="Jaffna">Jaffna</option>
                                        <option value="Kalutara">Kalutara</option>
                                        <option value="Kegalle">Kegalle</option>
                                        <option value="Kilinochchi">Kilinochchi</option>
                                        <option value="Kurunegala" ">Kurunegala</option>
                                                <option value=" Mannar">Mannar</option>
                                        <option value="Matale">Matale</option>
                                        <option value="Matara" ">Matara</option>
                                                <option value=" Moneragala">Moneragala</option>
                                        <option value="Mullativu">Mullativu</option>
                                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                                        <option value="Polonnaruwa">Polonnaruwa</option>
                                        <option value="Puttalam">Puttalam</option>
                                        <option value="Ratnapura">Ratnapura</option>
                                        <option value="Trincomalee" ">Trincomalee</option>
                                                <option value=" Vavuniya">Vavuniya</option>
                                    </select>
                                    @error('selectedDistrict') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex items-center justify-between mb-5">
                                <div class="flex flex-col w-6/12 px-2">
                                    <label for="username" class="block text-black">DS Division</label>
                                    <select wire:model="selectedDsd" name="dsd_id"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
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
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        wire:select="updatedSelectedDsd">
                                        <option value="">Select option</option>
                                        @foreach($gnds as $gnd)
                                        <option value="{{$gnd->id}}">{{$gnd->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('selectedGnd') <span class="text-danger">*{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="flex  items-center justify-between mb-5">
                                <div class="flex flex-col w-3/12 px-2">
                                    <label for="date_of_start" class="block text-black">Date of Start</label>
                                    <input type="date" autofocus wire:model="date_of_start"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" />
                                    @error('date_of_start') <span class="text-danger">*{{ $message }}</span> @enderror

                                </div>
                                <div class="flex flex-col w-3/12 px-2">
                                    <label for="date_of_end" class="block text-black">Date of End</label>
                                    <input type="date" autofocus wire:model="date_of_end"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" />
                                    @error('date_of_end') <span class="text-danger">*{{ $message }}</span> @enderror

                                </div>

                                <div class="flex flex-col w-3/12 px-2">
                                    <label for="partner_contribution" class="block text-black">Partner
                                        Contribution</label>
                                    <input type="number" autofocus wire:model="partner_contribution"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" />
                                    @error('partner_contribution') <span class="text-danger">*{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="flex flex-col w-3/12 px-2">
                                    <label for="bds_contribution" class="block text-black">BDS Contribution</label>
                                    <input type="number" autofocus wire:model="bds_contribution"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" />
                                    @error('bds_contribution') <span class="text-danger">*{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                            <div class="flex items-center justify-between mb-5">

                                <div class="flex flex-col w-4/12 px-2">
                                    <label for="totol_planned_cost" class="block text-black">Total Planned Cost</label>
                                    <input type="number" autofocus wire:model="totol_planned_cost"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" />
                                    @error('totol_planned_cost') <span class="text-danger">*{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="flex flex-col w-4/12 px-2">
                                    <label for="totdal_actual_cost" class="block text-black">Total Actual Cost</label>
                                    <input type="number" autofocus wire:model="totdal_actual_cost"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" />
                                    @error('totdal_actual_cost') <span class="text-danger">*{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="flex flex-col w-4/12 px-2">
                                    <label for="units_completed" class="block text-black">Units Completed</label>
                                    <input type="number" autofocus wire:model="units_completed"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" />
                                    @error('units_completed') <span class="text-danger">*{{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div class="flex mb-5">

                                <div class="flex flex-col w-full px-2">
                                    <label for="lessions_learned" class="block text-black">Lessons
                                        learned/strengths/weaknesses & your recommendations.</label>
                                    <textarea rows="5" type="number" autofocus wire:model="lessions_learned"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"></textarea>
                                    @error('lessions_learned') <span class="text-danger">*{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-12 col-xl-12 mt-20">
                    <div class="card card-absolute">
                        <div class="card-header bg-secondary">
                            <h5 class="text-white">Partners Data</h5>
                        </div>
                        <div class="card-body">
                            <div wire:ignore.self >
                                <div class="flex flex-col text-black-500 bg-gray-50 p-3 rounded-lg">
                                    <div class="flex  mb-5">
                                        <div class="flex flex-col w-2/6 px-2">
                                            <label for="username" class="block text-black">Organization</label>
                                            <input wire:model="organization.0" type="text" autofocus id="hh_name"
                                                class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                                placeholder="Name" />
                                            @error('organization') <span class="text-danger">*{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="flex flex-col w-3/12 px-2">
                                            <label for="username" class="block text-black">Type of Contribution</label>
                                            <select wire:model="type_of_contribution.0" name="type_of_contribution"
                                                class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                                                <option value="">Select option</option>
                                                <option value="Financial">Financial</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            @error('type_of_contribution') <span class="text-danger">*{{ $message
                                                }}</span> @enderror
                                        </div>

                                        <div class="flex flex-col w-3/12 px-2">
                                            <label for="financial_contribution" class="block text-black">Financial
                                                Contribution</label>
                                            <input wire:model="financial_contribution.0" type="text" autofocus
                                                id="financial_contribution"
                                                class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                                placeholder="Amount" />
                                            @error('financial_contribution') <span class="text-danger">*{{ $message
                                                }}</span> @enderror
                                        </div>
                                        <div class="flex flex-col w-3/12 px-2">
                                            <label for="financial_contribution" class="block text-black">Other
                                                Contribution</label>
                                            <input wire:model="other.0" type="text" autofocus
                                                id="financial_contribution"
                                                class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                                placeholder="Contribution" />
                                            @error('other') <span class="text-danger">*{{ $message }}</span> @enderror
                                        </div>

                                        <div class="flex flex-col w-3/12 px-2">
                                            <label for="other_amount" class="block text-black">Other Contribution
                                                </label>
                                            <input wire:model="other_amount.0" type="text" autofocus id="other_amount"
                                                class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                                placeholder="Amount" />
                                            @error('other_amount') <span class="text-danger">*{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <button wire:click.prevent="add({{$i}})" wire:loading.attr="disabled"
                                        class="bg-blue-600 float-right  text-white p-2 w-32 rounded-10 hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">
                                        Add another
                                        <div wire:loading wire:target="add">
                                            <i class="fas fa-cog fa-spin"></i>
                                        </div>

                                    </button>
                                </div>
                                <br>
                                @foreach($inputs as $key => $value)
                                <div class="flex flex-col text-black-500 bg-gray-50 p-3 rounded-lg">
                                    <div class="flex  mb-5">
                                        <div class="flex flex-col w-2/6 px-2">
                                            <label for="username" class="block text-black">Organization</label>
                                            <input wire:model="organization.{{ $value }}" type="text" autofocus
                                                id="hh_name"
                                                class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                                placeholder="Name" />
                                            @error('organization.'.$value) <span class="text-danger">*{{ $message
                                                }}</span> @enderror
                                        </div>

                                        <div class="flex flex-col w-3/12 px-2">
                                            <label for="username" class="block text-black">Type of Contribution</label>
                                            <select wire:model="type_of_contribution.{{ $value }}"
                                                name="type_of_contribution"
                                                class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                                                <option value="">Select option</option>
                                                <option value="Financial">Financial</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            @error('type_of_contribution.'.$value) <span class="text-danger">*{{
                                                $message }}</span> @enderror
                                        </div>
                                        <div class="flex flex-col w-3/12 px-2">
                                            <label for="financial_contribution" class="block text-black">Financial
                                                Contribution</label>
                                            <input wire:model="financial_contribution.{{ $value }}" type="text"
                                                autofocus id="financial_contribution"
                                                class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                                placeholder="Amount" />
                                            @error('financial_contribution.'.$value) <span class="text-danger">*{{
                                                $financial_contribution }}</span> @enderror
                                        </div>
                                        <div class="flex flex-col w-3/12 px-2">
                                            <label for="financial_contribution" class="block text-black">Other
                                                Contribution</label>
                                            <input wire:model="other.{{ $value }}" type="text" autofocus
                                                id="financial_contribution"
                                                class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                                placeholder="Contribution" />
                                            @error('other.'.$value) <span class="text-danger">*{{
                                                $financial_contribution }}</span> @enderror
                                        </div>

                                        <div class="flex flex-col w-3/12 px-2">
                                            <label for="other_amount" class="block text-black">Other Contribution
                                                </label>
                                            <input wire:model="other_amount.{{ $value }}" type="text" autofocus
                                                id="other_amount"
                                                class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                                placeholder="Amount" />
                                            @error('other_amount.'.$value) <span class="text-danger">*{{
                                                $financial_contribution }}</span> @enderror
                                        </div>
                                    </div>
                                    <button wire:click.prevent="remove({{$key}})"
                                        class="bg-red-600 float-right  text-white p-2 w-28 rounded-10 hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">
                                        Remove
                                        <div wire:loading wire:target="remove">
                                            <i class="fas fa-cog fa-spin"></i>
                                        </div>
                                    </button>
                                </div>

                                <br>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-12 mt-20">
                    <div class="card card-absolute">
                        <div class="card-header bg-success">
                            <h5 class="text-white">Participants</h5>
                        </div>
                        <div class="card-body">
                            <table cellspacing="0" border="0" class="table table-bordered">
                                <colgroup span="9" width="64"></colgroup>
                                <tbody><tr>
                                    <td rowspan="2" height="61" align="left" valign="middle" bgcolor="#D9D9D9"><b><font color="#000000">Age (Years)</font></b></td>
                                    <td colspan="2" align="center" valign="middle" bgcolor="#D9D9D9"><b><font color="#000000">Gender</font></b></td>
                                    <td colspan="2" align="center" valign="middle" bgcolor="#D9D9D9"><b><font color="#000000">Person with disability </font></b></td>
                                    <td colspan="4" align="center" valign="middle" bgcolor="#D9D9D9"><b><font color="#000000">Ethnicity</font></b></td>
                                    </tr>
                                <tr>
                                    <td align="center" valign="middle" bgcolor="#D9D9D9"><font color="#000000">Male</font></td>
                                    <td align="center" valign="middle" bgcolor="#D9D9D9"><font color="#000000">Female</font></td>
                                    <td align="center" valign="middle" bgcolor="#D9D9D9"><font color="#000000">Male</font></td>
                                    <td align="center" valign="middle" bgcolor="#D9D9D9"><font color="#000000">Female</font></td>
                                    <td align="center" valign="middle" bgcolor="#D9D9D9"><font color="#000000">Sinhala</font></td>
                                    <td align="center" valign="middle" bgcolor="#D9D9D9"><font color="#000000">Tamil</font></td>
                                    <td align="center" valign="middle" bgcolor="#D9D9D9"><font color="#000000">Muslim</font></td>
                                    <td align="center" valign="middle" bgcolor="#D9D9D9"><font color="#000000">Other</font></td>
                                </tr>
                                @foreach($ages as $key => $age)
                                <tr>
                                    <td height="21" align="left" valign="middle"><font color="#000000">{{$age}}</font></td>
                                    <td align="left" valign="middle"><font color="#000000"><br></font><input type="text" class="w-10 m-0" wire:model="gender_male.{{$key}}"></td>
                                    <td align="left" valign="middle"><font color="#000000"><br></font><input type="text" class="w-10 m-0" wire:model="gender_female.{{$key}}"></td>
                                    <td align="left" valign="middle"><font color="#000000"><br></font><input type="text" class="w-10 m-0" wire:model="disability_male.{{$key}}"></td>
                                    <td align="left" valign="middle"><font color="#000000"><br></font><input type="text" class="w-10 m-0" wire:model="disability_female.{{$key}}"></td>
                                    <td align="left" valign="middle"><font color="#000000"><br></font><input type="text" class="w-10 m-0" wire:model="sinhala.{{$key}}"></td>
                                    <td align="left" valign="middle"><font color="#000000"><br></font><input type="text" class="w-10 m-0" wire:model="tamil.{{$key}}"></td>
                                    <td align="left" valign="middle"><font color="#000000"><br></font><input type="text" class="w-10 m-0" wire:model="muslim.{{$key}}"></td>
                                    <td align="left" valign="middle"><font color="#000000"><br></font><input type="text" class="w-10 m-0" wire:model="other_ethnicity.{{$key}}"></td>
                                </tr>
                                @endforeach
                            </tbody></table>
                        </div>
                    </div>
                </div>
                @if($activity_type =='Construction')
                <div class="col-sm-12 col-xl-12 mt-20">
                    <div class="card card-absolute">
                        <div class="card-header bg-success">
                            <h5 class="text-white">Construction Data</h5>
                        </div>
                        <div class="card-body">
                            <div class="flex  items-center justify-between mb-5">
                                <div class="flex flex-col w-6/12 px-2">
                                    <label for="date_of_start" class="block text-black">Type of Construction</label>
                                    <input type="text" autofocus wire:model="type_of_construction"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" />
                                    @error('type_of_construction') <span class="text-danger">*{{ $message }}</span> @enderror

                                </div>
                                <div class="flex flex-col w-6/12 px-2">
                                    <label for="username" class="block text-black">Select Target Group</label>
                                    <select wire:model="select_target_group"
                                        name="target_group"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                                        <option value="">Select option</option>
                                        <option value="Group">Group</option>
                                        <option value="Individual">Individual</option>
                                    </select>
                                    @error('select_target_group') <span class="text-danger">*{{
                                        $message }}</span> @enderror
                                </div>


                            </div>
                            <div class="flex  items-center justify-between ">
                                @if($select_target_group=='Group')
                                <div class="flex flex-col w-full px-2">
                                    <label for="date_of_start" class="block text-black">Target Group</label>
                                    <input type="text"  wire:model="target_group"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" />
                                    @error('target_group') <span class="text-danger">*{{ $message }}</span> @enderror

                                </div>
                                @endif
                                @if($select_target_group=='Individual')
                                <div class="flex flex-col w-full px-2">
                                    <div class="relative">
                                        <div class="">
                                            <div class="felx-1 w-full">
                                                <label for="date_of_start" class="block text-black">Search house hold by name</label>
                                                <input wire:model.debounce.500ms="query" placeholder="" class="mb-5 rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"/>
                                            </div>
                                            <span wire:loading wire:target="query" class="felx-1 fa-2x pl-2 mt-1">
                                                <i class="fas fa-circle-notch fa-spin"></i>
                                            </span>
                                        </div>

                                        <div wire:loading  wire:target="query" class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg">
                                            <div class="list-item">Searching...</div>
                                        </div>
                                        @error('family_id') <span class="text-danger">*{{ $message }}</span> @enderror
                                        @if(!empty($families))
                                        <ul class="bg-white border border-gray-100 w-full mt-2 ">
                                            <li wire:click.prevent="clear" class="pl-8 pr-2 py-1 border-b-2 border-gray-100 relative cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                                                <b>Clear List</b>
                                            </li>
                                            @foreach($families as $i => $family)
                                            <li wire:click.prevent="selectFamily({{$family['id']}})" class="pl-8 pr-2 py-1 border-b-2 border-gray-100 relative cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                                                <b>{{$family['serial_number']}} | {{$family['hh_name']}}</b>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="flex  items-center justify-between mb-5">
                                <div class="flex flex-col w-6/12 px-2">
                                    <label for="username" class="block text-black">Current Status</label>
                                    <select wire:model="current_status"
                                        name="target_group"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                                        <option value="">Select option</option>
                                        <option value="Ongoing">Ongoing</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                    @error('current_status') <span class="text-danger">*{{
                                        $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col w-6/12 px-2">
                                    <label for="date_of_start" class="block text-black">Remarks</label>
                                    <input type="text" autofocus wire:model="remarks"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" />
                                    @error('remarks') <span class="text-danger">*{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if($activity_type == 'Material support')
                <div class="col-sm-12 col-xl-12 mt-20">
                    <div class="card card-absolute">
                        <div class="card-header bg-success">
                            <h5 class="text-white">Material support Data</h5>
                        </div>
                        <div class="card-body">
                            <div class="flex  items-center justify-between mb-5">
                                <div class="flex flex-col w-4/12 px-2">
                                    <label for="username" class="block text-black">Beneficiary/CSO Name</label>
                                    <input wire:model="beneficiary_meterial.0" type="text" autofocus id="beneficiary_meterial"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="" />
                                    @error('beneficiary_meterial') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-4/12 px-2">
                                    <label for="username" class="block text-black">Materials Provided</label>
                                    <input wire:model="meterial_provided.0" type="text" autofocus id="meterial_provided"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="" />
                                    @error('meterial_provided') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-3/12 px-2">
                                    <label for="username" class="block text-black">Quantity</label>
                                    <input wire:model="meterial_quantity.0" type="text" autofocus id="meterial_quantity"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="" />
                                    @error('meterial_quantity') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-1/12 px-2">
                                    <label for="username" class="block text-white">Add</label>
                                    <div wire:click.prevent="add2({{$k}})" wire:loading.attr="disabled" class="button btn btn-success">
                                        <div wire:loading wire:target="add2">
                                            <i class="fas fa-cog fa-spin"></i>
                                        </div>
                                        <div wire:loading.remove wire:target="add2">
                                            <i class="fa fa-plus-circle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach($inputs2 as $key => $value)
                            <div class="flex  items-center justify-between mb-5">
                                <div class="flex flex-col w-4/12 px-2">
                                    <label for="username" class="block text-black">Beneficiary/CSO Name</label>
                                    <input wire:model="beneficiary_meterial.{{$value}}" type="text" autofocus id="beneficiary_meterial"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="" />
                                    @error('beneficiary_meterial'.$value) <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-4/12 px-2">
                                    <label for="username" class="block text-black">Materials Provided</label>
                                    <input wire:model="meterial_provided.{{$value}}" type="text" autofocus id="meterial_provided"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="" />
                                    @error('meterial_provided'.$value) <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-3/12 px-2">
                                    <label for="username" class="block text-black">Quantity</label>
                                    <input wire:model="meterial_quantity.{{$value}}" type="text" autofocus id="meterial_quantity"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="" />
                                    @error('meterial_quantity'.$value) <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-1/12 px-2">
                                    <label for="username" class="block text-white">remove</label>
                                    <div wire:click.prevent="remove2({{$key}})" wire:loading.attr="disabled" class="button btn btn-danger">
                                        <div wire:loading wire:target="remove2">
                                            <i class="fas fa-cog fa-spin"></i>
                                        </div>
                                        <div wire:loading.remove wire:target="remove2">
                                            <i class="fa fa-times-circle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                @if($activity_type == 'Financial support')
                <div class="col-sm-12 col-xl-12 mt-20">
                    <div class="card card-absolute">
                        <div class="card-header bg-success">
                            <h5 class="text-white">Financial support Data</h5>
                        </div>
                        <div class="card-body">
                            <div class="flex  items-center justify-between mb-5">
                                <div class="flex flex-col w-4/12 px-2">
                                    <label for="username" class="block text-black">Beneficiary</label>
                                    <input wire:model="beneficiary_financial.0" type="text" autofocus id="beneficiary_financial"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="" />
                                    @error('beneficiary_financial') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-4/12 px-2">
                                    <label for="username" class="block text-black">Purpose of the Support</label>
                                    <input wire:model="financial_purpose.0" type="text" autofocus id="financial_purpose"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="" />
                                    @error('financial_purpose') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-3/12 px-2">
                                    <label for="username" class="block text-black">Approved Amount</label>
                                    <input wire:model="approved_amount.0" type="text" autofocus id="approved_amount"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="" />
                                    @error('approved_amount') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-1/12 px-2">
                                    <label for="username" class="block text-white">Add</label>
                                    <div wire:click.prevent="add3({{$x}})" wire:loading.attr="disabled" class="button btn btn-success">
                                        <div wire:loading wire:target="add3">
                                            <i class="fas fa-cog fa-spin"></i>
                                        </div>
                                        <div wire:loading.remove wire:target="add3">
                                            <i class="fa fa-plus-circle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach($inputs3 as $key => $value)
                            <div class="flex  items-center justify-between mb-5">
                                <div class="flex flex-col w-4/12 px-2">
                                    <label for="username" class="block text-black">Beneficiary</label>
                                    <input wire:model="beneficiary_financial.{{$value}}" type="text" autofocus id="beneficiary_financial"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="" />
                                    @error('beneficiary_financial'.$value) <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-4/12 px-2">
                                    <label for="username" class="block text-black">Purpose of the Support</label>
                                    <input wire:model="financial_purpose.{{$value}}" type="text" autofocus id="financial_purpose"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="" />
                                    @error('financial_purpose'.$value) <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-3/12 px-2">
                                    <label for="username" class="block text-black">Approved Amount</label>
                                    <input wire:model="approved_amount.{{$value}}" type="text" autofocus id="approved_amount"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="" />
                                    @error('approved_amount'.$value) <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-1/12 px-2">
                                    <label for="username" class="block text-white">remove</label>
                                    <div wire:click.prevent="remove3({{$key}})" wire:loading.attr="disabled" class="button btn btn-danger">
                                        <div wire:loading wire:target="remove3">
                                            <i class="fas fa-cog fa-spin"></i>
                                        </div>
                                        <div wire:loading.remove wire:target="remove3">
                                            <i class="fa fa-times-circle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                @if($activity_type == 'Training' || $activity_type == 'Exercise' || $activity_type == 'Meeting')
                <div class="col-sm-12 col-xl-12 mt-20">
                    <div class="card card-absolute">
                        <div class="card-header bg-success">
                            <h5 class="text-white">For all kinds of trainings, Exercises or Meetings </h5>
                        </div>
                        <div class="card-body">
                                <div class="flex flex-col w-full px-2 mb-5">
                                    <label for="lessions_learned" class="block text-black">Introduction (why this activity is required?)
                                        N.B. In case of training/workshop please attach the curriculum</label>
                                    <textarea rows="5" autofocus wire:model="introduction"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"></textarea>
                                    @error('introduction') <span class="text-danger">*{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="flex flex-col w-full px-2 mb-5">
                                    <label for="lessions_learned" class="block text-black">Target group (to whom it was done?)</label>
                                    <textarea rows="5" autofocus wire:model="training_target_group"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"></textarea>
                                    @error('training_target_group') <span class="text-danger">*{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="flex flex-col w-full px-2 mb-5">
                                    <label for="lessions_learned" class="block text-black">How the activity was done (methodology?)</label>
                                    <textarea rows="5" autofocus wire:model="methodology"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"></textarea>
                                    @error('methodology') <span class="text-danger">*{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="flex flex-col w-full px-2 mb-5">
                                    <label for="lessions_learned" class="block text-black">Resources used/materials provided</label>
                                    <textarea rows="5" autofocus wire:model="resourses"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"></textarea>
                                    @error('resourses') <span class="text-danger">*{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="flex flex-col w-full px-2 mb-5">
                                    <label for="lessions_learned" class="block text-black">Expected results</label>
                                    <textarea rows="5" autofocus wire:model="results"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"></textarea>
                                    @error('results') <span class="text-danger">*{{ $message }}</span>
                                    @enderror

                                </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-sm-12 col-xl-12 mt-20">
                    <div class="card card-absolute">
                        <div class="card-header bg-success">
                            <h5 class="text-white">If the training was intended for CSO members please fill the table below</h5>
                        </div>
                        <div class="card-body">
                            <div class="flex  items-center justify-between mb-5">
                                <div class="flex flex-col w-5/12 px-2">
                                    <label for="username" class="block text-black">Name of the CSO</label>
                                    <input wire:model="cso_name.0" type="text" autofocus id="beneficiary_financial"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="" />
                                    @error('cso_name') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-3/12 px-2">
                                    <label for="username" class="block text-black">No of Male</label>
                                    <input wire:model="cso_male.0" type="text" autofocus id="financial_purpose"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="" />
                                    @error('cso_male') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-3/12 px-2">
                                    <label for="username" class="block text-black">No of Female</label>
                                    <input wire:model="cso_female.0" type="text" autofocus id="approved_amount"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="" />
                                    @error('cso_female') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-1/12 px-2">
                                    <label for="username" class="block text-white">Add</label>
                                    <div wire:click.prevent="add4({{$j}})" wire:loading.attr="disabled" class="button btn btn-success">
                                        <div wire:loading wire:target="add4">
                                            <i class="fas fa-cog fa-spin"></i>
                                        </div>
                                        <div wire:loading.remove wire:target="add4">
                                            <i class="fa fa-plus-circle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach($inputs4 as $key => $value)
                            <div class="flex  items-center justify-between mb-5">
                                <div class="flex flex-col w-5/12 px-2">
                                    <label for="username" class="block text-black">Name of the CSO</label>
                                    <input wire:model="cso_name.{{$value}}" type="text" autofocus id="beneficiary_financial"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="" />
                                    @error('cso_name'.$value) <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-3/12 px-2">
                                    <label for="username" class="block text-black">No of Male</label>
                                    <input wire:model="cso_male.{{$value}}" type="number" autofocus id="financial_purpose"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="" />
                                    @error('cso_male'.$value) <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-3/12 px-2">
                                    <label for="username" class="block text-black">No of Female</label>
                                    <input wire:model="cso_female.{{$value}}" type="number" autofocus id="approved_amount"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="" />
                                    @error('cso_female'.$value) <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-1/12 px-2">
                                    <label for="username" class="block text-white">remove</label>
                                    <div wire:click.prevent="remove4({{$key}})" wire:loading.attr="disabled" class="button btn btn-danger">
                                        <div wire:loading wire:target="remove4">
                                            <i class="fas fa-cog fa-spin"></i>
                                        </div>
                                        <div wire:loading.remove wire:target="remove4">
                                            <i class="fa fa-times-circle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-12 mt-20">
                    <div class="card card-absolute">
                        <div class="card-header bg-success">
                            <h5 class="text-white">All the documents of this report should attache here</h5>
                        </div>
                        <div class="card-body">
                            <input class="form-control mb-2" wire:model="files" type="file" data-bs-original-title="" title="" multiple>
                            <div class="mt-1" wire:loading.flex wire.target="files">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <div>Processing Files</div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="button btn btn-primary" wire:click="create">
                                <i wire:loading wire:target="create" class="fas fa-cog fa-spin"></i>
                                <i wire:loading.remove wire:target="create" class="fa fa-save"></i>
                                 Save Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
