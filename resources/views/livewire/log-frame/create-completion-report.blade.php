<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Create Completion Reports</h5>
                    </div>
                    <div class="card-body">

                        <div class="col-xs-12">
                            <div class="flex items-center justify-between mb-5">
                                <div class="flex flex-col w-full px-2">
                                    <label for="log_activity_name" class="block text-black">Activity name as mentioned
                                        in the logframe </label>
                                    <select wire:model="log_activity_name" name="dsd_id"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        wire:select="updatedSelectedDsd">
                                        <option value="">Select option</option>
                                        @foreach($activities as $activity)
                                        <option value="{{$activity->type}}">{{$activity->code}} | {{$activity->name}}
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
                                <div class="flex flex-col w-4/12 px-2">
                                    <label for="responsible_officer" class="block text-black">Name of the responsible
                                        officer</label>
                                    <input type="text" autofocus wire:model="responsible_officer"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="Responsible Officer" />
                                    @error('responsible_officer') <span class="text-danger">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="flex flex-col w-4/12 px-2">
                                    <label for="financial_year" class="block text-black"> Financial Year </label>
                                    <input type="text" autofocus wire:model="financial_year"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        placeholder="Financial Year" />
                                    @error('financial_year') <span class="text-danger">*{{ $message }}</span> @enderror
                                </div>
                                <div class="flex flex-col w-4/12 px-2">
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
                            <table class="table table-bordered checkbox-td-width">
                                <tbody>
                                    <tr class="table-info">
                                        <th scope="row" rowspan="2">Month</th>
                                        <td colspan="2">Physical target</td>
                                        <td colspan="2">Cost Per Unit</td>
                                    </tr>
                                    <tr>
                                        <th>data1</th>
                                        <th>data2</th>
                                        <th>data3</th>
                                        <th>data3</th>
                                      </tr>
                                    @foreach($ages as $key => $age )
                                    <tr wire:key="{{$key}}">
                                        <td>{{$age}}
                                            <input class="form-control input-primary" wire:model.lazy="age.{{$key}}"
                                                id="exampleFormControlInput1" type="hidden" placeholder="Phisycal Target"
                                                data-bs-original-title="" title="">
                                        </td>
                                        <td class="w-50">
                                            <input class="form-control input-primary"
                                                wire:model.lazy="physical_target.{{$key}}" id="exampleFormControlInput1"
                                                type="number" placeholder="Phisycal Target" data-bs-original-title=""
                                                title="">
                                        </td>
                                        <td>
                                            <input class="form-control input-primary"
                                                wire:model.lazy="cost_per_unit1.{{$key}}" id="exampleFormControlInput1"
                                                type="number" placeholder="Cost Per Unit" data-bs-original-title=""
                                                title="">
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
