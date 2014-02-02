<?php
namespace Naxhh\Seriesly;

class Client
{
    private $app_id;
    private $secret_key;
    private $api_handler;

    public static function create( $app_id, $secret_key, $executor )
    {
        $api_handler = new Request(
            $executor,
            new UrlBuilder,
            $app_id,
            $secret_key
        );

        return new self( $api_handler );
    }

    public function __construct( Request $api_handler )
    {
        $this->api_handler = $api_handler;
    }

    public function getSerie( $id )
    {
        $factory = new Media\Factory();

        return $factory->create(
            $this->api_handler->getBasicMedia( $id, Media\Types::SERIE )
        );
    }
}