<?php
namespace Naxhh\Seriesly\Tests;

use Naxhh\Seriesly\UrlBuilder;

class UrlBuilderTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function get_auth_url()
    {
        $app_id = 1;
        $secret = 'secret_key';

        $builder = new UrlBuilder();
        $auth_url = UrlBuilder::BASE_URL . 'auth_token/?id_api=' . $app_id . '&secret=' . $secret;

        $this->assertEquals(
            $auth_url,
            $builder->getAuthUrl( $app_id, $secret )
        );
    }

    /** @test */
    public function get_basic_media_url()
    {
        $media_id   = 1;
        $media_type = 2;
        $auth_key   = 'auth_key';

        $builder = new UrlBuilder();
        $url = UrlBuilder::BASE_URL . 'media/basic_info/?auth_token=' . $auth_key . '&mediaType=' . $media_type . '&idm=' . $media_id;

        $this->assertEquals(
            $url,
            $builder->getBasicMediaUrl( $media_id, $media_type, $auth_key )
        );
    }
}