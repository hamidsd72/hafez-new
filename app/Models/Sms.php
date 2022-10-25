<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Sms extends Model {

    public static function SendSms($number ,$text) {
        $to     = $number;
        $text   = str_replace(' ','%20', $text);
        $url    = "http://ws.nh1.ir/Api/SMS/Send?Username=hafezbourse&Password=T@DB!R89306767&Text=$text&To=$to&From=500090213";
    
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        return curl_exec($curl);
    }

}

