<div>
    <div class="card">
        <div class="card-header">
            <div class="header-top">
                <h5>Log Frame </h5>
                <div class="card-header-right-icon">
                    <select wire:model="project_id" name="project" class="button btn btn-success"
                        class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
                        <option value="">Select a Project</option>
                        @foreach($projects as $p)
                        <option value="{{$p->id}}">{{$p->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if($project)
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="media faq-widgets">
                        <div class="media-body">
                            <h5>{{$project->name}}</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <table class="text-white">
                                        <tr>
                                            <td class="mr-10">Budget : </td>
                                            <td>{{$project->budget}}</td>
                                        </tr>
                                        <tr>
                                            <td>Start from : </td>
                                            <td>{{$project->started_at}}</td>
                                        </tr>
                                        <tr>
                                            <td>End At : </td>
                                            <td>{{$project->end_at}}</td>
                                        </tr>
                                        <tr>
                                            <td>Type : </td>
                                            <td>{{$project->tpe}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="text-white">
                                        <tr>
                                            <td class="mr-10">District : </td>
                                            <td>
                                                @foreach(json_decode($project->district) as $key => $value)
                                                {{$value}},
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>DSDs : </td>
                                            <td>
                                                @php
                                                $dsds = json_decode($project->dsds);
                                                $names = App\Models\DsOffice::whereIn('id', $dsds)->pluck('name');

                                                @endphp
                                                @foreach($names as $key => $value)
                                                {{$value}},
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Goal : </td>
                                            <td>{{$project->goal}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-file-text">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-sm" id="basic-2" data-toggle="table" data-search="true"
                    data-filter-control="true" data-show-export="true" data-click-to-select="true" data-sortable="true">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Activity Name</th>
                            <th>Indicators</th>
                            <th>Type</th>
                            <th>Means of Verification</th>
                            <th>Assumptions/Risks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($preconditions as $p)
                        <tr class="text-white bg-primary">
                            <td class="text-white">Pre Condition {{$p->code}}</td>
                            <td class="text-white" colspan="5">{{$p->pre_condition}}</td>
                        </tr>
                        @php
                        $outcomes = App\Models\Logframe\Outcome::where('pre_condition_id', $p->id)->get();
                        @endphp
                        @foreach($outcomes as $o)
                        <tr>
                            <td>Outcome {{$p->code}}.{{$o->code}}</td>
                            <td colspan="5">{{$o->outcome}}</td>
                        </tr>
                        @php
                        $outputs = App\Models\Logframe\Output::where('outcome_id', $o->id)->get();
                        @endphp
                        @foreach($outputs as $op)
                        <tr>
                            <td>Output {{$p->code}}.{{$o->code}}.{{$op->code}}</td>
                            <td colspan="5">{{$op->output}}</td>
                            @php
                            $activities = App\Models\LogFrame\Activity::where('output_id', $op->id)->get();
                            @endphp
                            @foreach($activities as $activity)
                        <tr>
                            <td>Activity {{$p->code}}.{{$o->code}}.{{$op->code}}.{{$activity->code}}</td>
                            <td>{{$activity->name}}</td>
                            <td>{{$activity->indicators}}</td>
                            <td>{{$activity->type}}</td>
                            <td>{{$activity->means_of_verification}}</td>
                            <td>{{$activity->assumptions_risks}}</td>
                        </tr>
                        @endforeach
                        @endforeach
                        @endforeach
                        @endforeach
                    </tbody>

                </table>
            </div>

            @else
            <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                <strong class="font-bold">Opps!</strong>
                <span class="block sm:inline">Please select a project to view the log frame </span>
            </div>
            @endif
        </div>
    </div>
    <script>
        document.addEventListener('livewire:load', function () {
            var $table = $("#basic-2"); // "table" accordingly

            $table.bootstrapTable({
                exportOptions: {
                    fileName: 'LogFrame'
                }
            });
        });
    </script>
</div>
