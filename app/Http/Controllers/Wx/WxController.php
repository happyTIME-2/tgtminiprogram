<?php

namespace App\Http\Controllers\Wx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wx\WXBizDataCrypt;
use GuzzleHttp\Client;
use App\Allusers;

class WxController extends Controller
{
    protected $alluser;
    public function index(Request $request)
    {
        $appid = 'wx8b5db5a043124b0b';
        $secret = "36418239b0a39b9afc26e7ea9a783b35";

        $code = $request->code;
        $encryptedData = $request->encryptedData;
        $iv = $request->iv;

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://api.weixin.qq.com/sns/jscode2session', [
            'query' => [
                'appid' =>$appid,
                'secret' => $secret,
                'js_code' => $code,
                'grant_type' => 'authorization_code'
            ]
        ]);

        $body = json_decode($res->getBody());
        $openid = $body->openid;
        $session_key = $body->session_key;

        $userifo = new WXBizDataCrypt($appid, $session_key);
        $errCode = $userifo->decryptData($encryptedData, $iv, $data);
        dump($errCode);
        if ($errCode == 0) {
            $result = $data;
        } else {
            $result = $errCode;
        }

        $info = json_decode($result);
        $nickName = $info->nickName;
        $avatarUrl = $info->avatarUrl;
        $province = $info->province;
        $city = $info->city;

        $alluser = Allusers::firstOrCreate(['openid' => $openid],[
            'openid' => $openid,
            'session_key' => $session_key,
            'nickName' => $nickName,
            'avatarUrl' => $avatarUrl,
            'province' => $province,
            'city' => $city
        ]);

        return json_encode($alluser);
    }
}
