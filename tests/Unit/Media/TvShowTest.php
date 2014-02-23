<?php
namespace Naxhh\Seriesly\Tests;

use Naxhh\Seriesly\Media\TvShow;

class TvShowTest extends \PHPUnit_Framework_TestCase
{
    protected $tv_show;

    public function setUp()
    {
        $metadata = array(
            "name"      => "El Club de la Comedia",
            "idm"       => 2518,
            "mediaType" => 4,
            "id_media"  => "T2CFAK2RFU",
            "imdb"      => "tt1817385",
            "rating"    => 8.5434253246753,
            "timestamp" => 1299006364,
            "maingenre" => "Comedy",
            "year"      => 2011,
            "episodes"  => 68,
            "seasons"   => 5,
            "plot"      => "Eva Hache, una de las mejores actrices cómicas, vuelve a la televisión a partir...",
            "url"       => "http://series.ly/tvshows/show-T2CFAK2RFU",
            "img"       => "http://cdn.opensly.com/series/T2CFAK2RFU.jpg",
            "poster"    => array(
                "large"  => "http://cdn.opensly.com/series/T2CFAK2RFU.jpg",
                "medium" => "http://cdn.opensly.com/series/T2CFAK2RFU-p.jpg",
                "small"  => "http://cdn.opensly.com/series/T2CFAK2RFU-xs.jpg"
            ),
            "error" => 0
        );

        $this->tv_show = new TvShow($metadata);
    }

    public function tearDown()
    {
        $this->tv_show = null;
    }

    /** @test */
    public function should_give_access_to_media_information()
    {
        $this->assertEquals(4, $this->tv_show->mediaType);
    }

    /** @test */
    public function unexisting_keys_must_throw_exception()
    {
        $this->setExpectedException('OutOfRangeException', 'Not defined key notExistingKey');

        $this->tv_show->notExistingKey;
    }
}