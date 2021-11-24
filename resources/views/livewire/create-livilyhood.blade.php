<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a wire:ignore class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">General</a>
        </li>
        <li class="nav-item">
            <a wire:ignore class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Partners</a>
        </li>
        <li class="nav-item">
            <a wire:ignore class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Meterial Support</a>
        </li>
        <li class="nav-item">
            <a wire:ignore class="nav-link" id="pills-finish-tab" data-toggle="pill" href="#pills-finish" role="tab" aria-controls="pills-finish" aria-selected="false">Finish</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div wire:ignore.self class="tab-pane fademember_contact show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="flex flex-col text-black-500 bg-gray-200 p-3 rounded-lg mb-3">
                    <h1 class="font-medium text-2xl mb-3 ml-1">General Data</h1>
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex flex-col w-3/12 px-2">
                            <label for="responsible_officer" class="block text-black">Name of the responsible officer</label>
                            <input type="text" autofocus wire:model="responsible_officer" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Responsible Officer" />
                            @error('responsible_officer') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col w-9/12 px-2">
                            <label for="log_activity_name" class="block text-black"> Activity name as mentioned in the logframe </label>
                            <input type="text" autofocus wire:model="log_activity_name" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Activity Name" />
                        @error('log_activity_name') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>
                    </div>

                    <div class="flex items-center justify-between mb-5">
                        <div class="flex flex-col w-3/12 px-2">
                            <label for="responsible_officer" class="block text-black">Name of the responsible officer</label>
                            <input type="text" autofocus wire:model="responsible_officer" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Responsible Officer" />
                            @error('responsible_officer') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col w-4/12 px-2">
                            <label for="activity_code" class="block text-black"> Activity Code </label>
                            <input type="text" autofocus wire:model="activity_code" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Activity Code" />
                        @error('activity_code') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col w-4/12 px-2">
                            <label for="financial_year" class="block text-black"> Financial Year </label>
                            <input type="text" autofocus wire:model="financial_year" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Financial Year" />
                        @error('financial_year') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-5">
                        <div class="flex flex-col w-3/12 px-2">
                            <label for="specific_activity_name" class="block text-black">Specific name of the activity</label>
                            <input type="text" autofocus wire:model="specific_activity_name" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Specific name of the activity" />
                            @error('specific_activity_name') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col w-3/12 px-2">
                            <label for="username" class="block text-black">District</label>
                            <select wire:model="selectedDistrict" name="district" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" wire:select="updatedSelectedDistrict">
                                <option value="">Select option</option>
                                <option value="Colombo">Colombo</option>
                                <option value="Kandy" >Kandy</option>
                                <option value="Galle" >Galle</option>
                                <option value="Ampara" >Ampara</option>
                                <option value="Anuradhapura" >Anuradhapura</option>
                                <option value="Badulla">Badulla</option>
                                <option value="Batticaloa" >Batticaloa</option>
                                <option value="Gampaha" >Gampaha</option>
                                <option value="Hambantota" >Hambantota</option>
                                <option value="Jaffna" >Jaffna</option>
                                <option value="Kalutara" >Kalutara</option>
                                <option value="Kegalle" >Kegalle</option>
                                <option value="Kilinochchi">Kilinochchi</option>
                                <option value="Kurunegala" ">Kurunegala</option>
                                <option value="Mannar" >Mannar</option>
                                <option value="Matale" >Matale</option>
                                <option value="Matara" ">Matara</option>
                                <option value="Moneragala" >Moneragala</option>
                                <option value="Mullativu" >Mullativu</option>
                                <option value="Nuwara Eliya" >Nuwara Eliya</option>
                                <option value="Polonnaruwa" >Polonnaruwa</option>
                                <option value="Puttalam" >Puttalam</option>
                                <option value="Ratnapura" >Ratnapura</option>
                                <option value="Trincomalee" ">Trincomalee</option>
                                <option value="Vavuniya" >Vavuniya</option>
                            </select>
                            @error('selectedDistrict') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>


                        <div class="flex flex-col w-3/12 px-2">
                            <label for="username" class="block text-black">DS Division</label>
                            <select wire:model="selectedDsd" name="dsd_id" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" wire:select="updatedSelectedDsd">
                                <option value="">Select option</option>
                                @foreach($dsds as $dsd)
                                    <option value="{{$dsd->id}}" >{{$dsd->name}}</option>
                                @endforeach
                            </select>
                        @error('selectedDsd') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>

                        <div class="flex flex-col w-3/12 px-2">
                            <label for="username" class="block text-black">GN Division</label>
                            <select wire:model="selectedGnd" name="gn_id" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" wire:select="updatedSelectedDsd">
                                <option value="">Select option</option>
                                @foreach($gnds as $gnd)
                                    <option value="{{$gnd->id}}" >{{$gnd->name}}</option>
                                @endforeach
                            </select>
                        @error('selectedGnd') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>

                    </div>
                    <div class="flex mb-5">
                        <div class="flex flex-col w-3/12 px-2">
                            <label for="date_of_start" class="block text-black">Date of Start</label>
                            <input type="date" autofocus wire:model="date_of_start" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"  />
                         @error('date_of_start') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>
                        <div class="flex flex-col w-3/12 px-2">
                            <label for="date_of_end" class="block text-black">Date of End</label>
                            <input type="date" autofocus wire:model="date_of_end" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"  />
                         @error('date_of_end') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>

                        <div class="flex flex-col w-3/12 px-2">
                            <label for="partner_contribution" class="block text-black">Partner Contribution</label>
                            <input type="number" autofocus wire:model="partner_contribution" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"  />
                         @error('partner_contribution') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>


                        <div class="flex flex-col w-3/12 px-2">
                            <label for="bds_contribution" class="block text-black">BDS Contribution</label>
                            <input type="number" autofocus wire:model="bds_contribution" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"  />
                         @error('bds_contribution') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="flex items-center justify-between mb-5">

                        <div class="flex flex-col w-4/12 px-2">
                            <label for="totol_planned_cost" class="block text-black">Total Planned Cost</label>
                            <input type="number" autofocus wire:model="totol_planned_cost" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"  />
                         @error('totol_planned_cost') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>
                        <div class="flex flex-col w-4/12 px-2">
                            <label for="totdal_actual_cost" class="block text-black">Total Actual Cost</label>
                            <input type="number" autofocus wire:model="totdal_actual_cost" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"  />
                         @error('totdal_actual_cost') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>
                        <div class="flex flex-col w-4/12 px-2">
                            <label for="units_completed" class="block text-black">Units Completed</label>
                            <input type="number" autofocus wire:model="units_completed" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"  />
                         @error('units_completed') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="flex mb-5">

                        <div class="flex flex-col w-9/12 px-2">
                            <label for="lessions_learned" class="block text-black">Lessons learned/strengths/weaknesses & your recommendations.</label>
                            <textarea rows="5" type="number" autofocus wire:model="lessions_learned" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"></textarea>
                         @error('lessions_learned') <span class="text-danger">*{{ $message }}</span> @enderror

                        </div>

                        <div class="flex flex-col w-3/12 px-2">
                            <label for="lessions_learned" class="block text-black">Select Livelyhood family</label>
                            <div wire:ignore>
                            <select class="form-control" id="select2">
                                <option value="">Choose Family</option>
                                @foreach($families as $data)
                                <option value="{{ $data['id'] }}">{{ $data['hh_name'] }} | {{$data['village']}}</option>
                                @endforeach
                            </select>
                            @error('family_id') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>


                        </div>
                    </div>
                </div>
        </div>
        <div wire:ignore.self class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="flex flex-col text-black-500 bg-gray-200 p-3 rounded-lg">
                <h1 class="font-medium text-2xl mb-3 ml-1">Partners Data</h1>
                <div class="flex  mb-5">
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Organization</label>
                        <input  wire:model="organization.0" type="text" autofocus id="hh_name" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Name" />
                     @error('organization') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col w-3/12 px-2">
                        <label for="username" class="block text-black">Type of Contribution</label>
                        <select wire:model="type_of_contribution.0" name="type_of_contribution" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                                <option value="Financial">Financial</option>
                                <option value="Other">Other</option>
                        </select>
                    @error('type_of_contribution') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col w-3/12 px-2">
                        <label for="financial_contribution" class="block text-black">Financial Contribution</label>
                        <input wire:model="financial_contribution.0" type="text" autofocus id="financial_contribution" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Amount" />
                        @error('financial_contribution') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-3/12 px-2">
                        <label for="financial_contribution" class="block text-black">Other Contribution</label>
                        <input wire:model="other.0" type="text" autofocus id="financial_contribution" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Contribution" />
                        @error('other') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col w-3/12 px-2">
                        <label for="other_amount" class="block text-black">Other Contribution Amount</label>
                        <input wire:model="other_amount.0" type="text" autofocus id="other_amount" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Amount" />
                        @error('other_amount') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                </div>
                 <button wire:click.prevent="add({{$i}})" wire:loading.attr="disabled" class="bg-blue-600 float-right  text-white p-2 w-32 rounded-10 hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">
                    Add another
                    <div wire:loading wire:target="add">
                        <i class="fas fa-cog fa-spin"></i>
                    </div>

                </button>
            </div>
            <br>
            @foreach($inputs as $key => $value)
            <div class="flex flex-col text-black-500 bg-gray-200 p-3 rounded-lg">
                <div class="flex  mb-5">
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Organization</label>
                        <input  wire:model="organization.{{ $value }}" type="text" autofocus id="hh_name" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Name" />
                     @error('organization.'.$value) <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col w-3/12 px-2">
                        <label for="username" class="block text-black">Type of Contribution</label>
                        <select wire:model="type_of_contribution.{{ $value }}" name="type_of_contribution" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                                <option value="Financial">Financial</option>
                                <option value="Other">Other</option>
                        </select>
                    @error('type_of_contribution.'.$value) <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-3/12 px-2">
                        <label for="financial_contribution" class="block text-black">Financial Contribution</label>
                        <input wire:model="financial_contribution.{{ $value }}" type="text" autofocus id="financial_contribution" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Amount" />
                        @error('financial_contribution.'.$value) <span class="text-danger">*{{ $financial_contribution }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-3/12 px-2">
                        <label for="financial_contribution" class="block text-black">Other Contribution</label>
                        <input wire:model="other.{{ $value }}" type="text" autofocus id="financial_contribution" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Contribution" />
                        @error('other.'.$value) <span class="text-danger">*{{ $financial_contribution }}</span> @enderror
                    </div>

                    <div class="flex flex-col w-3/12 px-2">
                        <label for="other_amount" class="block text-black">Other Contribution Amount</label>
                        <input wire:model="other_amount.{{ $value }}" type="text" autofocus id="other_amount" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Amount" />
                        @error('other_amount.'.$value) <span class="text-danger">*{{ $financial_contribution }}</span> @enderror
                    </div>
                </div>
                <button wire:click.prevent="remove({{$key}})" class="bg-red-600 float-right  text-white p-2 w-28 rounded-10 hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">
                    Remove
                    <div wire:loading wire:target="remove">
                        <i class="fas fa-cog fa-spin"></i>
                    </div>
                </button>
            </div>

            <br>
            @endforeach

        </div>
        <div wire:ignore.self class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="flex flex-col text-black-500 bg-gray-200 p-3 rounded-lg">
                <h1 class="font-medium text-2xl mb-3 ml-1">Material support Data</h1>
                <div class="flex  mb-5">
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Beneficiary Name</label>
                        <input  wire:model="beneficiary_name.0" type="text" autofocus id="hh_name" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Beneficiary Name" />
                     @error('beneficiary_name') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="financial_contribution" class="block text-black">Meterial</label>
                        <input wire:model="meterial.0" type="text" autofocus id="meterial" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Meterial Name" />
                        @error('meterial') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="financial_contribution" class="block text-black">Quantity</label>
                        <input wire:model="quantity.0" type="text" autofocus id="quantity" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Quantity" />
                        @error('quantity') <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                </div>
                 <button wire:click.prevent="add2({{$x}})" wire:loading.attr="disabled" class="bg-blue-600 float-right  text-white p-2 w-32 rounded-10 hover:bg-blue-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">
                    Add another
                    <div wire:loading wire:target="add2">
                        <i class="fas fa-cog fa-spin"></i>
                    </div>

                </button>
            </div>
            <br>
            @foreach($inputs2 as $key => $value)
            <div class="flex flex-col text-black-500 bg-gray-200 p-3 rounded-lg">
                <div class="flex  mb-5">
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="username" class="block text-black">Beneficiary Name</label>
                        <input  wire:model="beneficiary_name.{{ $value }}" type="text" autofocus id="hh_name" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Beneficiary Name" />
                     @error('beneficiary_name.'.$value) <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col w-2/6 px-2">
                        <label for="financial_contribution" class="block text-black">Meterial</label>
                        <input wire:model="meterial.{{ $value }}" type="text" autofocus id="meterial" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Meterial Name" />
                        @error('meterial.'.$value) <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col w-2/6 px-2">
                        <label for="quantity" class="block text-black">Quantity</label>
                        <input wire:model="quantity.{{ $value }}" type="number" autofocus id="quantity" class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full" placeholder="Quantity" />
                        @error('quantity.'.$value) <span class="text-danger">*{{ $message }}</span> @enderror
                    </div>
                </div>
                <button wire:click.prevent="remove2({{$key}})" class="bg-red-600 float-right  text-white p-2 w-28 rounded-10 hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">
                    Remove
                    <div wire:loading wire:target="remove2">
                        <i class="fas fa-cog fa-spin"></i>
                    </div>
                </button>
            </div>

            <br>
            @endforeach

        </div>
        <div wire:ignore.self class="tab-pane fade" id="pills-finish" role="tabpanel" aria-labelledby="pills-finish-tab">
            <div class="flex-auto flex justify-center content-center mt-5 mb-5">
                <p>Confirm Every required data are filled before save the data.</p>
            </div>
            <div class="flex-auto flex justify-center content-center mt-5 mb-2">

                <button wire:click.prevent="saveData" class="bg-green-600 float-right  text-white p-2 w-28 rounded-10 hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2">
                    Save Data
                    <div wire:loading wire:target="saveData">
                        <i class="fas fa-cog fa-spin"></i>
                    </div>
                </button>
            </div>

            <div class="flex-auto flex justify-center content-center mt-5 mb-2">
                <div wire:loading wire:target="saveData">
                    <p class="text-blue-600">Please Wait. Data is Saving to the database</p>
                </div>
            </div>


        </div>
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
    </div>
</div>
@push('page_scripts')

<script>
    $(document).ready(function () {
        $('#select2').select2();
        $('#select2').on('change', function (e) {
            var item = $('#select2').select2("val");
            @this.set('family_id', item);
        });
    });

</script>

@endpush
