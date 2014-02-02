<?php
namespace Naxhh\Seriesly\Media;

class Factory
{
    public function create( $media_info )
    {
        return new Serie( $media_info );
    }
}