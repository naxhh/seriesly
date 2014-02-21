<?php
namespace Naxhh\Seriesly\Media;

abstract class Base
{
    protected $info;

    public function __construct($info)
    {
        $this->info = $info;
    }

    public function __get($key)
    {
        if (!isset($this->info[$key])) {
            throw new \OutOfRangeException('Not defined key ' . $key);
        }

        return $this->info[$key];
    }
}
