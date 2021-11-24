<div class="col-xl-12 xl-100 box-col-12">
    <div class="card">
       <div class="card-body p-0">
          <div class="user-status table-responsive">
             <table class="table table-bordernone">
                <tbody>

                   <tr>
                      <td class="f-w-600">Visit Date</td>
                      <td>{{$trip['date']}}</td>

                   </tr>
                   <tr>
                      <td class="f-w-600">Trip Started Time</td>
                      <td>{{$trip['start_time']}}</td>

                   </tr>
                   <tr>
                      <td class="f-w-600">Trip End Time</td>
                      <td>{{$trip['end_time']}}</td>

                   </tr>
                   <tr>
                    <td class="f-w-600">Trip Duration</td>
                    <td>
                        @php
                            $datetime1 = new DateTime($trip['start_time']);
                            $datetime2 = new DateTime($trip['end_time']);
                            $interval = $datetime1->diff($datetime2);
                            echo $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
                        @endphp

                 </tr>
                   <tr>
                      <td class="f-w-600">Trip Started Meter</td>
                      <td>{{$trip['start_meter_reading']}}</td>
                   </tr>
                   <tr>
                      <td class="f-w-600">Trip End Meter</td>
                      <td>{{$trip['end_meter_reading']}}</td>

                   </tr>
                   <tr>
                    <td class="f-w-600">Distance According to Meter Reading</td>
                    <td>{{$trip['end_meter_reading']-$trip['start_meter_reading']}}KM</td>

                 </tr>
                   <tr>
                      <td class="f-w-600">Distance Accordign to GPS</td>
                      <td>{{round($trip['distance'],2)}}KM</td>
                   </tr>
                </tbody>
             </table>
          </div>
       </div>
    </div>
 </div>
