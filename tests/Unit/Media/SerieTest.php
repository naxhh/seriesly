<?php
namespace Naxhh\Seriesly\Tests;

use Naxhh\Seriesly\Media\Serie;

class SerieTest extends \PHPUnit_Framework_TestCase
{
    protected $serie;

    public function setUp()
    {
        $metadata = array(
            "name"      => "Breaking Bad",
            "idm"       => 91,
            "mediaType" => 1,
            "id_media"  => "7HV4DXUHE5",
            "imdb"      => "tt0903747",
            "rating"    => 9.4401270035713,
            "timestamp" => 1371024645,
            "maingenre" => "Crime",
            "year"      => 2008,
            "episodes"  => 121,
            "seasons"   => 5,
            "plot"      => "Breaking Bad nos muestra la historia de Walter White, un profesor de química...",
            "url"       => "http://series.ly/series/serie-7HV4DXUHE5",
            "img"       => "http://cdn.opensly.com/series/7HV4DXUHE5.jpg",
            "poster"    => array(
                "large"  => "http://cdn.opensly.com/series/7HV4DXUHE5.jpg",
                "medium" => "http://cdn.opensly.com/series/7HV4DXUHE5-p.jpg",
                "small"  => "http://cdn.opensly.com/series/7HV4DXUHE5-xs.jpg"
           ),
            "error" => 0
        );

        $this->serie = new Serie($metadata);
    }

    public function tearDown()
    {
        $this->serie = null;
    }

    /** @test */
    public function should_give_access_to_media_information()
    {
        $this->assertEquals(1, $this->serie->mediaType);
    }

    /** @test */
    public function unexisting_keys_must_throw_exception()
    {
        $this->setExpectedException('OutOfRangeException', 'Not defined key notExistingKey');

        $this->serie->notExistingKey;
    }
}