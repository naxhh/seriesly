<?php
namespace Naxhh\Seriesly\Tests\Integration;

use Naxhh\Seriesly\Adapter\Curl as Adapter;
use Naxhh\Seriesly\ClientFactory;

class Base extends \PHPUnit_Framework_TestCase
{
    protected static $app_id = '1075';
    protected static $secret = 'qsehkKpHtKSVzfheTkUn';

    public function __construct()
    {
        if ( !self::$app_id || !self::$secret )
        {
            throw new \Exception( 'You should set an APP ID and SECRET for tests' );
        }
    }

    public static function createClient()
    {
        return ClientFactory::create(self::$app_id, self::$secret, new Adapter);
    }
}