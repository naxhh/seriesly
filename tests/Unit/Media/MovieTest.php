<?php
namespace Naxhh\Seriesly\Tests;

use Naxhh\Seriesly\Media\Movie;

class MovieTest extends \PHPUnit_Framework_TestCase
{
    protected $movie;

    public function setUp()
    {
        $metadata = array(
            "name"      => "A espaldas de la ley",
            "idm"       => 91,
            "mediaType" => 2,
            "id_media"  => "2324DVE5F5",
            "imdb"      => "tt0097880",
            "rating"    => 6.4827586206897,
            "timestamp" => 1391373369,
            "maingenre" => "Action",
            "year"      => 1989,
            "plot"      => "Xavier Quinn, el jefe de policía de una isla caribeña, comienza a investigar...",
            "url"       => "http://series.ly/pelis/peli-2324DVE5F5",
            "img"       => "http://cdn.opensly.com/pelis/2324DVE5F5.jpg",
            "poster"    => array(
                "large"  => "http://cdn.opensly.com/pelis/2324DVE5F5.jpg",
                "medium" => "http://cdn.opensly.com/pelis/2324DVE5F5-p.jpg",
                "small"  => "http://cdn.opensly.com/pelis/2324DVE5F5-xs.jpg"
            ),
            "error" => 0
        );

        $this->movie = new Movie($metadata);
    }

    public function tearDown()
    {
        $this->movie = null;
    }

    /** @test */
    public function should_give_access_to_media_information()
    {
        $this->assertEquals(2, $this->movie->mediaType);
    }

    /** @test */
    public function unexisting_keys_must_throw_exception()
    {
        $this->setExpectedException('OutOfRangeException', 'Not defined key notExistingKey');

        $this->movie->notExistingKey;
    }
}