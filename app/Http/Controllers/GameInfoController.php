<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameInfoController extends Controller
{
    public function loadData(){
        $data = file_get_contents('http://iauto.ied.com/html/js/DOMAIN_INFO_DATA.js?_='. date('Ymd'));
        $data = iconv('GBK', 'UTF-8', $data);
        $data = str_replace('var DOMAIN_INFO_DATA=','',$data);
        $data = json_decode($data,true);
        $newData = [];

        foreach ($data as $item){
            $item = array_only($item,['s_domain_name','s_ccname','s_service_description','s_operator','s_principal','sStudioName','sStudioPM','s_service_description_new']);
            $newData[] = $item;
        }

        foreach ($newData as $item){
            if ($item['s_domain_name'] == 'ep.qq.com') {
                $tempData = $item;
            }
        }
        $data = $data[15];
        dd($newData);
        return $newData;
    }

    public function formatData(){

    }
}
