<?php
namespace Naxhh\Seriesly\Media;

class Factory
{
    public function create( $media_info )
    {
        // TODO: This should be refactored.
        switch ( $media_info['mediaType'] ) {
            case Types::SERIE:
                return new Serie( $media_info );
            case Types::MOVIE:
                return new Movie( $media_info );
            case Types::TVSHOW:
                return new TvShow( $media_info );
            case Types::DOCUMENTARY:
                return new Documentary( $media_info );
            default:
                throw new \UnexpectedValueException( 'Not valid media with type ' . $media_info['mediaType'] );
        }
    }
}