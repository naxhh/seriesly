<?php
namespace Naxhh\Seriesly\Adapter;

class FileGetContents implements Base
{
    const USER_AGENT = 'Naxhh\Seriesly SDK v1.0';
    const TIMEOUT    = 20;
    const MAXREDIRS  = 3;

    public function get($url)
    {
        $options = array(
            'http' => array(
                'method' => 'GET',
                'header' => 'User-Agent: ' . self::USER_AGENT,
                'timeout' => self::TIMEOUT

            )
        );

        $result = file_get_contents($url, false, stream_context_create($options));
        return json_decode($result);
    }
}
