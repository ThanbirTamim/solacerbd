<?php
namespace App\Http\Controllers;


class SmsServiceSolacerBd
{
    function __construct()
    {

    }

    public function messagesent($number, $mg){
        $to = $number;
        $token = "bf36c442e14f6b721c416a1988322952";
        $message = $mg;
//        $message = "হ্যালো, SolacherBD ওটিপি (OTP) কোডঃ 126589";
        $url = "http://api.greenweb.com.bd/api.php?json";
        $data= array(
            'to'=>"$to",
            'message'=>"$message",
            'token'=>"$token"
        ); // Add parameters in key value
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $smsresult = (json_decode($smsresult, true)[0])["statusmsg"];
        //Result
        return $smsresult;
    }

}
