<?php
namespace Naxhh\Seriesly\Tests\Integration\Adapter;

use Naxhh\Seriesly\Tests\Integration\Base;
use Naxhh\Seriesly\Adapter\Curl;
use Naxhh\Seriesly\UrlBuilder;

class CurlTest extends Base
{
    private static $result;

    public static function setUpBeforeClass()
    {
        $url_builder = new UrlBuilder;
        $adapter     = new Curl;

        $url = $url_builder->getAuthUrl(self::$app_id, self::$secret);

        self::$result = $adapter->get($url);
    }

    /** @test */
    public function should_return_array()
    {
        $this->assertInternalType('array', self::$result);
    }

    /** @test */
    public function should_be_a_correct_response()
    {
        $this->assertEquals(0, self::$result['error']);
    }
}