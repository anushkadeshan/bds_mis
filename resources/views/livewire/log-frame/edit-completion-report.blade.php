<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="header-top">
                            <h5>Edit Completion Reports</h5>
                            <div class="card-header-right-icon">
                                <label for="">Financial Year : </label>
                                <select wire:model="financial_year" name="financial_year" class="button btn btn-success"
                                    disabled class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
                                    <option value="">Select a Year</option>
                                    @foreach($yearArray as $year)
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
                                    <select wire:model="project_id" name="dsd_id" disabled
                                        class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
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
                                    <select wire:model="pre_condition_id" name="dsd_id" disabled
                                        class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
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
                                    <select wire:model="outcome_id" name="dsd_id" disabled
                                        class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
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
                                    <select wire:model="output_id" name="dsd_id" disabled
                                        class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
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
                                    <select wire:model="activity_id" name="dsd_id" disabled
                                        class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
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
                                        class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                        placeholder="Responsible Officer" />
                                    @error('responsible_officer') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="flex flex-col w-6/12 px-2">
                                    <label for="username" class="block text-black">District</label>
                                    <select wire:model="selectedDistrict" name="district" disabled
                                        class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
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
                                    <select wire:model="selectedDsd" name="dsd_id" disabled
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
                                    <select wire:model="selectedGnd" name="gn_id" multiple disabled
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
                                    <label for="date_of_start" class="block text-black">Date of Start</label>
                                    <input type="date" autofocus wire:model="date_of_start"
                                        class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                                    @error('date_of_start') <span class="text-danger">*{{ $message }}</span> @enderror

                                </div>
                                <div class="flex flex-col w-3/12 px-2">
                                    <label for="date_of_end" class="block text-black">Date of End</label>
                                    <input type="date" autofocus wire:model="date_of_end"
                                        class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                                    @error('date_of_end') <span class="text-danger">*{{ $message }}</span> @enderror

                                </div>

                                <div class="flex flex-col w-3/12 px-2">
                                    <label for="partner_contribution" class="block text-black">Partner
                                        Contribution</label>
                                    <input type="number" autofocus wire:model="partner_contribution"
                                        class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                                    @error('partner_contribution') <span class="text-danger">*{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="flex flex-col w-3/12 px-2">
                                    <label for="bds_contribution" class="block text-black">BDS Contribution</label>
                                    <input type="number" autofocus wire:model="bds_contribution"
                                        class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                                    @error('bds_contribution') <span class="text-danger">*{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                            <div class="flex items-center justify-between mb-5">

                                <div class="flex flex-col w-4/12 px-2">
                                    <label for="totol_planned_cost" class="block text-black">Total Planned Cost</label>
                                    <input type="number" autofocus wire:model="totol_planned_cost"
                                        class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                                    @error('totol_planned_cost') <span class="text-danger">*{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="flex flex-col w-4/12 px-2">
                                    <label for="totdal_actual_cost" class="block text-black">Total Actual Cost</label>
                                    <input type="number" autofocus wire:model="totdal_actual_cost"
                                        class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                                    @error('totdal_actual_cost') <span class="text-danger">*{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="flex flex-col w-4/12 px-2">
                                    <label for="units_completed" class="block text-black">Units Completed</label>
                                    <input type="number" autofocus wire:model="units_completed"
                                        class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                                    @error('units_completed') <span class="text-danger">*{{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div class="flex mb-5">

                                <div class="flex flex-col w-full px-2">
                                    <label for="lessions_learned" class="block text-black">Lessons
                                        learned/strengths/weaknesses & your recommendations.</label>
                                    <textarea rows="5" type="number" autofocus wire:model="lessions_learned"
                                        class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"></textarea>
                                    @error('lessions_learned') <span class="text-danger">*{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="pull-left">Partners Data</h5>
                    </div>
                    <div class="card-body">
                        <div class="tabbed-card">
                            <ul class="pull-right nav nav-pills nav-secondary" id="pills-clrtabsuccess" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="pills-clrhome-tabsuccess"
                                        data-bs-toggle="pill" href="#pills-clrhomesuccess" role="tab"
                                        aria-controls="pills-clrhome" aria-selected="true" data-bs-original-title=""
                                        title=""><i class="icofont icofont-ui-home"></i>Partners</a></li>
                                <li class="nav-item"><a class="nav-link" id="pills-clrprofile-tabsuccess"
                                        data-bs-toggle="pill" href="#pills-clrprofilesuccess" role="tab"
                                        aria-controls="pills-clrprofile" aria-selected="false" data-bs-original-title=""
                                        title=""><i class="icofont icofont-ui-add"></i>Add New</a></li>
                            </ul>
                            <div class="p-0 tab-content" id="pills-clrtabContentsuccess">
                                <div class="p-0 tab-pane fade active show" id="pills-clrhomesuccess" role="tabpanel"
                                    aria-labelledby="pills-clrhome-tabsuccess">
                                    <p>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Organization</th>
                                                <th>Type of Contribution</th>
                                                <th>Financial Contribution</th>
                                                <th>Other Contribution</th>
                                                <th>Other Contribution Amount</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($partners)>0)
                                            @foreach($partners as $p)
                                            <tr>
                                                <td>{{$p->organization}}</td>
                                                <td>{{$p->type_of_contribution}}</td>
                                                <td>{{$p->financial_contribution}}</td>
                                                <td>{{$p->other}}</td>
                                                <td>{{$p->other_amount}}</td>
                                                <td>
                                                    <button type="button" wire:click="deletePartnerId({{ $p->id }})"
                                                        class="btn btn-danger" data-toggle="modal"
                                                        data-target="#exampleModal">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true close-btn">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure want to delete?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary close-btn"
                                                        data-bs-dismiss="modal">Close</button>
                                                    @if(!is_null($deleteCsoId))
                                                    <button type="button" wire:click.prevent="deleteCSO()"
                                                        class="btn btn-danger close-modal" data-dismiss="modal">Yes,
                                                        Delete</button>
                                                    @elseif(!is_null($deleteMaterialId))
                                                    <button type="button" wire:click.prevent="deletematerialsupports()"
                                                        class="btn btn-danger close-modal" data-dismiss="modal">Yes,
                                                        Delete</button>

                                                    @elseif(!is_null($deleteFiancialId))
                                                    <button type="button" wire:click.prevent="deleteFinancialsupports()"
                                                        class="btn btn-danger close-modal" data-dismiss="modal">Yes,
                                                        Delete</button>

                                                    @else
                                                    <button type="button" wire:click.prevent="deletePartner()"
                                                        class="btn btn-danger close-modal" data-dismiss="modal">Yes,
                                                        Delete</button>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="pills-clrprofilesuccess" role="tabpanel"
                                    aria-labelledby="pills-clrprofile-tabsuccess">
                                    <p>
                                    <div class="flex flex-col p-3 rounded-lg text-black-500 bg-gray-50">
                                        <div class="flex items-center justify-between mb-5">
                                            <div class="flex flex-col w-3/6 px-2">
                                                <label for="username" class="block text-black">Organization</label>
                                                <input wire:model.defer="organization" type="text" id="hh_name"
                                                    class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                                    placeholder="Name" />
                                                @error('organization') <span class="text-danger">*{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="flex flex-col w-3/6 px-2">
                                                <label for="username" class="block text-black">Type of
                                                    Contribution</label>
                                                <select wire:model.defer="type_of_contribution"
                                                    name="type_of_contribution"
                                                    class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
                                                    <option value="">Select option</option>
                                                    <option value="Financial">Financial</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                @error('type_of_contribution') <span class="text-danger">*{{ $message
                                                    }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-between mb-5">
                                            <div class="flex flex-col w-6/12 px-2">
                                                <label for="financial_contribution" class="block text-black">Financial
                                                    Contribution</label>
                                                <input wire:model.defer="financial_contribution" type="text" autofocus
                                                    id="financial_contribution"
                                                    class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                                    placeholder="Amount" />
                                                @error('financial_contribution') <span class="text-danger">*{{ $message
                                                    }}</span> @enderror
                                            </div>
                                            <div class="flex flex-col w-6/12 px-2">
                                                <label for="financial_contribution" class="block text-black">Other
                                                    Contribution</label>
                                                <input wire:model.defer="other" type="text" autofocus
                                                    id="financial_contribution"
                                                    class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                                    placeholder="Contribution" />
                                                @error('other') <span class="text-danger">*{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-between mb-5">
                                            <div class="flex flex-col w-6/12 px-2">
                                                <label for="other_amount" class="block text-black">Other Contribution
                                                    Ammount
                                                </label>
                                                <input wire:model.defer="other_amount" type="text" autofocus
                                                    id="other_amount"
                                                    class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                                    placeholder="Amount" />
                                                @error('other_amount') <span class="text-danger">*{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    </p>
                                    <button type="button" wire:click="addPartner" class="mt-4 btn btn-primary">Add
                                        Partner</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="pull-left">Participants Data</h5>
                    </div>
                    <div class="card-body">
                        <div class="tabbed-card">
                            <ul class="pull-right nav nav-pills nav-primary" id="pills-clrtabsuccess" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="pills-clrhome-tabsuccess"
                                        data-bs-toggle="pill" href="#pills-clrhomesuccess2" role="tab"
                                        aria-controls="pills-clrhome" aria-selected="true" data-bs-original-title=""
                                        title=""><i class="icofont icofont-ui-home"></i>Participants</a></li>
                                <li class="nav-item"><a class="nav-link" id="pills-clrprofile-tabsuccess"
                                        data-bs-toggle="pill" href="#pills-clrprofilesuccess2" role="tab"
                                        aria-controls="pills-clrprofile" aria-selected="false" data-bs-original-title=""
                                        title=""><i class="icofont icofont-ui-add"></i>Update Participants</a></li>
                            </ul>
                            <div class="p-0 tab-content" id="pills-clrtabContentsuccess">
                                <div class="p-0 tab-pane fade active show" id="pills-clrhomesuccess2" role="tabpanel"
                                    aria-labelledby="pills-clrhome-tabsuccess">
                                    <table cellspacing="0" border="0" class="table table-bordered">
                                        <colgroup span="9" width="64"></colgroup>
                                        <tbody>
                                            <tr>
                                                <td rowspan="2" height="61" align="left" valign="middle"
                                                    bgcolor="#D9D9D9"><b>
                                                        <font color="#000000">Age (Years)</font>
                                                    </b></td>
                                                <td colspan="2" align="center" valign="middle" bgcolor="#D9D9D9"><b>
                                                        <font color="#000000">Gender</font>
                                                    </b></td>
                                                <td colspan="2" align="center" valign="middle" bgcolor="#D9D9D9"><b>
                                                        <font color="#000000">Person with disability </font>
                                                    </b></td>
                                                <td colspan="4" align="center" valign="middle" bgcolor="#D9D9D9"><b>
                                                        <font color="#000000">Ethnicity</font>
                                                    </b></td>
                                            </tr>
                                            <tr>
                                                <td align="center" valign="middle" bgcolor="#D9D9D9">
                                                    <font color="#000000">Male</font>
                                                </td>
                                                <td align="center" valign="middle" bgcolor="#D9D9D9">
                                                    <font color="#000000">Female</font>
                                                </td>
                                                <td align="center" valign="middle" bgcolor="#D9D9D9">
                                                    <font color="#000000">Male</font>
                                                </td>
                                                <td align="center" valign="middle" bgcolor="#D9D9D9">
                                                    <font color="#000000">Female</font>
                                                </td>
                                                <td align="center" valign="middle" bgcolor="#D9D9D9">
                                                    <font color="#000000">Sinhala</font>
                                                </td>
                                                <td align="center" valign="middle" bgcolor="#D9D9D9">
                                                    <font color="#000000">Tamil</font>
                                                </td>
                                                <td align="center" valign="middle" bgcolor="#D9D9D9">
                                                    <font color="#000000">Muslim</font>
                                                </td>
                                                <td align="center" valign="middle" bgcolor="#D9D9D9">
                                                    <font color="#000000">Other</font>
                                                </td>
                                            </tr>
                                            @foreach($participants as $key => $b)
                                            <tr>
                                                <td height="21" align="left" valign="middle">
                                                    <font color="#000000">{{$b->age}}</font>
                                                </td>
                                                <td align="right" valign="middle">{{$b->gender_male}}
                                                    <font color="#000000"><br></font>
                                                </td>
                                                <td align="right" valign="middle">{{$b->gender_female}}
                                                    <font color="#000000"><br></font>
                                                </td>
                                                <td align="right" valign="middle">{{$b->disability_male}}
                                                    <font color="#000000"><br></font>
                                                </td>
                                                <td align="right" valign="middle">{{$b->disability_female}}
                                                    <font color="#000000"><br></font>
                                                </td>
                                                <td align="right" valign="middle">{{$b->sinhala}}
                                                    <font color="#000000"><br></font>
                                                </td>
                                                <td align="right" valign="middle">{{$b->tamil}}
                                                    <font color="#000000"><br></font>
                                                </td>
                                                <td align="right" valign="middle">{{$b->muslim}}
                                                    <font color="#000000"><br></font>
                                                </td>
                                                <td align="right" valign="middle">{{$b->other_ethnicity}}
                                                    <font color="#000000"><br></font>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="pills-clrprofilesuccess2" role="tabpanel"
                                    aria-labelledby="pills-clrprofile-tabsuccess">
                                    <table cellspacing="0" border="0" class="table table-bordered">
                                        <colgroup span="9" width="64"></colgroup>
                                        <tbody>
                                            <tr>
                                                <td rowspan="2" height="61" align="left" valign="middle"
                                                    bgcolor="#D9D9D9"><b>
                                                        <font color="#000000">Age (Years)</font>
                                                    </b></td>
                                                <td colspan="2" align="center" valign="middle" bgcolor="#D9D9D9"><b>
                                                        <font color="#000000">Gender</font>
                                                    </b></td>
                                                <td colspan="2" align="center" valign="middle" bgcolor="#D9D9D9"><b>
                                                        <font color="#000000">Person with disability </font>
                                                    </b></td>
                                                <td colspan="4" align="center" valign="middle" bgcolor="#D9D9D9"><b>
                                                        <font color="#000000">Ethnicity</font>
                                                    </b></td>
                                            </tr>
                                            <tr>
                                                <td align="center" valign="middle" bgcolor="#D9D9D9">
                                                    <font color="#000000">Male</font>
                                                </td>
                                                <td align="center" valign="middle" bgcolor="#D9D9D9">
                                                    <font color="#000000">Female</font>
                                                </td>
                                                <td align="center" valign="middle" bgcolor="#D9D9D9">
                                                    <font color="#000000">Male</font>
                                                </td>
                                                <td align="center" valign="middle" bgcolor="#D9D9D9">
                                                    <font color="#000000">Female</font>
                                                </td>
                                                <td align="center" valign="middle" bgcolor="#D9D9D9">
                                                    <font color="#000000">Sinhala</font>
                                                </td>
                                                <td align="center" valign="middle" bgcolor="#D9D9D9">
                                                    <font color="#000000">Tamil</font>
                                                </td>
                                                <td align="center" valign="middle" bgcolor="#D9D9D9">
                                                    <font color="#000000">Muslim</font>
                                                </td>
                                                <td align="center" valign="middle" bgcolor="#D9D9D9">
                                                    <font color="#000000">Other</font>
                                                </td>
                                            </tr>
                                            @foreach($ages as $key => $age)
                                            <tr>
                                                <td height="21" align="left" valign="middle">
                                                    <font color="#000000">{{$age}}</font>
                                                </td>
                                                <td align="left" valign="middle">
                                                    <font color="#000000"><br></font><input type="text" class="w-10 m-0"
                                                        wire:model.defer="gender_male.{{$key}}">
                                                </td>
                                                <td align="left" valign="middle">
                                                    <font color="#000000"><br></font><input type="text" class="w-10 m-0"
                                                        wire:model.defer="gender_female.{{$key}}">
                                                </td>
                                                <td align="left" valign="middle">
                                                    <font color="#000000"><br></font><input type="text" class="w-10 m-0"
                                                        wire:model.defer="disability_male.{{$key}}">
                                                </td>
                                                <td align="left" valign="middle">
                                                    <font color="#000000"><br></font><input type="text" class="w-10 m-0"
                                                        wire:model.defer="disability_female.{{$key}}">
                                                </td>
                                                <td align="left" valign="middle">
                                                    <font color="#000000"><br></font><input type="text" class="w-10 m-0"
                                                        wire:model.defer="sinhala.{{$key}}">
                                                </td>
                                                <td align="left" valign="middle">
                                                    <font color="#000000"><br></font><input type="text" class="w-10 m-0"
                                                        wire:model.defer="tamil.{{$key}}">
                                                </td>
                                                <td align="left" valign="middle">
                                                    <font color="#000000"><br></font><input type="text" class="w-10 m-0"
                                                        wire:model.defer="muslim.{{$key}}">
                                                </td>
                                                <td align="left" valign="middle">
                                                    <font color="#000000"><br></font><input type="text" class="w-10 m-0"
                                                        wire:model.defer="other_ethnicity.{{$key}}">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <button type="button" class="mt-2 btn btn-primary"
                                        wire:click="updateParticipants">Update
                                        Participants</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="pull-left">CSO Data</h5>
                    </div>
                    <div class="card-body">
                        <div class="tabbed-card">
                            <ul class="pull-right nav nav-pills nav-secondary" id="pills-clrtabsuccess" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="pills-clrhome-tabsuccess"
                                        data-bs-toggle="pill" href="#pills-clrhomesuccess3" role="tab"
                                        aria-controls="pills-clrhome" aria-selected="true" data-bs-original-title=""
                                        title=""><i class="icofont icofont-ui-home"></i>CSOs</a></li>
                                <li class="nav-item"><a class="nav-link" id="pills-clrprofile-tabsuccess"
                                        data-bs-toggle="pill" href="#pills-clrprofilesuccess3" role="tab"
                                        aria-controls="pills-clrprofile" aria-selected="false" data-bs-original-title=""
                                        title=""><i class="icofont icofont-ui-add"></i>Add New</a></li>
                            </ul>
                            <div class="p-0 tab-content" id="pills-clrtabContentsuccess">
                                <div class="p-0 tab-pane fade active show" id="pills-clrhomesuccess3" role="tabpanel"
                                    aria-labelledby="pills-clrhome-tabsuccess">
                                    <p>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name of the CSO</th>
                                                <th>CSO Reg No.</th>
                                                <th>No of Male</th>
                                                <th>No of Female</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($csoTrainings)>0)
                                            @foreach($csoTrainings as $p)
                                            <tr>
                                                <td>{{$p->cso_name}}</td>
                                                <td>{{$p->cso_reg_no}}</td>
                                                <td>{{$p->cso_male}}</td>
                                                <td>{{$p->cso_female}}</td>
                                                <td>
                                                    <button type="button" wire:click="deleteCsoId({{ $p->id }})"
                                                        class="btn btn-danger" data-toggle="modal"
                                                        data-target="#exampleModal">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="pills-clrprofilesuccess3" role="tabpanel"
                                    aria-labelledby="pills-clrprofile-tabsuccess">
                                    <p>
                                    <div class="flex items-center justify-between mb-5">
                                        <div class="flex flex-col w-4/12 px-2">
                                            <label for="username" class="block text-black">Name of the CSO</label>
                                            <input wire:model.defer="cso_name" type="text" autofocus
                                                id="beneficiary_financial"
                                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                                placeholder="" />
                                            @error('cso_name') <span class="text-danger">*{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col w-4/12 px-2">
                                            <label for="username" class="block text-black">CSO Reg No.</label>
                                            <input wire:model.defer="cso_reg_no" type="text" autofocus id="cso_reg_no"
                                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                                placeholder="" />
                                            @error('cso_reg_no') <span class="text-danger">*{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col w-2/12 px-2">
                                            <label for="username" class="block text-black">No of Male</label>
                                            <input wire:model.defer="cso_male" type="text" autofocus
                                                id="financial_purpose"
                                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                                placeholder="" />
                                            @error('cso_male') <span class="text-danger">*{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col w-2/12 px-2">
                                            <label for="username" class="block text-black">No of Female</label>
                                            <input wire:model.defer="cso_female" type="text" autofocus
                                                id="approved_amount"
                                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                                placeholder="" />
                                            @error('cso_female') <span class="text-danger">*{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    </p>
                                    <button type="button" wire:click="addCso" class="mt-4 btn btn-primary">Add
                                        CSO Data</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{--Construction Data --}}
                @if($activity_type =='Construction')
                <div class="card">
                    <div class="card-header">
                        <h5 class="pull-left">Construction Data</h5>
                    </div>
                    <div class="card-body">
                        <div class="flex items-center justify-between mb-5">
                            <div class="flex flex-col w-6/12 px-2">
                                <label for="date_of_start" class="block text-black">Type of Construction</label>
                                <input type="text" autofocus wire:model="type_of_construction"
                                    class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                                @error('type_of_construction') <span class="text-danger">*{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="flex flex-col w-6/12 px-2">
                                <label for="username" class="block text-black">Select Target Group</label>
                                <select wire:model="select_target_group" name="target_group"
                                    class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
                                    <option value="">Select option</option>
                                    <option value="Group">Group</option>
                                    <option value="Individual">Individual</option>
                                </select>
                                @error('select_target_group') <span class="text-danger">*{{
                                    $message }}</span> @enderror
                            </div>


                        </div>
                        <div class="flex items-center justify-between ">
                            @if($select_target_group=='Group')
                            <div class="flex flex-col w-full px-2">
                                <label for="date_of_start" class="block text-black">Target Group</label>
                                <input type="text" wire:model="target_group"
                                    class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                                @error('target_group') <span class="text-danger">*{{ $message }}</span> @enderror

                            </div>
                            @endif
                            @if($select_target_group=='Individual')
                            <div class="flex flex-col w-full px-2">
                                <div class="relative">
                                    <div class="">
                                        <div class="w-full felx-1">
                                            <label for="date_of_start" class="block text-black">Search house hold by
                                                name</label>
                                            <input wire:model.debounce.500ms="query" placeholder=""
                                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                                        </div>
                                        <span wire:loading wire:target="query" class="pl-2 mt-1 felx-1 fa-2x">
                                            <i class="fas fa-circle-notch fa-spin"></i>
                                        </span>
                                    </div>

                                    <div wire:loading wire:target="query"
                                        class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
                                        <div class="list-item">Searching...</div>
                                    </div>
                                    @error('family_id') <span class="text-danger">*{{ $message }}</span> @enderror
                                    @if(!empty($families))
                                    <ul class="w-full mt-2 bg-white border border-gray-100 "
                                        style="position: absolute;">
                                        <li wire:click.prevent="clear"
                                            class="relative py-1 pl-8 pr-2 border-b-2 border-gray-100 cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                                            <b>Clear List</b>
                                        </li>
                                        @foreach($families as $i => $family)
                                        <li wire:click.prevent="selectFamily({{$family['id']}})"
                                            class="relative py-1 pl-8 pr-2 border-b-2 border-gray-100 cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                                            <b>{{$family['serial_number']}} | {{$family['hh_name']}}</b>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="flex items-center justify-between mt-5 mb-5">
                            <div class="flex flex-col w-6/12 px-2">
                                <label for="username" class="block text-black">Current Status</label>
                                <select wire:model="current_status" name="target_group"
                                    class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
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
                                    class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none" />
                                @error('remarks') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if($activity_type == 'Material support')
                <div class="card">
                    <div class="card-header">
                        <h5 class="pull-left">Material Supports</h5>
                    </div>
                    <div class="card-body">
                        <div class="tabbed-card">
                            <ul class="pull-right nav nav-pills nav-secondary" id="pills-clrtabsuccess" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="pills-clrhome-tabsuccess"
                                        data-bs-toggle="pill" href="#pills-clrhomesuccess4" role="tab"
                                        aria-controls="pills-clrhome" aria-selected="true" data-bs-original-title=""
                                        title=""><i class="icofont icofont-ui-home"></i>Material Supports</a></li>
                                <li class="nav-item"><a class="nav-link" id="pills-clrprofile-tabsuccess"
                                        data-bs-toggle="pill" href="#pills-clrprofilesuccess4" role="tab"
                                        aria-controls="pills-clrprofile" aria-selected="false" data-bs-original-title=""
                                        title=""><i class="icofont icofont-ui-add"></i>Add New</a></li>
                            </ul>
                            <div class="p-0 tab-content" id="pills-clrtabContentsuccess">
                                <div class="p-0 tab-pane fade active show" id="pills-clrhomesuccess4" role="tabpanel"
                                    aria-labelledby="pills-clrhome-tabsuccess">
                                    <p>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Beneficiary/CSO Name</th>
                                                <th>NIC/CSO Reg No.</th>
                                                <th>Materials Provided</th>
                                                <th>Quantity</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($materialsupports)>0)
                                            @foreach($materialsupports as $p)
                                            <tr>
                                                <td>{{$p->beneficiary_meterial}}</td>
                                                <td>{{$p->nic_or_reg_no}}</td>
                                                <td>{{$p->meterial_provided}}</td>
                                                <td>{{$p->meterial_quantity}}</td>
                                                <td>
                                                    <button type="button" wire:click="deleteMaterialId({{ $p->id }})"
                                                        class="btn btn-danger" data-toggle="modal"
                                                        data-target="#exampleModal">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>

                                    </p>
                                </div>
                                <div class="tab-pane fade" id="pills-clrprofilesuccess4" role="tabpanel"
                                    aria-labelledby="pills-clrprofile-tabsuccess">
                                    <p>
                                    <div class="flex items-center justify-between mb-5">
                                        <div class="flex flex-col w-3/12 px-2">
                                            <label for="username" class="block text-black">Beneficiary/CSO Name</label>
                                            <input wire:model.defer="beneficiary_meterial" type="text" autofocus
                                                id="beneficiary_meterial"
                                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                                placeholder="" />
                                            @error('beneficiary_meterial') <span class="text-danger">*{{ $message
                                                }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col w-3/12 px-2">
                                            <label for="username" class="block text-black">NIC or CSO Reg No.</label>
                                            <input wire:model.defer="nic_or_reg_no" type="text" autofocus
                                                id="nic_or_reg_no"
                                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                                placeholder="" />
                                            @error('nic_or_reg_no') <span class="text-danger">*{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col w-3/12 px-2">
                                            <label for="username" class="block text-black">Materials Provided</label>
                                            <input wire:model.defer="meterial_provided" type="text" autofocus
                                                id="meterial_provided"
                                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                                placeholder="" />
                                            @error('meterial_provided') <span class="text-danger">*{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col w-3/12 px-2">
                                            <label for="username" class="block text-black">Quantity</label>
                                            <input wire:model.defer="meterial_quantity" type="text" autofocus
                                                id="meterial_quantity"
                                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                                placeholder="" />
                                            @error('meterial_quantity') <span class="text-danger">*{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    </p>
                                    <button type="button" wire:click="addmaterialsupports"
                                        class="mt-4 btn btn-primary">Add
                                        Material Supports</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endif

                @if($activity_type == 'Fiancial support')
                <div class="card">
                    <div class="card-header">
                        <h5 class="pull-left">Fiancial Supports</h5>
                    </div>
                    <div class="card-body">
                        <div class="tabbed-card">
                            <ul class="pull-right nav nav-pills nav-secondary" id="pills-clrtabsuccess" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="pills-clrhome-tabsuccess"
                                        data-bs-toggle="pill" href="#pills-clrhomesuccess5" role="tab"
                                        aria-controls="pills-clrhome" aria-selected="true" data-bs-original-title=""
                                        title=""><i class="icofont icofont-ui-home"></i>Fiancial Supports</a></li>
                                <li class="nav-item"><a class="nav-link" id="pills-clrprofile-tabsuccess"
                                        data-bs-toggle="pill" href="#pills-clrprofilesuccess5" role="tab"
                                        aria-controls="pills-clrprofile" aria-selected="false" data-bs-original-title=""
                                        title=""><i class="icofont icofont-ui-add"></i>Add New</a></li>
                            </ul>
                            <div class="p-0 tab-content" id="pills-clrtabContentsuccess">
                                <div class="p-0 tab-pane fade active show" id="pills-clrhomesuccess5" role="tabpanel"
                                    aria-labelledby="pills-clrhome-tabsuccess">
                                    <p>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Beneficiary</th>
                                                <th>Beneficiary NIC</th>
                                                <th>Purpose of the Support</th>
                                                <th>Approved Amount</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($financialsupports)>0)
                                            @foreach($financialsupports as $p)
                                            <tr>
                                                <td>{{$p->beneficiary_financial}}</td>
                                                <td>{{$p->beneficiary_financial_nic}}</td>
                                                <td>{{$p->financial_purpose}}</td>
                                                <td>{{$p->approved_amount}}</td>
                                                <td>
                                                    <button type="button" wire:click="deleteFiancialId({{ $p->id }})"
                                                        class="btn btn-danger" data-toggle="modal"
                                                        data-target="#exampleModal">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>

                                    </p>
                                </div>
                                <div class="tab-pane fade" id="pills-clrprofilesuccess5" role="tabpanel"
                                    aria-labelledby="pills-clrprofile-tabsuccess">
                                    <p>
                                    <div class="flex items-center justify-between mb-5">
                                        <div class="flex flex-col w-4/12 px-2">
                                            <label for="username" class="block text-black">Beneficiary</label>
                                            <input wire:model.defer="beneficiary_financial" type="text" autofocus
                                                id="beneficiary_financial"
                                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                                placeholder="" />
                                            @error('beneficiary_financial') <span class="text-danger">*{{ $message
                                                }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col w-4/12 px-2">
                                            <label for="username" class="block text-black">Beneficiary NIC</label>
                                            <input wire:model.defer="beneficiary_financial_nic" type="text" autofocus
                                                id="beneficiary_financial_nic"
                                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                                placeholder="" />
                                            @error('beneficiary_financial_nic') <span class="text-danger">*{{ $message
                                                }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col w-4/12 px-2">
                                            <label for="username" class="block text-black">Purpose of the
                                                Support</label>
                                            <input wire:model.defer="financial_purpose" type="text" autofocus
                                                id="financial_purpose"
                                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                                placeholder="" />
                                            @error('financial_purpose') <span class="text-danger">*{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="flex flex-col w-4/12 px-2">
                                            <label for="username" class="block text-black">Approved Amount</label>
                                            <input wire:model.defer="approved_amount" type="text" autofocus
                                                id="approved_amount"
                                                class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"
                                                placeholder="" />
                                            @error('approved_amount') <span class="text-danger">*{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    </p>
                                    <button type="button" wire:click="addFinancialsupports"
                                        class="mt-4 btn btn-primary">Add
                                        Financial Supports</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endif
                @if($activity_type == 'Training' || $activity_type == 'Exercise' || $activity_type == 'Meeting')

                @endif
                <div class="mt-20 col-sm-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>For all kinds of trainings, Exercises or Meetings </h5>
                        </div>
                        <div class="card-body">
                            <div class="flex flex-col w-full px-2 mb-5">
                                <label for="lessions_learned" class="block text-black">Introduction (why this activity
                                    is required?)
                                    N.B. In case of training/workshop please attach the curriculum</label>
                                <textarea rows="5" autofocus wire:model="introduction"
                                    class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"></textarea>
                                @error('introduction') <span class="text-danger">*{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="flex flex-col w-full px-2 mb-5">
                                <label for="lessions_learned" class="block text-black">Target group (to whom it was
                                    done?)</label>
                                <textarea rows="5" autofocus wire:model="training_target_group"
                                    class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"></textarea>
                                @error('training_target_group') <span class="text-danger">*{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="flex flex-col w-full px-2 mb-5">
                                <label for="lessions_learned" class="block text-black">How the activity was done
                                    (methodology?)</label>
                                <textarea rows="5" autofocus wire:model="methodology"
                                    class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"></textarea>
                                @error('methodology') <span class="text-danger">*{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="flex flex-col w-full px-2 mb-5">
                                <label for="lessions_learned" class="block text-black">Resources used/materials
                                    provided</label>
                                <textarea rows="5" autofocus wire:model="resourses"
                                    class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"></textarea>
                                @error('resourses') <span class="text-danger">*{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="flex flex-col w-full px-2 mb-5">
                                <label for="lessions_learned" class="block text-black">Expected results</label>
                                <textarea rows="5" autofocus wire:model="results"
                                    class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none"></textarea>
                                @error('results') <span class="text-danger">*{{ $message }}</span>
                                @enderror

                            </div>
                            <button type="button" wire:click="updateTraningData" class="mt-4 btn btn-primary">Update
                                Training Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
