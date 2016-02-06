<?php namespace Lolapi;

use GuzzleHttp\Client as Guzzle;

/**
 * Class Client
 *
 * @package Lolapi
 */
class Client implements ClientInterface{

    protected $url;
    /**
     * @var int
     */
    protected $timeout = 600;

    /**
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }


    /**
     * set the timeout for http request in miliseconds
     * @param $timeout
     *
     * @return $this
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param $region
     * @param $version
     * @param bool $static
     *
     * @return string
     */
    public function setUrl($region, $version, $static = false)
    {
        $url = $static ? $this->domainStatic : $this->domain;

        $this->url = 'https://' . str_replace(['{region}', '{version}'], [$region, $version], $url);

        return $this->url;
    }

    /**
     * @param $url
     *
     * @return Array
     */
    public function request($url)
    {
        $guzzle = new Guzzle();
        $response = $guzzle->get($url, ['connect_timeout' => $this->timeout]);

        return  json_decode($response->getBody());
    }
}