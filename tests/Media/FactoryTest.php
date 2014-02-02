<?php
namespace Naxhh\Seriesly\Tests;

use Naxhh\Seriesly\Media\Factory;
use Naxhh\Seriesly\Media\Types;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_return_serie()
    {
        $serie_id   = 1;
        $media_type = Types::SERIE;

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


        $api_handler = $this->getMock( 'Naxhh\Seriesly\RequestHandler' );
        $api_handler->expects( $this->once() )
            ->method( 'get' )
            ->with( Factory::API_URL . 'media/basic_info/?auth_token=auth_key&mediaType=' . $media_type . '&idm=' . $serie_id )
            ->will( $this->returnValue( $serie_info ) );

        $factory = new Factory( $api_handler, 'auth_key' );

        $this->assertInstanceOf(
            '\Naxhh\Seriesly\Media\Serie',
            $factory->get( $serie_id, $media_type )
        );
    }
}