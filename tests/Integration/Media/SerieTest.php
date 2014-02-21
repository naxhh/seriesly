<?php
namespace Naxhh\Seriesly\Tests\Integration\Media;

use Naxhh\Seriesly\Tests\Integration\Base;
use Naxhh\Seriesly\Media\Types;

class SerieTest extends Base
{
    /** @test */
    public function retrieve_basic_info()
    {
        $client = self::createClient();
        $id     = 96;

        $serie = $client->getSerie($id);

        $this->assertEquals(Types::SERIE, $serie->mediaType);
    }
}