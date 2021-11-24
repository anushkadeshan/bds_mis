<div>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">{{$updateMode ? 'Update Budget ' : 'Add Budget to
                    Activities'}}</h5>
                <button type="button" class="btn-bsclose" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (session()->has('message'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" id="alert"
                    class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                    </svg>
                    <p>{{ session('message') }}</p>
                </div>
                @endif
                <div class="flex">
                    <span
                        class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Activity:</span>
                    <select wire:model="activity_code" class="border border-2 rounded-r px-4 py-2 w-full">
                        <option>Select Option</option>
                        @foreach($activities as $a)
                        <option value="{{$a->code}}">{{$a->code}} | {{$a->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('activity_code') <span class="text-danger">*{{ $message }}</span> @enderror
                <br />
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Budget
                        Type:</span>
                    <select wire:model="budget_type" class="border border-2 rounded-r px-4 py-2 w-full">
                        <option>Select Option</option>
                        @foreach($budget_types as $b)
                        <option value="{{$b->id}}"> {{$b->type}} ({{$b->start_date}} to {{$b->end_date}})
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('budget_type') <span class="text-danger">*{{ $message }}</span> @enderror
                <br />
                <div class="flex">
                    <span
                        class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Financial
                        Year
                        :</span>
                    <input wire:model="year" class="border border-2 rounded-r px-4 py-2 w-full" type="number"
                        name="name" spellcheck="false" data-ms-editor="true">

                </div>
                @error('year') <span class="text-danger">*{{ $message }}</span> @enderror
                <br />
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">No
                        of
                        Units :</span>
                    <input wire:model="no_of_units" class="border border-2 rounded-r px-4 py-2 w-full" type="number"
                        name="name" spellcheck="false" data-ms-editor="true">

                </div>
                @error('no_of_units') <span class="text-danger">*{{ $message }}</span> @enderror
                <br />
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Cost
                        per Unit :</span>
                    <input wire:model="cost_per_unit" class="border border-2 rounded-r px-4 py-2 w-full" type="number"
                        name="name" spellcheck="false" data-ms-editor="true">

                </div>
                @error('cost_per_unit') <span class="text-danger">*{{ $message }}</span> @enderror
                <br />
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">Budget
                        Valid from :</span>
                    <input wire:model="budget_valid_from" class="border border-2 rounded-r px-4 py-2 w-full" type="date"
                        name="name" spellcheck="false" data-ms-editor="true">

                </div>
                @error('budget_valid_from') <span class="text-danger">*{{ $message }}</span> @enderror
                <br />
                <div class="flex">
                    <span class="text-sm border border-2 w-25 rounded-l px-4 py-2 bg-gray-300 whitespace-no-wrap">budget
                        Valid To :</span>
                    <input wire:model="budget_valid_to" class="border border-2 rounded-r px-4 py-2 w-full" type="date"
                        name="name" spellcheck="true" data-ms-editor="true">

                </div>
                @error('budget_valid_to') <span class="text-danger">*{{ $message }}</span> @enderror
                <br />

                @if($budget_valid_to == '' || $budget_valid_from == '')
                
                @else
                <div class="col-sm-12 col-lg-12 col-xl-12">
                    <div class="table-responsive">
                        <table class="table table-bordered checkbox-td-width">
                            <tbody>
                                <tr class="table-info">
                                    <th scope="row">Month</th>
                                    <td>Physical target</td>
                                    <td>Cost Per Unit</td>
                                </tr>
                                @foreach($months as $key => $value)
                                <tr wire:key="{{$value}}">
                                    <td>{{$value}}
                                        <input class="form-control input-primary" wire:model.lazy="month.{{$key}}"
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

                @endif

            </div>
            <div class="modal-footer mt-10">
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