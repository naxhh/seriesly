<?php
namespace Naxhh\Seriesly\Tests;

use Naxhh\Seriesly\Client;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->app_id     = 1;
        $this->secret_key = 'my_secret_key';
        $this->auth_key = 'given_auth_key_by_api';

        $this->request_handler = $this->getMock( 'Naxhh\Seriesly\RequestHandler' );
        $this->client = new Client( $this->app_id, $this->secret_key, $this->request_handler );
    }
    /** @test */
    public function client_should_connect_to_get_auth_key()
    {
        $auth_key = 'given_auth_key_by_api';

        $api_response = array(
            "auth_token"        => $auth_key,
            "auth_expires_date" => "1349168354",
            "error"             => 0
        );

        $this->request_handler->expects( $this->once() )
            ->method( 'get' )
            ->with( Client::API_URL . 'auth_token/?id_api=' . $this->app_id . '&secret=' . $this->secret_key )
            ->will( $this->returnValue( $api_response ) );

        $this->assertEquals(
            $auth_key,
            $this->client->getAuthKey()
        );
    }

    private function client_retrieve_auth()
    {
        $api_response = array(
            "auth_token"        => $this->auth_key,
            "auth_expires_date" => "1349168354",
            "error"             => 0
        );

        $this->request_handler->expects( $this->at( 0 ) )
            ->method( 'get' )
            ->with( Client::API_URL . 'auth_token/?id_api=' . $this->app_id . '&secret=' . $this->secret_key )
            ->will( $this->returnValue( $api_response ) );
    }

    /** @test */
    public function client_should_not_connect_two_times_to_get_auth_key()
    {
        $this->client_retrieve_auth();

        $this->client->getAuthKey();
        $this->client->getAuthKey();
    }

    /** @test */
    public function client_should_return_serie_based_on_id()
    {
        $serie_id = 1;
        $serie_info = array(
            "idm"       => "260",
            "id_media"  => "2EF4F6T6CZ",
            "mediaType" => "1",
            "name"      => "Fringe",
            "maingenre" => "Drama",
            "year"      => "2008",
            "seasons"   => 5,
            "episodes"  => 95,
            "plot"      => "plot",
            "plot_es"   => "es plot",
            "plot_en"   => "en plot",
            "url"       => "http:\/\/series.ly\/series\/serie-2EF4F6T6CZ",
            "poster"    => array(
                "large"  => "http:\/\/cdn.opensly.com\/series\/2EF4F6T6CZ.jpg",
                "medium" => "http:\/\/cdn.opensly.com\/series\/2EF4F6T6CZ-p.jpg",
                "small"  => "http:\/\/cdn.opensly.com\/series\/2EF4F6T6CZ-xs.jpg"
            ),
            "error" => 0
        );

        $this->client_retrieve_auth();
        $this->request_handler->expects( $this->at( 1 ) )
            ->method( 'get' )
            ->with( Client::API_URL . 'media/basic_info/?auth_token=' . $this->auth_key . '&mediaType=1&idm=' . $serie_id )
            ->will( $this->returnValue( $serie_info ) );

        $serie = $this->client->getSerie( $serie_id );

        $this->assertInstanceOf(
            '\Naxhh\Seriesly\Media\Serie',
            $serie
        );
    }
}