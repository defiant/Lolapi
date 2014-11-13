<?php
/**
 * Created by Sinan Taga.
 * Date: 03/11/14 - 21:53
 */
namespace Lolapi;

use GuzzleHttp\Client as Guzzle;

class Client implements ClientInterface{

    protected $domain = '{region}.api.pvp.net/api/lol/{region}/v{version}/';
    protected $domainStatic = 'global.api.pvp.net/api/lol/static-data/{region}/v{version}/';
    protected $url;
    protected $timeout = 600;

    /**
     * @return mixed
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param mixed $timeout
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($region, $version, $static = false)
    {
        $url = $static ? $this->domainStatic : $this->domain;

        $this->url = 'https://' . str_replace(['{region}', '{version}'], [$region, $version], $url);

        return $this->url;
    }

    public function request($url)
    {
        $guzzle = new Guzzle();
        $response = $guzzle->get($url, ['connect_timeout' => $this->timeout]);

        return  $response->json();
    }
}