<?php
namespace Naxhh\Seriesly\Tests;

use Naxhh\Seriesly\Client;
use Naxhh\Seriesly\Media\Types;

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
    public function client_should_return_serie_based_on_id()
    {
        $serie_id   = 1;
        $media_type = Types::SERIE;

        $api_response = array(
            "name"      => "Fringe",
            "idm"       => "260",
            "mediaType" => Types::SERIE,
            "error"     => 0
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

    /** @test */
    public function client_should_return_movie_based_on_id()
    {
        $movie_id   = 20;
        $media_type = Types::MOVIE;

        $api_response = array(
            "name"      => "American Playboy (¿Quién es tu padre?)",
            "idm"       => 260,
            "mediaType" => Types::MOVIE,
            "error"     => 0
        );

        $this->request_handler->expects( $this->once() )
            ->method( 'getBasicMedia' )
            ->with( $movie_id, $media_type )
            ->will( $this->returnValue( $api_response ) );

        $movie = $this->client->getMovie( $movie_id );

        $this->assertInstanceOf(
            '\Naxhh\Seriesly\Media\Movie',
            $movie
        );
    }

    /** @test */
    public function client_should_return_tvshow_based_on_id()
    {
        $tvshow_id  = 20;
        $media_type = Types::TVSHOW;

        $api_response = array(
            "name"      => "Some tv show",
            "idm"       => 260,
            "mediaType" => Types::TVSHOW,
            "error"     => 0
        );

        $this->request_handler->expects( $this->once() )
            ->method( 'getBasicMedia' )
            ->with( $tvshow_id, $media_type )
            ->will( $this->returnValue( $api_response ) );

        $tvshow = $this->client->getTvShow( $tvshow_id );

        $this->assertInstanceOf(
            '\Naxhh\Seriesly\Media\TvShow',
            $tvshow
        );
    }

    /** @test */
    public function client_should_return_documentary_based_on_id()
    {
        $documentary_id = 20;
        $media_type     = Types::DOCUMENTARY;

        $api_response = array(
            "name"      => "Some documentary",
            "idm"       => 260,
            "mediaType" => Types::DOCUMENTARY,
            "error"     => 0
        );

        $this->request_handler->expects( $this->once() )
            ->method( 'getBasicMedia' )
            ->with( $documentary_id, $media_type )
            ->will( $this->returnValue( $api_response ) );

        $documentary = $this->client->getDocumentary( $documentary_id );

        $this->assertInstanceOf(
            '\Naxhh\Seriesly\Media\Documentary',
            $documentary
        );
    }
}