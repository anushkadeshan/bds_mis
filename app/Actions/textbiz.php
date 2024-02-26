<?php

namespace App\Actions;

class textbiz{

    public function sendsms($message, $reciver){
        $user = "94778608350";
        $password = "1982";
        $text = urlencode($message);
        $to =  $reciver;

        $baseurl ="http://www.textit.biz/sendmsg";
        $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
        $ret = file($url);

        $res= explode(":",$ret[0]);

        if (trim($res[0])=="OK")
        {
        echo "Message Sent - ID : ".$res[1];
        }
        else
        {
        echo "Sent Failed - Error : ".$res[1];
        }
    }
}

?>
