<?php
namespace Naxhh\Seriesly;

class Client
{
    private $api_handler;

    public function __construct(Request $api_handler)
    {
        $this->api_handler = $api_handler;
    }

    public function getSerie($id)
    {
        return $this->getMedia($id, Media\Types::SERIE);
    }

    public function getMovie($id)
    {
        return $this->getMedia($id, Media\Types::MOVIE);
    }

    public function getTvShow($id)
    {
        return $this->getMedia($id, Media\Types::TVSHOW);
    }

    public function getDocumentary($id)
    {
        return $this->getMedia($id, Media\Types::DOCUMENTARY);
    }

    private function getMedia($id, $media_type)
    {
        $factory = new Media\Factory();

        return $factory->create(
            $this->api_handler->getBasicMedia($id, $media_type)
        );
    }
}
