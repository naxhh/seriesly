<?php
namespace Naxhh\Seriesly\Media;

use Naxhh\Seriesly\RequestHandler;

class Factory
{
    const API_URL = 'http://api.series.ly/v2/';

    private $handler;

    public function __construct( RequestHandler $handler, $auth_key )
    {
        $this->handler  = $handler;
        $this->auth_key = $auth_key;
    }

    public function get( $id, $media_type )
    {
        $request_params = array(
            'auth_token' => $this->auth_key,
            'mediaType'  => Types::SERIE,
            'idm'        => $id
        );

        $url = self::API_URL . 'media/basic_info/?' . http_build_query( $request_params );

        $response = $this->handler->get( $url );

        return new Serie( $response );
    }
}