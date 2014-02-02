<?php
namespace Naxhh\Seriesly;

class Client
{
    const API_URL = 'http://api.series.ly/v2/';

    private $app_id;
    private $secret_key;
    private $api_handler;
    private $auth_key;

    public function __construct( $app_id, $secret_key, RequestHandler $api_handler )
    {
        $this->app_id      = $app_id;
        $this->secret      = $secret_key;
        $this->api_handler = $api_handler;
    }

    public function getAuthKey()
    {
        if ( $this->auth_key )
        {
            return $this->auth_key;
        }

        $request_data = array(
            'id_api' => $this->app_id,
            'secret' => $this->secret
        );

        $auth_url = self::API_URL . 'auth_token/?' . http_build_query( $request_data );
        $response = $this->api_handler->get( $auth_url );

        $this->auth_key = $response['auth_token'];

        return $this->auth_key;
    }

    public function getSerie( $id )
    {
        $this->getAuthKey();
        $factory = new Media\Factory( $this->api_handler, $this->auth_key );

        return $factory->get( $id, Media\Types::SERIE );
    }
}