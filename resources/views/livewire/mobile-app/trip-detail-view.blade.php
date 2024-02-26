<div class="mt-10 row">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <div class="col-xl-8">

    </div>
    <div class="float-right pt-10 pb-10 col-xl-4">
        <div id="reportrange" class="float-right"
            style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
            {{$daterange}}
        </div>
    </div>
    <div class="p-0 mt-10">
        <div class="taskadd">
            <div class="table-responsive">
                <table class="table table-bordered border-collapse: collapse;" style="border-color:black">
                    <thead>
                        <tr style="border-color:#606060">
                            <th style="border-color:#606060">Date</th>
                            <th style="border-color:#606060">
                                <div class="row">
                                    <div class="text-center col-md-1">
                                        #
                                    </div>
                                    <div class="text-right col-md-2">
                                        Place of Dept.
                                    </div>
                                    <div class="text-right col-md-2">
                                        Place of Visit
                                    </div>
                                    <div class="text-right col-md-2">
                                        Distance
                                    </div>
                                    <div class="text-right col-md-2">
                                        Duration
                                    </div>
                                    <div class="text-right col-md-2">
                                        Allowance
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $distanceSum = 0;
                        $noDays = 0;
                        $user_id = 0;
                        @endphp
                        @foreach($trips as $trip)
                        @php
                        $tripsdate = App\Models\Api\Trip::where('date',$trip->date)->groupBy('trip_id')->get();
                        $no = 1;
                        $sum = 0;

                        $hours = 0;
                        $minutes = 0;
                        $hoursWithMinutes = 0;

                        $noDays++;

                        @endphp
                        <tr style="border-top: 1pt solid #606060;">
                            <td style="border-color:#606060; width: 20px;">
                                <h6 class="task_title_0">{{$trip->date}}</h6>
                                <p class="project_name_0">
                                    {{date("l", strtotime($trip->date))}}
                                </p>
                            </td>
                            <td style="border-color:#606060">
                                @foreach($tripsdate as $td)
                                <div class="border border-white row">
                                    <div class="bg-blue-700 col-md-1">
                                        {{$no++}}.
                                    </div>
                                    <div class="text-right bg-blue-600 col-md-2 ">
                                        {{$td->trip_start_location}}
                                    </div>
                                    <div class="text-right bg-blue-600 col-md-2">
                                        {{$td->trip_end_location}}
                                    </div>
                                    <div class="text-right bg-blue-500 col-md-2">
                                        {{$td->end_meter_reading-$td->start_meter_reading}}KM
                                    </div>
                                    <div class="text-right bg-blue-400 col-md-2">
                                        @php
                                        $user_id = $td->user_id;
                                        $time1 = new DateTime($td->start_time);
                                        $time2 = new DateTime($td->end_time);
                                        $timediff = $time1->diff($time2);
                                        echo $timediff->format('%hh %im')."<br />";
                                        $hours += $timediff->format('%h');
                                        $minutes += $timediff->format('%i');
                                        @endphp
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                </div>
                                @php
                                $distance = $td->end_meter_reading-$td->start_meter_reading;
                                $sum += $distance;
                                @endphp
                                @endforeach
                            </td>
                        </tr>
                        <tr style="border-bottom: 1pt solid #606060;">
                            <td style="border-color:#606060">

                            </td>
                            <td style="border-color:#606060">
                                <div class="row">
                                    <div class="text-center col-md-5 ">
                                        Total
                                    </div>
                                    <div class="text-right col-md-2 ">
                                        {{$sum}}KM
                                        @php
                                        $distanceSum += $sum;
                                        @endphp
                                    </div>
                                    <div class="text-right col-md-2 ">
                                        @php
                                        $hoursWithMinutes = ($hours*60) + $minutes;
                                        $hoursAndMinutes = intdiv($hoursWithMinutes, 60).'h '. ($hoursWithMinutes %
                                        60).'m';
                                        @endphp

                                        {{$hoursAndMinutes}}
                                    </div>
                                    <div class="text-right col-md-2 ">
                                        @php
                                        $hours = intdiv($hoursWithMinutes, 60);
                                        if($hours >=2 && $hours < 4 ){ $allowance=60; } elseif($hours>= 4){
                                            $allowance = 120;
                                            }
                                            else{
                                            $allowance = 0;
                                            }
                                            @endphp
                                            {{$allowance}}
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>
                                KM Traveled for Office work
                            </td>
                            <td>
                                {{$distanceSum}}KM
                            </td>
                        </tr>
                        <tr>
                            <td>
                                KM Traveled for Bording/House
                            </td>
                            <td>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(function () {

            var start = moment().subtract(29, 'days');
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
    </script>
</div>
