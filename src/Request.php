<?php
namespace Naxhh\Seriesly;

use Naxhh\Seriesly\Adapter\Base as Executor;
use Naxhh\Seriesly\UrlBuilder;

class Request
{
    private $executor;
    private $url_builder;
    private $app_id;
    private $secret;
    private $auth_key;

    public function __construct(Executor $executor, UrlBuilder $url_builder, $app_id, $secret)
    {
        $this->executor    = $executor;
        $this->url_builder = $url_builder;
        $this->app_id      = $app_id;
        $this->secret      = $secret;
    }

    public function getAuthKey()
    {
        if ($this->auth_key) {
            return $this->auth_key;
        }

        $response = $this->executor->get(
            $this->url_builder->getAuthUrl($this->app_id, $this->secret)
        );

        return $this->auth_key = $response['auth_token'];
    }

    public function setAuthKey($key)
    {
        $this->auth_key = $key;
    }

    public function getBasicMedia($id, $type)
    {
        return $this->executor->get(
            $this->url_builder->getBasicMediaUrl($id, $type, $this->getAuthKey())
        );
    }
}
