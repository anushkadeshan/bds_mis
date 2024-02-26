<div>
    <div class="mb-4">
        <div  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success">
            <i class="fa fa-filter" aria-hidden="true"> Filters</i>
        </div>
        <select wire:model="financial_year" name="financial_year" class="button btn btn-success"
            class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
            <option value="">Select a Year</option>
            @foreach($yearArray as $year)
            <option value="{{$year}}">{{$year}}</option>
            @endforeach
        </select>
        <button type="button" wire:click="export()" class="btn btn-primary float-right">
            <i class="fa fa-file-excel-o" aria-hidden="true"></i>
            Export</button>
        <!-- Modal -->
        <div wire:ignore class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">DS Divisions</label>
                                    <select wire:ignore wire:model.defer="dsd" class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-lg focus:outline-none" id="dsd" multiple="multiple">
                                        @foreach($dsds as $key => $ds)
                                            <option value="{{$key}}">{{$ds}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">GN Divisions</label>
                                    <select wire:ignore wire:model.defer="gnd" class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-lg focus:outline-none" id="gnd" multiple="multiple">
                                        @foreach($gnds as $key => $gn)
                                            <option value="{{$key}}">{{$gn}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Regional Managers</label>
                                    <select wire:ignore wire:model.defer="manager" class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-lg focus:outline-none" id="gnd" multiple="multiple">
                                        @foreach($managers as $key => $manager)
                                            <option value="{{$key}}">{{$manager}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <label for="">YDC/CDC</label>
                                    <select wire:ignore wire:model.defer="staff" class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-lg focus:outline-none" id="gnd" multiple="multiple">
                                        @foreach($staffs as $key => $staff)
                                            <option value="{{$key}}">{{$staff}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <label for="">Activity</label>
                                    <select wire:ignore wire:model.defer="activity" class="w-full px-3 py-2 mt-2 bg-gray-100 focus:outline-none rounded-lg" id="gnd" multiple="multiple">
                                        @foreach($activities as $key => $activity)
                                            <option value="{{$key}}">{{$activity}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-4 pb-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" wire:click="clearFilters()" class="btn btn-warning">Clear</button>
                            <button type="button" wire:click="filter()" class="btn btn-primary">Apply</button>

                        </div>
                    </div>

                </div>

            </div>

        </div>


    </div>
    <table class="table table-responsive">
        <thead>
            <tr class="text-sm">
                <th>#</th>
                <th>Code</th>
                <th>Activity Title</th>
                <th>Planned Units</th>
                <th>Achived Units</th>
                <th>Units %</th>
                <th>Planned Cost</th>
                <th>Total Cost</th>
                <th>Financial %</th>
                <th>Completed Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($progress as $p)
            <tr class="text-sm">
                <td>{{$p->id}}</td>
                <td>{{$p->activity_code}}</td>
                <td>{{$p->budget->boarder_activity}}</td>
                <td>{{$p->budget->no_of_units}}</td>
                <td>{{$p->units_completed}}</td>
                <td>
                    @php
                        $precentage = ($p->units_completed/$p->budget->no_of_units)*100
                    @endphp
                    {{$precentage}}%
                </td>
                <td>
                    @php
                        $planned_cost = ($p->budget->cost_per_unit*$p->budget->no_of_units)
                    @endphp
                    {{number_format($planned_cost, 2, '.', ',')}}
                </td>
                <td>
                    {{number_format($p->totdal_actual_cost, 2, '.', ',')}}
                </td>
                <td>
                    @php
                        $precentageF = ($p->totdal_actual_cost/$planned_cost)*100
                    @endphp
                    {{$precentageF}}%
                </td>
                <td>{{$p->date_of_end}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-2">
        {{ $progress->links() }}
    </div>
    @push('js')



    @endpush
</div>
