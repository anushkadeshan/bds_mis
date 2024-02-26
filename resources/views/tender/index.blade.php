<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <title>INVITATION FOR BIDS</title>
</head>
<body>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12 center-block">

                <center>
                    <img src="{{asset('Logo2.jpg')}}" width="100px" alt="Berendina Logo" style="margin-left: auto; margin-right:auto ">
                    <h3 style="background-color: black; color:aliceblue; padding:10px">INVITATION FOR BIDS</h3>
                    <h4>Purchasing of Medical Equipment for hospitals COVID 19 response initiative of Berendina Development Services</h4>
                    <br>
                    <p>
                        Berendina Development Services (BDS) established in 2005 is a leading non-governmental organization committed to support the marginalized communities in Sri Lanka to alleviate poverty. We have been serving in 11 districts across the country through humanitarian responses.
                        <br> <br>
Berendina Development Services (BDS) invites all prospective bidders to apply for eligibility and bid for the listed medical equipment. Listed equipment are a part of the COVID 19 response implemented by Berendina Development Services supporting the health sector of Sri Lanka to equip the hospitals to meet their emergent requirements during the pandemic.
                    </p>


                </center>

            </div>
        </div>

        @php
            $tenders = DB::table('tenders')->get();
            $no = 1;
        @endphp
        <table class="table table-dark table-striped">
            <thead>
                <th scope="col">Item No:</th>
                <th scope="col">Item Requested</th>
                <th scope="col">Sum of Qty</th>
                <th scope="col">Specification</th>
            </thead>
            <tbody>
                @foreach($tenders as $tender)
                <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>{{$tender->item}}</td>
                    <td>{{$tender->qty}}</td>
                    <td>
                        @if($tender->link)
                        <a href="{{URL::asset('storage/'.$tender->link)}}"><button type="button" class="btn btn-light">Download</button></a>
                        @endif
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>

        <center>
            <h5 class="">
                Eligible bidders must submit the prices with the specifications of the equipment provided in the above table (link to download the document is provided) to the address
                below on or before <span class="text-danger" style="font-weight: bold;">17th September 2021 before 10:30 a.m. (GMT +5:30 hours).</span>  Incomplete bids and bids submitted after the deadline will not be taken into consideration.
                Successful bidders will be notified in writing within 7 days of the deadline.
                <br><br>
                Please visit <a href="https://berendina.org">www.berendina.org</a>  for more details.
            </h5>

            <h3 style="background-color: black; color:white; padding:20px">

                Mr. Siri Kumarawansha Randunu <br>
                Head of Finance <br>
                <a href="mailto:procurement@berendina.org">procurement@berendina.org</a> <br>
                No: 44/3, 3rd Floor, Narahenpita Rd, Nawala

            </h3>
        </center>
    </div>
</body>
</html>



