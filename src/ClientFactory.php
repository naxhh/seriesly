<?php
namespace Naxhh\Seriesly;

class ClientFactory
{
    public static function create($app_id, $secret_key, Adapter\Base $executor)
    {
        $api_handler = new Request(
            $executor,
            new UrlBuilder,
            $app_id,
            $secret_key
        );

        return new Client($api_handler);
    }
}