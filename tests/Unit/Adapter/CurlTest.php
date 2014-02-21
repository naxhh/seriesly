<?php
namespace Naxhh\Seriesly\Adapter\Tests;

use Naxhh\Seriesly\Adapter\Curl;

class CurlTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_retrieve_content_from_given_url()
    {
        $url = 'http://api.series.ly/v2/auth_token/?id_api=1075&secret=secretkey';

        $adapter = new Curl();

        $this->assertNotEmpty(
            $adapter->get( $url )
        );
    }
}