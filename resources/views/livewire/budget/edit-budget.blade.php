<div>
    <div class="card">
        <div class="card-body pt-3 pb-3">
          <div class="appointment-table table-responsive" wire:ignore>
            @if(count($trackings)==0) <h5 class="text-warning">No Tracking Data Found!</h5>
            @else
            <table class="table table-bordernone">
              <tbody>
                  @foreach($trackings as $t)
                  @php
                    $user = \App\Models\User::find($t->action_by);
                  @endphp
                <tr>
                  <td>
                      <img class="img-fluid img-40 rounded-circle mb-3" src="{{$user->profile_photo_url}}" alt="Image description">
                  </td>
                  <td class="img-content-box"><span class="d-block">{{$t->name}}</span><span class="font-roboto">{{$user->roles->pluck('name')->first()}}</span></td>
                  <td>
                    <p class="m-0 font-primary">{{\Carbon\Carbon::parse($t->action_date)->diffForHumans()}}</p>
                  </td>
                  <td class="text-end">
                        @if($t->action == 'Updated')
                        <div class="button btn btn-primary">{{$t->action}}<i class="fa fa-check-circle ms-2"></i></div>
                        @elseif($t->action == 'Created')
                        <div class="button btn btn-warning">{{$t->action}}<i class="fa fa-check-circle ms-2"></i></div>
                        @else
                        <div class="button btn btn-success">{{$t->action}}<i class="fa fa-check-circle ms-2"></i></div>
                        @endif
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @endif
          </div>
        </div>
      </div>
    <div class="card">
        <div class="card-body p-0">
            <div class="card-header">
                <h5>Update Budget Item</h5>
            </div>
            <div class="card-body">
                <div class="flex items-center justify-between mb-5">
                    <div class="flex flex-col w-6/12 px-2">
                        <label for="responsible_officer" class="block text-black">Project</label>
                        <select wire:model="project_id" name="dsd_id"
                            class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
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
                            class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
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
                            class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
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
                            class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
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
                            class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                            <option value="">Select option</option>
                            @foreach($activities as  $a)
                            <option value="{{$a->id}}"> {{$a->name}} </option>
                            @endforeach
                        </select>
                        @error('activity_id') <span class="text-danger">*{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex items-center justify-between mb-5">
                    <div class="flex flex-col w-4/12 px-2">
                        <label for="year" class="block text-black">Fiancial Year</label>
                        <input type="number" wire:model="year"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        />
                        @error('year') <span class="text-danger">*{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col w-4/12 px-2">
                        <label for="no_of_units" class="block text-black">No of Units</label>
                        <input type="number"  wire:model="year"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                         />
                        @error('no_of_units') <span class="text-danger">*{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col w-4/12 px-2">
                        <label for="year" class="block text-black">Cost per Unit</label>
                        <input type="number"  wire:model="cost_per_unit"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                    />
                        @error('cost_per_unit') <span class="text-danger">*{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex items-center justify-between mb-5">
                    <div class="flex flex-col w-6/12 px-2">
                        <label for="year" class="block text-black">Budget Valid From</label>
                        <input type="date" wire:model="budget_valid_from"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                        />
                        @error('budget_valid_from') <span class="text-danger">*{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col w-6/12 px-2">
                        <label for="no_of_units" class="block text-black">Budget Valid To</label>
                        <input type="date"  wire:model="budget_valid_to"
                                        class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full"
                                         />
                        @error('budget_valid_to') <span class="text-danger">*{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-6 col-xl-6">
                        <div class="table-responsive">
                            <table class="table table-bordered checkbox-td-width">
                                <tbody>
                                    <tr class="table-info">
                                        <th scope="row">Month</th>
                                        <td>Physical target OLD</td>
                                        <td>Cost Per Unit OLD</td>
                                    </tr>
                                    @foreach($monthly_targets as $key => $value)
                                    <tr wire:key="{{$key}}">
                                        <td>{{$value->month}}</td>
                                        <td>{{$value->physical_target}}</td>
                                        <td>{{$value->cost_per_unit}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if($budget_valid_to == '' || $budget_valid_from == '')

                    @else
                    <div class="col-sm-6 col-lg-6 col-xl-6 mt-8">
                        <div class="table-responsive">
                            <table class="table table-bordered checkbox-td-width">
                                <tbody>
                                    <tr class="table-warning">
                                        <th scope="row">Month</th>
                                        <td>Physical target New</td>
                                        <td>Cost Per Unit New</td>
                                    </tr>
                                    @foreach($months as $key => $value)
                                    <tr wire:key="{{$value}}">
                                        <td>{{$value}}
                                            <input class="form-control input-primary" wire:model.lazy="month.{{$key}}"
                                                id="exampleFormControlInput1" type="hidden" placeholder="Phisycal Target"
                                                data-bs-original-title="" title="">
                                        </td>
                                        <td>
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

            </div>
            <div class="card-footer">
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Update changes</button>
                @can('Approve Budget')
                <button type="button" wire:click.prevent="approve()" {{ $approved ? 'disabled' : '' }}   class="btn btn-success">Approve Budget</button>
                @endcan
            </div>
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
        </div>
    </div>
</div>
