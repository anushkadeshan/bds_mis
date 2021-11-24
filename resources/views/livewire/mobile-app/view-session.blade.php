<div class="col-xl-12 xl-100 box-col-12">
    <div class="card">
       <div class="card-body">
          <div class="user-status table-responsive">
             <table class="table table-bordernone">
                <tbody>
                   <tr>
                      <td class="f-w-600">Client</td>
                      <td>{{$session['client']}}</td>

                   </tr>
                   <tr>
                      <td class="f-w-600">Visit Date</td>
                      <td>{{$session['date']}}</td>

                   </tr>
                   <tr>
                      <td class="f-w-600">Session Started Time</td>
                      <td>{{$session['start_time']}}</td>

                   </tr>
                   <tr>
                      <td class="f-w-600">Session End Time</td>
                      <td>{{$session['end_time']}}</td>
                   </tr>
                   <tr>
                    <td class="f-w-600">Session Duration</td>
                    <td>
                        @php
                            $datetime1 = new DateTime($session['start_time']);
                            $datetime2 = new DateTime($session['end_time']);
                            $interval = $datetime1->diff($datetime2);
                            echo $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
                        @endphp

                 </tr>
                   <tr>
                      <td class="f-w-600">Session Started Address</td>
                      <td>{{$session['start_address']}}</td>

                   </tr>
                   <tr>
                      <td class="f-w-600">Session End Address</td>
                      <td>{{$session['end_address']}}</td>

                   </tr>
                   <tr>
                      <td class="f-w-600">Location</td>
                      <td>Lat : {{$session['start_lat']}}, Lng: {{$session['start_long']}}</td>

                   </tr>
                   <tr>
                    <td class="f-w-600">Description</td>
                    <td>{{$session['description']}}</td>
                 </tr>
                </tbody>
             </table>
          </div>
       </div>
    </div>
 </div>
