<div>
    <form wire:submit.prevent="save">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Basic Family Details of Youth</h3>
            </div>
            <div class="card-body">
                @if (session()->has('message'))
                <div id="alert" class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                    <p>{{ session('message') }}</p>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="title">District</label>
                            <select wire:model="selectedDistrict" name="district" id="district" class="form-control" data-dependent="ds_division">
                                <option value="">Select Option</option>
                                @foreach($districts as $district)
                                <option value="{{ $district->name_en}}">{{ $district->name_en }}</option>
                                @endforeach
                            </select>
                            @error('selectedDistrict') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ds_division">DS Division</label>
                            <select wire:model="selectedDsd" name="ds_division" id="ds_division" class="form-control">
                                @foreach($dsds as $dsd)
                                    <option value="{{$dsd->id}}" >{{$dsd->name}}</option>
                                @endforeach
                            </select>
                            @error('selectedDsd') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="gn_division">GN Division</label>
                            <select wire:model="selectedGnd" name="gn_division" id="gn_division" class="form-control">
                                @foreach($gnds as $gnd)
                                    <option value="{{$gnd->id}}" >{{$gnd->name}}</option>
                                @endforeach
                            </select>
                            @error('selectedGnd') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="head_of_household">Head of Household</label>
                            <input wire:model="head_of_household" type="text" class="form-control" id="head_of_household" name="head_of_household">
                            @error('head_of_household') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nic_head_of_household">NIC number of Head of Household</label>
                            <input wire:model="nic_head_of_household" type="text" class="form-control" id="nic_head_of_household"
                                name="nic_head_of_household">
                                @error('nic_head_of_household') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea wire:model="address" name="address" rows="2" class="form-control" id="address"></textarea>
                            @error('address') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Family Type</label>
                            <select wire:model="family_type" name="family_type" class="form-control" id="family_type">
                                <option value="">Select Option</option>
                                <option>Samurdhi beneficiary</option>
                                <option>Gvt. beneficiary</option>
                                <option>Plantation Sector</option>
                                <option>Other</option>
                                <option>No any grants</option>
                            </select>
                            @error('family_type') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nic_head_of_household">Total Family Members</label>
                            <input wire:model="total_members" type="number" class="form-control" id="total_members" name="total_members">
                            @error('total_members') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nic_head_of_household">Total Family Income</label>
                            <input wire:model="total_income" type="number" class="form-control" id="total_income" name="total_income">
                            @error('total_income') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Is BDS livelihood family ?</label>
                            <select wire:model="is_livelihood" name="is_livelihood" class="form-control" id="family_type">
                                <option value="">Select Option</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @error('is_livelihood') <span class="text-danger">*{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="block text-black">If a Livelyhood familiy Select family </label>
                            <div wire:ignore>
                                <select  class="js-example-placeholder-multiple js-states form-control" id="select2">
                                    <option value="">Selcet a Family</option>
                                    @foreach($families as $data)
                                    <option value="{{ $data['id'] }}">{{ $data['hh_name'] }} | {{$data['village']}}</option>
                                    @endforeach
                                </select> @error('livelihood_family_id') <span class="text-danger">*{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <button type="submit" class="text-white bg-green-700 hover:bg-green-600 py-2 px-4 rounded inline-flex items-center">
                        <svg wire:loading wire:target="save" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span wire:loading wire:target="save">Saving</span>
                        <span wire:loading.remove wire:target="save"><i class="fa fa-save"></i> Add Family Details</span>
                    </button>
                </div>
            </div>

        </div>

    </form>
    @push('page_scripts')

    <script>
        $(document).ready(function() {
            $('#select2').select2({

            });
            $('#select2').on('change', function(e) {
                var item = $('#select2').select2("val");
                @this.set('livelihood_family_id', item);
            });
        });
    </script>

    @endpush
</div>
