<div>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/select2.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.css">
    <div class="p-4 card">
        <div class="flex items-center justify-between mb-2">
            <div class="flex flex-col w-6/12 px-2">
                <div class="col-form-label">Select District</div>
                <select class="js-example-basic-hide-search col-sm-12" id="selectedDistrict" multiple="multiple">
                    @foreach($districts as $key => $d)
                    <option value="{{$d}}">{{$d}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col w-6/12 px-2">
                <div class="col-form-label">Select DSD</div>
                <select class="js-example-basic-hide-search2 col-sm-12" id="selectedDistrict" multiple="multiple">
                    @foreach($dsds as $key => $d)
                    <option value="{{$key}}">{{$d}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="flex items-center justify-between mb-2">
            <div class="flex flex-col w-6/12 px-2">
                <div class="col-form-label">Select Gnd</div>
                <select class="js-example-basic-hide-search3 col-sm-12" id="selectedDistrict" multiple="multiple">
                    @foreach($gnds as $key => $d)
                    <option value="{{$key}}">{{$d}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col w-6/12 px-2">
                <div class="col-form-label">Select Regional Manager</div>
                <select class="button btn btn-primary" wire:model="selected_rm" id="selectedDistrict">
                    <option value="">All Managers</option>
                    @foreach($regional_managers as $key => $r)
                    <option value="{{$key}}">{{$r}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="flex items-center justify-between mb-2">
            <div class="flex flex-col w-6/12 px-2">
                <div class="col-form-label">Select Staff</div>
                <select class="js-example-basic-hide-search5 col-sm-12" id="selectedDistrict" multiple="multiple">
                    @foreach($staffs as $key => $r)
                    <option value="{{$key}}">{{$r}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col w-6/12 px-2">
                <div class="col-form-label">Financial Year</div>
                <select class="button btn btn-success" wire:model="financial_year">
                    <option value="">All Years</option>
                    @foreach($yearArray as $year)
                    <option value="{{$year}}">{{$year}}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
    <div class="card">
        <div class="table-responsive">
            <table id="budget-table" class="table table-responsive table-bordered" data-toggle="table"
                data-search="true" data-filter-control="true" data-show-export="true" data-click-to-select="true"
                data-sortable="true">
                <thead>
                    <tr>
                        <th rowspan="2">PreCondition</th>
                        <th rowspan="2">Broader Activity</th>
                        <th rowspan="2">Output</th>
                        <th rowspan="2">Logframe Activity</th>
                        <th rowspan="2">Type of Unit</th>
                        <th rowspan="2">Unit Cost</th>
                        <th rowspan="2">DSD</th>
                        <th rowspan="2">GND/Estate</th>
                        <th rowspan="2">Staff</th>
                        @foreach($months as $key => $value)
                        <th colspan="2" class="text-center">{{$value}}</th>
                        @endforeach
                        <th>Sum of No of Units</th>
                        <th>Sum of Amount</th>
                    </tr>
                    <tr>
                        @for($i = 1; $i <= 12; $i++) <th>No of Units</th>
                            <th>Amount</th>
                            @endfor
                    </tr>
                </thead>
                <tbody>
                    @php
                    $sum_of_amount = 0;
                    $sum_of_units = 0;
                    @endphp
                    @foreach($budgets as $budget)
                    <tr>
                        <td>
                            P {{$budget->precondition->id}}
                        </td>
                        <td>{{$budget->boarder_activity}}</td>
                        <td>OP{{$budget->pre_condition_id}}.{{$budget->outcome_id}}.{{$budget->output_id}}</td>
                        <td>{{$budget->activity->name}}</td>
                        <td>{{$budget->type_of_unit}}</td>
                        <td>{{$budget->cost_per_unit}}</td>
                        <td>{{$budget->dsd->name}}</td>
                        <td>{{$budget->gnd->name}}</td>
                        <td>{{$budget->addedBy->name}}</td>

                        @php
                        $monthly_figures = \DB::table('monthly_budgets')->where('budget_id', $budget->id)->get();
                        @endphp
                        @foreach($monthly_figures as $m)

                        <td>{{$m->physical_target}}</td>
                        <td>
                            @php
                            $total = $m->cost_per_unit*$m->physical_target;
                            $sum_of_amount += $total;
                            $sum_of_units += $m->physical_target;
                            @endphp
                            {{$total==0 ? '' : $total}}
                        </td>
                        @endforeach
                        <td>{{$sum_of_units}}</td>
                        <td>{{$sum_of_amount}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @push('js')
    <script src="{{asset('assets/admin/js/select2/select2.full.min.js')}}"></script>

    <script>

        $(document).ready(function () {
            window.initSelectCompanyDrop = () => {
                $('.js-example-basic-hide-search').select2({
                    placeholder: ' All Districts',
                    allowClear: true,
                    minimumResultsForSearch: Infinity
                });

                $('.js-example-basic-hide-search2').select2({
                    placeholder: ' All DSDs',
                    allowClear: true,
                    minimumResultsForSearch: Infinity
                });
                $('.js-example-basic-hide-search3').select2({
                    placeholder: ' All GNDs',
                    allowClear: true,
                    minimumResultsForSearch: Infinity
                });
                $('.js-example-basic-hide-search4').select2({
                    placeholder: ' All Regional Managers',
                    allowClear: true,
                    minimumResultsForSearch: Infinity
                });
                $('.js-example-basic-hide-search5').select2({
                    placeholder: ' All Staff',
                    allowClear: true,
                    minimumResultsForSearch: Infinity
                })

            }
            initSelectCompanyDrop();
            $('.js-example-basic-hide-search').on('change', function (e) {
                var data = $('.js-example-basic-hide-search').select2("val");
                @this.set('selectedDistrict', data);
                livewire.emit('updateFilter');
            });

            $('.js-example-basic-hide-search2').on('change', function (e) {
                var data = $('.js-example-basic-hide-search2').select2("val");
                @this.set('selectedDsd', data);
                livewire.emit('updateFilter');

            });
            $('.js-example-basic-hide-search3').on('change', function (e) {
                var data = $('.js-example-basic-hide-search3').select2("val");
                @this.set('selectedGnd', data);
                livewire.emit('updateFilter');

            });
            $('.js-example-basic-hide-search5').on('change', function (e) {
                var data = $('.js-example-basic-hide-search5').select2("val");
                @this.set('selectedStaff', data);
                livewire.emit('updateFilter');

            });
            window.livewire.on('select2', () => {
                initSelectCompanyDrop();
            });

        });
    </script>
    <script>
        window.addEventListener('contentChanged', event => {
            var $table = $("#budget-table"); // "table" accordingly
            $table.bootstrapTable({
                exportOptions: {
                    fileName: 'Budget'
                }
            });
        });
    </script>
    @endpush
    <script>
        document.addEventListener('livewire:load', function () {
            var $table = $("#budget-table"); // "table" accordingly

            $table.bootstrapTable({
                exportOptions: {
                    fileName: 'Budget'
                }
            });
        });

    </script>
</div>
