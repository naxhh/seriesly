<?php
namespace Naxhh\Seriesly\Tests;

use Naxhh\Seriesly\ClientFactory;

class ClientFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function create_should_return_a_valid_client_object()
    {
        $app_id     = 1;
        $secret_key = 'my_secret_key';
        $executor   = $this->getMock( 'Naxhh\Seriesly\Adapter\Base' );

        $client = ClientFactory::create( $app_id, $secret_key, $executor );

        $this->assertInstanceOf(
            'Naxhh\Seriesly\Client',
            $client
        );
    }
}