<?php
namespace Naxhh\Seriesly\Tests;

use Naxhh\Seriesly\Media\Factory;
use Naxhh\Seriesly\Media\Types;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_return_serie()
    {
        $serie_info = array(
            "idm"       => "260",
            "id_media"  => "2EF4F6T6CZ",
            "mediaType" => Types::SERIE,
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

        $factory = new Factory();

        $this->assertInstanceOf(
            '\Naxhh\Seriesly\Media\Serie',
            $factory->create( $serie_info )
        );
    }

    /** @test */
    public function should_return_movie()
    {
        $movie_info = array(
            "name"      => "American Playboy (¿Quién es tu padre?)",
            "idm"       => 260,
            "mediaType" => Types::MOVIE,
            "id_media"  => "TX7D2WHX6S",
            "imdb"      => "tt0287138",
            "rating"    => 6.4022140221402,
            "timestamp" => 1390430173,
            "maingenre" => "Comedy",
            "year"      => 2004,
            "plot"      => "Un joven estudiante de Ohio se convierte en millonario de la noche a la mañana...",
            "url"       => "http://series.ly/pelis/peli-TX7D2WHX6S",
            "img"       => "http://cdn.opensly.com/pelis/TX7D2WHX6S.jpg",
            "poster"    => array(
                "large"  => "http://cdn.opensly.com/pelis/TX7D2WHX6S.jpg",
                "medium" => "http://cdn.opensly.com/pelis/TX7D2WHX6S-p.jpg",
                "small"  => "http://cdn.opensly.com/pelis/TX7D2WHX6S-xs.jpg"
            ),
            "error" => 0
        );

        $factory = new Factory();

        $this->assertInstanceOf(
            '\Naxhh\Seriesly\Media\Movie',
            $factory->create( $movie_info )
        );
    }

    /** @test */
    public function should_return_tvshow()
    {
        $tvshow_info = array(
            'mediaType' => Types::TVSHOW
        );

        $factory = new Factory();

        $this->assertInstanceOf(
            '\Naxhh\Seriesly\Media\TvShow',
            $factory->create( $tvshow_info )
        );
    }

    /** @test */
    public function should_return_documentary()
    {
        $documentary_info = array(
            'mediaType' => Types::DOCUMENTARY
        );

        $factory = new Factory();

        $this->assertInstanceOf(
            '\Naxhh\Seriesly\Media\Documentary',
            $factory->create( $documentary_info )
        );
    }

    /** @test */
    public function should_throw_exception_when_media_is_invalid()
    {
        $this->setExpectedException( 'UnexpectedValueException', 'Not valid media with type 99' );

        $media_info = array(
            'name'      => "not valid info",
            'mediaType' => '99'
        );

        $factory = new Factory();

        $this->assertInstanceOf(
            '\Naxhh\Seriesly\Media\Movie',
            $factory->create( $media_info )
        );
    }
}