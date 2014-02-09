<?php
namespace Naxhh\Seriesly\Adapter;

class Curl implements Base
{
    const USER_AGENT = 'Naxhh\Seriesly SDK v1.0';
    const TIMEOUT    = 20;
    const MAXREDIRS  = 3;

    public function get($url)
    {
        $ch = \curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, self::TIMEOUT);
        curl_setopt($ch, CURLOPT_MAXREDIRS, self::MAXREDIRS);
        curl_setopt($ch, CURLOPT_USERAGENT, self::USER_AGENT);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }
}
