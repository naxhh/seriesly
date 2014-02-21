<?php
namespace Naxhh\Seriesly\Tests;

use Naxhh\Seriesly\Media\Documentary;

class DocumentaryTest extends \PHPUnit_Framework_TestCase
{
    protected $documentary;

    public function setUp()
    {
        $metadata = array(
            "name"      => "Viaje a los límites del universo",
            "idm"       => 15768,
            "mediaType" => 3,
            "id_media"  => "UWPW2A2SC6",
            "imdb"      => "tt1363109",
            "rating"    => 8.2100954979536,
            "timestamp" => 1392124430,
            "maingenre" => "Documentary",
            "year"      => 2008,
            "plot"      => "Nombre Original: Viaje a los límites del universoDirector: National GeographicActores:...",
            "url"       => "http://series.ly/docus/docu-UWPW2A2SC6",
            "img"       => "http://cdn.opensly.com/pelis/UWPW2A2SC6.jpg",
            "poster"    => array(
                "large"  => "http://cdn.opensly.com/pelis/UWPW2A2SC6.jpg",
                "medium" => "http://cdn.opensly.com/pelis/UWPW2A2SC6-p.jpg",
                "small"  => "http://cdn.opensly.com/pelis/UWPW2A2SC6-xs.jpg"
            ),
            "error" => 0
        );

        $this->documentary = new Documentary($metadata);
    }

    public function tearDown()
    {
        $this->documentary = null;
    }

    /** @test */
    public function should_give_access_to_media_information()
    {
        $this->assertEquals(3, $this->documentary->mediaType);
    }

    /** @test */
    public function unexisting_keys_must_throw_exception()
    {
        $this->setExpectedException('OutOfRangeException', 'Not defined key notExistingKey');

        $this->documentary->notExistingKey;
    }
}