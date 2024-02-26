<div>

    <div class="p-3 card">
        <div class="row">
            <div class="col-md-5">
                <div id="reportrange"
                    style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                    {{$daterange}}
                </div>
            </div>
            <div class="col-md-5">
                <select wire:model="user_id" name="financial_year" class="button btn btn-success"
                    class="w-full px-3 py-2 mt-2 bg-gray-100 rounded-sm focus:outline-none">
                    <option value="">All Staffs</option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-xl-12 xl-100 chart_data_left box-col-12 bg-primary">
        <div class="card">
            <div class="p-0 card-body">
                <div class="m-0 row chart-main">
                    <div class="p-0 bg-pink-600 col-xl-3 col-md-6 col-sm-6 box-col-6">
                        <div class="media align-items-center">
                            <div class="hospital-small-chart">
                                <div class="small-bar">
                                    <div class="small-chart flot-chart-container">
                                        <div class="chartist-tooltip"></div>
                                        <i class="fa fa-car fa-7x" style="font-size: 4em;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="right-chart-content">
                                    <h4>{{$total_km}}</h4><span class="text-white">Total KM </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-0 bg-green-600 col-xl-3 col-md-6 col-sm-6 box-col-6">
                        <div class="media align-items-center">
                            <div class="hospital-small-chart">
                                <div class="small-bar">
                                    <div class="small-chart1 flot-chart-container">
                                        <div class="chartist-tooltip" style="top: -22.1875px; left: 17.75px;"><span
                                                class="chartist-tooltip-value"></span></div>
                                        <i class="fa fa-clock-o" style="font-size: 4em;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="right-chart-content">
                                    <h4>{{$trip_time}}</h4><span class="text-white">Trip Time</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-0 bg-purple-600 col-xl-3 col-md-6 col-sm-6 box-col-6">
                        <div class="media align-items-center">
                            <div class="hospital-small-chart">
                                <div class="small-bar">
                                    <div class="small-chart2 flot-chart-container">
                                        <div class="chartist-tooltip"></div>
                                        <i class="fa fa-group" style="font-size: 4em;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="right-chart-content">
                                    <h4>{{$total_sessions}}</h4><span class="text-white">Sessions</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-0 col-xl-3 col-md-6 col-sm-6 box-col-6 bg-secondary">
                        <div class="border-none media align-items-center">
                            <div class="hospital-small-chart">
                                <div class="small-bar">
                                    <div class="small-chart3 flot-chart-container">
                                        <div class="chartist-tooltip"></div>
                                        <i class="fa fa-history" style="font-size: 4em;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="media-body">
                                <div class="right-chart-content">
                                    <h4>{{$session_time}}</h4><span class="text-white">Session Time</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Field Trips</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Trip Date</th>
                            <th>Distance</th>
                            <th>Trip Started at</th>
                            <th>Trip Ended at</th>
                            <th>Duration</th>
                            <th>User</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trips as $r)
                        <tr>
                            <td>{{$r->date}}</td>
                            <td>{{$r->end_meter_reading-$r->start_meter_reading}}</td>
                            <td>{{ date('h:i A', strtotime($r->start_time))}}</td>
                            <td>{{ date('h:i A', strtotime($r->end_time))}}</td>
                            <td>
                                @php
                                $timeC1 = new DateTime($r->start_time);
                                $timeC2 = new DateTime($r->end_time);
                                $timediffC = $timeC1->diff($timeC2);
                                echo $timediffC->format('%hh %im')."<br />";
                                @endphp
                            </td>
                            <td>{{$r->user->name}}</td>
                            <td>
                                <a href="{{ route('trips.show', [$r->id]) }}" target="_blank"
                                    class="p-1 bg-yellow-600 rounded hover:bg-yellow-200 hover:text-white"
                                    style="background-color: green;">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mx-2 my-2">
                    {{ $trips->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Field Sessions</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive" id="basic-1">
                    <thead>
                        <tr>
                            <th>Session Date</th>
                            <th>Client</th>
                            <th>Session Started at</th>
                            <th>Session Ended at</th>
                            <th>Duration</th>
                            <th>User</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sessions as $r)
                        <tr>
                            <td>{{ date('Y-m-d', strtotime($r->date))}}</td>
                            <td>{{$r->client}}</td>
                            <td>{{ date('h:i A', strtotime($r->start_time))}}</td>
                            <td>{{ date('h:i A', strtotime($r->end_time))}}</td>
                            <td>
                                @php
                                $timeC1 = new DateTime($r->start_time);
                                $timeC2 = new DateTime($r->end_time);
                                $timediffC = $timeC1->diff($timeC2);
                                echo $timediffC->format('%hh %im')."<br />";
                                @endphp
                            </td>
                            <td>{{$r->user->name}}</td>
                            <td>
                                <a href="{{ route('sessions.show', [$r->id]) }}" target="_blank"
                                    class="p-1 bg-yellow-600 rounded hover:bg-yellow-200 hover:text-white"
                                    style="background-color: green;">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="loading-overlay" wire:loading.class="is-active">
        <span class="fa fa-spinner fa-3x fa-spin"></span>
    </div>
    <script>
        document.addEventListener('livewire:load', function () {
            $('#basic-1').DataTable();
            $(function () {

                var start = moment();
                var end = moment();

                function cb(start, end) {
                    @this.set('startdate', start.format('YYYY-MM-DD'));
                    @this.set('enddate', end.format('YYYY-MM-DD'));
                }

                $('#reportrange').daterangepicker({
                    startDate: start,
                    endDate: end,
                    opens: 'right',
                    drops: 'down',
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    }
                }, cb);
                $('#reportrange span').html(start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                cb(start, end);

            });
        })
    </script>
</div>
