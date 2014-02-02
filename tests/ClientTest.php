<?php
namespace Naxhh\Seriesly\Tests;

use Naxhh\Seriesly\Client;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->request_handler = $this->getMockBuilder( 'Naxhh\Seriesly\Request' )
            ->disableOriginalConstructor()
            ->getMock();
        $this->client = new Client( $this->request_handler );
    }

    /** @test */
    public function create_should_return_a_valid_client_object()
    {
        $app_id     = 1;
        $secret_key = 'my_secret_key';
        $executor   = $this->getMock( 'Naxhh\Seriesly\Adapter\Base' );

        $client = Client::create( $app_id, $secret_key, $executor );

        $this->assertInstanceOf(
            'Naxhh\Seriesly\Client',
            $client
        );
    }

    /** @test */
    public function client_should_return_serie_based_on_id()
    {
        $serie_id   = 1;
        $media_type = 1;

        $api_response = array(
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

        $this->request_handler->expects( $this->once() )
            ->method( 'getBasicMedia' )
            ->with( $serie_id, $media_type )
            ->will( $this->returnValue( $api_response ) );

        $serie = $this->client->getSerie( $serie_id );

        $this->assertInstanceOf(
            '\Naxhh\Seriesly\Media\Serie',
            $serie
        );
    }
}