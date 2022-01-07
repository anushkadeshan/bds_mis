<div>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <div class="card">
        <div class="card-header">
            <div class="header-top">
                <h5>Running Chart </h5>
            </div>
        </div>
        <div class="card-body">
            <div class="m-4 mr-10 row">
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
                        <option value="">Select a User</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="p-0 mt-10">
                <div class="taskadd">
                    @if(count($trips)>0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive"
                            style="border-color:black; border-collapse: collapse;">
                            <thead>
                                <tr style="border-color:#606060">
                                    <th style="border-color:#606060">Date</th>
                                    <th style="border-color:#606060">
                                        <div class="row">
                                            <div class="text-center col-md-1">
                                                #
                                            </div>
                                            <div class="text-right col-md-3">
                                                Place of Dept.
                                            </div>
                                            <div class="text-right col-md-3">
                                                Place of Visit
                                            </div>
                                            <div class="text-right col-md-2">
                                                Distance
                                            </div>
                                            <div class="text-right col-md-3">
                                                Duration
                                            </div>
                                        </div>
                                    </th>
                                    <th style="border-color:#606060">
                                        <div class="row">
                                            <div class="text-center col-md-6">
                                                Client
                                            </div>
                                            <div class="text-right col-md-6">
                                                Duration
                                            </div>
                                        </div>
                                    </th>
                                    <th style="border-color:#606060">
                                        Allowance
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $distanceSum = 0;
                                $noDays = 0;
                                $user_id = 0;

                                $totalAllowance =0;
                                @endphp
                                @foreach($trips as $trip)
                                @php
                                $tripsdate = App\Models\Api\Trip::where('date',$trip->date)->groupBy('trip_id')->get();

                                $sessions = App\Models\Api\Session::whereDate('date',$trip->date)->get();

                                $no = 1;
                                $sum = 0;

                                $hours = 0;
                                $minutes = 0;
                                $hoursWithMinutes = 0;

                                $hoursC = 0;
                                $minutesC = 0;
                                $hoursWithMinutesC = 0;


                                $noDays++;


                                @endphp
                                <tr style="border-top: 1pt solid #606060;">
                                    <td style="border-color:#606060;" width="7">
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
                                            <div class="text-right bg-blue-600 col-md-3 ">
                                                {{$td->trip_start_location}}
                                            </div>
                                            <div class="text-right bg-blue-600 col-md-3">
                                                {{$td->trip_end_location}}
                                            </div>
                                            <div class="text-right bg-blue-500 col-md-2">
                                                {{$td->end_meter_reading-$td->start_meter_reading}}KM
                                            </div>
                                            <div class="text-right bg-blue-400 col-md-3">
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
                                    <th style="border-color:#606060">
                                        @foreach($sessions as $s)
                                        <div class="border border-white row">
                                            <div class="bg-green-700 col-md-6">
                                                {{$s->client}}
                                            </div>
                                            <div class="text-right bg-green-600 col-md-6">
                                                @php
                                                $timeC1 = new DateTime($s->start_time);
                                                $timeC2 = new DateTime($s->end_time);
                                                $timediffC = $timeC1->diff($timeC2);
                                                echo $timediffC->format('%hh %im')."<br />";
                                                $hoursC += $timediffC->format('%h');
                                                $minutesC += $timediffC->format('%i');
                                                @endphp
                                            </div>
                                        </div>
                                        @endforeach
                                    </th>
                                    <th style="border-color:#606060">

                                    </th>
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
                                                $hoursAndMinutes = intdiv($hoursWithMinutes, 60).'h '.
                                                ($hoursWithMinutes %
                                                60).'m';
                                                @endphp

                                                {{$hoursAndMinutes}}
                                            </div>
                                        </div>
                                    </td>

                                    <td style="border-color:#606060">
                                        @php
                                        $hoursWithMinutesC = ($hoursC*60) + $minutesC;
                                        $hoursAndMinutesC = intdiv($hoursWithMinutesC, 60).'h '.
                                        ($hoursWithMinutesC %
                                        60).'m';
                                        @endphp
                                        <div class="text-right">
                                            {{$hoursAndMinutesC}}
                                        </div>

                                    </td>
                                    <td style="border-color:#606060">
                                        @php
                                        $allowance = 0;
                                        $sumHoursWithMinutes = $hoursWithMinutes+$hoursWithMinutesC;
                                        $hours = intdiv($sumHoursWithMinutes, 60);
                                        if($hours >=2 && $hours < 4 ) { $allowance=60; } elseif($hours>= 4)
                                            {
                                            $allowance = 120;
                                            }
                                            else{
                                            $allowance = 0;
                                            }
                                            @endphp
                                            <div class="text-right">

                                                {{$allowance}}
                                                @php
                                                $totalAllowance += $allowance;


                                                @endphp

                                            </div>

                                    </td>
                                </tr>
                                <tr style="border-bottom: 1pt solid #606060;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2">
                                        KM Traveled for Office Work
                                    </td>
                                    <td align="right">
                                        {{$distanceSum}}KM
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        @if($is_boarded)
                                        KM Traveled for Bording
                                        @else
                                        KM Traveled for House
                                        @endif

                                    </td>
                                    <td align="right" style="border-bottom: 1pt solid #606060;">
                                        @if($is_boarded)
                                        @php
                                        $homeDistance = 10;
                                        @endphp
                                        @else
                                        @php
                                        $homeDistance = 20;
                                        @endphp
                                        @endif
                                        {{$homeDistance}}KM
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        Total KM
                                    </td>
                                    <td align="right" style="border-bottom: 1pt double #606060;">
                                        @php
                                        $totalKm = $homeDistance+$distanceSum;
                                        @endphp
                                        {{$totalKm}}KM
                                        @php

                                        @endphp
                                    </td>
                                </tr>
                                <tr style="border-bottom: 1pt solid #606060;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        Petrol Claim Total Amount
                                    </td>
                                    <td align="right">
                                        {{$totalKm*8.56}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        Petrol Claim Total amount for Banking
                                    </td>
                                    <td align="right" style="border-bottom: 1pt solid #606060;">
                                        {{$totalKm*2.14}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        Petrol Claim Total to Pay
                                    </td>
                                    <td align="right">

                                        @php
                                        $totalPay = $totalKm*6.42;
                                        @endphp
                                        {{$totalPay}}
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        Field Allowance Amount to Pay
                                    </td>
                                    <td align="right" style="border-bottom: 1pt solid #606060;">
                                        {{$totalAllowance}}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        Total Claim Amount to Pay
                                    </td>
                                    <td align="right" style="border-bottom: 1pt double #606060;">
                                        {{$totalAllowance+$totalPay}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                        <strong class="font-bold">Opps!</strong>
                        <span class="block sm:inline">Please select a user to view the data or No data found</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="loading-overlay" wire:loading.class="is-active">
        <span class="fa fa-spinner fa-3x fa-spin"></span>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        document.addEventListener('livewire:load', function () {
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
        })
    </script>


    <script>

    </script>
</div>
