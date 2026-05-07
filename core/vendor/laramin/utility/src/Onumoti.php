<?php

namespace Laramin\Utility;

use App\Lib\CurlRequest;
use App\Models\GeneralSetting;

class Onumoti{

    public static function getData(){
        $param['purchasecode'] = env("PURCHASECODE");
        $param['website'] = @$_SERVER['HTTP_HOST'] . @$_SERVER['REQUEST_URI'] . ' - ' . env("APP_URL");
        $reqRoute = VugiChugi::lcLabRoute();
        $reqRoute = $reqRoute. systemDetails()['name'];
        $response = CurlRequest::curlPostContent($reqRoute, $param);


        $general = GeneralSetting::first();
            $general->maintenance_mode = 0;
        
            $general->available_version = 1;
        
        $general->save();
    }

    public static function mySite($site,$className){
        $myClass = VugiChugi::clsNm();
        if($myClass != $className){
            return $site->middleware(VugiChugi::mdNm());
        }
    }
}
