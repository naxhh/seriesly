<?php
namespace Naxhh\Seriesly;

class UrlBuilder
{
    const BASE_URL = 'http://api.series.ly/v2/';

    public function getAuthUrl($app_id, $secret)
    {
        $request_data = array(
            'id_api' => $app_id,
            'secret' => $secret
        );

        return self::BASE_URL . 'auth_token/?' . http_build_query($request_data);
    }

    public function getBasicMediaUrl($id, $type, $auth)
    {
        $request_params = array(
            'auth_token' => $auth,
            'mediaType'  => $type,
            'idm'        => $id
        );

        return self::BASE_URL . 'media/basic_info/?' . http_build_query($request_params);
    }
}
