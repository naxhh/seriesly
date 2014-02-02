<?php
namespace Naxhh\Seriesly\Tests;

use Naxhh\Seriesly\Request;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function get_auth_key_should_return_correct_key()
    {
        $app_id   = 1;
        $secret   = 'secret_key';
        $auth_url = 'auth_url';

        $api_response = array(
            "auth_token"        => 'valid_auth_token',
            "auth_expires_date" => "1349168354",
            "error"             => 0
        );

        $url_builder = $this->getMock( 'Naxhh\Seriesly\UrlBuilder' );
        $url_builder->expects( $this->once() )
            ->method( 'getAuthUrl' )
            ->with( $app_id, $secret )
            ->will( $this->returnValue( $auth_url ) );

        $adapter = $this->getMock( 'Naxhh\Seriesly\Adapter\Base' );
        $adapter->expects( $this->once() )
            ->method( 'get' )
            ->with( $auth_url )
            ->will( $this->returnValue( $api_response ) );

        $request = new Request( $adapter, $url_builder, $app_id, $secret );

        $this->assertEquals(
            $api_response['auth_token'],
            $request->getAuthKey()
        );
    }

    /** @test */
    public function get_basic_media_should_return_media_response()
    {
        $media_id   = 1;
        $media_type = 10;
        $app_id     = 1;
        $secret     = 'secret_key';
        $auth       = 'authorization code';

        $basic_media_url = 'basic_media/url';
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

        $url_builder = $this->getMock( 'Naxhh\Seriesly\UrlBuilder' );
        $url_builder->expects( $this->once() )
            ->method( 'getBasicMediaUrl' )
            ->will( $this->returnValue( $basic_media_url ) );

        $adapter = $this->getMock( 'Naxhh\Seriesly\Adapter\Base' );
        $adapter->expects( $this->once() )
            ->method( 'get' )
            ->with( $basic_media_url )
            ->will( $this->returnValue( $api_response ) );

        $request = new Request( $adapter, $url_builder, $app_id, $secret );
        $request->setAuthKey( $auth );

        $this->assertEquals(
            $api_response,
            $request->getBasicMedia( $media_id, $media_type )
        );
    }
}