<?php
namespace Naxhh\Seriesly\Tests;

class Base extends \PHPUnit_Framework_TestCase
{
    protected $app_id = '';
    protected $secret = '';

    public function __construct()
    {
        if ( !$this->app_id || !$this->secret )
        {
            throw new \Exception( 'You should set an APP ID and SECRET for tests' );
        }
    }
}